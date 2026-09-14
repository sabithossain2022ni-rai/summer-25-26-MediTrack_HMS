document.addEventListener('DOMContentLoaded', function () {
    const csrf = document.querySelector('input[name="csrf_token"]')?.value || '';

    document.querySelectorAll('form[data-validate]').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const type = form.dataset.validate;

            if (type === 'patient') {
                const age = Number(form.querySelector('[name="age"]')?.value || 0);
                if (age < 0 || age > 120) {
                    event.preventDefault();
                    alert('Age must be between 0 and 120.');
                    return;
                }
            }

            if (type === 'slot') {
                const start = form.querySelector('[name="start_time"]')?.value;
                const end = form.querySelector('[name="end_time"]')?.value;
                if (start && end && start >= end) {
                    event.preventDefault();
                    alert('End time must be after start time.');
                    return;
                }
            }

            if (type === 'emergency') {
                const name = form.querySelector('[name="patient_name"]')?.value.trim();
                const emergency = form.querySelector('[name="emergency_type"]')?.value.trim();
                if (!name || !emergency) {
                    event.preventDefault();
                    alert('Patient name and emergency type are required.');
                }
            }
        });
    });

    document.querySelectorAll('form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (form.classList.contains('ajax-cancel-form')) return;

            let valid = true;
            form.querySelectorAll('[required]').forEach(function (input) {
                if (!String(input.value).trim()) {
                    input.setCustomValidity('This field is required.');
                    valid = false;
                } else {
                    input.setCustomValidity('');
                }
            });

            const password = form.querySelector('#password');
            const confirm = form.querySelector('#confirm_password');

            if (password && password.value.length < 6) {
                password.setCustomValidity('Password must be at least 6 characters.');
                valid = false;
            }

            if (password && confirm && password.value !== confirm.value) {
                confirm.setCustomValidity('Passwords do not match.');
                valid = false;
            } else if (confirm) {
                confirm.setCustomValidity('');
            }

            if (!valid) event.preventDefault();
        });
    });

    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!confirm('Are you sure you want to delete/cancel this?')) {
                event.preventDefault();
            }
        });
    });

    const dateInput = document.getElementById('appointment-date');
    const slotSelect = document.getElementById('slot-select');

    if (dateInput && slotSelect) {
        const loadSlots = async function () {
            const date = dateInput.value;
            if (!date) return;

            slotSelect.innerHTML = '<option value="">Loading available slots...</option>';

            try {
                const response = await fetch(
                    'index.php?page=ajax&action=available_slots&date=' + encodeURIComponent(date),
                    { headers: { Accept: 'application/json' } }
                );
                const json = await response.json();

                slotSelect.innerHTML = '<option value="">Select an available slot</option>';

                if (json.success && json.data?.length) {
                    json.data.forEach(function (slot) {
                        const option = document.createElement('option');
                        option.value = slot.id;
                        option.textContent =
                            slot.doctor + ' — ' +
                            String(slot.start || '').substring(0, 5) + '-' +
                            String(slot.end || '').substring(0, 5) +
                            ' (' + slot.specialization + ')';
                        slotSelect.appendChild(option);
                    });
                } else {
                    slotSelect.innerHTML = '<option value="">No available slots for this date</option>';
                }
            } catch (error) {
                slotSelect.innerHTML = '<option value="">Could not load slots</option>';
            }
        };

        dateInput.addEventListener('change', loadSlots);
    }

    const patientSearch = document.querySelector('[name="search"]');
    const patientTable = document.querySelector('#patient-live-results');

    if (patientSearch && patientTable) {
        let timer;
        patientSearch.addEventListener('input', function () {
            clearTimeout(timer);
            timer = setTimeout(async function () {
                const q = patientSearch.value.trim();
                if (!q) return;

                try {
                    const response = await fetch(
                        'index.php?page=ajax&action=search_patients&q=' + encodeURIComponent(q),
                        { headers: { Accept: 'application/json' } }
                    );
                    const json = await response.json();

                    patientTable.innerHTML = (json.data || []).map(function (p) {
                        return '<tr>' +
                            '<td><strong>' + escapeHtml(p.code) + '</strong></td>' +
                            '<td>' + escapeHtml(p.name) + '<small>' + escapeHtml(p.status) + '</small></td>' +
                            '<td>' + escapeHtml(p.phone) + '</td>' +
                            '<td><span class="status ' + escapeHtml(p.status) + '">' + escapeHtml(p.status) + '</span></td>' +
                            '<td><a class="btn small" href="index.php?page=receptionist&section=patients&edit=' + encodeURIComponent(p.id) + '">Edit</a></td>' +
                            '</tr>';
                    }).join('') || '<tr><td colspan="5" class="empty">No match.</td></tr>';
                } catch (error) {
                    console.error(error);
                }
            }, 300);
        });
    }

    const stats = document.getElementById('liveStats');
    if (stats) {
        const refresh = async function () {
            try {
                const response = await fetch(stats.dataset.statsUrl, {
                    headers: { Accept: 'application/json' }
                });
                const json = await response.json();

                if (json.success) {
                    Object.entries(json.data).forEach(function ([key, value]) {
                        const element = document.getElementById('stat-' + key);
                        if (element) element.textContent = value;
                    });
                }
            } catch (error) {
                console.error(error);
            }
        };
        refresh();
        setInterval(refresh, 15000);
    }

    const symptomSearch = document.getElementById('symptom-search');
    const symptomBody = document.getElementById('symptom-table-body');

    if (symptomSearch && symptomBody) {
        const performSearch = function () {
            const q = symptomSearch.value.trim();

            fetch(
                'index.php?page=ajax&action=search_symptoms&q=' + encodeURIComponent(q),
                { headers: { Accept: 'application/json' } }
            )
                .then(function (response) { return response.json(); })
                .then(function (data) {
                    if (!data.success) throw new Error(data.message || 'Search failed.');

                    if (!data.rows.length) {
                        showSearchMessage(symptomBody, symptomBody.dataset.emptyMessage);
                        return;
                    }

                    symptomBody.innerHTML = data.rows.map(function (row) {
                        return '<tr>' +
                            '<td>' + esc(row.symptom) + '</td>' +
                            '<td>' + esc(row.severity) + '/10</td>' +
                            '<td>' + esc(row.duration) + '</td>' +
                            '<td>' + esc(row.frequency) + '</td>' +
                            '<td>' + esc(formatDate(row.symptom_date)) + '</td>' +
                            '<td>' + (row.notes ? esc(row.notes) : '—') + '</td>' +
                            '<td class="actions">' +
                            '<a href="index.php?page=symptoms&edit=' + encodeURIComponent(row.id) + '">Edit</a> ' +
                            '<form method="POST" action="index.php?page=symptoms" class="inline-form delete-form">' +
                            '<input type="hidden" name="csrf_token" value="' + esc(csrf) + '">' +
                            '<input type="hidden" name="action" value="delete">' +
                            '<input type="hidden" name="id" value="' + esc(row.id) + '">' +
                            '<button type="submit" class="link-danger">Delete</button>' +
                            '</form>' +
                            '</td></tr>';
                    }).join('');

                    symptomBody.querySelectorAll('.delete-form').forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            if (!confirm('Are you sure you want to delete/cancel this?')) event.preventDefault();
                        });
                    });
                })
                .catch(function (error) { console.error(error); });
        };

        const runSearch = debounce(performSearch, 250);
        symptomSearch.addEventListener('input', runSearch);
        document.getElementById('symptom-search-button')?.addEventListener('click', performSearch);
    }

    const appointmentSearch = document.getElementById('appointment-search');
    const appointmentBody = document.getElementById('appointment-table-body');

    if (appointmentSearch && appointmentBody) {
        const performSearch = function () {
            const q = appointmentSearch.value.trim();

            fetch(
                'index.php?page=ajax&action=search_appointments&q=' + encodeURIComponent(q),
                { headers: { Accept: 'application/json' } }
            )
                .then(function (response) { return response.json(); })
                .then(function (data) {
                    if (!data.success) throw new Error(data.message || 'Search failed.');

                    if (!data.rows.length) {
                        showSearchMessage(appointmentBody, appointmentBody.dataset.emptyMessage);
                        return;
                    }

                    appointmentBody.innerHTML = data.rows.map(function (row) {
                        const booked = String(row.status).toLowerCase() === 'booked';
                        const cancel = booked
                            ? '<form method="POST" action="index.php?page=ajax&action=cancel_appointment" class="inline-form ajax-cancel-form" data-appointment-id="' +
                              esc(row.id) + '">' +
                              '<input type="hidden" name="csrf_token" value="' + esc(csrf) + '">' +
                              '<input type="hidden" name="appointment_id" value="' + esc(row.id) + '">' +
                              '<button class="link-danger" type="submit">Cancel</button></form>'
                            : '—';

                        return '<tr>' +
                            '<td>' + esc(row.doctor_name) + '</td>' +
                            '<td>' + esc(row.specialization) + '</td>' +
                            '<td>' + esc(formatDate(row.appointment_date)) + '</td>' +
                            '<td>' + esc(formatTime(row.appointment_time)) + '</td>' +
                            '<td><span class="status ' + esc(String(row.status).toLowerCase()) + '">' + esc(row.status) + '</span></td>' +
                            '<td>' + cancel + '</td></tr>';
                    }).join('');

                    bindAjaxCancelForms();
                })
                .catch(function (error) { console.error(error); });
        };

        const runSearch = debounce(performSearch, 250);
        appointmentSearch.addEventListener('input', runSearch);
        document.getElementById('appointment-search-button')?.addEventListener('click', performSearch);
    }

    bindAjaxCancelForms();

    document.querySelectorAll('.button').forEach(function (button) {
        button.addEventListener('click', function () {
            button.setAttribute('aria-busy', 'true');
        });
    });

    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function (element) {
            element.style.display = 'none';
        });
    }, 5000);
});

function debounce(fn, delay) {
    let timer;
    return function () {
        const args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            fn.apply(null, args);
        }, delay);
    };
}

function showSearchMessage(tbody, text) {
    tbody.innerHTML =
        '<tr><td colspan="10" class="empty-cell">' +
        esc(text || 'No results found.') +
        '</td></tr>';
}

function bindAjaxCancelForms() {
    const csrf = document.querySelector('input[name="csrf_token"]')?.value || '';

    document.querySelectorAll('.ajax-cancel-form').forEach(function (form) {
        if (form.dataset.bound === '1') return;
        form.dataset.bound = '1';

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            if (!confirm('Are you sure you want to cancel this appointment?')) return;

            const button = form.querySelector('button');
            if (button) button.disabled = true;

            const body = new URLSearchParams();
            body.set('appointment_id', form.dataset.appointmentId || '');
            body.set('csrf_token', csrf);

            fetch('index.php?page=ajax&action=cancel_appointment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                    Accept: 'application/json'
                },
                body: body.toString()
            })
                .then(function (response) { return response.json(); })
                .then(function (data) {
                    if (!data.success) throw new Error(data.message || 'Could not cancel appointment.');

                    const row = form.closest('tr');
                    if (row) {
                        if (row.children[4]) row.children[4].innerHTML = '<span class="status cancelled">Cancelled</span>';
                        if (row.children[5]) row.children[5].textContent = '—';
                    }
                })
                .catch(function (error) {
                    alert(error.message);
                    if (button) button.disabled = false;
                });
        });
    });
}

function escapeHtml(value) {
    const div = document.createElement('div');
    div.textContent = value ?? '';
    return div.innerHTML;
}

function esc(value) {
    return String(value ?? '').replace(/[&<>'"]/g, function (char) {
        return {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            "'": '&#39;',
            '"': '&quot;'
        }[char];
    });
}

function formatDate(value) {
    if (!value) return '';
    const parts = String(value).split('-');
    if (parts.length !== 3) return value;

    const months = [
        'Jan', 'Feb', 'Mar', 'Apr',
        'May', 'Jun', 'Jul', 'Aug',
        'Sep', 'Oct', 'Nov', 'Dec'
    ];

    return parts[2] + ' ' + months[Number(parts[1]) - 1] + ' ' + parts[0];
}

function formatTime(value) {
    if (!value) return '';
    const parts = String(value).split(':');
    let hour = Number(parts[0]);
    const suffix = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12 || 12;
    return String(hour).padStart(2, '0') + ':' + (parts[1] || '00') + ' ' + suffix;
}

function confirmDelete() {
    return confirm('Are you sure you want to delete this record?');
}

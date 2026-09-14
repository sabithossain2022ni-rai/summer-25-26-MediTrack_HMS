<?php

require_once __DIR__ . '/../models/admin/admin_model.php';

function handle_action(string $action): void
{
    if (in_array($action, ['login', 'logout'], true)) {
        return;
    }

    require_admin();
    require_csrf();

    global $conn;

    $m = new AdminModel($conn);

    try {

        switch ($action) {

            case 'department_save':

                $id = (int)($_POST['id'] ?? 0);
                $name = trim($_POST['name'] ?? '');
                $description = trim($_POST['description'] ?? '');

                if ($id > 0) {
                    $m->updateDepartment(
                        $id,
                        $name,
                        $description
                    );
                } else {
                    $m->createDepartment(
                        $name,
                        $description
                    );
                }

                flash(
                    'success',
                    'Department saved.'
                );

                redirect(
                    'index.php?page=admin&section=departments'
                );

                break;


            case 'department_delete':

                $m->deleteDepartment(
                    (int)($_POST['id'] ?? 0)
                );

                flash(
                    'success',
                    'Department deleted.'
                );

                redirect(
                    'index.php?page=admin&section=departments'
                );

                break;


            case 'person_save':

                $m->savePerson($_POST);

                flash(
                    'success',
                    'Person record saved.'
                );

                redirect(
                    'index.php?page=admin&section=people'
                );

                break;


            case 'person_status':

                $m->togglePersonStatus(
                    $_POST['type'] ?? '',
                    (int)($_POST['id'] ?? 0)
                );

                flash(
                    'success',
                    'Person status updated.'
                );

                redirect(
                    'index.php?page=admin&section=people'
                );

                break;


            case 'billing_save':

                $m->saveBilling($_POST);

                flash(
                    'success',
                    'Billing record saved.'
                );

                redirect(
                    'index.php?page=admin&section=costs'
                );

                break;


            case 'billing_delete':

                $m->deleteBilling(
                    (int)($_POST['id'] ?? 0)
                );

                flash(
                    'success',
                    'Billing record deleted.'
                );

                redirect(
                    'index.php?page=admin&section=costs'
                );

                break;


            case 'equipment_save':

                $m->saveEquipment($_POST);

                flash(
                    'success',
                    'Equipment record saved.'
                );

                redirect(
                    'index.php?page=admin&section=resources'
                );

                break;


            case 'equipment_delete':

                $m->deleteEquipment(
                    (int)($_POST['id'] ?? 0)
                );

                flash(
                    'success',
                    'Equipment record deleted.'
                );

                redirect(
                    'index.php?page=admin&section=resources'
                );

                break;


            case 'inventory_save':

                $m->saveInventory($_POST);

                flash(
                    'success',
                    'Inventory item saved.'
                );

                redirect(
                    'index.php?page=admin&section=stock'
                );

                break;


            case 'inventory_delete':

                $m->deleteInventory(
                    (int)($_POST['id'] ?? 0)
                );

                flash(
                    'success',
                    'Inventory item deleted.'
                );

                redirect(
                    'index.php?page=admin&section=stock'
                );

                break;


            case 'stock_transaction':

                $m->stockTransaction($_POST);

                flash(
                    'success',
                    'Stock transaction recorded.'
                );

                redirect(
                    'index.php?page=admin&section=stock'
                );

                break;


            case 'settings_save':

                $m->saveSettings($_POST);

                flash(
                    'success',
                    'Settings saved.'
                );

                redirect(
                    'index.php?page=admin&section=settings'
                );

                break;


            default:

                redirect(
                    'index.php?page=admin'
                );

                break;
        }

    } catch (Throwable $e) {

        flash(
            'error',
            $e->getMessage()
        );

        redirect(
            'index.php?page=admin'
        );
    }
}


function render_admin_page(string $page): void
{
    global $conn;

    $m = new AdminModel($conn);

    $data = [];

    switch ($page) {

        case 'dashboard':

            $data = $m->dashboard();

            break;


        case 'people':

            $data = $m->peopleData();

            break;


        case 'departments':

            $data = $m->departmentsData();

            break;


        case 'costs':

            $data = $m->costsData();

            break;


        case 'resources':

            $data = $m->resourcesData();

            break;


        case 'stock':

            $data = $m->stockData();

            break;


        case 'settings':

            $data = $m->settingsData();

            break;


        default:

            $data = $m->dashboard();

            break;
    }

    $flash = get_flash();

    include __DIR__ . '/../views/admin/layout.php';
}


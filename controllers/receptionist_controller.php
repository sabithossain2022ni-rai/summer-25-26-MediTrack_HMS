<?php
require_once __DIR__ . '/../models/patient_model.php';
require_once __DIR__ . '/../models/doctor_model.php';
require_once __DIR__ . '/../models/emergency_model.php';
require_once __DIR__ . '/../models/appointment_model.php';

function receptionist_controller(mysqli $conn, string $action): void {
    require_role('receptionist');

    // PATIENT CRUD
    if ($action === 'patient_save') {
        verify_csrf();
        $data = patient_form_data();
        $errors = validate_patient($data);
        $id = (int)($_POST['patient_id'] ?? 0);
        if ($errors) { flash('error', implode(' ', $errors)); redirect('index.php?page=receptionist&section=patients' . ($id ? '&edit=' . $id : '')); }
        $ok = $id ? update_patient($conn, $id, $data) : create_patient($conn, $data);
        flash($ok ? 'success' : 'error', $ok ? ($id ? 'Patient updated successfully.' : 'Patient registered successfully.') : 'Could not save patient.');
        redirect('index.php?page=receptionist&section=patients');
    }
    if ($action === 'patient_delete') {
        verify_csrf(); $id=(int)($_POST['id']??0);
        flash(delete_patient($conn,$id)?'success':'error', 'Patient status updated.');
        redirect('index.php?page=receptionist&section=patients');
    }

    // DOCTOR SLOT CRUD
    if ($action === 'slot_save') {
        verify_csrf(); $data=slot_form_data(); $id=(int)($_POST['slot_id']??0); $errors=validate_slot($data);
        if($errors){flash('error',implode(' ',$errors));redirect('index.php?page=receptionist&section=slots'.($id?'&edit='.$id:''));}
        $ok=$id?update_slot($conn,$id,$data):create_slot($conn,$data);
        flash($ok?'success':'error',$ok?($id?'Doctor slot updated.':'Doctor slot created.'):'Could not save doctor slot.');
        redirect('index.php?page=receptionist&section=slots');
    }
    if ($action === 'slot_delete') {
        verify_csrf(); $id=(int)($_POST['id']??0);
        $ok = delete_slot($conn,$id); flash($ok?'success':'error', $ok?'Slot deleted successfully.':'Booked slots cannot be deleted. Change the appointment first.');
        redirect('index.php?page=receptionist&section=slots');
    }

    // EMERGENCY FAST REGISTRATION CRUD
    if ($action === 'emergency_save') {
        verify_csrf(); $data=emergency_form_data(); $id=(int)($_POST['emergency_id']??0); $errors=validate_emergency($data);
        if($errors){flash('error',implode(' ',$errors));redirect('index.php?page=receptionist&section=emergency'.($id?'&edit='.$id:''));}
        $ok=$id?update_emergency($conn,$id,$data):create_emergency($conn,$data);
        flash($ok?'success':'error',$ok?($id?'Emergency record updated.':'Emergency patient registered fast.'):'Could not save emergency record.');
        redirect('index.php?page=receptionist&section=emergency');
    }
    if ($action === 'emergency_delete') {
        verify_csrf(); $id=(int)($_POST['id']??0);
        flash(delete_emergency($conn,$id)?'success':'error','Emergency record cancelled.');
        redirect('index.php?page=receptionist&section=emergency');
    }

    // APPOINTMENT CRUD
    if ($action === 'appointment_create') {
        verify_csrf(); $data=['patient_id'=>(int)($_POST['patient_id']??0),'slot_id'=>(int)($_POST['slot_id']??0),'reason'=>trim($_POST['reason']??''),'status'=>'booked'];
        if(!$data['patient_id']||!$data['slot_id']) flash('error','Patient and available slot are required.');
        else {
            $ok = create_appointment($conn, $data);
            flash($ok ? 'success' : 'error', $ok ? 'Appointment created and slot booked.' : 'Could not create appointment. The slot may already be booked.');
        }
        redirect('index.php?page=receptionist&section=appointments');
    }
    if ($action === 'appointment_status') {
        verify_csrf(); $id=(int)($_POST['appointment_id']??0); $status=$_POST['status']??'booked';
        if(!in_array($status,['booked','completed','cancelled'],true)) $status='booked';
        flash(update_appointment_status($conn,$id,$status)?'success':'error','Appointment status updated.');
        redirect('index.php?page=receptionist&section=appointments');
    }
    if ($action === 'appointment_delete') {
        verify_csrf(); $id=(int)($_POST['id']??0);
        flash(delete_appointment($conn,$id)?'success':'error','Appointment deleted and slot released.');
        redirect('index.php?page=receptionist&section=appointments');
    }

    $section = $_GET['section'] ?? 'dashboard';
    $data = build_receptionist_page($conn, $section);
    extract($data);
    require __DIR__ . '/../views/receptionist/receptionist/dashboard.php';
}

function patient_form_data():array{
    return ['full_name'=>trim($_POST['full_name']??''),'age'=>(int)($_POST['age']??0),'gender'=>$_POST['gender']??'Male','phone'=>trim($_POST['phone']??''),'email'=>trim($_POST['email']??''),'address'=>trim($_POST['address']??''),'emergency_contact'=>trim($_POST['emergency_contact']??''),'status'=>$_POST['status']??'active'];
}
function validate_patient(array $d):array{
    $e=validate_required($d,['full_name'=>'Full name','phone'=>'Phone']);
    if($d['age']<0||$d['age']>120)$e[]='Age must be between 0 and 120.';
    if(!in_array($d['gender'],['Male','Female','Other'],true))$e[]='Invalid gender.';
    if($d['email']!==''&&!filter_var($d['email'],FILTER_VALIDATE_EMAIL))$e[]='Email is not valid.';
    if(!in_array($d['status'],['active','inactive'],true))$e[]='Invalid status.';
    return $e;
}
function slot_form_data():array{return ['doctor_id'=>(int)($_POST['doctor_id']??0),'slot_date'=>$_POST['slot_date']??'','start_time'=>$_POST['start_time']??'','end_time'=>$_POST['end_time']??'','status'=>$_POST['status']??'available'];}
function validate_slot(array $d):array{$e=validate_required($d,['slot_date'=>'Slot date','start_time'=>'Start time','end_time'=>'End time']);if(!$d['doctor_id'])$e[]='Doctor is required.';if($d['start_time']!==''&&$d['end_time']!==''&&$d['start_time']>=$d['end_time'])$e[]='End time must be after start time.';if(!in_array($d['status'],['available','booked','closed'],true))$e[]='Invalid slot status.';return $e;}
function emergency_form_data():array{return ['patient_name'=>trim($_POST['patient_name']??''),'age'=>($_POST['age']??'')===''?null:(int)$_POST['age'],'gender'=>($_POST['gender']??'')===''?null:$_POST['gender'],'phone'=>trim($_POST['phone']??''),'emergency_contact'=>trim($_POST['emergency_contact']??''),'emergency_type'=>trim($_POST['emergency_type']??''),'arrival_time'=>$_POST['arrival_time']??date('Y-m-d\TH:i'),'notes'=>trim($_POST['notes']??''),'status'=>$_POST['status']??'waiting'];}
function validate_emergency(array $d):array{$e=validate_required($d,['patient_name'=>'Patient name','emergency_type'=>'Emergency type']);if($d['age']!==null&&($d['age']<0||$d['age']>120))$e[]='Age must be between 0 and 120.';if($d['gender']!==null&&!in_array($d['gender'],['Male','Female','Other'],true))$e[]='Invalid gender.';if(!in_array($d['status'],['waiting','completed','cancelled'],true))$e[]='Invalid emergency status.';return $e;}

function build_receptionist_page(mysqli $conn,string $section):array{
    $data=['section'=>$section,'patients'=>[],'slots'=>[],'doctors'=>[],'emergencies'=>[],'appointments'=>[],'edit_patient'=>null,'edit_slot'=>null,'edit_emergency'=>null,'stats'=>[]];
    $data['stats']=['patients'=>count_patients($conn),'slots'=>count_available_slots($conn),'emergencies'=>count_waiting_emergencies($conn),'appointments'=>count(get_appointments($conn))];
    if($section==='patients'){$search=trim($_GET['search']??'');$data['patients']=get_patients($conn,$search);if(isset($_GET['edit']))$data['edit_patient']=get_patient($conn,(int)$_GET['edit']);}
    elseif($section==='slots'){$data['doctors']=get_doctors($conn);$date=trim($_GET['date']??'');$data['slots']=get_doctor_slots($conn,$date);if(isset($_GET['edit']))$data['edit_slot']=get_slot($conn,(int)$_GET['edit']);}
    elseif($section==='emergency'){$search=trim($_GET['search']??'');$data['emergencies']=get_emergencies($conn,$search);if(isset($_GET['edit']))$data['edit_emergency']=get_emergency($conn,(int)$_GET['edit']);}
    elseif($section==='appointments'){$data['patients']=get_patients($conn);$data['slots']=get_doctor_slots($conn);$data['appointments']=get_appointments($conn);}
    return $data;
}

<?php
session_start();
include ("functions/functions.php");
include("classes/Connection.php");
Connection::getConnection();


if(isset($_GET['recover_email'])){
    if (Connection::selectData("users", "email", $_GET['recover_email'])) {
        $result['errs'] = "1";
    } else {
        $result['errs'] = "";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $data_user = array();
    if(Connection::selectData("users", "password", sha1($password))){
        $data_user = Connection::loginUser($email, sha1($password));
    }
    elseif (Connection::selectData("users", "temp_password", $password)) {
        $data_user = Connection::loginUser($email, $password);
    }
    $result = array();
    $result['errs'] = "";
    if (!$data_user) {
        $result['errs'] = 'The Email or Password is incorrect';
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);

}

if(isset($_GET['email'])){
    $email = $_GET['email'];
    if (Connection::selectData("users", "email", $email)){
        $temp_pass = generatePassword();
        generateEmail($email, "recover", $temp_pass);
        $data['temp_password'] = $temp_pass;
        Connection::updateData("users", $data, "email", $email );
    }
}

if (isset($_POST['action'])) {
if ($_POST['action'] == "submit") {
    $data = array();
    $data['reason'] = $_POST['reason'];
    $data['start'] = date('Y-m-d', strtotime($_POST['start_date']));
    $data['end'] = date('Y-m-d', strtotime($_POST['end_date']));
    $data['days_number'] = getWorkingDays($data['start'], $data['end']);
    $data['status'] = "2";
    $data['users_id_users'] = $_SESSION['id_user'];
    if (Connection::insertData("requirements", $data)) {
        $result['errs'] = "1";
    } else {
        $result['errs'] = "";
    }
}

if($_POST['action'] == "update"){
    $data = array();
    $data['reason'] = $_POST['reason'];
    $data['start'] = date('Y-m-d', strtotime($_POST['start_date']));
    $data['end'] = date('Y-m-d', strtotime($_POST['end_date']));
    $data['days_number'] = getWorkingDays($data['start'], $data['end']);
    if (Connection::updateData("requirements", $data, "id_requirements" ,$_POST['id_to_update'])) {
        $result['errs'] = "1";
    } else {
        $result['errs'] = "";
    }
}

if($_POST['action'] == "submit_admin"){
    $data = array();
    $data['reason'] = $_POST['reason'];
    $data['start'] = date('Y-m-d', strtotime($_POST['start_date']));
    $data['end'] = date('Y-m-d', strtotime($_POST['end_date']));
    $data['days_number'] = getWorkingDays($data['start'], $data['end']);
    $data['status'] = "1";
    $data['users_id_users'] = $_POST['user'];
    if (Connection::insertData("requirements", $data)) {
        $result['errs'] = "1";
    } else {
        $result['errs'] = "";
    }
}

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['action'])){
    if ($_POST['action'] == "delete"){
        Connection::deleteData("requirements", "id_requirements", $_POST['id_delete']);
    }
}

if (isset($_POST['logout'])){
    session_destroy();
}

if (isset($_POST['profile'])) {
    $result['errs'] = "";

    if (!$_POST['pass']){
    $data['first_name'] = $_POST['first_name'];
    $data['last_name'] = $_POST['last_name'];
    $data['phone_number'] = substr($_POST['phone_no'],3);
    }

    if ($_POST['pass']){
        if ($_POST['pass'] == $_POST['conf_pass']){
            $data['password'] = $_POST['pass'];
            $data['password'] = sha1($data['password']);
            Connection::updateData("users", $data, "email", $_SESSION['email']);
        }
    }
    $update = Connection::updateData("users", $data, "email", $_SESSION['email']);

    if ($update) {
        $result['errs'] = 1;
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);

}

if (isset($_POST['event'])){
    $result['errs'] = "";

    $data = array();
    $data['title'] = $_POST['title'];
    $data['start'] = date('Y-m-d', strtotime($_POST['start']));
    $data['end'] = date('Y-m-d', strtotime($_POST['end']));
    $data['description'] = $_POST['description'];
    $data['className'] = $_POST['className'];

    if (Connection::insertData("events", $data)){
        $result['errs'] = 1;
        $event = json_encode($data);
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['add_benefit'])){
    $result['errs'] = "";

    $data = array();
    $data['benefit'] = $_POST['name'];
    $data['description'] = $_POST['description'];
    $data['className'] = $_POST['className'];

    if (Connection::insertData("benefits", $data)){
        $result['errs'] = 1;
        $event = json_encode($data);
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
//Connection::printArray($_POST);
//exit();
if (isset($_POST['add_new_user'])){
    $result['errs'] = "";
    if(!Connection::selectData("users", "email", $_POST['mail'])){

    $data = array();
    $data['uid'] = UID();
    $data['first_name'] = $_POST['add_first_name'];
    $data['last_name'] = $_POST['add_last_name'];
    $data['email'] = $_POST['mail'];
    $data['temp_password'] = generatePassword();
    $data['permision'] = $_POST['permission'];
    $data['phone_number'] = $_POST['phoneNo'];
    $data['start_contract'] = date('Y-m-d', strtotime($_POST['start_contract']));
    $data['contract_type'] = $_POST['contract_type'];
    $today = date('Y-m-d');
    $data['available_days'] = (strtotime($today) - strtotime($data['start_contract'])) / 86400 + 1;
    $data['total_days'] = 21;
    if (Connection::insertData("users", $data)){
        $result['errs'] = 1;
        $event = json_encode($data);
        generateEmail($data['email'], "new_user", $data['temp_password']);
    }

    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if(isset($_POST['update_user'])){
    $result['errs'] = "";
        $data = array();
        $data['first_name'] = $_POST['add_first_name'];
        $data['last_name'] = $_POST['add_last_name'];
        $data['email'] = $_POST['mail'];
        $data['permision'] = $_POST['permission'];
        $data['phone_number'] = $_POST['phoneNo'];
        $data['start_contract'] = date('Y-m-d', strtotime($_POST['start_contract']));
        $data['contract_type'] = $_POST['contract_type'];

        if (Connection::updateData("users", $data, "email", $data['email'])){
            $result['errs'] = 1;
        }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST['delete_user'])){
    Connection::deleteData("users", "uid", $_POST['uid']);

}

if (isset($_POST['accepted'])){
    $id = $_POST['id_req'];
    $req = Connection::selectData("requirements", "id_requirements", $id);
    $user = Connection::selectData("users", "id_users", $req[0]['users_id_users']);
    $days = array();
    $days['available_days'] = $user[0]['available_days'] - $req[0]['days_number'];
    Connection::updateData("users", $days, "id_users", $req[0]['users_id_users']);
    $data = array();
    $data['status'] = 1;
    echo Connection::updateData("requirements", $data, "id_requirements", $id);
}

if (isset($_POST['declined'])){
    $id = $_POST['id_req'];
    $data = array();
    $data['status'] = 0;
    echo Connection::updateData("requirements", $data, "id_requirements", $id);
}

if(count($_FILES) > 0){
    if($_FILES['photo']['error'] != 4){
        switch ($_FILES['photo']['type']) {
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/png':
            case 'image/bitmap':
            case 'image/gif':

                $data = array();
                $data['extension'] = pathinfo($_FILES['photo']['name'])['extension'];
                $data['name'] = $_SESSION['uid']. "_profile-photo";
                $data['users_id_users'] = $_SESSION['id_user'];
                $r = move_uploaded_file($_FILES['photo']['tmp_name'], 'media/profile_photo/' . $data['name'] . "." . $data['extension']);
                if ($r) {
                    if(Connection::selectData("profile_photos", "users_id_users", $_SESSION['id_user'])){
                        return Connection::updateData("profile_photos", $data, "users_id_users", $_SESSION['id_user']);
                    }
                    else{
                        return Connection::insertData("profile_photos", $data);
                    }
                }
        }
    }
}
?>
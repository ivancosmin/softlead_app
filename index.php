<?php
session_start();


if (!isset($_SESSION['uid']))
{
    echo "<script type='text/javascript' >window.location.href = 'login.php';</script>";
}
include("classes/Connection.php");
Connection::getConnection();
$events = Connection::selectData("events");

if (isset($_SESSION)){
    $users = Connection::selectData("users");
    foreach ($users as $user) {
        $today = date('Y-m-d');
        $days['total_days'] = (strtotime($today) - strtotime($user['start_contract'])) / 86400 + 1;
        Connection::updateData("users", $days, "uid", $user['uid'] );
    }
}

?>
<!DOCTYPE html>

<html lang="en">

<?php
include("head.php");
?>

<body class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default">
<div class="m-grid m-grid--hor m-grid--root m-page">
<?php
include("header.php");
?>

<div id='continut' class='m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body'>

<?php
include("sidebar.php");


if (isset($_GET['page'])) {
    $p = $_GET['page'];
    if ($p == "request" || substr($p ,0,-3) == "request" || substr($p ,0,-2) == "request" || substr($p ,0,-1) == "request") {
        include("request_form.php");
    } elseif ($p == "list") {
        include("request_list.php");
    }
    elseif ($p == "profile"){
        include ("profile.php");
    }
    elseif ($p == "select_benefits"){
        include ("select_benefits.php");
    }
    elseif($p == "add_benefit"){
        include ("add_benefit.php");
    }
    elseif($p == "add_user"){
        include ("add_user.php");
    }
    elseif ($p == "calendar"){
        include("calendar.php");
    }
    elseif ($p == "list_benefits"){
        include("list_benefits.php");
    }
    elseif ($p == "users_list"){
        include("users_list.php");
    }
}
else{
    include("calendar.php");
}
?>


</div>

<?php
include("footer.php");
?>
</div>
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>


<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="assets/demo/demo11/base/scripts.bundle.js" type="text/javascript"></script>
<script src="assets/app/js/dashboard.js" type="text/javascript"></script>

<script src="theme/classic/demos/default/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<script src="theme/classic/demos/default/assets/demo/custom/crud/datatables/data-sources/html.js" type="text/javascript"></script>

<script src="moment/moment.js" type="text/javascript" ></script>
<script>
    moment().format();
</script>


<script src="theme/classic/demos/default/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

<script type="text/javascript">var events = <?php echo json_encode($events, JSON_UNESCAPED_UNICODE); ?></script>



</body>
</html>
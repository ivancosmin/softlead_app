<?php
$events = Connection::selectData("events");

if ($_SESSION['permission'] != 1) {
    $data = Connection::selectData("users_has_benefits", "users_id_users", $_SESSION['id_user']);
}

$html = "";
if ($_SESSION['permission'] == 1) {
    $html = '<div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a  href="modal.php" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"
                            data-toggle="modal" data-target="#modal_add_event">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Add Event</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>';

}
echo '<div class="m-grid__item m-grid__item--fluid m-wrapper">
';
include("home.php");
$html_calendar = '
<div class="m-content">
<div class="row">
<div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="m-portlet" id="m_portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
													<i class="flaticon-map-location"></i>
												</span>
												
                        <h3 class="m-portlet__head-text">
                            Softlead Calendar
                        </h3>
                        
                    </div>
                    
                </div>' .
    $html
    . '</div>
            <div class="m-portlet__body">
                <div id="m_calendar"></div>
            </div>
        </div>
        
        
        <!--end::Portlet-->
    </div>
    </div>
    </div>
    </div>
    <script src="assets/demo/demo11/custom/components/calendar/basic.js" type="text/javascript"></script>';
echo $html_calendar;
<?php
session_start();
include ("classes/Connection.php");
Connection::getConnection();
$events = Connection::selectData("events");

if($_SESSION['permission'] != 1){
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

$html_calendar = '<div class="col-lg-12">

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
    <script src="assets/demo/demo11/custom/components/calendar/basic.js" type="text/javascript"></script>';

if (isset($_POST['load'])){
    echo $html_calendar;
}



if (isset($_POST['displayCalendar'])){
    echo $html_calendar;
}
elseif(isset($_POST['displayBenefits'])){
    $benefits = Connection::selectData("benefits");
     ?>

<div class="col-lg-12">
        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--full-height">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            List of benefits
                        </h3>
                    </div>

                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li  class="m-portlet__nav-item">
                            <a id="add_benefit_btn" href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
														<span>
															<i class="la la-plus"></i>
															<span>Add benefit</span>
														</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin::Section-->
                <div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_5" role="tablist">
                <?php
                $i = 1;
                foreach($benefits as $benefit){
                    if($_SESSION['permission'] != 1){
                    $search= array_search($benefit['id_benefits'], array_column($data, 'benefits_id_benefits'));
                    if ( gettype($search) == "integer"){
                        $class = $benefit['className'];
                    }
                    else{
                        $class = "m-accordion__item";
                    }
                    }
                    else{
                        $class = $benefit['className'];
                    }
                $html_section = ' <!--begin::Item-->              
                    <div class="'. $class .'">
                        <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_5_item_'.$i.'_head" data-toggle="collapse" href="#m_accordion_5_item_'.$i.'_body" aria-expanded="false">
                            <span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
                            <span class="m-accordion__item-title">'. $benefit['benefit'] .'</span>
                                 
                            <span class="m-accordion__item-mode"></span>     
                        </div>

                        <div class="m-accordion__item-body collapse" id="m_accordion_5_item_'.$i.'_body" role="tabpanel" aria-labelledby="m_accordion_5_item_'.$i.'_head" data-parent="#m_accordion_5" style=""> 
                            <div class="m-accordion__item-content">
                                <p>'. $benefit['description'] .'</p>
                            </div>
                        </div>
                    </div>
                    <!--end::Item--> ';
                echo $html_section;
                $i++;
                }
                ?>
                </div>
                <!--end::Section-->
            </div>
        </div>
        <!--end::Portlet-->
    </div>

<?php
}
?>

<script src="js/main.js" type="text/javascript" ></script>

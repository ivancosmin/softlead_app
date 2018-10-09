<?php
$data = Connection::selectData("users", "email", $_SESSION['email']);
$request = Connection::selectData("requirements", "users_id_users", $_SESSION['id_user']);
$total_req_no = count($request) - 1;
$pending = Connection::selectMultiple("requirements", "users_id_users", $_SESSION['id_user'], "status", "2");
if($pending){
    $pending_no = count($pending) - 1;
}
else{
    $pending_no = 0;
}


if($_SESSION['permission'] == 1){
    $display = "none";
}
else{
    $display = "block";
}
?>
<div class="ajax-modal modal fade" id="modal_add_event" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        </div>
    </div>
</div>


<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Dashboard</h3>
            </div>
        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">

        <!--begin:: Widgets/Stats-->
        <div class="m-portlet" style="display: <?php echo $display; ?>;">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-6">

                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total Days
                                </h4><br>
                                <span class="m-widget24__desc">
													All available days for vacation
												</span>
                                <span class="m-widget24__stats m--font-brand">
													<?php echo $data[0]['available_days'] ?>/<?php echo $data[0]['total_days'] ?>
												</span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-brand" role="progressbar"
                                         style="width: <?php echo intval($data[0]['total_days']) / intval($data[0]['available_days']) * 100 ?>%;
                                                 " aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
													Change
												</span>
                                <span class="m-widget24__number">
													<?php echo intval(intval($data[0]['total_days']) / intval($data[0]['available_days']) * 100) ?>%
												</span>
                            </div>
                        </div>

                        <!--end::Total Profit-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">

                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Pending Status
                                </h4><br>
                                <span class="m-widget24__desc">
													Pending requests
												</span>
                                <span class="m-widget24__stats m--font-info">
													<?php echo $pending_no; ?>
												</span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-info" role="progressbar"
                                         style="width: <?php echo intval($pending_no) / intval($total_req_no) * 100 ?>%;"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget24__change">
													Change
												</span>
                                <span class="m-widget24__number">
													<?php echo intval(intval($pending_no) / intval($total_req_no) * 100) ?>
                                    %
												</span>
                            </div>
                        </div>

                        <!--end::New Feedbacks-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






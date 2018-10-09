<?php
//include ("classes/Connection.php");
$update = "";
$id_to_update = substr($_GET['page'], 7);
if ($id_to_update){
   $update = Connection::selectData("requirements", "id_requirements", $id_to_update);
}

if ($_SESSION['permission'] == 1){
   $users = Connection::selectData("users");
}
?>


    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">

            </div>
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
                            <h3 class="m-portlet__head-text">
                                Request Form
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form id="req_form" class="m-form m-form--fit m-form--label-align-right">
                    <input type="hidden" name="id_to_update" value="<?php echo $id_to_update; ?>" />
                    <div class="m-portlet__body">
                        <?php
                        if ($_SESSION['permission'] == 1){
                        ?>
                             <div class="form-group m-form__group row">
                            <label class="col-2 col-form-label">User:</label>
                            <div class="col-2">
                                <select class="form-control m-input" name="user" id="user">
                                    <option value="">Select</option>
                                    <?php
                                    foreach($users as $user){
                                        $html = '<option value="'. $user['id_users'] .'">'. $user['first_name'] .'</option>';
                                        echo $html;
                                    }
                                    ?>
                            </select>
                            </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Reason</label>
                            <div class="col-10">
                                <?php
                                if ($update){
                                    echo '<input class="form-control m-input" type="text" name="reason" placeholder="Reason" value="'. $update[0]['reason']  . '" id="reason">';
                                }else{
                                    echo '<input class="form-control m-input" type="text" name="reason" placeholder="Reason" id="reason">';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-date-input" class="col-2 col-form-label">Starting Date</label>
                            <div class="col-10">
                                <?php
                                if($update){
                                    echo '<input class="form-control m-input" type="date" name="start_date" id="start_date" value="'. $update[0]['start'] .'">';
                                }else{
                                    echo '<input class="form-control m-input" type="date" name="start_date" id="start_date">';
                                }
                                ?>

                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-date-input" class="col-2 col-form-label">End Date</label>
                            <div class="col-10">
                                <?php
                                if($update){
                                    echo '<input class="form-control m-input" type="date"  name="end_date" id="end_date" value="'. $update[0]['end'] .'">';
                                }else{
                                    echo '<input class="form-control m-input" type="date" name="end_date" id="end_date">';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <?php
                                    if($update){
                                        echo '<input type="hidden" name="action" value="update" />';
                                        echo '<input type="submit" value="Submit" class="btn btn-success" />';
                                        echo '<button id="cancel_update_form" type="reset" class="btn btn-secondary">Cancel</button>';

                                    }elseif($_SESSION['permission'] == 1){
                                        echo '<input type="hidden" name="action" value="submit_admin" />';
                                        echo '<input type="submit" value="Submit" class="btn btn-success" />';
                                        echo '<button id="cancel_form" type="reset" class="btn btn-secondary">Cancel</button>';

                                    }
                                    else{
                                        echo '<input type="hidden" name="action" value="submit" />';
                                        echo '<input type="submit"  class="btn btn-success" value="Submit" />';
                                        echo '<button id="cancel_form" type="reset" class="btn btn-secondary">Cancel</button>';

                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>




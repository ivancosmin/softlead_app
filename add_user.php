<?php
include ("functions/functions.php");
//include ("classes/Connection.php");
//Connection::getConnection();

$user="";
if (isset($_GET['edit_user'])) {

    $user = Connection::selectData("users", "uid", $_GET['uid']);
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
                            Add User
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form id="<?php if($user){echo "update_user_form";} else {echo "add_new_user";} ?>" class="m-form m-form--fit m-form--label-align-right" method="post">
                <?php
                if($user){
                    echo '<input type="hidden" name="update_user" value="update" />';
                }
                else{
                    echo '<input type="hidden" name="add_new_user" value="add" />';
                }
                ?>

                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">First Name:</label>
                        <div class="col-10">
                            <input name="add_first_name" class="form-control m-input" type="text" placeholder="First Name"
                                   value="<?php if($user){ echo $user[0]['first_name']; } ?>">
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Last Name:</label>
                        <div class="col-10">
                            <input name="add_last_name" class="form-control m-input" type="text" placeholder="Last Name"
                                   value="<?php if($user){ echo $user[0]['last_name']; } ?>">
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Email:</label>
                        <div class="col-10">
                            <input name="mail" class="form-control m-input" type="email" placeholder="Email"
                                   value="<?php if($user){ echo $user[0]['email']; } ?>" <?php if($user){ echo "readonly";} ?>>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Permission:</label>
                        <div class="col-10">
                            <select name="permission" class="form-control m-input">
                                <option value="">Select</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Phone No:</label>
                        <div class="col-10">
                            <input name="phoneNo" class="form-control m-input" type="text"
                                   value="<?php if($user){ echo $user[0]['phone_number']; } ?>">
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Start contract:</label>
                        <div class="col-10">
                            <input name="start_contract" class="form-control m-input" type="date"
                                   value="<?php if($user){ echo $user[0]['start_contract']; } ?>">
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Contract Type:</label>
                        <div class="col-10">
                            <select name="contract_type" class="form-control m-input">
                                <option value="">Select</option>
                                <option value="1">Internship</option>
                                <option value="2">Full time</option>
                                <option value="3">Part time</option>
                            </select>
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
                                if($user){
                                    echo '<input type="submit" value="Update" class="btn btn-success" />';
                                    echo '<button id="cancel_form" type="reset" class="btn btn-secondary">Cancel</button>';
                                }else{
                                    echo '<input type="submit" value="Add user" class="btn btn-success" />';
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


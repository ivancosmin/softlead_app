<?php
$benefits = Connection::selectData("benefits");
$users = Connection::selectData("users");
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
                           Select Benefits
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" method="post">

                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">User:</label>
                        <div class="col-2">
                            <select class="form-control m-input" name="user" id="user">
                                <option value="">Select</option>
                                <?php
                                foreach($users as $user){
                                    $html = '<option value="'. $user['id_users'] .'">'. $user['first_name'] . " " . $user['last_name'] .'</option>';
                                    echo $html;
                                }
                                ?>
                            </select>
                            <span class="m-form__help">Please select an users.</span>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Benefits:</label>
                        <div class="col-2">
                            <div class="m-checkbox-list" >
                                <?php
                                foreach($benefits as $value){
                                    $html = '<label class="m-checkbox">
                                    <input type="checkbox" id="benefits" name="userBenefits[]" value="'. $value['id_benefits'] .'"> ' . $value['benefit'] . '
                                    <span></span>
                                </label>';
                                    echo $html;
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <input type="submit" name="add_benefits" class="btn btn-success" />
                                <button id="cancel_form" type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>


<?php
if(isset($_POST['add_benefits'])){
    Connection::insertMultipleValues("users_has_benefits", $_POST['user'], $_POST['userBenefits']);

}
?>
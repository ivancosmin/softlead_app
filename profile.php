<?php
$details = Connection::selectData("users", "email", $_SESSION['email']);
$photo = Connection::selectData("profile_photos", "users_id_users", $details[0]['id_users']);
if($photo){
    $profile_photo = $photo[0]['name'] . "." . $photo[0]['extension'];
}
else{
    $profile_photo = "default.jpg";
}
?>
<div class="ajax-modal modal fade" id="modal_change_photo" role="dialog" aria-hidden="true">
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
                    <h3 class="m-subheader__title ">My Profile</h3>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="m-portlet m-portlet--full-height  ">
                        <div class="m-portlet__body">
                            <div class="m-card-profile">
                                <div class="m-card-profile__title m--hide">
                                    Your Profile
                                </div>
                                <div class="m-card-profile__pic">
                                    <div class="m-card-profile__pic-wrapper">
                                        <img src="media/profile_photo/<?php echo $profile_photo; ?>" alt="">
                                    </div>
                                </div>
                                <div class="m-card-profile__details">
                                    <span class="m-card-profile__name"><?php echo $details[0]['first_name'] . " " . $details[0]['last_name'] ?></span>
                                    <a href="" class="m-card-profile__email m-link"><?php echo $details[0]['email'] ?></a>
                                </div>
                            </div>
                            <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                <li class="m-nav__section m--hide">
                                    <span class="m-nav__section-text">Section</span>
                                </li>
                                <li class="m-nav__item">
                                    <a href="index.php?page=profile" class="m-nav__link">
                                        <i class="m-nav__link-icon flaticon-profile-1"></i>
                                        <span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">My Profile</span>
														</span>
													</span>
                                    </a>
                                </li>
                                <li class="m-nav__item">
                                    <a href="modal_photo.php" class="m-nav__link" data-toggle="modal" data-target="#modal_change_photo">
                                        <i class="m-nav__link-icon flaticon-share"></i>
                                        <span class="m-nav__link-text">Change photo</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="m_user_profile_tab_1">
                                <form id="update_profile" class="m-form m-form--fit m-form--label-align-right">
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                                            <div class="alert m-alert m-alert--default" role="alert">
                                                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">1. Personal Details</h3>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-2 col-form-label">First Name</label>
                                            <div class="col-7">
                                                <input name="first_name" class="form-control m-input" type="text" value="<?php echo $details[0]['first_name'] ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Last Name</label>
                                            <div class="col-7">
                                                <input name="last_name" class="form-control m-input" type="text" value="<?php echo $details[0]['last_name'] ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="<?php echo $details[0]['email'] ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                            <div class="col-7">
                                                <input name="phone_no" class="form-control m-input" type="text" value="+40<?php echo $details[0]['phone_number'] ?>" />
                                            </div>
                                        </div>
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">2. Reset password</h3>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Password</label>
                                            <div class="col-7">
                                                <input name="pass" class="form-control m-input" type="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Confirm Password</label>
                                            <div class="col-7">
                                                <input name="conf_pass" class="form-control m-input" type="password" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="profile" value="update" />
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-2">
                                                </div>
                                                <div class="col-7">
                                                    <input type="submit" value="Update Profile" class="btn btn-accent m-btn m-btn--air m-btn--custom" />
                                                    <button type="reset" id="cancel_form" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


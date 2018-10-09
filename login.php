<?php
include("classes/Connection.php");
Connection::getConnection();
//$_COOKIE['email']="";
//$_COOKIE['password']="";
?>


<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <title>Softlead App</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/demo/demo11/base/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->

    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">

    </script>
    <script src="js/main.js" type="text/javascript"></script>


    <link rel="shortcut icon" href="media/logo/favicon.png"/>
</head>
<!-- end::Head -->


<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">


<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2"
         id="m_login" style="background-image: url(./assets/app/media/img//bg/bg-3.jpg);">
        <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo" style="text-align: center;">
                    <img src="media/logo/Logo%20Softlead.png" style="width: 200px;">
                </div>
                <div class="m-login__signin">

                    <form id="login_form" class="m-login__form m-form">
                        <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn"
                             role="alert" style="display: none;" id="login_error">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <span class="error-login-message"></span>
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" id="email" type="text" placeholder="Email"
                                   value="<?php if (isset($_COOKIE['email']) AND strlen($_COOKIE['email']) > 1) echo $_COOKIE['email']; ?>"
                                   name="email" autocomplete="on">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" id="password"
                                   value="<?php if (isset($_COOKIE['password']) AND strlen($_COOKIE['password']) > 1) echo $_COOKIE['password']; ?>"
                                   type="password" placeholder="Password" name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--focus">
                                    <input id="remember_me" type="checkbox" name="remember"> Remember me
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <input id="m_login_signin_submit"
                                   class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary"
                                   type="submit" value="Sign In" name="login"/>
                        </div>
                    </form>
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgotten Password ?</h3>
                        <div class="m-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="recover_email"
                                   id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit"
                                    class="btn btn-info m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
                                Request
                            </button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel"
                                    class="btn btn-outline-info m-btn m-btn--pill m-btn--custom m-login__btn">Cancel
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- end:: Page -->


<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="assets/demo/demo11/base/scripts.bundle.js" type="text/javascript"></script>

<script src="assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>

</body>
<!-- end::Body -->
</html>




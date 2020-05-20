<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-US" class="no-js" ng-app="helpingHands">
    <head>
        <meta charset="UTF-8" />
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <title>Helping Hands</title>
        <link href="https://fonts.googleapis.com/css?family=Dosis:600|Nunito:400,600|Quicksand:500" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <link rel='stylesheet' href='base.css' type='text/css' media='all' />
        <link rel='stylesheet' href='style.css' type='text/css' media='all' />
    </head>
    <body class="layout-wide sliding-desktop-off sliding-overlay" ng-controller="helpingHandsCtrl">
        <div id="site" class="site wrap header-position-top">
            <div id="site-topbar" class="site-topbar">
                <div class="site-topbar-inner wrap">
                    <div class="site-topbar-flex">
                        <div class="topbar-text">
                            <div class="topbar-text-inner">
                                <ul class="list-info">
                                    <li>
                                        <i class="fa fa-3x fa-whatsapp"></i>
                                        <a class="content" href="tel:19547982545">
                                            <span class="text">24/7 service available</span>
                                            <span class="action">1 800 688 8688</span>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-3x fa-wheelchair"></i>
                                        <a class="content" href="ftp">
                                            <span class="text">our brochure 2019</span>
                                            <span class="action">download now</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="topbar-nav">
                            <div class="topbar-menu">
                                <div class="topbar-menu-inner">
                                    <ul id="menu-top-menu" class="menu menu-top">
                                        <li>
                                            <a href="/">
                                                <i class="fa fa-heartbeat fa-2x"></i>Home
                                            </a>
                                        </li>
                                        <?php if (isset($_SESSION['senior']) || isset($_SESSION['nurse'])): ?>
                                            <?php if ($_SESSION['nurse']): ?>
                                                <li>
                                                    <a href="edit-nurse.php">
                                                        <i class="fa fa-user fa-2x"></i> Profile
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a href="edit-senior.php">
                                                        <i class="fa fa-user fa-2x"></i> Profile
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <li>
                                                <a href="inbox.php">
                                                    <i class="fa fa-2x fa-email"></i> Messages
                                                </a>
                                            </li>
                                            <li>
                                                <a href="logout.php">
                                                    <i class="fa fa-2x fa-logout"></i> Logout
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="javascript:void(0)" class="open-login-modal">
                                                    <i class="fa fa-login fa-2x"></i>Login
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="open-register-modal">
                                                    <i class="fa fa-2x fa-laptop"></i>Register
                                                </a>
                                            </li>  
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="site-header" class="site-header site-header-classic header-brand-left header-shadow">
                <div class="site-header-inner wrap">
                    <div class="header-brand">
                        <a href="/">
                            <img srcset="https://thehelpinghand.info/images/logo2.png" class="logo logoDefault">
                        </a>
                    </div>
                    <nav class="navigator">
                        <ul id="menu-main-menu" class="menu menu-primary">
                            <li class="current-menu-item">
                                <a href="about.php">About</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0)">Services</a>
                                <span class="menu-item-toggle"><span></span></span>
                                <ul class="sub-menu">
                                    <li><a href="hourly.php">Hourly home care</a></li>
                                    <li><a href="daily.php">Daily home care</a></li>
                                </ul>
                            </li>
                            <li><a href="caregivers.php">Caregivers</a></li>
                            <li><a href="contact.php">Support</a></li>
                        </ul>
                        <a href="javascript:void(0)" data-target="off-canvas-right" class="off-canvas-toggle"><span></span></a>
                        <div class="social-icons">
                            <a href="javascript:void(0)" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0)" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0)" data-tooltip="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="javascript:void(0)" data-tooltip="Linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
            <div id="login-modal" class="lrm-main lrm-user-modal">
                <div class="lrm-user-modal-container">
                    <ul class="lrm-switcher -is-not-login-only">
                        <li>
                            <a href="javascript:void(0)" class="selected" data-tab="tab-1">
                                <i class="fa fa-login fa-2x"></i> Login
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-tab="tab-2">
                                <i class="fa fa-lock fa-2x"></i> Reset Password
                            </a>
                        </li>
                    </ul>
                    <div id="tab-1" class="tab-content lrm-signin-section is-selected">
                        <form class="lrm-form" name="userForm">
                            <p class="lrm-form-error">
                                <span class="error">{{msg}}</span>
                                <span class="error" ng-show="userForm.email.$error.pattern">Please enter a valid e-mail.</span>
                            </p>
                            <div class="fieldset">
                                <input class="full-width has-padding has-border" type="text" ng-model="user.email" name="email" placeholder="Email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/">
                            </div>
                            <div class="fieldset">
                                <input name="password" class="full-width has-padding has-border" type="password" placeholder="Password" ng-model="user.password" ng-required="true">
                            </div>
                            <div class="fieldset fieldset--submit">
                                <button class="full-width has-padding button" ng-click="submit()" type="submit">Log in</button>
                            </div>
                        </form>
                    </div>
                    <div id="tab-2" class="tab-content lrm-reset-password-section">
                        <form class="lrm-form" action="#0" data-action="lost-password">
                            <p class="lrm-form-message">
                                Lost your password? Please enter your email address. You will receive mail with link to set new password.
                            </p>
                            <div class="fieldset">
                                <input class="full-width has-padding has-border" name="user_login" type="text" required="" placeholder="Email">
                                <span class="lrm-error-message"></span>
                            </div>
                            <div class="fieldset fieldset--submit">
                                <button class="full-width has-padding" type="submit">Reset password</button>
                            </div>
                        </form>
                    </div>
                    <a href="javascript:void(0)" class="lrm-close-form">
                        <i class="fa fa-cancel fa-2x"></i>
                    </a>
                </div>
            </div>
            <div id="register-modal" class="lrm-main lrm-user-modal">
                <div class="lrm-user-modal-container">
                    <ul class="lrm-switcher -is-not-login-only">
                        <li>
                            <a href="javascript:void(0)" class="selected" data-tab="tab-3">
                                <i class="fa fa-users fa-2x"></i> Patients
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-tab="tab-4">
                                <i class="fa fa-stethoscope fa-2x"></i> Caregivers
                            </a>
                        </li>
                    </ul>
                    <div id="tab-3" class="tab-content lrm-signin-section is-selected">
                        <form class="lrm-form" name="seniorForm">
                            <p class="lrm-form-error">
                                <span class="error">{{msg}}</span>
                                <span class="error" ng-show="seniorForm.fname.$invalid && seniorForm.fname.$dirty">Please fill out your first name!</span>
                                <span class="error" ng-show="seniorForm.lname.$invalid && seniorForm.lname.$dirty">Please fill out your last name!</span>
                                <span class="error" ng-show="seniorForm.email.$error.required && seniorForm.email.$dirty">Please fill out your e-mail!</span>
                                <span class="error" ng-show="seniorForm.email.$error.pattern">Please enter a valid e-mail!</span>
                                <span class="error" ng-show="seniorForm.street.$invalid && seniorForm.street.$dirty">Please fill out your street address!</span>
                                <span class="error" ng-show="seniorForm.city.$invalid && seniorForm.city.$dirty">Please fill out your city!</span>
                                <span class="error" ng-show="seniorForm.zipcode.$error.required && seniorForm.zipcode.$dirty">Please fill out your zipcode</span>
                                <span class="error" ng-show="seniorForm.zipcode.$error.pattern">The zipcode must be in the format 99999</span>
                            </p>
                            <div class="fieldset clearfix">
                                <div class="lrm-col-half-width lrm-col-first">
                                    <input class="full-width has-padding has-border" type="text" placeholder="First name" ng-model="senior.fname" name="fname" ng-required="true">
                                </div>
                                <div class="lrm-col-half-width lrm-col-last">
                                    <input class="full-width has-padding has-border" type="text" placeholder="Last name" ng-model="senior.lname" name="lname"  ng-required="true">
                                </div>
                            </div>
                            <div class="fieldset clearfix">
                            <div class="lrm-col-half-width lrm-col-first">
                                    <input class="full-width has-padding has-border" type="email" ng-model="senior.email" name="email" placeholder="Email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/">
                                </div>
                                <div class="lrm-col-half-width lrm-col-last">
                                    <input name="password" class="full-width has-padding has-border" type="password" placeholder="Password" ng-model="senior.password" ng-required="true">
                                </div>
                            </div>
                            <div class="fieldset">
                                <input class="full-width has-padding has-border" type="text" placeholder="Street address" ng-model="senior.street" name="street" ng-required="true">
                            </div>
                            <div class="fieldset clearfix">
                                <div class="third-width lrm-col-first">
                                    <input class="full-width has-padding has-border" type="text" ng-model="senior.city" name="city" placeholder="City" ng-required="true">
                                </div>
                                <div class="third-width lrm-col-middle">
                                    <select class="full-width has-padding has-border" ng-model="senior.state" ng-options="state.abbreviation for state in states" ng-required="true">
                                        <option value="" class="" selected="selected">State</option>
                                    </select>
                                </div>
                                <div class="third-width lrm-col-last">
                                    <input class="full-width has-padding has-border" type="text" placeholder="Zip code" ng-model="senior.zipcode" name="zipcode" ng-required="true" ng-pattern="/^[0-9]{5}$/">
                                </div>
                            </div>
                            <div class="fieldset">
                                <button class="full-width has-padding" type="submit" ng-disabled="seniorForm.$invalid" ng-click="submitSenior()">Register</button>
                            </div>
                        </form>
                    </div>
                    <div id="tab-4" class="tab-content lrm-signup-section">
                        <form class="lrm-form" name="nurseForm">
                            <p class="lrm-form-error">
                                <span class="error">{{msg}}</span>
                                <span class="error" ng-show="nurseForm.fname.$invalid && nurseForm.fname.$dirty">Please fill out your first name!</span>
                                <span class="error" ng-show="nurseForm.lname.$invalid && nurseForm.lname.$dirty">Please fill out your last name!</span>
                                <span class="error" ng-show="nurseForm.email.$error.required && nurseForm.email.$dirty">Please fill out your e-mail!</span>
                                <span class="error" ng-show="nurseForm.email.$error.pattern">Please enter a valid e-mail!</span>
                                <span class="error" ng-show="nurseForm.street.$invalid && nurseForm.street.$dirty">Please fill out your street address!</span>
                                <span class="error" ng-show="nurseForm.city.$invalid && nurseForm.city.$dirty">Please fill out your city!</span>
                                <span class="error" ng-show="nurseForm.zipcode.$error.required && nurseForm.zipcode.$dirty">Please fill out your zipcode</span>
                                <span class="error" ng-show="nurseForm.zipcode.$error.pattern">The zipcode must be in the format 99999</span>
                            </p>
                            <div class="fieldset clearfix">
                                <div class="lrm-col-half-width lrm-col-first">
                                    <input class="full-width has-padding has-border" type="text" placeholder="First name" ng-model="nurse.fname" name="fname" ng-required="true">
                                </div>
                                <div class="lrm-col-half-width lrm-col-last">
                                    <input class="full-width has-padding has-border" type="text" placeholder="Last name" ng-model="nurse.lname" name="lname"  ng-required="true">
                                </div>
                            </div>
                            <div class="fieldset clearfix">
                            <div class="lrm-col-half-width lrm-col-first">
                                    <input class="full-width has-padding has-border" type="email" ng-model="nurse.email" name="email" placeholder="Email" ng-required="true" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/">
                                </div>
                                <div class="lrm-col-half-width lrm-col-last">
                                    <input name="password" class="full-width has-padding has-border" type="password" placeholder="Password" ng-model="nurse.password" ng-required="true">
                                </div>
                            </div>
                            <div class="fieldset">
                                <input class="full-width has-padding has-border" type="text" placeholder="Street address" ng-model="nurse.street" name="street" ng-required="true">
                            </div>
                            <div class="fieldset clearfix">
                                <div class="third-width lrm-col-first">
                                    <input class="full-width has-padding has-border" type="text" ng-model="nurse.city" name="city" placeholder="City" ng-required="true">
                                </div>
                                <div class="third-width lrm-col-middle">
                                    <select class="full-width has-padding has-border" ng-model="nurse.state" ng-options="state.abbreviation for state in states" ng-required="true">
                                        <option value="" class="" selected="selected">State</option>
                                    </select>
                                </div>
                                <div class="third-width lrm-col-last">
                                    <input class="full-width has-padding has-border" type="text" placeholder="Zip code" ng-model="nurse.zipcode" name="zipcode" ng-required="true" ng-pattern="/^[0-9]{5}$/">
                                </div>
                            </div>
                            <div class="fieldset">
                                <button class="full-width has-padding" type="submit" ng-disabled="nurseForm.$invalid" ng-click="submitNurse()">Register</button>
                            </div>
                        </form>
                    </div>
                    <a href="javascript:void(0)" class="lrm-close-form">
                        <i class="fa fa-cancel fa-2x"></i>
                    </a>
                </div>
            </div>
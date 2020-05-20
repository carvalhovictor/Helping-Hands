<?php include "header.php" ?>
        <div id="site-content" class="site-content edit-profile">
            <div class="content-header content-header-inline content-header-full content-header-featured wrap">
                <div class="content-header-inner wrap">
                    <div class="wrap-inner">
                        <div class="breadcrumbs">
                            <div class="breadcrumbs-inner">
                                <span>
                                    <a href="/" class="home">Helping Hands</a>
                                </span>
                                <span>
                                    <span property="name">Edit Profile</span>
                                </span>
                            </div>
                        </div>
                        <div class="page-title">
                            <h1 class="page-title-inner">Edit Profile</h1>
                            <p class="subtitle">Update your personal information on Helping Hands.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content-body" class="content-body">
                <div class="content-body-inner wrap">
                    <main id="main-content" class="main-content" ng-controller="seniorCtrl">
                        <div class="main-content-inner">
                            <div class="content">
                                <div class="row wpb_row row-fluid">
                                    <div class="wpb_column column_container col-sm-8">
                                        <div class="column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <h4 class="no-margin-top">Edit Your Profile</h4>
                                                    </div>
                                                </div>
                                                <div class="empty_space" style="height: 20px">
                                                    <span class="empty_space_inner"></span>
                                                </div>
                                                <div class="wpb_text_column wpb_content_element form-update">
                                                    <div class="wpb_wrapper">
                                                        <form name="seniorForm">
                                                            <p class="lrm-form-error">
                                                                <span class="error">{{msg}}</span>
                                                                <span class="error" ng-show="seniorForm.fname.$invalid && seniorForm.fname.$dirty">Please fill out your name!</span>
                                                                <span class="error" ng-show="seniorForm.lname.$invalid && seniorForm.lname.$dirty">Please fill out your last name!</span>
                                                                <span class="error" ng-show="seniorForm.street.$invalid && seniorForm.street.$dirty">Please fill out your street address!</span>
                                                                <span class="error" ng-show="seniorForm.city.$invalid && seniorForm.city.$dirty">Please fill out your city!</span>
                                                                <span class="error" ng-show="seniorForm.zipcode.$error.required && seniorForm.zipcode.$dirty">Please fill out your zipcode!</span>
                                                                <span class="error" ng-show="seniorForm.zipcode.$error.pattern">The zipcode must be in the format 99999</span>
                                                                <span class="error" ng-show="seniorForm.phone.$error.required && seniorForm.phone.$dirty">Please fill out your phone number!</span>
                                                                <span class="error" ng-show="seniorForm.phone.$error.minlength">Please enter a valid phone number.</span>
                                                                <span class="error" ng-show="seniorForm.description.$invalid && seniorForm.description.$dirty">Please fill out your condition(s)!</span>
                                                                <span class="error" ng-show="seniorForm.email.$error.required && seniorForm.email.$dirty">Please fill out your e-mail!</span>
                                                                <span class="error" ng-show="seniorForm.email.$error.pattern">Please enter a valid e-mail.</span>
                                                                <span class="error" ng-show="seniorForm.dob.$error.required && seniorForm.dob.$dirty">Please fill out your date of birth!</span>
                                                                <span class="error" ng-show="seniorForm.dob.$error.minlength">Please enter a valid date of birth.</span>
                                                                <span class="error" ng-show="seniorForm.zipcode.$error.minlength || seniorForm.zipcode.$error.maxlength">The zipcode must be in the format 99999</span>
                                                                <span class="error" ng-show="seniorForm.emergencyname.$invalid && seniorForm.emergency.$dirty">Please fill out your emergency contact name!</span>
                                                                <span class="error" ng-show="seniorForm.emergencylast.$invalid && seniorForm.emergency.$dirty">Please fill out your emergency contact last name!</span>
                                                                <span class="error" ng-show="seniorForm.emergencyphone.$invalid && seniorForm.emergency.$dirty">Please fill out your emergency contact phone number!</span>
                                                                <span class="error" ng-show="seniorForm.emergencyphone.$error.minlength">Please enter a valid phone number.</span>
                                                            </p>
                                                            <div class="row">
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="first name" ng-model="senior.fname" name="fname" ng-required="true">
                                                                </div>
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="last name" ng-model="senior.lname" name="lname" ng-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="Phone number" ng-model="senior.phone" name="phone" ng-required="true" ng-minlength="13" ui-phone>
                                                                </div>
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" ng-model="senior.dob" name="dob" placeholder="Date of birth" ng-required="true" ui-date>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-12">
                                                                    <input type="text" class="form-control" placeholder="street address" ng-model="senior.street" name="street" ng-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-4">
                                                                    <input type="text" class="form-control" placeholder="City" ng-model="senior.city" name="city" ng-required="true">
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" ng-model="senior.state" ng-options="state.abbreviation for state in states">
                                                                        <option value="">{{senior.selected}}</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <input type="text" class="form-control" placeholder="zip code" ng-model="senior.zipcode" name="zipcode" ng-required="true" ng-pattern="/^[0-9]{5}$/">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-12">
                                                                    <textarea class="form-control" ng-model="senior.description" name="condition" placeholder="Description of Condition" ng-required="true"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="empty_space" style="height: 40px">
                                                                <span class="empty_space_inner"></span>
                                                            </div>
                                                            <div class="wpb_text_column wpb_content_element ">
                                                                <div class="wpb_wrapper">
                                                                    <h4 class="no-margin-top">Emergency Contact</h4>
                                                                </div>
                                                            </div>
                                                            <div class="empty_space" style="height: 20px">
                                                                <span class="empty_space_inner"></span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" ng-model="senior.emergencyname" name="emergencyname" placeholder="Name" ng-required="true">
                                                                </div>
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" ng-model="senior.emergencylast" name="emergencylast" placeholder="Lastname" ng-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-4">
                                                                    <input type="text" class="form-control" ng-model="senior.emergencyphone" name="emergencyphone" placeholder="Phone number" ng-required="true" ng-minlength="13" ui-phone>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" ng-disabled="seniorForm.$invalid" ng-click="insertSenior()">Save</button>
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
                    </main>
                </div>
            </div>
        </div>
<?php include "footer.php" ?>

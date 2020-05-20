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
                    <main id="main-content" class="main-content" ng-controller="nurseCtrl">
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
                                                        <form name="nurseForm">
                                                            <p class="lrm-form-error">
                                                                <span class="error">{{msg}}</span>
                                                                <span class="error" ng-show="nurseForm.fname.$invalid && nurseForm.fname.$dirty">Please fill out your name!</span>
                                                                <span class="error" ng-show="nurseForm.lname.$invalid && nurseForm.lname.$dirty">Please fill out your last name!</span>
                                                                <span class="error" ng-show="nurseForm.license.$error.required && nurseForm.license.$dirty">Please fill out your license number!</span>
                                                                <span class="error" ng-show="nurseForm.license.$error.pattern">he license number must contain only numbers and 7 characters</span>
                                                                <span class="error" ng-show="nurseForm.street.$invalid && nurseForm.street.$dirty">Please fill out your street address!</span>
                                                                <span class="error" ng-show="nurseForm.city.$invalid && nurseForm.city.$dirty">Please fill out your city!</span>
                                                                <span class="error" ng-show="nurseForm.zipcode.$error.required && nurseForm.zipcode.$dirty">Please fill out your zipcode!</span>
                                                                <span class="error" ng-show="nurseForm.zipcode.$error.pattern">The zipcode must be in the format 99999</span>
                                                                <span class="error" ng-show="nurseForm.phone.$error.required && nurseForm.phone.$dirty">Please fill out your phone number!</span>
                                                                <span class="error" ng-show="nurseForm.phone.$error.minlength">Please enter a valid phone number.</span>
                                                                <span class="error" ng-show="nurseForm.skills.$invalid && nurseForm.skills.$dirty">Please fill out your skills(s)!</span>
                                                                <span class="error" ng-show="nurseForm.price.$error.required && nurseForm.price.$dirty">Please fill out your price per hour!</span>
                                                            </p>
                                                            <div class="row">
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="first name" ng-model="nurse.fname" name="fname" ng-required="true">
                                                                </div>
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="last name" ng-model="nurse.lname" name="lname" ng-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="Phone number" ng-model="nurse.phone" name="phone" ng-required="true" ng-minlength="13" ui-phone>
                                                                </div>
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="street address" ng-model="nurse.street" name="street" ng-required="true">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-4">
                                                                    <input type="text" class="form-control" placeholder="City" ng-model="nurse.city" name="city" ng-required="true">
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" ng-model="nurse.state" ng-options="state.abbreviation for state in states">
                                                                        <option value="">{{nurse.selected}}</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <input type="text" class="form-control" placeholder="zip code" ng-model="nurse.zipcode" name="zipcode" ng-required="true" ng-pattern="/^[0-9]{5}$/">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="License Number" ng-model="nurse.license" name="license" ng-required="true" ng-pattern="/^[0-9]{7}$/" max-length="7">
                                                                </div>
                                                                <div class="columns columns-6">
                                                                    <input type="text" class="form-control" placeholder="hourly price" ng-model="nurse.price" name="price" ng-required="true" ui-price>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="columns columns-12">
                                                                    <textarea class="form-control" id="skills" placeholder="Skills" ng-model="nurse.skills" name="skills" ng-required="true"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="empty_space" style="height: 40px">
                                                                <span class="empty_space_inner"></span>
                                                            </div>
                                                            <div class="wpb_text_column wpb_content_element ">
                                                                <div class="wpb_wrapper">
                                                                    <h4 class="no-margin-top">My Availability</h4>
                                                                </div>
                                                            </div>
                                                            <div class="empty_space" style="height: 20px">
                                                                <span class="empty_space_inner"></span>
                                                            </div>
                                                            <div class="row schedule-heading">
                                                                <div class="columns columns-4">
                                                                    Days
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    From
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    To
                                                                </div>
                                                            </div>
                                                            <div class="row schedule">
                                                                <div class="columns columns-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="day1" value="Monday">
                                                                        <label class="custom-control-label" for="day1">Monday</label>
                                                                    </div>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time11" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time12" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row schedule">
                                                                <div class="columns columns-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="day2" value="Tuesday">
                                                                        <label class="custom-control-label" for="day2">Tuesday</label>
                                                                    </div>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time21" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time22" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row schedule">
                                                                <div class="columns columns-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="day3" value="Wednesday">
                                                                        <label class="custom-control-label" for="day3">Wednesday</label>
                                                                    </div>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time31" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time32" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="row schedule">
                                                                <div class="columns columns-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="day4" value="Thursday">
                                                                        <label class="custom-control-label" for="day4">Thursday</label>
                                                                    </div>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time41" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time42" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row schedule">
                                                                <div class="columns columns-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="day5" value="Friday">
                                                                        <label class="custom-control-label" for="day5">Friday</label>
                                                                    </div>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time51" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time52" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row schedule">
                                                                <div class="columns columns-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="day6" value="Saturday">
                                                                        <label class="custom-control-label" for="day6">Saturday</label>
                                                                    </div>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time61" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time62" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row schedule">
                                                                <div class="columns columns-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="day7" value="Sunday">
                                                                        <label class="custom-control-label" for="day7">Sunday</label>
                                                                    </div>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time71" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="columns columns-4">
                                                                    <select class="form-control" id="time72" placeholder="Time" disabled="disabled">
                                                                        <option value="00">12:00AM</option>
                                                                        <option value="01">01:00AM</option>
                                                                        <option value="02">02:00AM</option>
                                                                        <option value="03">03:00AM</option>
                                                                        <option value="04">04:00AM</option>
                                                                        <option value="05">05:00AM</option>
                                                                        <option value="06">06:00AM</option>
                                                                        <option value="07">07:00AM</option>
                                                                        <option value="08">08:00AM</option>
                                                                        <option value="09">09:00AM</option>
                                                                        <option value="10">10:00AM</option>
                                                                        <option value="11">11:00AM</option>
                                                                        <option value="12">12:00PM</option>
                                                                        <option value="13">01:00PM</option>
                                                                        <option value="14">02:00PM</option>
                                                                        <option value="15">03:00PM</option>
                                                                        <option value="16">04:00PM</option>
                                                                        <option value="17">05:00PM</option>
                                                                        <option value="18">06:00PM</option>
                                                                        <option value="19">07:00PM</option>
                                                                        <option value="20">08:00PM</option>
                                                                        <option value="21">09:00PM</option>
                                                                        <option value="22">10:00PM</option>
                                                                        <option value="23">11:00PM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="text-align: right;">
                                                                <button type="button" class="btn btn-primary" ng-disabled="nurseForm.$invalid" ng-click="insertNurse()">Save</button>
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

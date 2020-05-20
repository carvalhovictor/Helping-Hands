<?php include "header.php" ?>
        <div id="site-content" class="site-content" ng-controller="nurseCtrl">
            <div class="content-header content-header-inline content-header-full content-header-featured wrap blue">
                <div class="content-header-inner wrap">
                    <div class="wrap-inner">
                        <div class="breadcrumbs">
                            <div class="breadcrumbs-inner">
                                <span>
                                    <a href="/" class="home">Helping Hands</a>
                                </span>
                                <span>
                                    <span property="name">{{nurse.fname}} {{nurse.lname}}</span>
                                </span>
                            </div>
                        </div>
                        <div class="page-title">
                            <h1 class="page-title-inner">{{nurse.fname}} {{nurse.lname}}</h1>
                            <p class="subtitle">{{nurse.fname}} {{nurse.lname}} is a nurse located in {{nurse.city}}. Contact {{nurse.fname}} and get a quote for daily or hourly care.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content-body" class="content-body">
                <div class="content-body-inner wrap">
                    <main id="main-content" class="main-content">
                        <div class="main-content-inner">
                            <div class="content">
                                <div class="row wpb_row row-fluid">
                                    <div class="wpb_column column_container col-sm-12">
                                        <div class="column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <h4 class="no-margin-top">About Me</h4>
                                                    </div>
                                                </div>
                                                <div class="empty_space" style="height: 20px">
                                                    <span class="empty_space_inner"></span>
                                                </div>
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <p>
                                                            {{nurse.skills}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="empty_space" style="height: 40px">
                                                    <span class="empty_space_inner"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row wpb_row row-fluid">
                                    <div class="wpb_column column_container col-sm-12">
                                        <div class="column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="empty_space" style="height: 20px"><span class="empty_space_inner"></span></div>
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <h4 class="no-margin-top">
                                                            My Availability
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="empty_space" style="height: 20px"><span class="empty_space_inner"></span></div>
                                                <div class="nurse-time">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            Monday
                                                        </div>
                                                        <div class="col-xs-6">
                                                            8AM - 5PM
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            Tuesday
                                                        </div>
                                                        <div class="col-xs-6">
                                                            8AM - 5PM
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            Wednesday
                                                        </div>
                                                        <div class="col-xs-6">
                                                            8AM - 5PM
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            Thursday
                                                        </div>
                                                        <div class="col-xs-6">
                                                            8AM - 5PM
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nurse-cta">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-2 icon">
                                                            <i class="fa fa-chat"></i>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 contact">
                                                            <h3>{{nurse.phone}}</h3>
                                                            <span>For emergency cases</span>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4 message">
                                                            <a class="button white" href="javascript:void(0)">Send Message</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <aside class="main-sidebar">
                        <div class="main-sidebar-inner">
                            <div class="nurse-profile">
                                <img src="images/{{nurse.pic}}" class="img-responsive">
                                <div>
                                    <h4>{{nurse.fname}} {{nurse.lname}}</h4>
                                    <div class="rate">
                                        Hourly Rate: {{nurse.price}}
                                    </div>
                                    <div class="nurse-location">
                                        <i class="fa fa-location"></i> {{nurse.city}}, {{nurse.selected}}
                                    </div>
                                </div>
                                <a href="#0" class="button"><i class="fa fa-email fa-2x"></i> contact</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
<?php include "footer.php" ?>
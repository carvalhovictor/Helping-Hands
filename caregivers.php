<?php include "header.php" ?>
        <div id="site-content" class="site-content">
            <div class="content-header content-header-inline content-header-full content-header-featured wrap blue">
                <div class="content-header-inner wrap">
                    <div class="wrap-inner">
                        <div class="breadcrumbs">
                            <div class="breadcrumbs-inner">
                                <span>
                                    <a href="/" class="home">Helping Hands</a>
                                </span>
                                <span>
                                    <span property="name">Caregivers</span>
                                </span>
                            </div>
                        </div>
                        <div class="page-title">
                            <h1 class="page-title-inner">Local Caregivers</h1>
                            <p class="subtitle">We provide quality local caregivers in your community for professional, attentive in-home care.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content-body" class="content-body">
                <div class="content-body-inner wrap">
                    <main id="main-content" class="main-content" ng-controller="nurseListCtrl">
                        <div class="main-content-inner">
                            <div class="content">
                                <div class="row wpb_row row-fluid filter-box">
                                    <div class="wpb_column column_container col-sm-12">
                                        <div class="column-inner">
                                            <input type="text" id="search" ng-model="searchTerm" placeholder="Search by keyword...">
                                            <span class="search-button"><i class="fa fa-search"></i></span>
                                            <div class="filter-buttons">
                                                <span>sort by:</span>
                                                <a class="even" ng-click="orderby('name')" href="javascript:void(0);">Name</a>
                                                <a ng-click="orderby('price')" href="javascript:void(0);">Price</a>
                                                <a ng-click="orderby('city')" class="even" href="javascript:void(0);">City</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-fluid nurse-row" ng-repeat="nurse in nurses | filter:searchTerm">
                                    <div class="col-sm-12">
                                        <div class="profile-picture col-sm-2">
                                            <img src="images/{{nurse.pic}}" class="img-responsive">
                                        </div>
                                        <div class="nurse-info col-sm-10">
                                            <h4 class="dark flex no-column">
                                                <a href ng-click="showProfile(nurse)">{{nurse.name}} {{nurse.last_name}}</a>
                                            </h4>
                                            <div class="rate">Hourly Rate: ${{nurse.price}}</div>
                                            <p>
                                                {{nurse.description}}
                                            </p>
                                            <div class="divider col-sm-12">
                                                <div class="nurse-location col-sm-6">
                                                    <i class="fa fa-location"></i> <span class="city">{{nurse.city}}</span>, {{nurse.state}}
                                                </div>
                                                <div class="message-nurse col-sm-6">
                                                    <a href="javascript:void(0)" ng-click="sendMessage(nurse)" class="button"><i class="fa fa-email fa-2x"></i> send message</a>
                                                </div>
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
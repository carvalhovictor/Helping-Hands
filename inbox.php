<?php 
    include "header.php";
    if (!isset($_SESSION['senior']) && !isset($_SESSION['nurse'])) {
        echo '<script type="text/javascript">';
        echo 'window.location.replace("/");';
        echo '</script>';
    }
?>
        <div id="messages">
            <div class="content-wrapper-before">
                &nbsp;
            </div>
            <div id="content-body" class="content-body">
                <div class="content-body-inner wrap">
                    <main id="main-content" class="main-content" ng-controller="inboxCtrl">
                        <div class="main-content-inner">
                            <div class="content">
                                <div class="row wpb_row row-fluid">
                                    <div class="col-xs-12">
                                        <div class="sidebar-left sidebar-fixed">
                                            <div class="sidebar">
                                                <div class="sidebar-content">
                                                    <div class="sidebar-header">
                                                        <div class="sidebar-details">
                                                            <h4 class="m-0">
                                                                <i class="fa fa-mail"></i> mailbox
                                                            </h4>
                                                            <div class="row valign-wrapper mt-10 pt-2">
                                                                <div class="col-xs-2 media-image">
                                                                    <img src="images/<?php echo $_SESSION['pic'] ?>" alt="" class="circle z-depth-2 responsive-img">
                                                                </div>
                                                                <div class="col-xs-10">
                                                                    <p class="m-0 subtitle"><?php echo $_SESSION['name'] ?> <?php echo $_SESSION['lname'] ?></p>
                                                                    <p class="m-0 text-muted"><?php echo $_SESSION['email'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="sidebar-list" class="sidebar-menu list-group">
                                                        <div class="sidebar-list-padding app-sidebar" id="email-sidenav">
                                                            <ul class="email-list display-grid">
                                                                <li class="sidebar-title">Folders</li>
                                                                <li class="active"><a href="javascript:void(0)" class="text-sub"><i class="fa fa-mail mr-2"></i> Inbox</a></li>
                                                                <li><a href="javascript:void(0)" class="text-sub"><i class="fa fa-doc mr-2"></i> Draft</a></li>
                                                                <li><a href="javascript:void(0)" class="text-sub"><i class="fa fa-info-circled-alt mr-2"></i> Spam</a></li>
                                                                <li><a href="javascript:void(0)" class="text-sub"><i class="fa fa-trash mr-2"></i> Trash</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="app-email">
                                            <div class="content-area content-right">
                                                <div class="app-wrapper">
                                                    <div class="app-search">
                                                        <i class="fa fa-search"></i>
                                                        <input type="text" placeholder="Search Messages" class="app-filter" id="email_filter">
                                                    </div>
                                                    <div class="card card card-default scrollspy border-radius-6 fixed-width">
                                                        <div class="card-content p-0">
                                                            <div class="email-header">
                                                                <div class="left-icons">
                                                                    <span class="header-checkbox">
                                                                        <label>
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label>
                                                                    </span>
                                                                    <span class="action-icons">
                                                                        <i class="fa fa-mail"></i>
                                                                        <i class="fa fa-folder-1"></i>
                                                                        <i class="fa fa-info-circled-alt"></i>
                                                                        <i class="fa fa-trash"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="list-content"></div>
                                                                <div class="email-action">
                                                                    <span class="email-options"></span>
                                                                </div>
                                                            </div>
                                                            <div class="collection email-collection">
                                                                <a href="" class="collection-item" ng-repeat="message in messages" ng-click="showConversation(message)">
                                                                    <div class="list-left">
                                                                        <label>
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="list-content">
                                                                        <div class="list-title-area">
                                                                            <div class="user-media">
                                                                                <img ng-src="images/{{message.pic}}"  alt="" class="circle z-depth-2 responsive-img avtar">
                                                                                <div class="list-title">{{message.fname}} {{message.lname}}</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="list-desc">
                                                                            {{message.message}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="list-right">
                                                                        
                                                                    </div>
                                                                </a>
                                                            </div>
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
                </div>
            </div>
        </div>
<?php include "footer.php" ?>
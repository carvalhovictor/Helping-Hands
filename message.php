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
                    <main id="main-content" class="main-content" ng-controller="messageCtrl">
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
                                                                <li class="active"><a href="inbox.php" class="text-sub"><i class="fa fa-mail mr-2"></i> Inbox</a></li>
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
                                                                <div class="subject">
                                                                    <div class="back-to-mails">
                                                                        <a href="inbox.php">
                                                                            <i class="fa fa-left"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="email-title">Back</div>
                                                                </div>
                                                            </div>
                                                            <div class="email-content" ng-repeat="conversation in conversations">
                                                                <div class="list-title-area">
                                                                    <div class="user-media">
                                                                        <div class="list-title">

                                                                        </div>
                                                                    </div>
                                                                    <div class="title-right">
                                                                    </div>
                                                                </div>
                                                                <div class="email-desc">
                                                                    {{conversation.message}}
                                                                </div>
                                                            </div>
                                                            <div class="reply-box">
                                                                <form name="messageForm">
                                                                <p>Send message to {{nurse.fname}} {{nurse.lname}}</p>
                                                                <div class="input-field">
                                                                    <textarea ng-model="message" name="message" placeholder="Insert message here" ng-required="true"></textarea>
                                                                </div>
                                                                <div class="button-field">
                                                                    <a href="javascript:void(0)" class="button" ng-disabled="messageForm.$invalid" ng-click="sendMessage()">Send Message</a>
                                                                </div>
                                                                </form>
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
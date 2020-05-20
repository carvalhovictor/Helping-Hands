            <div class="content-bottom-widgets">
                <div class="content-bottom-inner wrap">
                    <div class="content-bottom-aside-wrap">
                        <aside data-width="12">
                            <div id="text-6" class="widget widget_text">
                                <div class="textwidget">
                                    <div class="aligncenter">
                                        <h2 style="color:#fff" class="no-margin-top">
                                            We do whatever it takes to bring<br>you peace of mind
                                        </h2>
                                        <ul class="gr-btn">
                                            <li>
                                                <a href="contact.php" class="button large white outline">Request a callback</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-3x fa-whatsapp"></i>
                                                <a class="content" href="tel:19547982545"><span class="text">24/7 service available</span><span class="action">01 800 688 8688</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div id="site-footer" class="site-footer">
                <div class="footer-widgets">
                    <div class="footer-widgets-inner wrap">
                        <div class="footer-aside-wrap">
                            <aside data-width="4">
                                <div id="text-5" class="widget widget_text">
                                    <h3 class="widget-title">
                                            Headquarters
                                    </h3>
                                    <div class="textwidget">
                                        <p>
                                            777 Glades Road Ste 362<br>
                                            Boca Raton, Florida 33431<br>
                                            hello@helpinghands.info<br>
                                            1 800 688 8688
                                        </p>
                                        <p>
                                            <img src="images/logo-ft.png" width="155">
                                        </p>
                                    </div>
                                </div>
                            </aside>
                            <aside data-width="2">
                                <div id="nav_menu-3" class="widget widget_nav_menu">
                                    <h3 class="widget-title">
                                        Services
                                    </h3>
                                    <div class="menu-services-container">
                                        <ul id="menu-services" class="menu">
                                            <li><a href="hourly.php">Hourly care</a></li>
                                            <li><a href="daily.php">Daily care</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                            <aside data-width="2">
                                <div id="nav_menu-5" class="widget widget_nav_menu">
                                    <h3 class="widget-title">
                                        Company
                                    </h3>
                                    <div class="menu-company-container">
                                        <ul id="menu-company" class="menu">
                                            <li><a href="about.php">About us</a></li>
                                            <li><a href="caregivers.php">Caregivers</a></li>
                                            <li><a href="contact.php">Contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                            <aside data-width="4">
                                <div id="mc4wp_form_widget-3" class="widget widget_mc4wp_form_widget">
                                    <form class="mc4wp-form mc4wp-form-75" method="post">
                                        <div class="mc4wp-form-fields">
                                            <p>
                                                <label>Sign Up to receive the latest articles</label>
                                                <input type="email" name="EMAIL" placeholder="Your email address" required="">
                                            </p>
                                            <input type="submit" value="Sign up">
                                        </div>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright footer-copyright-left">
                    <div class="footer-copyright-inner wrap">
                        <div class="social-icons">
                            <a href="javascript:void(0)" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0)" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0)" data-tooltip="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="javascript:void(0)" data-tooltip="Linkedin"><i class="fa fa-linkedin"></i></a>
                        </div> Copyright © 2019
                    </div>
                </div>
            </div>
        </div>
        <div id="off-canvas-right" class="off-canvas sliding-menu">
            <a href="javascript:void(0)" data-target="off-canvas-right" class="off-canvas-toggle">
                <span></span>
            </a>
            <div class="off-canvas-wrap">
                <ul id="menu-mobile-menu" class="menu menu-sliding">
                    <?php if (isset($_SESSION['senior']) || isset($_SESSION['nurse'])): ?>
                        <?php if ($_SESSION['nurse']): ?>
                            <li><a href="edit-nurse.php">Profile</a></li>
                        <?php else: ?>
                            <li><a href="edit-senior.php">Profile</a></li>
                        <?php endif; ?>
                        <li><a href="inbox.php">Messages</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="javascript:void(0)" class="open-login-modal">Login</a></li>
                        <li><a href="javascript:void(0)" class="open-register-modal">Register</a></li>
                    <?php endif; ?>
                    <li><a href="about.php">About us</a></li>
                    <li class="menu-item-has-children"><a href="javascript:void(0)">Services</a>
                        <ul class="sub-menu">
                            <li><a href="daily.php">Daily home care</a></li>
                            <li><a href="hourly.php">Hourly home care</a></li>
                        </ul>
                    </li>
                    <li><a href="caregivers.php">Caregivers</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                </ul>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type='text/javascript' src="js/common.js"></script>
        <script type='text/javascript' src="js/app.js"></script>
    </body>
</html>
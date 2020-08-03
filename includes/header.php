<header class="header navbar navbar-expand-sm">
            

            <ul class="navbar-item flex-row ml-auto">
                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">                            
                            <div class="media mx-auto">
                                <img src="assets/img/icon90.png" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5><?php echo $_SESSION['name']; ?></h5>
                                    <?php
                                    $position="";
                                    switch($_SESSION['type']){
                                        case 0:
                                            $position="Super admin";
                                        break;
                                        case 1:
                                            $position="Root user";
                                        break;
                                        case 2:
                                            $position="Administrator";
                                        break;
                                        case 3:
                                            $position="Supervisor";
                                        break;
                                        case 4:
                                            $position="Sales man";
                                        break;
                                        case 5:
                                            $position="Delivery man";
                                        break;
                                    }

                                    ?>
                                    <p><?php echo $position; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php if($_SESSION['type']>1){ ?>
                        <div class="dropdown-item">
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>My Profile</span>
                            </a>
                        </div>
                        <?php } ?>
                        <?php if($_SESSION['type']==1){ ?>
                        <div class="dropdown-item">
                            <a href="org_profile.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Organization</span>
                            </a>
                        </div>
                        <?php } ?>
                        
                        <div class="dropdown-item">
                            <a href="logout.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
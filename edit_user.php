<?php include('includes/title.php'); ?>

<link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
<link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
<script src="plugins/sweetalerts/promise-polyfill.js"></script>
<link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
</head>

<body class="alt-menu " data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include('includes/header.php');?>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <?php include('includes/sidebar.php'); ?>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="">
                <div style="width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">

                    <?php
                    include('helper.php');
                    $con=con();
                    $oid= $_SESSION['org'];
                    $profile_id = $_GET['data'];
                    $getprofile=mysqli_query($con,"SELECT * FROM `profile` JOIN `tbl_user` ON profile.profile_id=tbl_user.reference_id WHERE `organization_id`='$oid' AND `profile_id`='$profile_id'");
                    $num_rows = mysqli_num_rows($getprofile);
                    $user_data=mysqli_fetch_array($getprofile);

                ?>

                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4 id="formhead">Edit user</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="update_user.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="isedit" value="1" />
                                        <input type="hidden" name="pid" value="<?php echo $profile_id; ?>"/>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data['name'] ?>" name="name" placeholder="Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" value="<?php echo $user_data['email'] ?>" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="phn1">Mobile</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data['contact_1'] ?>" name="phn1" placeholder="Mobile">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phn2">Alternate phone</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data['contact_2'] ?>" name="phn2" placeholder="Alternate phone">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data['address'] ?>" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="uname">Username</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data['username'] ?>" name="uname" placeholder="Username">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pwd">Password</label>
                                                <input type="password" class="form-control" name="pwd" value="<?php echo $user_data['password'] ?>" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label>Photo <a href="javascript:void(0)"
                                                    class="custom-file-container__image-clear"
                                                    title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" name="logo" id="lgo"
                                                    class="custom-file-container__custom-file__custom-file-input"
                                                    accept="image/*" value="<?php echo $user_data['photo'] ?>">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                        <div id="login">
                                            <button type="submit" class="btn btn-primary mt-3">Update</button><a
                                                href="org_profile.php" class="btn btn-dark mt-3">Cancel</a></diV>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>


    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>

    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js"></script>
    <script src="plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
    <script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    $(document).ready(function() {
        App.init();

    });
    </script>
</body>

</html>
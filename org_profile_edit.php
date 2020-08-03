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
                    $orgid= $_SESSION['org'];
                    $getorg=mysqli_query($con,"SELECT `organization_name`,`contact_person`,`contact_1`,`contact_2`,`email_id`,`address`,`logo` FROM `organization` WHERE `organization_id`=$orgid");
                    $org=mysqli_fetch_array($getorg);

                ?>

                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4 id="formhead">Edit Profile</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="upd_org_prof.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="isedit" value="1"/>
                                        <input type="hidden" name="oid" value="<?php echo $orgid; ?>"/>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="o_name">Organization Name</label>
                                                <input type="text" class="form-control" name="o_name" value="<?php echo $org['organization_name']; ?>" placeholder="Organization Name" readonly required>
                                            </div>
                                           
                                        </div>
                                        <div class="form-row mb-4">
                                          
                                          <div class="form-group col-md-6">
                                              <label for="c_per">Contact Person</label>
                                              <input type="text" class="form-control" name="c_per" value="<?php echo $org['contact_person']; ?>" placeholder="Contact Person" required>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label for="email">Email</label>
                                              <input type="email" class="form-control" name="email" value="<?php echo $org['email_id']; ?>" placeholder="Email" required>
                                          </div>
                                      </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="phn1">Mobile</label>
                                                <input type="text" class="form-control" name="phn1" value="<?php echo $org['contact_1']; ?>" placeholder="Mobile">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phn2">Alternate phone</label>
                                                <input type="text" class="form-control" name="phn2" value="<?php echo $org['contact_2']; ?>" placeholder="Alternate phone" >
                                            </div>
                                        </div>
                                  
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" value="<?php echo $org['address']; ?>" placeholder="Address">
                                            </div>
                                          
                                        </div>
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
    <label>Logo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
    <label class="custom-file-container__custom-file" >
        <input type="file" name="logo" id="lgo" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview"></div>
</div>
                                       <div id="login">
                                      <button type="submit" class="btn btn-primary mt-3">Update</button><a href="org_profile.php" class="btn btn-dark mt-3">Cancel</a></diV>

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
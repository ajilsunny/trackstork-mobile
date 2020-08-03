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
    <div class="main-container" id="container">

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
                    $isedit=0;
                    $whid= "0";
                    $whname="";
                    $ltd="";
                    $lng="";
                    $tptxt="Create";
                    $bttxt="Create";
                    if(isset($_GET['whid'])){
                    $whid= $_GET['whid'];
                    $isedit=1;
                    $getData=mysqli_query($con,"SELECT `warehouse_name`, `latitude`, `longitude` FROM `warehouse` WHERE `warehouse_id`='$whid' ");
                    $data=mysqli_fetch_array($getData);
                    $whname=$data['warehouse_name'];
                    $ltd=$data['latitude'];
                    $lng=$data['longitude'];
                    $tptxt="Edit";
                    $bttxt="Update";
                    }
                    ?>
                    

                    <div class="row">
                        <div id="flFormsGrid" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4 id="formhead"><?php echo $tptxt; ?> Warehouse</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                <form  onsubmit="event.preventDefault();">
                                        <input type="hidden" id="isedit" value="<?php echo $isedit; ?>"/>
                                        <input type="hidden" id="whid" value="<?php echo $whid; ?>"/>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <!-- <label for="whname">Warehouse Name</label> -->
                                                <input type="text" class="form-control" id="whname" placeholder="Warehouse Name" title="Warehouse Name" value="<?php echo $whname; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="ltd">Latitude</label> -->
                                                <input type="text" class="form-control" id="ltd" placeholder="Latitude" title="Latitude" value="<?php echo $ltd; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="lng">Longitude</label> -->
                                                <input type="text" class="form-control" id="lng" placeholder="Longitude" title="Longitude" value="<?php echo $lng; ?>" required>
                                            </div>
                                        </div>
                                  
                                       <div id="login">
                                      <button id="submit" class="btn btn-primary mt-3"><?php echo $bttxt; ?></button>
                                      <button  id="cancel" class="btn btn-dark mt-3">Cancel</button></diV>

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
    $('#login').on('click','#submit', function (i) {
        var ied=$('#isedit').val();
        var whid=$('#whid').val(); 
        var whname =$('#whname').val();
        var ltd=$('#ltd').val();
        var lng=$('#lng').val();  
        
        if(whname.length>0) { 
        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {
                fx: 29,isedit:ied,whid:whid,whname:whname,ltd:ltd,lng:lng
            },
            success: function( data) {
                  
                if(data=="1") {
                    window.location.href='warehouse.php';
                 }else  if(data=="2"){
                   alert("Name already exists!");
                 }else{
                    alert("Warehouse creation failed!");
                 }
     
    
   
                }
        });
    }else{
        alert("Warehouse Name is mandatory");
    }
});

$('#login').on('click','#cancel', function (i) {
    if($('#isedit').val()=="1"){
        window.location.href='warehouse.php';
    }else{
    $('#whname').val('');
    $('#ltd').val('');
    $('#lng').val('');
        }    
        });

      
    $(document).ready(function() {
        App.init();
           
    });
       
</script>
</body>
</html>
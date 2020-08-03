<?php
include('includes/title.php');
?>
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
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
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
                    $cid= "0";
                    $cname="";
                    $cnum="";
                    $cpname="";
                    $phn1="";
                    $phn2="";
                    $mail="";
                    $adr="";
                    $lat="";
                    $lon="";
                    $tptxt="Create";
                    $bttxt="Create";
                    if(isset($_GET['cid'])){
                    $cid= $_GET['cid'];
                    $isedit=1;
                    $getorg=mysqli_query($con,"SELECT `cust_id`,`cust_name`,`cust_num`,`contact_person`,`mobile`,`phone`,`email`,`address`,`latitude`,`longitude` FROM `customer` WHERE `cust_id`=$cid");
                    $org=mysqli_fetch_array($getorg);
                    $cname=$org['cust_name'];
                    $cnum=$org['cust_num'];
                    $cpname=$org['contact_person'];
                    $phn1=$org['mobile'];
                    $phn2=$org['phone'];
                    $mail=$org['email'];
                    $adr=$org['address'];
                    $lat=$org['latitude'];
                    $lon=$org['longitude'];
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
                                            <h4 id="formhead">Add Despatch</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form  onsubmit="event.preventDefault();">
                                        <div class="form-row mb-4">
                                            <!-- <div class="form-group col-md-6">
                                                <label for="c_name">Customer Name</label>
                                                <input type="text" class="form-control" id="c_name" placeholder="Customer Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="c_num">Customer Number</label>
                                                <input type="text" class="form-control" id="c_num" placeholder="Customer Number">
                                            </div> -->
                                            <div class="col-sm-12 col-12">
                                                <div class="form-group">
                                                    <!-- <label for="customer">Customer</label> -->
                                                    <select class="selectpicker form-control" id="customer" data-live-search="true" title="Select Customer">
                                                        <option>Select customer</option>
                                                        <?php 
                                                           $oid = $_SESSION['org'];
                                                           $uid = $_SESSION['user_id'];
                                                           $sql = mysqli_query($con,"SELECT `cust_id`, `cust_name` FROM `customer` WHERE `created_by` = '$uid' AND `org_id`= '$oid' ");     
                                                           while($row = mysqli_fetch_array($sql)){
                                                        ?>
                                                        <option value="<?php echo $row['cust_id']  ?>"><?php echo $row['cust_name']  ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="order_num">Order Number</label> -->
                                                <input type="text" class="form-control" id="order_num" placeholder="Order Number" title="Order Number">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="remarks">Remarks</label> -->
                                                <input type="text" class="form-control" id="remarks" placeholder="Remarks" title="Remarks">
                                            </div>
                                        </div>
                                       <div id="login">
                                         <button id="submit" class="btn btn-primary mt-3">Create</button>
                                         <button  id="cancel" class="btn btn-dark mt-3">Cancel</button>
                                      </diV>
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
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
    
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
        var customer =$('#customer').val();
        var order_num=$('#order_num').val();
        var remarks =$('#remarks').val();
        if(customer.length>0){

        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {

                fx: 19,customer:customer,order_num:order_num,remarks:remarks
            },
            success: function( data) {
                  
                if(data=="1"){
                //if($('#isedit').val()=="1"){
                //   swal({
                //       title: 'Yaay!',
                //       text: "Organization updated successfully!",
                //       type: 'success',
                //       padding: '2em'
                //     });
                //   }else{
                //   swal({
                //       title: 'Yaay!',
                //       text: "Organization created successfully!",
                //       type: 'success',
                //       padding: '2em'
                //     });
                // }
                // //  getorgs();
                // $('#o_name').val('');
                // $('#c_per').val('');
                // $('#email').val('');
                // $('#phn1').val('');
                // $('#phn2').val('');
                // $('#address').val('');
                // $('#lat').val('');
                // $('#long').val('');
                 window.location.href='despatch.php';
                  // window.location.href='dashboard.php';
                 }else  if(data=="2"){
                   // window.location.href='dashboard.php';
                   alert("Username alredy exists!");
                 }else{
                    alert("Organazation creation failed!");
                 }
     
    
   
                }
            });
      
    }else{
        alert("Customer Name is mandatory");
    }
});

$('#login').on('click','#cancel', function (i) {
    
        window.location.href='despatch.php';
        
});

      
    $(document).ready(function() {
        App.init();
           
    });
       
</script>
</body>
</html>
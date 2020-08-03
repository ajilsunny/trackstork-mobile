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
                                            <h4 id="formhead"><?php echo $tptxt; ?> Customer</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form  onsubmit="event.preventDefault();">
                                        <input type="hidden" id="isedit" value="<?php echo $isedit; ?>"/>
                                        <input type="hidden" id="oid" value="<?php echo $cid; ?>"/>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <!-- <label for="o_name">Customer Name</label> -->
                                                <input type="text" class="form-control" id="o_name" placeholder="Customer Name" title="Customer Name" value="<?php echo $cname; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="c_num">Customer Number</label> -->
                                                <input type="text" class="form-control" id="c_num" placeholder="Customer Number" title="Customer Number" value="<?php echo $cnum; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="c_per">Contact Person</label> -->
                                                <input type="text" class="form-control" id="c_per" placeholder="Contact Person" title="Contact Person" value="<?php echo $cpname; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="email">Email</label> -->
                                                <input type="email" class="form-control" id="email" placeholder="Email" title="Email" value="<?php echo $mail; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="phn1">Mobile</label> -->
                                                <input type="text" class="form-control" id="phn1" placeholder="Mobile" title="Mobile" value="<?php echo $phn1; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="phn2">Alternate contact</label> -->
                                                <input type="text" class="form-control" id="phn2" placeholder="Alternate contact" title="Alternate contact" value="<?php echo $phn2; ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <!-- <label for="address">Address</label> -->
                                                <input type="text" class="form-control" id="address" placeholder="Address" title="Address" value="<?php echo $adr; ?>">
                                            </div>
                                        
                                            <div class="form-group col-md-6">
                                                <!-- <label for="uname">Latitude</label> -->
                                                <input type="text" class="form-control" id="lat" placeholder="Latitude" title="Latitude" value="<?php echo $lat; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- <label for="pword">Longitude</label> -->
                                                <input type="text" class="form-control" id="long" placeholder="Longitude" title="Longitude" value="<?php echo $lon; ?>">
                                            </div>
                                        </div>
                                  
                                       <div id="login">
                                      <button id="submit" class="btn btn-primary mt-3"><?php echo $bttxt; ?></button><button  id="cancel" class="btn btn-dark mt-3">Cancel</button></diV>

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
        var oid=$('#oid').val();
        var name =$('#o_name').val();
        var c_num=$('#c_num').val();
        var cper=$('#c_per').val();
        var email =$('#email').val();
        var ph1=$('#phn1').val();
        var ph2=$('#phn2').val();
        var adr=$('#address').val();
        var lat=$('#lat').val();
        var lon =$('#long').val();
        if(name.length>0){

        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {

                fx: 6,isedit:ied,oid:oid,name:name,c_num:c_num,cper:cper,email:email,ph1:ph1,ph2:ph2,adr:adr,lat:lat,lon:lon
            },
            success: function( data) {
                  
                if(data=="1"){
//                      if($('#isedit').val()=="1"){
//                         swal({
//       title: 'Yaay!',
//       text: "Organization updated successfully!",
//       type: 'success',
//       padding: '2em'
//     });
//                      }else{
//                     swal({
//       title: 'Yaay!',
//       text: "Organization created successfully!",
//       type: 'success',
//       padding: '2em'
//     });
// }
//                   //  getorgs();
//                     $('#o_name').val('');
// $('#c_per').val('');
// $('#email').val('');
// $('#phn1').val('');
// $('#phn2').val('');
// $('#address').val('');
// $('#lat').val('');
// $('#long').val('');
window.location.href='customers.php';
                  // window.location.href='dashboard.php';
                 }else  if(data=="2"){
                   // window.location.href='dashboard.php';
                   alert("Username alredy exists!");
                 }else{
                    alert("Customer creation failed!");
                 }
     
    
   
                }
            });
      
    }else{
        alert("Customer Name is mandatory");
    }
});

$('#login').on('click','#cancel', function (i) {
    if($('#isedit').val()=="1"){
        window.location.href='customers.php';
    }else{
    $('#o_name').val('');
    $('#c_num').val('');
    $('#c_per').val('');
    $('#email').val('');
    $('#phn1').val('');
    $('#phn2').val('');
    $('#address').val('');
    $('#lat').val('');
    $('#long').val('');
    }    
});

      
    $(document).ready(function() {
        App.init();
           
    });
       
</script>
</body>
</html>
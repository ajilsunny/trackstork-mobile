<?php 
include('includes/title.php');
include('helper.php');
$con = con();
$oid=$_SESSION['org'];
?>
<link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js ">

<link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
<script src="plugins/sweetalerts/promise-polyfill.js"></script>
<link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
<link href="assets/css/main.css" rel="stylesheet" type="text/css">
<link href="assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.5.1.js">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">


    
    


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

            <div style="width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">

                <div class="page-header">
                    <div class="page-title col-md-10">
                        <h3>DESPATCH</h3>
                    </div>
                    <div class="page-title col-md-2">
                        <div class="btn btn-primary pull-right" id="showImport">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>                        
                        </div>
                        <a href="add_despatch.php" class="btn btn-primary pull-right"
                            style="float: right;margin-right: 0px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </a>
                    </div>
                </div>
                <div class="">

                    <div class="row">
                        <div id="flFormsGrid" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-spacing display-none">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4 id="formhead">Import Despatch</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form form action="upld_desp.php" method="POST" enctype="multipart/form-data">
                                        <div class="custom-file mb-4">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <input required name="excel" type="file" class="custom-file-input"
                                                id="customFile"
                                                accept=".xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">

                                            <small id="sh-text1" class="form-text text-muted mt-4">Upload despatch data
                                                in Excel(.xlsx) format. Download sample
                                                <a target="_blank" class="badge badge-primary"
                                                    href="downloads/despatch_sample.xlsx">here</a></small>
                                        </div>
                                        <div id="login">
                                            <button id="submit" class="btn btn-primary">Import</button>
                                            <button type="cancel" id="cancel" class="btn btn-dark">Cancel</button>
                                        </diV>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <!-- <button type="cancel" class="btn btn-dark" id="btn-assign" data-toggle="modal" data-target="#driverModal">Assign</button> -->
                                        <button type="cancel" class="btn btn-dark" id="btn-assign">Assign</button>
                                        <a href="view_waytrip.php"><button type="cancel" class="btn btn-dark">View way trips</button></a>
                                    </div>
                                </div>
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="dttable" class="table table-hover non-hover" style="width:100%">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div id="driverModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div> -->

            <div class="modal fade" id="driverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign Driver</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="driver_id">Driver</label>
                                    <select class="selectpicker form-control" id="driver_id" data-live-search="true">
                                        <option>Select driver</option>
                                        <?php 
                                            $sql = mysqli_query($con,"SELECT  `id`,`name`  FROM `driver` WHERE `org_id`='$oid' AND `delivery`='1'");
                                            while($row = mysqli_fetch_array($sql)) {
                                            $row['id'];
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                            <button type="button" class="btn btn-primary" id="asgn-driver">Assign</button>
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
    $('#login').on('click', '#cancel', function(i) {
        
    });

    $('#showImport').on('click',function(){
        $('#flFormsGrid').removeClass('display-none');
    })

    $('#customFile').on('change', function() {
        // var i = $(this).prev('label').clone();
        var file = $('#customFile')[0].files[0].name;
        $(this).prev('label').text(file);
    });

    $('#dttable').on('click', '.deletebtn', function(i) {
        var table = $('#dttable').DataTable();
        var data = table.row($(this).parents('tr')).data();
        var did = data.despatch_id;


        if (!confirm("Do you want to delete this order?")) {
            return false;
        }
        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {
                fx: 18,
                did: did
            },
            success: function(data) {
                if (data == "1") {
                    swal({
                        title: 'Yaay!',
                        text: "Order deleted successfully!",
                        type: 'success',
                        padding: '2em'
                    });
                    getorgs();
                } else {
                    alert("order deletion failed!");
                }

            },
            error: function() {

            }
        });
    });

    // Driver assign Modal

    // $('#dttable').on('init.dt', function() {
    //     $('.btnAssign')
    //         .attr('data-toggle', 'modal')
    //         .attr('data-target', '#driverModal');
    // });
    // end Modal
    var desp_id = [];
    $('#dttable').on('click','.chk',function(event) {
        if(event.target.checked) {
            desp_id.push(event.target.value);
        }
        else{
            let tempArr = desp_id.filter(val => val !== event.target.value);
            desp_id = tempArr;
        }
    }); 
    $('#btn-assign').on('click',function() {
        if(desp_id.length<1) {
            alert('No orders have been selected');
            $(this)
                .removeAttr('data-toggle')
                .removeAttr('data-target')
        } else { 
            $(this)
                .attr('data-toggle' , 'modal')
                .attr('data-target' , '#driverModal')
        }
    })
    $('#asgn-driver').on('click',function(i){
        var driver_id = $('#driver_id option:selected').val();
        $.ajax({
            url:"router.php",
            method:"post",
            dataType:"json",
            data:{fx:20,desp_id:desp_id,driver_id:driver_id},
            success:function(data){
                if(data==1){
                    location.reload();
                }
            }
        })
    }) 

 

    $("#u_count").TouchSpin({
        initval: 5
    });

    $(document).ready(function() {
        App.init();
    });

    var table='';
    function getorgs() {
        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {
                fx: 17
            },
            success: function(data) {
                table = $('#dttable').DataTable({
                    dom: '<"row"<"col-md-12"<"row"<"col-md-5"B><"col-md-5"f><"col-md-1"l> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
                    buttons: {
                        buttons: [{
                                extend: 'copy',
                                className: 'btn'
                            },

                            {
                                extend: 'excel',
                                className: 'btn'
                            },
                            // {
                            //     text: 'Assign',
                            //     className: 'btn btnAssign',
                            //     action: function() {

                            //     }
                            // }

                        ]
                    },
                    "oLanguage": {
                        "oPaginate": {
                            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                        },
                        "sInfo": "Showing page _PAGE_ of _PAGES_",
                        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                        "sSearchPlaceholder": "Search...",
                        "sLengthMenu": "Results :  _MENU_",
                    },
                    "stripeClasses": [],
                    "lengthMenu": [7, 10, 20, 50],
                    "pageLength": 10,
                    destroy: true,
                    aaSorting: [
                        [0, 'asc']
                    ],
                    data: data,
                    columnDefs: [ {
                        orderable: false,
                        className: 'select-checkbox',
                        targets:   0
                    } ],
                    select: {
                        style:    'os',
                        selector: 'td:first-child'
                    },
                    order: [[ 1, 'asc' ]],
                    columns: [
                        {
                            // title: '<input type="checkbox" id="mass_select_all" data-to-table="tasks">',
                            title:'',
                            data: 'flag',
                            "render": function(data, type, row) {
                                if(data==1) {
                                    return '';
                                }else{
                                return '<input type="checkbox" class="chk" value="' +
                                    row.despatch_id + '" id="chk">';
                                }
                            },
                            width: "5%"
                        },
                        
                        {
                            title: "Customer Name",
                            data: 'cust_name',
                            width: "25%"
                        },
                        {
                            title: "Order Number",
                            data: 'order_no',
                            width: "25%"
                        },
                        {
                            title: "Remarks",
                            data: 'remarks',
                            width: "25%"
                        },
                        {
                            title: "Action",
                            data: 'despatch_id',
                            "render": function(data, type, row) {
                                return '<div class="btn-group">' +
                                    '<button type="button" id="deletebtn" class="btn btn-dark btn-sm deletebtn" attr="' +
                                    data + '">Delete</button>' +
                                    '</div>';
                            },
                            width: "7%"
                        },

                    ]
                });

            }
        });
    }
    getorgs();

    </script>
</body>

</html>
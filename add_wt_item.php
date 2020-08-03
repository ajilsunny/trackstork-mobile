<?php 
include('includes/title.php');
include('helper.php');
$con = con();
$oid=$_SESSION['org'];
$wtid = $_REQUEST['wid'];
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
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-1">
                                        <!-- <button type="cancel" class="btn btn-dark" id="btn-assign" data-toggle="modal" data-target="#driverModal">Assign</button> -->
                                        <button type="cancel" class="btn btn-dark" id="btn-assign">Assign</button>
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
    

    var desp_id = [];
    var inichkAllbox = [];

    $("#dttable").on('click','#selectAll',function() {
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
        if($(this).prop('checked')==true){
            desp_id = inichkAllbox;
        }else{
            desp_id = [];
        }
    });
    $("#dttable").on('click','input[type=checkbox]',function() {
        if (!$(this).prop("checked")) {
            $("#selectAll").prop("checked", false);
            // let chkdVal = $(this).val();
            // console.log(chkdVal,'Checked')
            // let tempArr = allChecked.filter(val => val !== chkdVal)
            // allChecked = tempArr
        }
    });


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
            
        } else { 
            var wtid = <?php echo json_encode($wtid); ?>;
            console.log(desp_id);
            $.ajax({
                url:"router.php",
                method:"post",
                dataType:"json",
                data:{fx:34,desp_id:desp_id,wtid:wtid},
                success:function(data){
                    if(data==1){
                        window.location.href = 'view_waytrip.php';
                    }
                }
            })
        }
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
                fx: 33
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
                    "lengthMenu": [5, 10, 20, 50],
                    "pageLength": 10,
                    "stateSave": true,
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
                            title: '<input type="checkbox" id="selectAll" />',
                            data: 'flag',
                            "render": function(data, type, row) { 
                                
                                if(data==1) {
                                    return '';
                                }else{
                                    if(!inichkAllbox.includes(row.despatch_id)){
                                        inichkAllbox.push(row.despatch_id)
                                     };
                                    
                                    return '<input type="checkbox" class="chk" value="' + row.despatch_id + '" id="chk">';
                                    
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
                            title: "id",
                            data: 'despatch_id',
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

                    ]
                });

            }
        });
    }
    getorgs();

    </script>
</body>

</html>
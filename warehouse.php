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

            <div style="width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">

                <div class="page-header">
                    <div class="page-title col-md-10">
                        <h3>WAREHOUSE</h3>
                    </div> 
                    <div class="page-title col-md-2">
                        <div class="btn btn-primary pull-right" id="showImport">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>                        
                        </div>
                        <a href="ae_warehouse.php" class="btn btn-primary pull-right" style="float: right;margin-right: 0px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>                        
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
                                            <h4 id="formhead">Import Warehouse</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form form action="upld_whouse.php" method="POST" enctype="multipart/form-data">
                                        <div class="custom-file mb-4">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <input required name="excel" type="file" class="custom-file-input" id="customFile"
                                                accept=".xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                            
                                                <small id="sh-text1" class="form-text text-muted mt-4"> Upload warehouse data
                                                in Excel(.xlsx) format. Download sample <a target="_blank"
                                                    class="badge badge-primary"
                                                    href="downloads/warehouse_sample.xlsx"> here </a>.</small>
                                        </div>
                                        <div id="login">
                                            <button id="submit" class="btn btn-primary"> Import </button>
                                            <button type="cancel" id="cancel" class="btn btn-dark">Cancel</button>
                                        </diV>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
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
    $('#login').on('click', '#cancel', function(i) {
        $('#isedit').val(0);
        $('#oid').val('0');
        $('#whid').val('');
        $('#whname').val('');
        $('#ltd').val('');
        $('#lng').val('');
        $('#submit').text('Create');
        $('#formhead').text('Create organization');

    });

    $('#showImport').on('click',function(){
        $('#flFormsGrid').removeClass('display-none');
    })

    $('#customFile').on('change',function(){
        
        // var i = $(this).prev('label').clone();
        var file = $('#customFile')[0].files[0].name;
        $(this).prev('label').text(file);
    });
    $('#dttable').on('click', '.editbtn', function(i) {
        var table = $('#dttable').DataTable();
        var data = table.row($(this).parents('tr')).data();
        $('#isedit').val(1);
        $('#oid').val(data.organization_id);
        $('#o_name').val(data.organization_name);
        $('#c_per').val(data.contact_person);
        $('#email').val(data.email_id);
        $('#u_count').val(data.rl);
        $('#uname').val(data.username);
        $('#pword').val(data.password);
        $('#submit').text('Update'); //Create organization
        $('#formhead').text('Edit organization');
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        //  console.log(data);
        // if(!confirm("Do you want to delete this user?")){
        //     return false;
        // }
        // $.ajax({
        //     url: "queries.php",
        //     type: 'post',
        //     dataType: "json",
        //     data: {
        //         delete_customer: true,id:data.id},
        //     success: function( data ) {
        //         getCustomets();
        //     },
        //     error: function (){

        //     }
        // });
    });


    $('#dttable').on('click', '.deletebtn', function(i) {
        var table = $('#dttable').DataTable();
        var data = table.row($(this).parents('tr')).data();
        var wid = data.warehouse_id;

        if (!confirm("Do you want to delete this?")) {
            return false;
        }
        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {
                fx: 28,
                wid: wid
            },
            success: function(data) {
                if (data == "1") {
                    swal({
                        title: 'Yaay!',
                        text: "Warehouse deleted successfully!",
                        type: 'success',
                        padding: '2em'
                    });
                    getorgs();
                } else {
                    alert("Warehouse deletion failed!");
                }

            },
            error: function() {

            }
        });
    });


    $("#u_count").TouchSpin({
        initval: 5
    });

    $(document).ready(function() {
        App.init();

    });

    function getorgs() {
        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {
                fx: 27
            },
            success: function(data) {

                var table = $('#dttable').DataTable({
                    dom: '<"row"<"col-md-12"<"row"<"col-md-5"B><"col-md-5"f><"col-md-2"l> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
                    // dom: "fbltip",
                    buttons: {
                        buttons: [{
                                extend: 'copy',
                                className: 'btn'
                            },

                            {
                                extend: 'excel',
                                className: 'btn'
                            }

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
                    "paging":true,
                    "stripeClasses": [],
                    "lengthMenu": [5, 10, 20, 50],
                    "pageLength": 10,
                    "stateSave": true,
                    destroy: true,
                    aaSorting: [
                        [0, 'asc']
                    ],
                    data: data,
                    columns: [{
                            title: "warehouse Name",
                            data: 'warehouse_name',
                            width: "25%"
                        },
                        {
                            title: "Latitude",
                            data: 'latitude',
                            width: "25%"
                        },
                        {
                            title: "Longitude",
                            data: 'longitude',
                            width: "25%"
                        },
                        {
                            title: "Action",
                            data: 'warehouse_id',
                            "render": function(data, type, row) {

                                return '<div class="btn-group">' +
                                    '<a href="ae_warehouse.php?whid=' + data +
                                    '"class="btn btn-dark btn-sm editbtn" attr="' + data +
                                    '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>' +
                                    '<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>' +
                                    '</button>' +
                                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">' +
                                    ' <a class="dropdown-item deletebtn" id="deletebtn" attr="' +
                                    data + '">Delete</a>'

                                    +
                                    '</div>' +
                                    ' </div>';


                            },
                            "width": "7%"
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
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
                    <div class="page-header">
                        <div class="page-title col-md-10">
                            <h3>DRIVER</h3>
                        </div> 
                        <div class="page-title col-md-2">
                            <div class="btn btn-primary pull-right" id="showImport" style="float: right;margin-right: 0px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing display-none">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4 id="formhead">Create Driver</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form id="form_driver">
                                        <input type="hidden" id="isedit" value="0" />
                                        <input type="hidden" id="oid" value="0" />
                                        <input type="hidden" id="did" value="" />
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <!-- <label for="name">Name</label> -->
                                                <input type="text" class="form-control" id="name" placeholder="Name" title="Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <!-- <label for="phone">Phone</label> -->
                                                <input type="tel" class="form-control" id="phone" placeholder="Phone" title="Phone" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <!-- <label for="address">Address</label> -->
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Address" title="Address">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <!-- <label for="usr">Username</label> -->
                                                <input type="text" class="form-control" id="usr" placeholder="Username" title="Username" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <!-- <label for="pwd">Password</label> -->
                                                <input type="password" class="form-control" id="pwd" placeholder="Password" title="Password" required>
                                            </div>
                                        </div>
                                        <div style="display: flex;">
                                            <div class="form-group col-md-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="sales"
                                                        value="1">
                                                    <label class="custom-control-label" for="sales">Sales</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="delivery" value="1">
                                                    <label class="custom-control-label" for="delivery">Delivery</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="login">
                                            <button id="submit" class="btn btn-primary mt-3">Create</button>
                                            <button type="cancel" id="cancel" class="btn btn-dark mt-3">Cancel</button>
                                        </diV>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row" id="cancel-row">

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
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
    $('#showImport').on('click',function(){
        $('#flFormsGrid').removeClass('display-none');
    })
    $('#flFormsGrid').on('submit', '#form_driver', function(e) {
        e.preventDefault();
        var ied = $('#isedit').val();
        var did = $('#did').val();
        var name = $('#name').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var uname = $('#usr').val();
        var pwd = $('#pwd').val();
        sales = $('#sales:checked').val() || 0;
        delivery = $('#delivery:checked').val() || 0;
        // console.log(name,phone,address,uname,pwd,sales,delivery);


        if ((sales == 1) || (delivery == 1)) { 

            $.ajax({
                url: "router.php",
                type: 'post',
                dataType: "json",
                data: {
                    fx: 11,
                    isedit: ied,
                    did: did,
                    name: name,
                    phone: phone,
                    address: address, 
                    uname: uname,
                    pwd: pwd,
                    sales: sales,
                    delivery: delivery
                },
                success: function(data) {
                    if (data == "1") {
                        if ($('#isedit').val() == "1") {
                            swal({
                                title: 'Yaay!',
                                text: "Driver updated successfully!",
                                type: 'success',
                                padding: '2em'
                            });
                        } else {
                            swal({
                                title: 'Yaay!',
                                text: "Driver created successfully!",
                                type: 'success',
                                padding: '2em'
                            });
                        }
                        getorgs();
                        $('#isedit').val(0);
                        $('#oid').val('0');
                        $('#name').val('');
                        $('#phone').val('');
                        $('#address').val('');
                        $('#usr').val('');
                        $('#pwd').val('')        
                        $('#sales').prop('checked',false);
                        $('#delivery').prop('checked',false);

                        $('#submit').text('Create');
                        $('#formhead').text('Create driver');
                        // window.location.href='dashboard.php';
                    } else if (data == "2") {
                        // window.location.href='dashboard.php';
                        // alert("A driver with same username alredy exists!");
                        swal({
                                title: 'oops!',
                                text: "A driver with same username alredy exists!",
                                type: 'error',
                                padding: '2em'
                            });
                    } else {
                        // alert("Driver creation failed!");
                        swal({
                                title: 'oops!',
                                text: "Driver creation failed!",
                                type: 'error',
                                padding: '2em'
                            });
                    }

                }
            });

        } else {
            alert("You have to select sales or delivery");
        }
    });

    $('#login').on('click', '#cancel', function(i) {

        $('#isedit').val(0);
        $('#oid').val('0');
        $('#name').val('');
        $('#phone').val('');
        $('#address').val('');
        $('#usr').val('');
        $('#pwd').val('');
        $('#sales:checked').prop('checked', false);
        $('#delivery:checked').prop('checked', false);

        $('#submit').text('Create');
        $('#formhead').text('Create driver');

    });
    $('#dttable').on('click', '.editbtn', function(i) {
        $('#flFormsGrid').removeClass('display-none');
        var table = $('#dttable').DataTable();
        var data = table.row($(this).parents('tr')).data();
        $('#isedit').val(1);
        $('#did').val(data.id);
        $('#name').val(data.name);
        $('#phone').val(data.phone);
        $('#address').val(data.address);
        $('#usr').val(data.username);
        $('#pwd').val(data.password);

        if((data.sales)==1) {
            $('#sales').prop('checked',true);
        }
        if((data.delivery)==1) {
            $('#delivery').prop('checked',true);
        }

        $('#submit').text('Update'); //Create organization
        $('#formhead').text('Edit driver');
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
        //         delete_customer: true,id:data.id                },
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
        var driver_id = data.id;

        if (!confirm("Do you want to delete this Driver?")) {
            return false;
        }
        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {
                fx: 13,
                driver_id: driver_id
            },
            success: function(data) {
                if (data == "1") {
                    swal({
                        title: 'Yaay!',
                        text: "Driver deleted successfully!",
                        type: 'success',
                        padding: '2em'
                    });
                    getorgs();
                } else {
                    alert("Driver deletion failed!");
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
                fx: 12
            },
            success: function(data) {
                var table = $('#dttable').DataTable({
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
                    "stateSave":true,
                    destroy: true,
                    aaSorting: [
                        [0, 'asc']
                    ],
                    data: data,
                    columns: [{
                            title: "Name",
                            data: 'name', 
                            width: "25%"
                        },
                        {
                            title: "Phone",
                            data: 'phone',
                            width: "25%"
                        },

                        {
                            title: "Address",
                            data: 'address',
                            width: "20%"
                        },
                        {
                            title: "Permission",
                            data:'sales',
                            "render": function ( data, type, row) {

                                if(row.sales==1 && row.delivery==1){
                                    return 'delivery,sales';
                                }else{
                                    if(row.sales==1){
                                        return "sales";
                                    }else if(row.delivery==1){
                                        return 'delivery';
                                    }else {
                                        return "none";
                                    }
                                }
                               
                             } ,
                            width: "10%"
                        },
                        {
                            title: "Action",
                            data: 'id',
                            "render": function(data, type, row) {

                            return  '<div class="btn-group">' +
                                    '<button type="button" id="editbtn" class="btn btn-dark btn-sm editbtn" attr="' +
                                    data + '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button>' +
                                    '<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>' +
                                    '</button>' +
                                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">' +
                                    ' <a class="dropdown-item deletebtn" id="deletebtn" attr="' +
                                    data + '">Delete</a>' +
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
<?php
include('includes/title.php');
?>

<link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
<link href="assets/css/main.css" rel="stylesheet" type="text/css">
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">

<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
<link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
<script src="plugins/sweetalerts/promise-polyfill.js"></script>
<link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- END PAGE LEVEL STYLES -->

</head>

<body class="alt-menu">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include('includes/header.php'); ?>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

            <?php include('includes/sidebar.php'); ?>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <!-- Content -->
                <div class="row" id="cancel-row">
                    <!-- organization profile -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 layout-top-spacing">
                        <?php
                        include('helper.php');
                        $con = con();
                        $orgid = $_SESSION['org'];
                        $getorg = mysqli_query($con, "SELECT `organization_name`,`contact_person`,`contact_1`,`contact_2`,`email_id`,`address`,`logo` FROM `organization` WHERE `organization_id`=$orgid");
                        $org = mysqli_fetch_array($getorg);

                        ?>
                        <!-- User profile -->
                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Organization Profile</h3>
                                    <a href="org_profile_edit.php" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg></a>
                                </div>
                                <div class="text-center user-info">
                                    <?php
                                    if (strlen($org['logo']) > 4) {
                                    ?>
                                        <img src="uploads/<?php echo $org['logo']; ?>" alt="avatar">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="assets/img/icon90.png" alt="avatar">
                                    <?php
                                    }

                                    ?>

                                    <p class=""><?php echo $org['organization_name']; ?></p>
                                </div>
                                <div class="user-info-list">
                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg> <?php echo $org['contact_person']; ?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                    </path>
                                                </svg> <?php echo $org['contact_1']; ?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                    </path>
                                                </svg> <?php echo $org['contact_2']; ?>
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:<?php echo $org['email_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                        </path>
                                                        <polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg><?php echo $org['email_id']; ?></a>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg><?php echo $org['address']; ?>
                                            </li>
                                        </ul>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // User profile -->

                        <!-- Chenge password -->
                        <div class="row">
                            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 id="formhead">Change password</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <form id="change_pwd">
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-12">
                                                    <label for="old_pwd">Old password</label>
                                                    <div class="password-section">
                                                        <input type="password" class="form-control" id="old_pwd" placeholder="Old password" required>
                                                        <i class="fa fa-eye icon toggle-password"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="new_pwd">New password</label>
                                                    <div class="password-section">
                                                        <input type="password" class="form-control" id="new_pwd" placeholder="New password" required>
                                                        <i class="fa fa-eye icon toggle-password-2"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="login">
                                                <button type="submit" class="btn btn-primary mt-3" id="btn_change">Change</button>
                                                <a href="org_profile.php" class="btn btn-dark mt-3">Cancel</a>
                                            </diV>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chenge password -->

                    </div>
                    <!-- // organization profile -->
                    <!-- user table -->
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 layout-top-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="dttable" class="table table-hover" style="width:100%">

                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- // user table -->
                </div>
            </div>
            <!-- CONTENT AREA -->

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


    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>
        $(document).ready(function() {
            App.init();
        });
        $('#dttable').on('click', '#dltbtn', function() {
            if(confirm('Do you want to delete this user'))
            var tdata = $('#dttable').DataTable();
            var data = tdata.row($(this).parents('tr')).data();
            var user_id = data.user_id;
            var profile_id = data.profile_id;

            $.ajax({
                url: 'router.php',
                method: 'post',
                data: {
                    user_id: user_id,
                    profile_id: profile_id,
                    fx: 15
                },
                success: function(data) {
                    if (data == "1") {
                        swal({
                            title: 'Yaay!',
                            text: "User deleted successfully!",
                            type: 'success',
                            padding: '2em'
                        });
                        getorgs();
                    } else {
                        alert("User deletion failed!");
                    }
                }
            });

        });


        $('.password-section').on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#old_pwd");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        $('.password-section').on('click', '.toggle-password-2', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#new_pwd");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });


        $('#change_pwd').on('click', '#btn_change', function(e) {
            e.preventDefault();
            var old_pwd = $('#old_pwd').val();
            var new_pwd = $('#new_pwd').val();
            
            $.ajax({
                url: 'router.php',
                method: 'post',
                data: {
                    fx: 16,
                    opwd: old_pwd,
                    npwd: new_pwd
                },
                success: function(data) {

                    if (data == 1) {
                        swal({
                            title: 'Yaay!',
                            text: "Password changed successfully!",
                            type: 'success',
                            padding: '2em'
                        });
                        $('#old_pwd').val('');
                        $('#new_pwd').val('');
                    } else {
                        swal({
                            title: 'oops!',
                            text: "Password not matching!",
                            type: 'error',
                            padding: '2em'
                        });

                    }
                }
            });
        })

        function getorgs() {
            $.ajax({
                url: "router.php",
                type: 'post',
                dataType: "json",
                data: {
                    fx: 14
                },
                success: function(data) {
                    var table = $('#dttable').DataTable({
                        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
                        buttons: {
                            buttons: [{
                                    text: 'Add user',
                                    action: function() {
                                        window.location.href = 'user.php'
                                    },
                                    className: 'btn'
                                },
                                {
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
                        "lengthMenu": [7, 10, 20, 50],
                        "pageLength": 10,
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
                                title: "Username",
                                data: 'username',
                                width: "25%"
                            },
                            {
                                title: "Password",
                                data: 'password',
                                width: "20%"
                            },
                            {
                                title: "Action",
                                data: 'id',
                                "render": function(data, type, row) {

                                    return '<div class="btn-group">' +
                                        '<a href="edit_user.php?data=' + row.profile_id + '"><button type="button" id="editbtn" class="btn btn-dark btn-sm editbtn">Edit</button></a>' +
                                        '<button type="button" id="dltbtn" class="btn btn-dark btn-sm editbtn" attr="' + data + '">Delete</button>' +
                                        // '<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">' +
                                        // '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>' +
                                        // '</button>' +
                                        // '<div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">' +
                                        // '<a class="dropdown-item deletebtn" id="deletebtn" attr="' +
                                        // data + '">Delete</a>' +
                                        // '</div>'+
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
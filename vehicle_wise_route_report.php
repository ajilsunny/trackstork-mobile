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
                            <h3>Vehicle Wise Route Report</h3>
                        </div>
                    </div>


                    <div class="row" id="cancel-row">
                        
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <div class="table-responsive mb-4 mt-4">
                                <form class="dispatch_form" method="post">
                                    <div class="col-12 row">
                                        <div class="col-md-3">
                                            <p for="">Date</p>
                                            <input type="date" id="from" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <p for="">Driver</p>
                                            <select name="" id="drive_select" class="form-control">
                                                <option value="">All</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <p></p>
                                            <button type="submit" class="mt-4 btn btn-primary form-control">Generate</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3 exel-pdf" style="display:none">
                                        <a href="vehicle_wise_route_report_excel.php" class="btn btn-primary">Excel</a>
                                        <a href="vehicle_wise_route_report_pdf.php" class="btn btn-primary" target="_blank">PDF</a>
                                    </div>
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

        $('.dispatch_form').submit(function (){
            var from=$('#from').val()
            var drive_select=$('#drive_select').val()
            var i=1;
            $.ajax({
	        url:"router.php",
	        type: 'post',
            dataType: "json",
            data: {
                fx: 44,
                from:from,
                drive_select:drive_select
            },
	        success:function(data)
	        {
                $('.exel-pdf').show();
                var table =  $('#dttable').DataTable({
                        destroy: true,
                        aaSorting: [[0, 'asc']],
                        data : data,
                        columns : [ 
                        {
                            title : "SI No.",
                            width: "15%",
                            "render": function(data, type, full, meta) {
                                return i++;
                            }
                        },
                        {
                            title : "Customer Number",
                            data : 'cust_num',
                            width: "15%" 
                        }, 
                        
                        {
                            title : "Customer Name",
                            data : 'cust_name',
                            width: "10%" 
                        }
                        ],
                        // dom: 'fbltip',
                    dom: '<"row"<"col-md-12"<"row"<"col-md-5"B><"col-md-5"f><"col-md-2"l> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',

                    buttons: [
                        // {
                        //     className: 'btn',
                        //     title:'Customer Despatch Report',
                        //     extend: 'excelHtml5',
                        //     filename: 'Despatch Report',

                        // },
                        // {
                        //     extend: 'pdfHtml5',
                        //     orientation: 'landscape',
                        //     pageSize:'A4',
                        // // width:100%,
                        //     title:'Despatch Report',
                        //     filename: 'Despatch Report',
            
                
                        // }
                    ],
                "lengthMenu": [10, 20, 40, 80],
                "pageLength": 20,
        });
    }
    });
    return false;
    })
    function drivers()
    {
        $.ajax({
            url: "router.php",
            type: 'post',
            dataType: "json",
            data: {
                fx: 12
            },
            success: function (data){
                var html='<option value="">All</option>';
                for (i = 0; i < data.length; i++) {
                    html+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#drive_select').html(html);
            }
        });
    }
    drivers();
    </script>
</body>

</html>
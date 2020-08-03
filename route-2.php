<?php
include('includes/title.php');
include('helper.php');
$con = con();
$oid = $_SESSION['org'];
$uid = $_SESSION['user_id'];
$wid = $_GET['wid'];
$idToOptimize = [];
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

<!-- BEGIN DRAG STYLES -->
<link href="plugins/drag-and-drop/dragula/dragula.css" rel="stylesheet" type="text/css" />
<link href="plugins/drag-and-drop/dragula/example.css" rel="stylesheet" type="text/css" />
<!-- END DRAG STYLES -->

</head>

<body class="alt-menu " data-spy="scroll" data-target="#navSection" data-offset="100">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include('includes/header.php'); ?>
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
                        <h3>ROUTE</h3>
                    </div>
                </div>

                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <?php
                            $sql = mysqli_query($con, "SELECT DISTINCT(customer_id) FROM `despatch` INNER JOIN `waytrip_items` ON waytrip_items.despatch_id=despatch.despatch_id WHERE `waytrip_id`='$wid' ");
                            $cutomers = mysqli_num_rows($sql);
                            if ($cutomers > 0) {
                            ?>
                                <div class="row ml-2">
                                    <div class="form-group col-6">
                                        <label for="warehouse">Select warehouse
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </label>
                                        <select class="form-control basic" id="warehouse">
                                            <?php
                                            $wh_data = mysqli_query($con, "SELECT `warehouse_id`,`warehouse_name` FROM `warehouse` WHERE `created_by` = '$uid' AND `org_id` = '$oid' ");
                                            while ($wh = mysqli_fetch_array($wh_data)) {
                                            ?>
                                                <option value="<?php echo $wh['warehouse_id'] ?>"><?php echo $wh['warehouse_name'] ?></option>
                                            <?php }  ?>
                                        </select>
                                    </div>
                                    <!-- <div class="col-3"></div> -->
                                    <div class="col-5 displayTotal align-right" style="margin-top: 1.8rem;margin-left: 3.5rem"> </div>
                                </div>
                                <div class="row ml-2 mt-2">
                                    <div class="form-group col-3">
                                        <div>
                                            <input type="checkbox" id="rtwh" value="1"></input>
                                            <label> Return to warehouse</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="rtwh" value="1" disabled></input>
                                            <label> Enable traffic</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="speed">Average speed (km/hr)</label>
                                        <input type="text" class="form-control" id="speed" placeholder="Average speed (km/hr)" value="40">
                                    </div>
                                    <div class="col-3">
                                        <label for="detention_time">Detention time (m)</label>
                                        <input type="text" class="form-control" id="detention_time" placeholder="Detention time (m)" value="5">
                                    </div>
                                    <!-- <div class="col-3 align-right"> -->
                                    <div class="col-3">
                                        <button type="button" class="btn btn-primary " id="optimize-route" style="margin-top: 30px; height: 45px;width: 12rem;">Optimize Route</button>
                                    </div>
                                </div>

                                <!-- <div class="ml-4">
                                    <div class="btn-group mb-4 mr-2" style="width:180px">
                                        <button class="btn btn-dark btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select warehouse <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <?php
                                            // $wh_data = mysqli_query($con, "SELECT `warehouse_id`,`warehouse_name` FROM `warehouse` WHERE `created_by` = '$uid' AND `org_id` = '$oid' ");
                                            // while ($wh = mysqli_fetch_array($wh_data)) {
                                            ?>
                                            <a href="javascript:void(0);" class="dropdown-item wareHouse"><?php// echo $wh['warehouse_name'] ?> </a>
                                            <?php //} 
                                            ?>
                                        </div>
                                    </div>
                                    <div><input type="checkbox"></input> <label> Return to warehouse</label></div>
                                </div> -->

                                <div class='parent ex-2'>
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div id='left-events' class='dragula'>
                                                <?php
                                                $c = 0;
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    $c++;
                                                    $idToOptimize[] = $row['customer_id'];
                                                    $customer = mysqli_query($con, "SELECT `cust_id`,`cust_name`,`latitude`,`longitude` FROM `customer` WHERE `cust_id` =" . $row['customer_id']);
                                                    $customer_data = mysqli_fetch_array($customer);
                                                    $cust_id = $customer_data['cust_id'];
                                                    $latLong = $customer_data['latitude'] && $customer_data['latitude'] ? $customer_data['latitude'] . ',' . $customer_data['longitude'] : '';
                                                    $latLongArray[$cust_id] = $latLong;

                                                ?>
                                                    <div class="media d-block d-sm-flex">
                                                        <div class="media-body">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="cutomer">
                                                                    <h6 class=""><?php echo $c . ". " ?><?php echo $customer_data['cust_name'] ?></h6>
                                                                </div>

                                                                <div class="customers">
                                                                    <?php if (($customer_data['latitude']) and ($customer_data['longitude'])) { ?>
                                                                        <a href="" data-toggle="modal" data-target="#exampleModal" title="Change latitude and longitude" >
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin chngIcon changeLl custId"  cid="<?php echo $customer_data['cust_id'] ?>" style="margin-bottom:4px">
                                                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                                                <circle cx="12" cy="10" r="3"></circle>
                                                                            </svg>
                                                                        </a>
                                                                        <input type="hidden" id="changeIcon" value="">
                                                                    <?php } else { ?>
                                                                        <a href="" data-toggle="modal" data-target="#exampleModal" title="Add latitude and longitude" >
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin addIcon addLl custId" cid="<?php echo $customer_data['cust_id'] ?>" style="margin-bottom:4px">
                                                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                                                <circle cx="12" cy="10" r="3"></circle>
                                                                            </svg>
                                                                        </a>
                                                                    <?php } ?>

                                                                    <input type='checkbox' class="dragBlocker ml-1"  value="<?php echo $row['customer_id'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-3 ml-4">
                                        <label for="speed">Average speed (km/hr)</label>
                                        <input type="text" class="form-control" id="speed" placeholder="Average speed (km/hr)" value="40">
                                    </div>
                                    <div class="col-8 align-right ml-4">
                                        <button type="button" class="btn btn-primary " id="optimize-route">Optimize Route</button>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group  col-6">
                                        <input type="text" class="form-control" id="speed" placeholder="Average speed (km/hr)">
                                    </div>
                                    <div class="align-right mr-4 col-6">
                                        <button type="button" class="btn btn-primary" id="optimize-route">Optimize Route</button>
                                    </div> -->

                            <?php } else { ?>
                                <p class="align-center vert-center">No data available</p>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- START MODAL -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="event.preventDefault();">
                            <input type="hidden" class="cid" value="">
                            <!-- <input type="hidden" class="isedit" value="<?php //echo $isedit; 
                                                                            ?>" />
                                                                        <input type="hidden" id="whid" value="<?php //echo $whid; 
                                                                                                                ?>" /> -->
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <!-- <label for="ltd">Latitude</label> -->
                                    <input type="text" class="form-control" id="ltd" placeholder="Latitude" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <!-- <label for="lng">Longitude</label> -->
                                    <input type="text" class="form-control" id="lng" placeholder="Longitude" value="" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</button>
                        <button type="button" data-dismiss="modal" class="btn btn-primary" id="add_latlong">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
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
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/drag-and-drop/dragula/dragula.min.js"></script>
    <script src="plugins/drag-and-drop/dragula/custom-dragula.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="plugins/sweetalerts/custom-sweetalert.js"></script>
    <script>
        $("#u_count").TouchSpin({
            initval: 5
        });

        $(document).ready(function() {
            App.init();
        });
        // Global variables
        var idToOptimize = <?php echo json_encode($idToOptimize); ?>;
        var latLongArr = <?php echo json_encode($latLongArray); ?>;
        var tempLatlong = latLongArr;
        var checkedArr = [];
        var uncheckedArr = idToOptimize;
        var checkedLatlong = [];
        var uncheckedLatlong = [];
        var cid = '';

        // Get customer id to moadal
        $('body').delegate('.changeLl', 'click', function() {
            cid = $(this).attr('cid');
            $('#changeIcon').val('1');
            $('.cid').val(cid);
        });
        $('.addLl').on('click', function() {
            cid = $(this).attr('cid');
            $('.cid').val(cid);
        })

        // var changeLatlong = [];
        $('#add_latlong').on('click', function(e) {
            e.preventDefault();
            var cid = $('.cid').val();
            var lat = $('#ltd').val();
            var lng = $('#lng').val();
            
            latlong = lat.concat(",".concat(lng));
            tempLatlong[cid] = latlong;
            var chgf = $('#changeIcon').val();
            if (chgf == 1) {
                $('#changeIcon').val('');
                $('.customers svg[cid=' + cid + ']').css('stroke','yellow');
                // console.log(a,'chngIcon')
                // $(icon).get(0).css('stroke','yellow')
                
            } else {
                $('.customers svg[cid=' + cid + ']').css('stroke','blue');
                
                // addLatlong.push(latlong);
                // latLongArray[cid] = latlong;
                // var aaa = $('[cid="' + cid + '"]')[0]['children'][0]
                // $('[cid="' + cid + '"]').css('stroke','blue');

                // var aaa = $('.addIcon').find('[cid="' + cid + '"]')
                // aaa.attr('stroke', 'blue') 
            }

            $('#ltd').val("");
            $('#lng').val("");
        })


        $("#left-events").on('click', '.dragBlocker', function(event) {
            var cid = event.target.value
            if (event.target.checked) {
                if (!checkedArr.includes(event.target.value)) {
                    checkedArr.push(cid);
                }
                let tempArr = uncheckedArr.filter(val => val !== event.target.value);
                uncheckedArr = [...tempArr];
            } else {
                uncheckedArr.push(event.target.value);
                let tempArr = checkedArr.filter(val => val !== event.target.value);
                checkedArr = [...tempArr];
            }
        });


        // function LatLngFormatter(data) {
        //     let formattedObj = {};
        //     let tempArr = [];
        //     data.forEach(item => {
        //         latlong = item.latitude.concat(",".concat(item.longitude));
        //         tempArr.push(latlong);
        //     });
        //     formattedObj.locations = tempArr;
        //     return formattedObj;
        // }


        function addTimes(startTime, endTime) {
            var times = [0, 0, 0]
            var max = times.length

            var a = (startTime || '').split(':')
            var b = (endTime || '').split(':')

            // normalize time values
            for (var i = 0; i < max; i++) {
                a[i] = isNaN(parseInt(a[i])) ? 0 : parseInt(a[i])
                b[i] = isNaN(parseInt(b[i])) ? 0 : parseInt(b[i])
            }

            // store time values
            for (var i = 0; i < max; i++) {
                times[i] = a[i] + b[i]
            }

            var hours = times[0]
            var minutes = times[1]
            var seconds = times[2]

            if (seconds >= 60) {
                var m = (seconds / 60) << 0
                minutes += m
                seconds -= 60 * m
            }

            if (minutes >= 60) {
                var h = (minutes / 60) << 0
                hours += h
                minutes -= 60 * h
            }

            return ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2)
        }



        $('#optimize-route').on('click', function() {
            // console.log(tempLatlong,"clatlong")
            // console.log(checkedArr, "ckd")
            // console.log(uncheckedArr,"uckd")
            // console.log(whLatlong,"wh");

            var warehouseId = $('#warehouse option:selected').val();
            var whLatlong = '';
            $.ajax({
                url: 'router.php',
                method: 'post',
                dataType: 'json',
                async:false,
                data: {
                    fx: 30,
                    wid: warehouseId
                },
                success: function(wdata) {
                    whLatlong = wdata['latitude'] + (',' + wdata['longitude'])
                }
            })

            var lastCust = $('.customers a:last').attr('cid');

            var emptyArr = [];
            for (let arr in tempLatlong) {
                if (!tempLatlong[arr]) {
                    emptyArr.push(arr);
                }
            }
            // let tempckecked = checkedArr.filter(val => val !== lastCust);
            // checkedArr = tempckecked;


            if (emptyArr.length == 0) {

                for (var c = 0; c < checkedArr.length; c++) {
                    var ci = checkedArr[c];
                    checkedLatlong[c] = tempLatlong[ci];
                }
                var lastCustLatlong = tempLatlong[lastCust];

                let formattedObj = {};
                let tempArr = [];
                for (var i = 0; i < uncheckedArr.length; i++) {
                    var m = uncheckedArr[i];
                    tempArr[i] = tempLatlong[m];
                }
                if (checkedLatlong.length > 0) {
                    var lastChecked = checkedLatlong[checkedLatlong.length - 1]
                    // console.log(lastChecked,"last")
                    tempArr.unshift(lastChecked)
                } else {
                    tempArr.unshift(whLatlong)
                }
                if ($('#rtwh:checked').val() == 1) {
                    tempArr.push(whLatlong);
                } else {

                    let lastArr = tempArr.filter(val => val !== lastCustLatlong);
                    // console.log(lastArr,"lastArr")
                    tempArr = [...lastArr];
                    tempArr.push(lastCustLatlong);

                }
                // console.log(tempArr,"temp")
                formattedObj.locations = tempArr;


                formattedObj = JSON.stringify(formattedObj);
                // console.log(formattedObj,'formattedObj')
                $.ajax({
                    url: 'http://open.mapquestapi.com/directions/v2/optimizedroute?key=8xGh2RLW6ZtzPegw9gVbv4MFasaSZ6nk',
                    method: 'post',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: formattedObj,
                    success: function(optdData) {
                        // console.log(optdData, 'api')
                        // console.log(tempLatlong,'temp')
                        // console.log(checkedArr,'ckd')

                        var orderdList = [];
                        var loc = optdData.route.locationSequence;
                        var newFormat = JSON.parse(formattedObj)
                        for (var z = 0; z < loc.length; z++) {
                            var m = loc[z];
                            orderdList.push(newFormat.locations[m]);
                        }
                        orderdList.shift()
                        if ($('#rtwh:checked').val() == 1) {
                            orderdList.pop()
                        }

                        var newList = []
                        orderdList.forEach(item => {
                            for (const [key, value] of Object.entries(tempLatlong)) {
                                if (value === item) {
                                    newList.push(key);
                                }
                            }
                        })
                        var newCustIds = checkedArr.concat(newList);

                        $.ajax({
                            url: 'router.php',
                            method: 'post',
                            data: {
                                fx: 26,
                                custId: newCustIds
                            },
                            success: function(res) {
                                var newRenderList = JSON.parse(res);
                                var speed = $('#speed').val();
                                var detTime = $('#detention_time').val()
                                var distance = '';
                                var totalTime = 0;

                                var time = [];
                                var now = new Date();
                                var h = now.getHours();
                                var m = now.getMinutes();
                                var s = now.getSeconds();
                                var iniTime = h + ":" + m + ":" + s;
                                

                                    if (h < 10) {
                                        h = "0" + h;
                                    }
                                    if (m < 10) {
                                        m = "0" + m;
                                    }
                                    if (s < 10) {
                                        s = "0" + s;
                                    }

                                
                                var checkedTime = h + ":" + m + ":" + s;
                                for (var i = 0; i < checkedArr.length; i++) {
                                    time.push(checkedTime);
                                }
                                optdData.route.legs.forEach((item) => {
                                    distance = item.distance;
                                    var calculatedTime = (distance / speed) * 60;
                                    calculatedTime += parseFloat(detTime);
                                    totalTime += calculatedTime

                                    var mins_num = calculatedTime;
                                    var hours = Math.floor(mins_num / 60);
                                    var minutes = Math.floor((mins_num - ((hours * 3600)) / 60));
                                    var seconds = Math.floor((mins_num * 60) - (hours * 3600) - (minutes * 60));

                                    // Appends 0 when unit is less than 10
                                    if (hours < 10) {
                                        hours = "0" + hours;
                                    }
                                    if (minutes < 10) {
                                        minutes = "0" + minutes;
                                    }
                                    if (seconds < 10) {
                                        seconds = "0" + seconds;
                                    }
                                    var calculatedTimeHms = hours + ':' + minutes + ':' + seconds;

                                    var nowHms = addTimes(iniTime, calculatedTimeHms);
                                    time.push(nowHms)
                                    iniTime = nowHms

                                })
                                // convert total time to HMS
                                var mins_num = totalTime;
                                var hours = Math.floor(mins_num / 60);
                                var minutes = Math.floor((mins_num - ((hours * 3600)) / 60));
                                var seconds = Math.floor((mins_num * 60) - (hours * 3600) - (minutes * 60));

                                // Appends 0 when unit is less than 10
                                if (hours < 10) {
                                    hours = "0" + hours;
                                }
                                if (minutes < 10) {
                                    minutes = "0" + minutes;
                                }
                                if (seconds < 10) {
                                    seconds = "0" + seconds;
                                }
                                var totalTimeHms = hours + ':' + minutes + ':' + seconds;

                                $('#left-events').html('');
                                var c = 0
                                for (var i = 0; i < newRenderList.length; i++) {
                                    c++;
                                    console.log(checkedArr,'checkedArr')
                                    $('#left-events').append(
                                        `<div class="media d-block d-sm-flex">` +
                                        `<div class="media-body">` +
                                        `<div class="d-flex justify-content-between">` +
                                        `<div class="cutomer">` +
                                        `<h6 class="">` + c + `. ` + newRenderList[i].cust_name + `</h6>` +
                                        `</div>` +
                                        `<div class="customers">` +
                                        `<p class="mr-4" style="color:green;font-size: 13px;">` + time[i] + `</p>` +
                                        `<a href="" data-toggle="modal" data-target="#exampleModal" title="Change latitude and longitude">` +
                                        `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin chngIcon changeLl custId" cid="` + newRenderList[i].cust_id + `" style="margin-bottom:4px">` +
                                        `<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>` +
                                        `<circle cx="12" cy="10" r="3"></circle>` +
                                        `</svg>` +
                                        `</a>` +
                                        `<input type="hidden" id="changeIcon" value="">` +
                                        `<input type='checkbox' class="dragBlocker ml-1" value="` + newRenderList[i].cust_id + `" `+`${checkedArr[i]==newRenderList[i].cust_id?`checked`:``}`+`> ` +
                                        `</div>` +
                                        `</div>` +
                                        `</div>` +
                                        `</div>`
                                    )
                                }
                                $('.displayTotal').html('')
                                $('.displayTotal').append(
                                    `<h6 style="color:green">Total distance : ` + optdData.route.distance + ` km</h6>` +
                                    `<h6 style="color:green">Total time : ` + totalTimeHms + ` hrs</h6>`
                                )
                                // checkedArr = [];
                                // tempLatlong = latLongArr;
                                // console.log(checkedArr,"rerenchk");
                                // console.log(tempLatlong,"rerenTem")


                            }
                        })
                    }
                })
            } else {
                alert('Please enter latitude and longitude for all customers')
            }
        })
    </script>
</body>

</html>
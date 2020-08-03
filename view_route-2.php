<?php
include('includes/title.php');
include('helper.php');
$con = con();
$oid = $_SESSION['org'];
$uid = $_SESSION['user_id'];
$wid = $_GET['wid'];
?>


<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components/timeline/custom-timeline.css" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->

<style>
    .toggle-code-snippet {
        margin-bottom: 0px;
    }
</style>

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
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
        <div style="width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
            <div class="container">

                <div class="container">
                    <div class="row mt-3 mb-5">
                        <div class="col-2"></div>
                        <div class="col-4">
                        <h4> ROUTE </h4>
                        </div>
                        <div class="col-4">
                            <div class="save-route align-right">
                                <a href="route.php?wid=<?php echo $wid?>&&ed=1"><button type="button" class="btn btn-dark" id="save_route">Edit route</button></a>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2"></div>
                        <div id="timelineBasic" class="col-lg-8 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <!-- <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                                            <h4> ROUTE </h4>
                                        </div>
                                        <div class="col-xl-5 col-md-5 col-sm-5 col-5 align-right mt-3 mr-2">
                                            <a href="route.php?wid=<?php echo $wid?>"><button type="button" class="btn btn-dark" id="save_route">Edit route</button></a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="widget-content widget-content-area pb-1">
                                    <div class="mt-container mx-auto">
                                        <div class="timeline-line">
                                            <!-- <div class="item-timeline">
                                                <p class="t-time">10:00</p>
                                                <div class="t-dot t-dot-primary">
                                                </div>
                                                <div class="t-text">
                                                    <p>Updated Server Logs</p>
                                                    <p class="t-meta-time">25 mins ago</p>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>

                </div>

              </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="assets/js/scrollspyNav.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    <script>
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
        
        var wid = <?php echo json_encode($wid); ?>;
        $(document).ready(function() {
            $.ajax({
                url:'router.php',
                method:'post',
                dataType:'json',
                data:{ fx:35,wid:wid },
                success:function(data) {
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
                    var timeLatest = checkedTime;
                    var timeArr = [];
                    var delay = [];
                    delay.shift();
                    console.log(delay);

                    for(var i = 0; i < data['cust'].length;i++){
                        
                        let tempDelay = data['route'][i]['delay'];
                            tempDelay = tempDelay/60;
                        // time to HRS format    
                        var mins_num = tempDelay;
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
                        var tempDelayHms = hours + ':' + minutes + ':' + seconds;
                        delay.push(tempDelayHms);

                        if(data['route'][i]['is_fixed']==1) {
                            timeArr.push(checkedTime);
                            timeLatest = timeArr[timeArr.length - 1]
                        } else {
                            
                            var nowHms = addTimes(timeLatest, tempDelayHms);
                            timeArr.push(nowHms);
                            timeLatest = nowHms;
                            
                        }
                        // console.log(delay,"delayout")
                        // timeDelayMins = Math.floor(mins_num);
                        
                        $('.timeline-line').append (
                            `<div class="item-timeline">`+
                                `<p class="t-time ml-4" >`+(i+1)+`.</p>`+
                                `<p class="t-time mr-4">`+timeArr[i]+`</p>`+
                                `<div class="t-dot t-dot-success">`+
                                `</div>`+
                                `<div class="t-text">`+
                                    `<p>`+data['cust'][i]['cust_name']+`</p>`+
                                    `<p class="t-meta-time">`+delay[i]+` hrs</p>`+
                                `</div>`+
                            `</div>`
                        )
                    }
                }
            })
        });
    </script>


</body>

</html>
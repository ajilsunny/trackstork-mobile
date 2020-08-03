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

                    

                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4 id="formhead">Create organization</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form  onsubmit="event.preventDefault();">
                                        <input type="hidden" id="isedit" value="0"/>
                                        <input type="hidden" id="oid" value="0"/>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="o_name">Organization Name</label>
                                                <input type="text" class="form-control" id="o_name" placeholder="Organization Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="c_per">Contact Person</label>
                                                <input type="text" class="form-control" id="c_per" placeholder="Contact Person">
                                            </div>
                                        </div>
                                      
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="u_count">Allowed Users</label>
                                                <input type="text" class="form-control" id="u_count" >
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="uname">Root User Username</label>
                                                <input type="text" class="form-control" id="uname" placeholder="Username">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pword">Password</label>
                                                <input type="password" class="form-control" id="pword" placeholder="Password">
                                            </div>
                                        </div>
                                  
                                       <div id="login">
                                      <button id="submit" class="btn btn-primary mt-3">Create</button><button type="cancel" id="cancel" class="btn btn-dark mt-3">Cancel</button></diV>

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
                $('#login').on('click','#submit', function (i) {
                    var ied=$('#isedit').val();
                    var oid=$('#oid').val();
var name =$('#o_name').val();
var cper=$('#c_per').val();
var email =$('#email').val();
var ccnt=$('#u_count').val();
var unm=$('#uname').val();
var pwd =$('#pword').val();
if((unm.length*pwd.length*name.length*cper.length)>0){

$.ajax({
                url: "router.php",
                type: 'post',
                dataType: "json",
                data: {

                    fx: 2,isedit:ied,oid:oid,name:name,cper:cper,email:email,cnt:ccnt,username:unm,password:pwd
                },
                success: function( data) {
                  
                 if(data=="1"){
                     if($('#isedit').val()=="1"){
                        swal({
      title: 'Yaay!',
      text: "Organization updated successfully!",
      type: 'success',
      padding: '2em'
    });
                     }else{
                    swal({
      title: 'Yaay!',
      text: "Organization created successfully!",
      type: 'success',
      padding: '2em'
    });
}
                    getorgs();
                    $('#isedit').val(0);
            $('#oid').val('0');
                    $('#o_name').val('');
$('#c_per').val('');
$('#email').val('');
$('#u_count').val('5');
$('#uname').val('');
$('#pword').val('');
$('#submit').text('Create');
$('#formhead').text('Create organization');
                   // window.location.href='dashboard.php';
                 }else  if(data=="2"){
                   // window.location.href='dashboard.php';
                   alert("Username alredy exists!");
                 }else{
                    alert("Organization creation failed!");
                 }
     
    
   
                }
            });
      
    }else{
        alert("Name,User count,Username and Password are mandatory");
    }
});

$('#login').on('click','#cancel', function (i) {
           
            $('#isedit').val(0);
            $('#oid').val('0');
            $('#o_name').val('');
            $('#c_per').val('');
$('#email').val('');
$('#u_count').val('5');
$('#uname').val('');
$('#pword').val('');
$('#submit').text('Create');
$('#formhead').text('Create organization');
         
        });
$('#dttable').on('click','.editbtn', function (i) {
            var table = $('#dttable').DataTable();
            var data = table.row( $(this).parents('tr') ).data();
            $('#isedit').val(1);
            $('#oid').val(data.organization_id);
            $('#o_name').val(data.organization_name);
            $('#c_per').val(data.contact_person);
$('#email').val(data.email_id);
$('#u_count').val(data.rl);
$('#uname').val(data.username);
$('#pword').val(data.password);
$('#submit').text('Update');//Create organization
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
            //         delete_customer: true,id:data.id                },
            //     success: function( data ) {
            //         getCustomets();
            //     },
            //     error: function (){

            //     }
            // });
        });


        $('#dttable').on('click','.deletebtn', function (i) {
            var table = $('#dttable').DataTable();
            var data = table.row( $(this).parents('tr') ).data();
       var oid=data.organization_id;
           
         
            if(!confirm("Do you want to delete this organization?")){
                return false;
            }
            $.ajax({
                url: "router.php",
                type: 'post',
                dataType: "json",
                data: {
                    fx: 4,oid:oid                },
                success: function( data ) {
                    if(data=="1"){
                    swal({
      title: 'Yaay!',
      text: "Organization deleted successfully!",
      type: 'success',
      padding: '2em'
    });
    getorgs();
}else{
    alert("Organazation deletion failed!");
}
                   
                },
                error: function (){

                }
            });
        });


        $("#u_count").TouchSpin({
    initval: 5
});
      
        $(document).ready(function() {
            App.init();
           
        });
        function getorgs(){
            $.ajax({
                url: "router.php",
                type: 'post',
                dataType: "json",
                data: {
                    fx: 3
                },
                success: function( data) {
                  
                    var table =  $('#dttable').DataTable({
                        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    
                    { extend: 'excel', className: 'btn' },
                  
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10 ,
                        destroy: true,
                        aaSorting: [[0, 'asc']],
                        data : data,
                        columns : [ 
						{
                            title : "Organization Name",
                            data : 'organization_name',
                            width: "25%" 
                        }, 
                        {
                            title : "Contact Person",
                            data : 'contact_person',
                            width: "25%" 
                        }, 
                        
                        {
                            title : "Email ID",
                            data : 'email_id',
                            width: "20%" 
                        },
                        {
                            title : "Allowed Users",
                            data : 'rl',
                            width: "10%" 
                        },
						{
							title : "Action",
                            data : 'organization_id', 
                            "render": function ( data, type, row ) {
                               
                                    return '    <div class="btn-group">'
                                                    +'<button type="button" id="editbtn" class="btn btn-dark btn-sm editbtn" attr="'+data+'">Edit</button>'
                                                    +'<button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">'
                                                    +'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>'
                                                    +'</button>'
                                                    +'<div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">'
                                                    +' <a class="dropdown-item deletebtn" id="deletebtn" attr="'+data+'">Delete</a>'
                                                     
                                                    +'</div>'
                                                    +' </div>';
                               
               
            } ,
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
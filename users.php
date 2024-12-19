<?php require("connect.php");?>
<?php $title="Users";?>
<?php require("header.php");?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include("content-header.php");?>

   <link href="assets/node_modules/datatables/jquery.dataTables.min.css" rel="stylesheet"/>
   <link rel="stylesheet" href="assets/bootstrap-toggle.min.css"/> 
   <link rel="stylesheet" href="dist/dist/css/bootstrapValidator.min.css"/>
   
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-left">
              <li class="active"><a href="#today-activity" data-toggle="tab">Team</a></li>
              <li><a href="#tear-tree-view" data-toggle="tab">Add User</a></li>
              
            </ul>
            
            <div class="tab-content no-padding">
              
              
              <!--Today Activity tab Start-->
              
              
              <div class="chart tab-pane active" id="today-activity" style="position: relative; min-height: 300px;">
               <!--table start-->  
                    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <!--  <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              
              <!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Products</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">
											<table id="userstable" class="table" data-paging="false" data-filtering="true" data-sorting="true">
												<thead>
												<tr>
                                                    <?php if($empemail=="vivek@vivans.co.in"||$empemail=="rohit@fricbergen.com"||$empemail=="admin@vivans.co.in"){ ?>
												    <th>Status</th>
												    <?php } ?>
													<th>Action</th>
													<th>Name</th>
													<th>EMP Id</th>
													<th>Email</th>
													<th>Contact</th>
													<th>Address</th>
                                                    <td>Designation</td>
                                                    <td>Role</td>
                                                    <th>Image</th>
												</tr>
												</thead>
												<tbody>
                                                    
												</tbody>
											</table>

									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
               <!--table close-->  
              </div>
              
              
              
              <!--TreeView tab Start-->
              <div class="chart tab-pane" id="tear-tree-view" style="position: relative; min-height: 300px;">
                
      <section class="content">
      <div class="row">
        <form id="productform" action="api/addproduct.php?insert" role="form" method="post" enctype="multipart/form-data">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
          <div class="box-body">
           <div class="row">
            <div class="col-md-4">
                <!-- form start -->
            
              
                <div class="form-group controls">
                  <label for="empname">Name : </label>
                  <input type="text" class="form-control" name="empname" id="empname" placeholder="Enter Name"  required="required"/>
                </div>
                <div class="form-group">
                  <label for="empcode">Employee Code (EMP0001)</label>
                  <input type="text" class="form-control" name="empcode" id="empcode"  placeholder="Employee Code" required/>
                </div>
                <div class="form-group">
                  <label for="empemail">Email </label>
                  <input type="email" class="form-control" name="empemail" id="empemail"  placeholder="Email Address" required/>
                </div>
                <div class="form-group">
                  <label for="empcontact">Contact </label>
                  <input type="" class="form-control" pattern="^\d{10}?$" data-dv-message="Enter Contact No in 10 digits" name="empcontact" id="empcontact" minlength="10" maxlength="10" placeholder="Contact No" required/>
                </div>
                <div class="form-group">
                  <label for="empaddress">Address </label>
				  <textarea class="form-control" name="empaddress" id="empaddress" placeholder="Address"></textarea>
                </div>
             </div> <!-- col 4 close--> 
             
             <div class="col-md-4">
               
                <div class="form-group">
                  <label for="empdesignation">Select Designation</label>
                  <select  class="form-control" name="empdesignation" id="empdesignation" required>
                   <option value="">Select Designation</option>
                    <?php $res=mysqli_query($con,"select * from designation"); while($row=mysqli_fetch_array($res)){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                    <?php }?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="empdesignation">Select Role</label>
                  <select  class="form-control" name="emprole" id="emprole" required>
                   <option value="">Select Role</option>
                    <?php $res=mysqli_query($con,"select * from roles"); while($row=mysqli_fetch_array($res)){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                    <?php }?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="empmanager">Select Manager</label>
                  <select class="form-control" name="empmanager" id="empmanager" required>
                   <option value="">Select Manager</option>
                    <?php $res=mysqli_query($con,"select id,empid,name from employees where usertype='1'"); while($row=mysqli_fetch_array($res)){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name']."(".$row['empid'].")";?></option>
                    <?php }?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="empmanager">Reports To: </label>
                  <select class="form-control" name="empreportto" id="empreportto" required>
                   <option value="">Select</option>
                    <?php $res=mysqli_query($con,"select id,empid,name from employees where designationid=(select id from designation where name='Manager')"); while($row=mysqli_fetch_array($res)){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name']."(".$row['empid'].")";?></option>
                    <?php }?>
                  </select>
                </div>
				
				<div class="form-group">
                <label>Date of Joining:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="empdoj" id="empdoj" autocomplete="off" required>
                </div>
                <!-- /.input group -->
              </div>
              
            </div>
            <!-- col 4 Mid -->
            
            <div class="col-md-4">
             
              <div class="form-group">
                  <label for="empsalary">Employee Salary : </label>
                  <input type="text" class="form-control" id="empsalary" placeholder="Employee Salary" value="0.0" pattern="^\d{0,8}(\.\d{0,2})?$" pattern-bv-message="Enter Correct value for Salary" name="empsalary" required/>
                </div>
                
                <div class="form-group">
                  <label for="prate">Comm Percent : </label>
                  <input type="text" class="form-control" id="empcomm" placeholder="EMP Comm" value="0.0" name="empcomm" pattern="^\d{0,8}(\.\d{0,2})?$" data-bv-message="Enter Correct value for Price" required />
                </div>
                
                <div class="form-group">
                  <label for="emppass">Password</label>
                  <input type="password" class="form-control" name="emppass" id="emppass"  placeholder="Password" required/>
                </div>
                <div class="form-group">
                  <label for="empcpass">Confirm Password</label>
                  <input type="password" class="form-control" name="empcpass" id="empcpass"  placeholder="Confirm Password" required/>
                </div>
                
                <div class="form-group">
                  <label for="pimage">Select Image</label>
                  <input type="file" id="empimage" name="empimage" required/>
                </div>
            </div>
          </div>
         </div>
              <!-- /.box-body -->
               
              <div class="box-footer">
                <div class="progress progress-striped active" id="progress" style="display:none;">
                   <div class="progress-bar progress-bar-success" style="width: 100%">
                   </div>
                </div>
                <button type="submit"  id="btnaddproduct" class="btn btn-primary pull-right "><span class="fa fa-plus-circle"></span> Submit</button>
              </div>
            
          </div>
          <!-- /.box -->
          </form>
        </div>
            </div>
            </section>    
              <!-- Section Form close-->
              </div>
            </div>

          </div>
          <!-- /.nav-tabs-custom -->

        
        </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


<?php include("footer.php");?>
<?php include("jsscript.php"); ?>

 
    <!-- start - This is for export functionality only -->
    <script src="assets/node_modules/datatables/jquery.dataTables.min.js"></script>
     
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script src="assets/bootstrap-toggle.min.js"></script>

<script>

	function loaddata()
	{
     $.ajax({
		  url:"api/adduser.php?show",
		  type:"POST",
		  contentType:"application/json; charset=utf-8",
		  success:function(data){
			   //alert(data);
			    data=JSON.parse(data);
	            $("#userstable").dataTable(
				{
				  dom: 'Bfrtip',	
				  sort:false,
				  data:data,
				  destroy:true,
				  paging:false,
				  processing: true,
				  language: {
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
				  
				  buttons: [
                'copy', { extend: 'csv', title: function () { var printTitle = 'All Visitis'; return printTitle; } }, 'excel', 'pdf', { extend: 'print', title: function () { var printTitle = ''; return printTitle; } }
                   ],
				  columns:[
					     <?php if($empemail=="vivek@vivans.co.in"||$empemail=="rohit@fricbergen.com"||$empemail=="admin@vivans.co.in"){ ?>
						  {
					       data:{id:'id',status:'status'},render:function(data,type,set){
						   if(data.status=="1")
						   {
						     return "<input type='hidden' value='"+data.id+"'/>"+"<input type='checkbox' data-toggle='toggle' class='status' data-size='mini' data-on='Active' data-off='Inactive' data-onstyle='success' data-offstyle='danger' checked='checked' value='"+data.status+"' />";
						   }
						   else
						   {
						     return "<input type='hidden' value='"+data.id+"'/>"+"<input type='checkbox' data-toggle='toggle' class='status' data-size='mini' data-on='Active' data-off='Inactive' data-onstyle='success' data-offstyle='danger'  value='"+data.status+"' />";
						   }
						  }},
						 <?php } ?>
					      {
							 data:'id',render:function(value){
						     return "<a href='edituser?editid="+value+"'><span class='fa fa-edit'></span></a> | <a href='newmap?userid="+value+"' target='_blank'><span class='fa fa-map-marker'></span></a>";
						  }},
						  {
							data:'name'
						},
						{data:'empid'},{data:'email'},{data:'contact'},{data:'address'},{data:'designation'},{data:'role'},{data:'image',render:function(value){
							return "<img src='imgusers/"+value+"' class='img img-thumbnail' style='width:100px; height:100px;'/>";
						}}
					  ]
				});	
				$(function() {
                  $('.status').bootstrapToggle();
               	  //$('.track').bootstrapToggle();
                 });	   
			  },
		  error:function(e){
			   alert(e.error);
			  }	  
		 });
   
	}

$(document).ready(function(){
   loaddata();
   $("#empdoj").datepicker({format:'yyyy-m-dd',autoclose:true});

   $('#userstable tbody').on( 'click','tr td', function (){
     
	 var ischecked=$(this).children('.toggle').children('.status').prop("checked"); 
	var id=$(this).children('input:hidden').val();
	 
		if(ischecked)
		{	
		  	  	//alert(id);
		         $.ajax({
		         url:"api/login.php?userstatus&status=0&id="+id,
		         type:"POST",
		         contentType:"application/json; charset=utf-8",
			     success: function(data){
			         		if(data=="success")
							{
								loaddata();
								
							}
			 		 },
				error:function(e){
					}	 
			 });
		}
		else{
		  $.ajax({
		         url:"api/login.php?userstatus&status=1&id="+id,
		         type:"POST",
		         contentType:"application/json; charset=utf-8",
			     success: function(data){
			         		if(data=="success")
							{
								loaddata();
								
							}
			 		 },
				error:function(e){
					}	 
			 });
		}
    });


});

</script>
<script src="dist/dist/js/bootstrapValidator.min.js"></script>
<script>
$(document).ready(function() {
    $('#productform')
        .bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                pname: {
                    message: 'The product name can\'t be empty',
                    validators: {
                        notEmpty: {
                            message: 'The product name is required and can\'t be empty'
                        }
                        
                        /*regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'The username can only consist of alphabetical, number, dot and underscore'
                        }*/
                    }
                },
                pshort: {
                    validators: {
                        notEmpty: {
                            message: 'The product short name can\'t empty'
                          }
                        }
                    },
			
			    emppass: {
                 validators: {
                     notEmpty: {
                             message: 'The password is required and can\'t be empty'
                               },
                      identical: {
                         message: 'The password and its confirm are not the same'
                         }
                       }
                    },
			  empcpass: {
                    validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                      },
                    identical: {
                        field: 'emppass',
                        message: 'The password and its confirm are not the same'
                      }
                    }
                  }
			
                }
        }) .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
			  sendData();
	          		
			
            // Get the form instance
          /*  var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');*/
        });
});



function sendData(){
       
	   //var form=$(this).parent("form");
	    //var form=$("#productform");
        var fd =new FormData();
		var progress=$("#progress");
    	//	$.each(files, function(key, value){
       //       fd.append(key, value);
       //  });
		
        var files = $('#empimage')[0].files[0];
		var empname = $('#empname').val();
		var empcode = $('#empcode').val();
		var empemail = $('#empemail').val();
		var empcontact = $('#empcontact').val();
		var empaddress = $('#empaddress').val();
		var empdesignation = $('#empdesignation').val();
		var emprole = $('#emprole').val();
		var empmanager = $('#empmanager').val();
		var empreportto = $('#empreportto').val();
		var empdoj = $('#empdoj').val();
		var empsalary = $('#empsalary').val();
		var empcomm = $('#empcomm').val();
		var emppass = $('#emppass').val();
        fd.append('empimage',files);
		fd.append('empname',empname);
		fd.append('empcode',empcode);
		fd.append('empemail',empemail);
		fd.append('empcontact',empcontact);
		fd.append('empaddress',empaddress);
		fd.append('empdesignation',empdesignation);
		fd.append('emprole',emprole);
		fd.append('empmanager',empmanager);
		fd.append('empreportto',empreportto);
		fd.append('empdoj',empdoj);
		fd.append('empsalary',empsalary);
		fd.append('empcomm',empcomm);
		fd.append('emppass',emppass);
        progress.fadeIn("slow");
        $.ajax({
            url: 'api/adduser.php?insert',
            type: 'post',
            data: fd,
            success: function(response){
				if(response=="empcode")
				{
				   alert("Employee Code Already Exist!");
				   return;
			    }
				if(response=="empemail")
				{
				   alert("Employee Email Address Already Exist!");
				   return;
			    }
				
				if(response=="empcontact")
				{
				   alert("Employee Contact No Already Exist!");
				   return;
			    }
				
                if(response =="success"){
                    alert("User Create Successfully...");
					progress.fadeOut("slow");
					$('#empimage')[0].files[0];
		            $('#empname').val('');
		            $('#empcode').val('');
		            $('#empemail').val('');
		            $('#empcontact').val('');
		            $('#empaddress').val('');
		            $('#empdesignation').val('');
		            $('#emprole').val('');
		            $('#empmanager').val('');
		            $('#empreportto').val('');
		            $('#empdoj').val('');
		            $('#empsalary').val('0.0');
		            $('#empcomm').val('0.0');
		            $('#emppass').val('');
					$('#empcpass').val('');
					
                }else{
					progress.fadeOut("slow");
                    alert(response);
                }
            },
			error: function(e){
				progress.fadeOut("slow");
				alert(e.error);
				},
				cache: false,
            contentType: false,
            processData: false
        });
    }


</script>
<?php require("connect.php");?>
<?php $title="Show Application Area"?>
<?php require("header.php");?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php include("content-header.php");?>
<link rel="stylesheet" href="assets/node_modules/datatables/jquery.dataTables.min.css"/>

<link rel="stylesheet" href="assets/bootstrap-toggle.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
  
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
              <li class="active"><a href="#today-activity" data-toggle="tab">Application Area</a></li>
              <li><a href="#tear-tree-view" data-toggle="tab">Add Area</a></li>
              
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
            /.box-header -->
            <div class="box-body table-responsive no-padding">
              
              <!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										
                                        
                                              <form>
                                               <div class="form-group-lg">
                                                 <div class="form-inline">
       
  <button type="button" id="deletearea" class="btn btn-danger"><span class="fa fa-remove"></span> Delete Selected Areas</button>
                                                 </div>
                                                 <div class="progress progress-striped active" id="progress" style="display:none;">
                                                  <div class="progress-bar progress-bar-success" style="width: 100%">
                                                  </div>
                                                 </div>
                                               </div>
                                             </form>
                                           
                                         
									</div>
                                    <div class="pull-left">
                                        <div class="form-inline">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <a href="templates/ImportArea.csv"  class="btn btn-info"><span class="fa fa-download"></span> Download CSV File</a>
                                        </div>
                                    </div>
                                    
                                   <div class="pull-right">										                                         
                                             
                                              <form action="api/areaapi.php?import" id="import" method="post" enctype="multipart/form-data" >
                                               <div class="form-group-sm">
                                                 <div class="form-inline controls">
                                                   <label>Choose CSV File</label>
                                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <input type="file" id="file1" class="form-control"  name="file1" required/>
                                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <button type="submit" id="importarea" class="btn btn-info"><span class="fa fa-upload"></span> Import Data</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                 </div>
                                                 
                                                 <div class="progress progress-striped active" id="progress2" style="display:none;">
                                                  <div class="progress-bar progress-bar-success" style="width: 100%">
                                                  </div>
                                                 </div>
                                               </div>
                                             </form>                                         
								      </div>
                                    
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
              
									<div class="panel-body">
										<div class="table-wrap">
											<table id="userstable" class="table" data-paging="true" data-filtering="true" data-processing="true" data-sorting="true">
												<thead>
												<tr>
                              <th>Select</th>
                              <th>Id</th>
                              <th>AreaName</th>
                              <th>Region</th>
                              <th>State</th>
                              <th>Country</th>

                              <th>KM</th>
                              <th>RegisterDate</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                                                    
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
              <h3 class="box-title">Add Area</h3>
            </div>
            
            <!-- /.box-header -->
          <div class="box-body">
           <div class="row">     
            <!-- form start -->                        
             <div class="col-md-4">               
                <div class="form-group">
                  <label for="state">State</label>
  
                  <select  class="form-control"  name="state" id="state" required>
                   <option value="">Select State</option>
                    <?php $res=mysqli_query($con,"select id,name from states"); while($row=mysqli_fetch_array($res)){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                    <?php }?>
                  </select>
                   
                </div> 
               
                <div class="form-group">
                  <label for="region">Region </label>
          
            
              <select class="form-control" name="region" id="region"   required>
                <option value="">Select Region </option>
    
               </select>
                </div>
                
                
             </div> <!-- col 4 close--> 
               <div class="col-md-4"> 
                   <div class="form-group">
                  <label for="city">City</label>
                  
                <select class="form-control"name="city" id="city"  required>
                <option value="">Select city </option>
        
               </select>
                  </div>
                      
                <div class="form-group controls">
                
                  <label for="area">Area Name : </label>
                  <input type="text" class="form-control" name="area" id="area" placeholder="Enter Area Name" required="required"/>
                </div>
                
      
               				
			  
            </div>
            <!-- col 4 Mid -->
            
            <div class="col-md-4">
                  
             <div class="form-group">
                  <label for="lat">Latitude:</label>
                  <input type="text" class="form-control pull-right" name="emplat" id="emplat" value="0.0000000000"/>
             </div>
             
            <div class="form-group">
                  <label for="lng" >Longitude:</label>
                  <input type="text" class="form-control pull-right" name="emplng" id="emplng" value="0.0000000000" />
                  <a href="#locationmodel" data-target="#locationmodel" data-toggle="modal">Set Location</a>
            </div>        
            </div>
            
          </div>
         </div>
              <!-- /.box-body -->
               
              <div class="box-footer">
                <div class="progress progress-striped active" id="progress1" style="display:none;">
                   <div class="progress-bar progress-bar-success" style="width: 100%">
                   </div>
                </div>
                <a href="showarea" class="btn btn-danger"><span class="fa fa-backward"></span> Back</a>
                <button type="submit"  id="btnaddproduct" class="btn btn-primary pull-right "><span class="fa fa-edit"></span> Add Area</button>
              </div>
            
          </div>
          <!-- /.box -->
         
        </div>
         </form>
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

 <script src="assets/node_modules/datatables/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <!-- end - This is for export functionality only -->


<script>
	function loaddata()
	{	 
          $.ajax({
		  url:"api/areaapi.php?show",
		  type:"POST",
		  contentType:"application/json; charset=utf-8",
		  success:function(data){
			    //alert(data);
			    data=JSON.parse(data);
	            $("#userstable").dataTable(
				{
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
				  dom: 'Bfrtip',	
				  sort:false,
				  
				  data:data,
				  destroy:true,
				  paging:false,
				  processing: true,
                  language: {
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
				  
				  buttons: [
                'copy', { extend: 'csv', title: function () { var printTitle = 'All Devices'; return printTitle; } }, 'excel', 'pdf', { extend: 'print', title: function () { var printTitle = ''; return printTitle; } }
            ],
				  columns:[{
					   data:'id',render:function(value){
						   
						  return "<input type='hidden' id='select' value='"+value+"' />";
						  }},{
					   data:'id',render:function(value){
						   
						  return "<a href='editarea?id="+value+"'><i class='fa fa-edit'></i></a>";
						  }},{data:'area'},{data:'region'},{data:'state'},{data:'country'},{data:'km'},{data:'registrationdate'},{data:'latitude'},{data:'longitude'}]
		});		   
			  },
		  error:function(e){
			   alert(e.error);
			  }	  
		 });
	}

$(document).ready(function(){
   loaddata();	  
   
    $('#deletearea').click(function(){
	     if(confirm('Do You want to delete Selected Area'))
		 {
			 var ids=Array();
			 var table=$("#userstable").DataTable();
		     var data = table.rows('.selected').data();      
         
		     if(data.length<=0)
		     {
			    alert("Please Select any Row in table");
			    return;
		     }
			 for(var i=0;i<data.length;i++)
			 {
				 ids.push(data[i].id);
			 }
			 var progress=$("#progressdel");
		     progress.fadeIn("slow");
		     $.ajax({
			   url:'api/areaapi?delete',
			   type:'post',
			   data:{'ids':ids},
			   success: function(data){
				     progress.fadeOut("slow");
					 alert(data);
					 
					 loaddata();
					 
				   },
			   error:function(e){}
			 });
		 
		 }
	   
	   });
	   
	   
	  $("#state").change(function(){
        var stateid= $(this).val();
      $.get("api/regionapi.php?cities",{s_id:stateid},function(data, status){
       var selectbox = $('#city');
       selectbox.empty();
         var list = '<option value="">Select city </option>';
        $.each(JSON.parse(data), function(key,value) { 
         list += "<option value='" +value.id+ "'>" +value.city+ "</option>";
         });
         
       selectbox.html(list);
   
     });
      });
      
      
      	   
	  $("#city").change(function(){
        var stateid= $(this).val();
      $.get("api/regionapi.php?regions",{s_id:stateid},function(data, status){
       var selectbox = $('#region');
       selectbox.empty();
         var list = '<option value="">Select Region </option>';
        $.each(JSON.parse(data), function(key,value) { 
         list += "<option value='" +value.id+ "'>" +value.name+ "</option>";
         });
         
       selectbox.html(list);
   
     });
      });
	   
	   
   
});

</script>
<script src="dist/dist/js/bootstrapValidator.min.js"></script>
<script>


$(document).ready(function() {
	
function sendData(){
        var fd = new FormData();
		var progress=$("#progress1");
		
		
		var area = $('#area').val();
		
		var region = $('#region').val();
		var state = $('#state').val();
		var country = $('#country').val();
		
		var lat = $('#emplat').val();
		var lng = $('#emplng').val();
       
		fd.append('area',area);
		fd.append('region',region);
		fd.append('state',state);
		fd.append('country',country);
		
		fd.append('lat',lat);
		fd.append('lng',lng);
		//fd.append('empdol',empdol);
           progress.fadeIn("slow");
        $.ajax({
            url: 'api/areaapi.php?add',
            type: 'post',
            data: fd,
            success: function(response){
				if(response=="empcode")
				{
				   alert("SS Code Already Exist!");
				   return;
			    }
				if(response=="empemail")
				{
				   alert("SS Email Address Already Exist!");
				   return;
			    }
				
				if(response=="empcontact")
				{
				   alert("SS Contact No Already Exist!");
				   return;
			    }
				
                if(response =="success"){
                    alert("Area Add Successfully...");
					progress.fadeOut("slow");
					
					
		            $('#area').val('');
		            
		            $('#region').val('');
		            $('#state').val('');
		            $('#country').val('');
		            $('#emplat').val('');
		            $('#emplng').val('');
		            
		            
					window.location="showarea";
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
	        
        });
		
		
	function importData(){
       
	    var fd = new FormData();
		var progress=$("#progress2");	
        var files = $('#file1')[0].files[0];		
		fd.append('file1',files);
           progress.fadeIn("slow");
        $.ajax({
            url: 'api/areaapi.php?import',
            type: 'post',
            data: fd,
            success: function(response){
				alert(response);
				if(response=="error-type")
				{
				   alert("Please import Xlsx files only");
				   return;
			    }
				if(response=="error")
				{
				   alert("Contact to Admin Intrernal error");
				   return;
			    }
								
                if(response =="success"){
                    alert("Areas Import Successfully...");
					progress.fadeOut("slow");
					$('#file1')[0].files[0];
		            
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
		
    $('#import')
        .bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                
			  file: {
                    validators: {
                    notEmpty: {
                        message: 'Please Select excel File '
                      },
                    file: {
                        extension: 'csv',
						type:'text/csv',
                        maxSize:1024*1024,						
                        message: 'The password and its confirm are not the same'
                      }
                    }
                  }
			
                }
        }) .on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();
			importData();
			// var $form = $(e.target);
                 
                    // Get the BootstrapValidator instance
                   // var bv = $form.data('bootstrapValidator');
                    //var progress=$("#progress2");
					//progress.fadeIn("slow");
                    // Use Ajax to submit form data
                    
                   /* $.post($form.attr('action'), $form.serialize(), function(result) {
						alert(result);
                        if (result == "success") {
                           loaddata();
						   progress.fadeOut("slow");
                        }
                        
                    }, 'json');*/
	        
        });
});

</script>


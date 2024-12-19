<?php
  session_start();
  /* if(!isset($_SESSION['tittu']))
  {
	   header("location:login?expire");
	   echo"<script>window.location='login?expire';</script>";
	   exit(0);
  }*/

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CART ROUTE | LockScreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <style>
     .lockscreen,.hold-transition
	 {
		 background:url(images/img1.jpg);
		 background-repeat:no-repeat;
		 background-size:cover;
		 background-position:center;
	 }
   </style>

</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <?php if(isset($_GET['expire'])){?>
    <div class="navbar alert alert-danger alert-dismissable">
      <a class="close" data-dismiss="alert" style="text-decoration:none;color:#000;">&times;</a>
      ! Session Expire Please Login Again
    </div>
  <?php }?>
  <?php if(isset($_GET['err'])){?>
    <div class="navbar alert alert-danger alert-dismissable">
      <a class="close" data-dismiss="alert" style="text-decoration:none;color:#000;">&times;</a>
      ! Invalid Login Please Login Again
    </div>
  <?php }?>
  <?php if(isset($_GET['logout'])){?>
    <div class="alert alert-success">
      <a class="close" data-dismiss="alert" style="text-decoration:none;color:#000;">&times;</a>
      User Logout Successfully...
    </div>
  <?php }?>
  <br/>
  <br/>
  <div class="lockscreen-logo"  >
    <a href="login" style="padding-left:0px"><b>Cart Route</b> LOGIN</a>
  </div>
  
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" id="loginform" action="login" method="post" style="margin-left:-2px;">
        <!-- User name -->
        <div class="lockscreen-name">User Email</div>

        <!-- START LOCK SCREEN ITEM -->
  
       <div class="lockscreen-item">
         <!-- lockscreen image -->
         <div class="lockscreen-image">
            <img src="dist/img/avatar5.png" alt="User Image">
         </div>
         <div class="input-group">
          <input type="email" style="padding-left:100px" class="form-control" placeholder="User Email" id="user" name="user" required="required"/>
         </div> 
      </div>
      
      <!-- User name -->
        <div class="lockscreen-name">Password</div>

        <!-- START LOCK SCREEN ITEM -->
  
       <div class="lockscreen-item">
         <!-- lockscreen image -->
         <div class="lockscreen-image">
            <img src="dist/img/lock.png" alt="User Image">
         </div>
         <div class="input-group">
          <input type="password" class="form-control" style="padding-left:100px" id="pass" name="pass" placeholder="password" required="required"/>
         </div> 
      </div>
      
      
       
         <div class="form-group-lg">
          <button type="submit" name="lgnbtn" class="btn-danger form-control ">  Login <i class="fa fa-arrow-right"></i>	</button>
       </div> 
      
      
       
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-<?php echo date('Y');?> <b><a href="http://www.tceinfosolution.com" class="text-black">TCE Infosolutions</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
   if(isset($_POST['lgnbtn']))
   {
	   require("connect.php");
	   require("api/log.php");
	   extract($_POST);
	   $obj=new Login($con,$user,$pass);
	   if($obj->login())
	   {
		   header("Location:index");
		   echo"<script> window.location='index'; </script>";
		   exit();
	   }
	   else
	   {
		   header("loaction:login?err");
		   echo"<script> window.location='login?err'; </script>";
		   exit();
	   }
   }

?>
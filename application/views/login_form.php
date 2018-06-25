<?php



if (isset($this->session->userdata['logged_in'])) {







// header("location: http://localhost/login/index.php/user_authentication/user_login_process");



  header("location: http://localhost/harshit/index.php/user_login_process");



}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Harshit | Log in</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?=base_url()?>plugins/iCheck/square/blue.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>



  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>



  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



  <![endif]-->
  <style type="text/css">
      .er_vld{
      color: red;
    }
    .message{
          position: absolute;
    border: 1px solid #ccc;
    padding: 11px;
    color: #ffffff;
    left: 23%;
    right: 23%;
    text-align: center;
    margin-top: 23px;
    }
  </style>
</head>
<body class="hold-transition login-page">
<?php



if (isset($logout_message) && $logout_message!='') {



echo "<div class='message'>";



echo $logout_message;



echo "<span style='    float: right;font-size: 14px;cursor:pointer' class='close_error' >x</span></div>";



}



?>
<?php



if (isset($message_display) && $message_display!='') {



echo "<div class='message'>";



echo $message_display;



echo "<span style='    float: right;font-size: 14px;cursor:pointer' class='close_error' >x</span></div>";



}
if (isset($error_message) && $error_message!='') {



echo "<div class='message'>";



echo $error_message;



echo "<span style='    float: right;font-size: 14px;cursor:pointer' class='close_error' >x</span></div>";



}


?>
<?php echo form_open('user_login_process'); ?>
<?php






//echo validation_errors();




$username=(isset($_COOKIE["username"]))?$_COOKIE["username"]:$this->input->post('username');
$password=(isset($_COOKIE["password"]))?$_COOKIE["password"]:$this->input->post('password');
//print_r(form_error());
?>

<div class="login-box">
<div class="row">
<div class="main-log" style="width: 37%;">
  <div class="login-logo"> <a href="#"><img src="<?=base_url()?>dist/img/sets-logo.png" class="" alt="User Image"></a> </div>
  <!-- /.login-logo -->
  <div class="right-log col-xs-6 col-sm-6 col-md-6" style="width: 100%;">
    <div class="login-box-body"> <?php echo form_open('user_login_process'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?=isset($username)?$username:''?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span> <span class="er_vld"><?=form_error('username')?></span></div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password"  name="password" id="password" value="<?=isset($password)?$password:''?>"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span> <span class="er_vld"><?=form_error('password')?></span></div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
            <input type="checkbox" name="remember" value="1">
            Remember Me </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"  name="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      <?php echo form_close(); ?>
      <!--    <div class="social-auth-links text-center">



            <p>- OR -</p>



            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using



            Facebook</a> <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using



            Google+</a> </div> -->
      <!-- /.social-auth-links -->
      <!--    <a href="#">I forgot my password</a><br> -->
    </div>
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>plugins/iCheck/icheck.min.js"></script>
<script>



  $(function () {

       jQuery(".close_error").click(function(){
           jQuery(".message").hide();
       });

    $('input').iCheck({



      checkboxClass: 'icheckbox_square-blue',



      radioClass: 'iradio_square-blue',



      increaseArea: '20%' // optional



    });



  });



</script>
</body>
</html>

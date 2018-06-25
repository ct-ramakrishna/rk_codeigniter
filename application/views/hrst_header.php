<style type="text/css">
  .er_vld p{
        height: 0px;
    color: red;    position: absolute;
  }
    .btn_add{
      margin-left: 17px;
    font-size: 18px;
    /* background: #000000; */
    height: 26px;
   /* border: 1px solid #337ab7;*/
    padding: 2px;
    text-decoration: none;
    margin-right: 5px;
    }
    .btn_add:hover{
      text-decoration: none;
    }
    .doc_types{
    width: 25%;
    float: left;
    margin-right: 5px;

    }
    .er_vld{
      color: red;
    }
    .box{
          padding: 12px;
    }
  </style>

<?php
if(!function_exists('getValid')){
function getValid($val){

    if($val!='' && $val!='0'){

      return $val;

    }else{

      return '';

    }

}  
}

if (isset($this->session->userdata['logged_in'])) {



$usrid = ($this->session->userdata['logged_in']['userid']);



$username = ucfirst(($this->session->userdata['logged_in']['username']));



$email = ($this->session->userdata['logged_in']['email']);

$dsc = $this->session->userdata['logged_in']['dsc'];
$tender = $this->session->userdata['logged_in']['tender'];




} else {



header("location: user_login_process");



}



?>
<header class="main-header">
  <!-- Logo -->
  
  <a href="<?php echo base_url() ?>index.php/dashboard" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><?php echo substr($username, 0,3)?></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><?php echo $username?></span> </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Tasks: style can be found in dropdown.less -->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?=base_url()?>dist/img/usr_icon.png" class="user-image" alt="User Image"> <span class="hidden-xs"><?php echo $username?></span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header"> <img src="<?=base_url()?>dist/img/usr_icon.png" class="img-circle" alt="User Image">
              <p><?php echo $username?><small>2018</small> </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <!--   <div class="row">

                  <div class="col-xs-4 text-center"> <a href="#">My Profile</a> </div>

                  <div class="col-xs-4 text-center"> <a href="#">Account Setting</a> </div>

                  <div class="col-xs-4 text-center"> <a href="#">Change Password</a> </div>

                </div> -->
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left"> <a href="<?=base_url()?>index.php/pages/update_user/1" class="btn btn-default btn-flat">Profile</a> </div>
              <div class="pull-right"> <a href="<?php echo base_url() ?>index.php/logout" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image"> <img src="<?=base_url()?>dist/img/usr_icon.png" class="img-circle" alt="User Image"> </div>
        <div class="pull-left info">
          <p><?php echo $username?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>Communications</a> </div>
      </div>
      <!-- search form -->
      <!--   <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

          <span class="input-group-btn">

          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>

          </span> </div>

      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php

$active_lnks=[];

switch ($nav_title) {

  case 'Dashboard':

     $active_lnks['a']='active';

    break;

  case 'Customer':

     $active_lnks['b']='active';

    break;



    case 'Customer details':

     $active_lnks['c']='active';

    break;

  case 'Customer Job':

     $active_lnks['d']='active';

    break;

    case 'Customer Job Assign':

     $active_lnks['e']='active';

    break;

    case 'My Jobs':

     $active_lnks['f']='active';

    break;
       case 'Member Registration':

     $active_lnks['g']='active';

    break;
     case 'Members':

     $active_lnks['h']='active';

    break;

  default:

    # code...

    break;

}



      ?>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php  echo isset($active_lnks['a'])?$active_lnks['a']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/dashboard"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
       
        <li class="<?php  echo isset($active_lnks['b'])?$active_lnks['b']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/application_form"> <i class="fa fa-plus-circle icon-sidebar"></i> <span>Customer</span> </a> </li>
        
         <li class="<?php  echo isset($active_lnks['c'])?$active_lnks['c']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/registration_dtails" > <i class="fa fa-table icon-sidebar"></i> <span>Customer Details</span> </a> </li>
      <?php if($this->session->userdata['logged_in']['job_assign']==1 || $usrid==1){?>
<li class="<?php  echo isset($active_lnks['e'])?$active_lnks['e']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/job_assign"> <i class="fa fa-plus-circle icon-sidebar"></i> <span>Customer Job Assign</span> </a> </li>
<?php }?>
      <?php if($this->session->userdata['logged_in']['customer_account']==1 || $usrid==1){?>
<li class="<?php  echo isset($active_lnks['d'])?$active_lnks['d']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/application_form_tend"> <i class="fa fa-plus-circle icon-sidebar"></i> <span>Customer Job</span> </a> </li>
<?php }?>
       <li class="<?php  echo isset($active_lnks['f'])?$active_lnks['f']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/my_jobs"> <i class="fa fa-table icon-sidebar"></i> <span>My Jobs</span> </a> </li>
     <?php
if($this->session->userdata['logged_in']['member_register']==1 || $usrid==1){
      ?>
        <li class="<?php  echo isset($active_lnks['g'])?$active_lnks['g']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/user_registration"><i class="fa fa-users icon-sidebar"></i><span>Member Register</span></a></li>
        <?php }?>
        <li class="<?php  echo isset($active_lnks['h'])?$active_lnks['h']:''?> treeview"> <a href="<?php echo base_url() ?>index.php/users_show"><i class="fa fa-users icon-sidebar"></i><span>Members</span></a></li>

        <!-- <li class="">

          <a href="#"><i class="fa fa-map-marker icon-sidebar"></i><span>Google Map</span></a> 

        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?=isset($nav_title)?$nav_title:''?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">
        <?=isset($nav_title)?$nav_title:''?>
      </li>
    </ol>
  </section>



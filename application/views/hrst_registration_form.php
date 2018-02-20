<?php $this->load->view('hrst_common_header');

function getFormerror($erval){

  return str_replace('_',' ',form_error($erval));

}

?>
<style type="text/css">

    .btn_form{

     

    margin-right: 26px;

    margin-top: -7%;

    background: #0079c0;

    padding: 7px;

    color: #ffffff;

    }

   .frm_er{

    position: absolute;

    color: red;

   }

  </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('hrst_header');?>
  <!-- Content Wrapper. Contains page content -->
  <!-- Main content -->
  <section class="content">
    <?php



// $obj =& get_instance();

$dtls='';

$j=1;

function getValid($val){

    if($val!='' && $val!='0'){

      return $val;

    }else{

      return '';

    }

}


   if (isset($message_display) || isset($error_message)) {   ?>
    <div class="alert alert-war

      ning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>
      <?php

echo $message_display;

echo $error_message;



?>
      </strong> </div>
    <?php }?>
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="box box-primary">
      <!-- /.box-header -->
      <!-- form start -->
      <div >
        <?php





      $dtails=isset($result)?$result[0]:(isset($post_data)?(object)$post_data:'');
// print_r($dtails);
   

  

 echo form_open('pages/user_registration'); ?>
        <div class="left-reg col-xs-12 col-sm-10 col-md-10">
          <div class="require-doc">
            <!-- start-->
            <div class="form-group has-feedback">
              <label class="col-xs-12 col-sm-5 col-md-5 control-label">User Name</label>
              <div class="col-xs-12 col-sm-5 col-md-5">
                <?php 



                  $data = array(

'name' => 'user_id',

'type'=>'hidden',

'value'=> (isset($dtails->id)?$dtails->id:'')

);

                  echo form_input($data); 



$data = array(

'name' => 'user_name',

'class'=>'form-control',

'placeholder'=>'Username',

'value'=> (isset($dtails->user_name)?$dtails->user_name:'')

);

                  echo form_input($data);  ?>
                <span class='frm_er'>
                <?=getFormerror('user_name')?>
                </span><span class="glyphicon  form-control-feedback"><i class="fa fa-user" aria-hidden="true"></i></span></div>
            </div>
            <!-- start-->
            <!-- start-->
            <div class="form-group has-feedback">
              <label class="col-xs-12 col-sm-5 col-md-5 control-label">E-Mail</label>
              <div class="col-xs-12 col-sm-5 col-md-5">
                <?php 

$data = array(

'type'=>'email',

'name' => 'user_email',

'class'=>'form-control',

'placeholder'=>'Email',

'value'=> (isset($dtails->user_email)?$dtails->user_email:'')

);

                  echo form_input($data); ?>
                <span class='frm_er'>
                <?=getFormerror('user_email')?>
                </span> <span class="glyphicon glyphicon-envelope form-control-feedback"></span></div>
            </div>
                        <!-- start-->
            <div class="form-group has-feedback">
              <label class="col-xs-12 col-sm-5 col-md-5 control-label">Password</label>
              <div class="col-xs-12 col-sm-5 col-md-5">
                <?php 

$data = array(

'type'=>'password',

'name' => 'user_password',

'class'=>'form-control',

'placeholder'=>'Password',

'value'=> (isset($dtails->user_password)?$dtails->user_password:'')

);

                  echo form_input($data);

                   ?>
                <span class='frm_er'>
                <?=getFormerror('user_password')?>
                </span>
                 <span class="glyphicon glyphicon-lock form-control-feedback"></span> </div>
            </div>

          
            <!-- start-->

                <?php
   $ds=$trading='';
         if(isset($dtails->user_rights)){

        

              foreach((array)explode("#", $dtails->user_rights) as $value){

                       if($value==1){

                        $ds="checked";

                       }

                       if($value==2){

                        $trading="checked";

                      }

              }

         }

                  ?>
               
            <!-- start-->
            <!-- start-->
            <div class="form-group has-feedback">
              <label class="col-xs-12 col-sm-5 col-md-5 control-label dis-none">&nbsp;</label>
              <div class="col-xs-12 col-sm-5 col-md-5">
                <div class="row">
                  <div class="col-xs-8">
                    <div class="checkbox icheck">
                      <label>
                      <input type="checkbox" name="user_rights[]" value=1 <?=$ds?>>
                      DS </label>
                      <label>
                      <input type="checkbox" name="user_rights[]" value=2 <?=$trading?>>
                      Trading </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-4">
                    <?php 

$data = array(

'type'=>'submit',

'name' => 'submit',

'class'=>'btn btn-primary btn-block btn-flat',

'placeholder'=>'Password',

'value'=>'Sign Up'

);

                  echo form_input($data);?>
                  </div>
                  <!-- /.col -->
                </div>
              </div>
            </div>
            <!-- start-->
          </div>
        </div>
        <div class="form-group has-feedback"> </div>
        <div class="form-group has-feedback"> </div>
        <div class="form-group has-feedback"> </div>
        <?php echo form_close(); ?> </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('hrst_footer')?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->

</body>

</html>
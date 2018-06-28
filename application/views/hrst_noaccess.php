<?php 

$this->load->view('hrst_common_header');

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
  <section class="content">

    <?php   if (isset($error_message)) {?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>
      <?php 
          echo $error_message;

            ?>
      </strong> </div>
    <?php }?>
  </section>
  
  <!-- Content Wrapper. Contains page content -->
  <!-- Main content -->
 
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('hrst_footer')?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->

</body>

</html>
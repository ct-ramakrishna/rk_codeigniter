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

          if (isset($error_message)) {?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>
      <?php 

echo $error_message;

            ?>
      </strong> </div>
    <?php }?>
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="box box-primary">
      <section class="content dash-bord">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>D.S.C</h3>
              </div>
              <div class="icon"><i class="fa fa-cube" aria-hidden="true"></i></div>
              <a href="<?=base_url('index.php/registration_dtails/1')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
          <div class="col-xs-12 col-sm-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>TENDERS</h3>
              </div>
              <div class="icon"><i class="fa fa-file-text" aria-hidden="true"></i></div>
              <a href="<?=base_url('index.php/registration_dtails/2')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
          <div class="col-xs-12 col-sm-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>SEARCH</h3>
              </div>
              <div class="icon"> <i class="fa fa-search" aria-hidden="true"></i></div>
              <a href="<?=base_url('index.php/registration_dtails/search')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
          <div class="col-xs-12 col-sm-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>MAINTENANCE</h3>
              </div>
              <div class="icon"><i class="fa fa-users icon-sidebar"></i></div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
		   <!-- ./col -->
          <div class="col-xs-12 col-sm-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
                <h3>FETCH</h3>
              </div>
              <div class="icon"><i class="fa fa-copy" aria-hidden="true"></i></div>
              <a href="<?=base_url('index.php/registration_dtails')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
		   <!-- ./col -->
          <div class="col-xs-12 col-sm-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>ACCOUNTS</h3>
              </div>
              <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
              <a href="<?=base_url('index.php/application_form_tend')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
		   <!-- ./col -->
          <div class="col-xs-12 col-sm-4 col-md-4">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3>REPORTS</h3>
              </div>
              <div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
        </div>
      </section>
      <!-- /.box-header -->
      <!-- form start -->
      <!-- /.content -->
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('hrst_footer')?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
</body>
</html>

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
// $obj->data['flds']=['user_name','id','user_email','user_rights','added','ip','updated','amount','paid_amount','due_amount'];
// $obj->data['table']='user_login';
foreach ($result as $row) {



  

   
    $dtls.="<td>".getValid($row->id)."</td>";
    $dtls.="<td>".getValid($row->user_name)."</td>";
    $dtls.="<td>".getValid($row->user_email)."</td><td>".($row->tender?'Tender,':'').($row->dsc?'DS,':'').($row->member_register?'Member Register':'')."</td>";
   
     $dtls.="<td>".getValid((int)$row->added?$row->added:'')."</td>";
$dtls.="<td>".getValid((int)$row->updated?$row->updated:'')."</td>";
    $dtls.="<td><a href='".site_url('pages/update_user')."/".$row->id."'>Update</a></td></tr>";
}
   if (isset($message_display)) {   ?>
    
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>
          <?php



echo $message_display;

?>
            
          </strong> 

        </div>
          <?php }
            if (isset($error_message)) {   ?>
    
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>
          <?php



echo $error_message;

?>
            
          </strong> 

        </div>
          <?php }?>
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->

      <div class="box box-primary">
     
           <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>Id</th>
          <th>User name</th>
          <th>Email</th>
          <th>Rights</th>
         
          <th>Date</th>
          <th>Updated</th>
          <th>Action</th>
        </tr>
         <?=$dtls?>
      </table>
        <!-- /.box-header -->
        <!-- form start -->

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

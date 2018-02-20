<?php $this->load->view('hrst_common_header');

// function getFormerror($erval){

//   return str_replace('_',' ',form_error($erval));

// }



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

echo isset($error_message)?$error_message:'';


            ?>
      </strong> </div>
    <?php }
     if (isset($message_display)) {?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>
      <?php 
echo isset($message_display)?$message_display:'';

            ?>
      </strong> </div>
    <?php }?>
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="box box-primary">
      <!-- /.box-header -->
      <!-- form start -->
      <?php

    

// $obj =& get_instance();

// $dtls='';

// $j=1;

function getValid($val){

    if($val!='' && $val!='0'){

      return $val;

    }else{

      return '';

    }

}


// $obj->data['flds']=['customer_id','name','state','city','mobile','added','form_type','id','updated'];

// $obj->data['table']='subscription_forms';
// $obj->data['w_clse']['form_type']=$obj->uri->segment(2);

// $results=isset($result)?$result:$obj->getReqdtails();
$j=1;$dtls='';
foreach ((array)$result as $row) {

if($row){

    $dtls.="<tr><td>".$j++."</td>

    <td>".(getValid($row->dsc)==1?'DSC':(getValid($row->tender)==1?'Tender':''))."</td>";

    $dtls.="<td>".getValid($row->customer_id)."</td>";

    $dtls.="<td>".getValid($row->name)."</td>";

    $dtls.="<td>".getValid($row->state)."</td>";

    $dtls.="<td>".getValid($row->city)."</td>";

    $dtls.="<td>".getValid($row->mobile)."</td>";

    $dtls.="<td>".((int)$row->added?getValid($row->added):'')."</td>";

    $dtls.="<td>".((int)$row->updated?getValid($row->updated):'')."</td>";

    $dtls.="<td><a href='".site_url('pages/update_reg')."/".$row->id."'>Update</a></td></tr>";
}


}

if($this->uri->segment(2)=='search' || $this->uri->segment(2)=='getSearchReg'){
  
   echo form_open_multipart('pages/getSearchReg'); ?>
     <div class="form_group" style="
    margin: 12px;
">
      <input type="" name="search_key" placeholder="Customer Id/Name" value="<?=$this->input->post('search_key');?>" class="form-control" style="
    float: left;
    width: 23%;
    margin-right: 29px;
">
      <input type="submit" name="Submit" value="Search"  class="btn btn-primary btn-block btn-flat" style="
    width: 14%;
" />  
     </div>
     
      <?php echo form_close(); 
  
}
      //echo $links;
     ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>S.No</th>
          <th>Form Type</th>
          <th>Customer Id</th>
          <th>Name</th>
          <th>State</th>
          <th>City</th>
          <th>Mobile</th>
          <th>Date</th>
          <th>Updated</th>
          <th>Action</th>
        </tr>
        <tbody>
        <?=($dtls)?$dtls:'Oops!No Records Found.'?>  
        </tbody>
        

      </table>
</div>
    
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
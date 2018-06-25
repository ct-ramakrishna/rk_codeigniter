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
   .current{
    background-color: #eee !important;
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



// $obj->data['flds']=['customer_id','name','state','city','mobile','added','form_type','id','updated'];

// $obj->data['table']='subscription_forms';
// $obj->data['w_clse']['form_type']=$obj->uri->segment(2);

// $results=isset($result)?$result:$obj->getReqdtails();
$j=1;$dtls='';
$result=isset($result)?$result:[];
foreach ((array)$result as $row) {

if($row){

    $dtls.="<tr><td>".$j++."</td>

    <td>".(getValid($row->dsc)==1?'DSC':(getValid($row->tender)==1?'Tender':''))."</td>";

    $dtls.="<td>".getValid($row->customer_id)."</td>";

    $dtls.="<td>".getValid($row->name)."</td>";

    // $dtls.="<td>".getValid($row->state)."</td>";

    $dtls.="<td>".getValid($row->city)."</td>";

    $dtls.="<td>".getValid($row->mobile)."</td>";
     $dtls.="<td>".(getValid($row->renewal)?'Yes':'No')."</td>";

    $dtls.="<td>".((int)$row->added?getValid($row->added):'')."</td>";

   // $dtls.="<td>".((int)$row->updated?getValid($row->updated):'')."</td>";

    $dtls.="<td><a href='javascript:void(0);' onclick='getView(".$row->id.")'>View</a>&nbsp;<a href='".site_url('pages/update_reg')."/".$row->id."'>Update</a></td></tr>";
}


}

// if($this->uri->segment(2)=='search' || $this->uri->segment(2)=='getSearchReg'){}


  
   echo form_open_multipart('pages/getSearchReg'); ?>
     <div class="form_group" style="
    margin: 12px;
">
      <input type="" name="search_key" placeholder="Customer Id/Name/City" value="<?=$this->input->post('search_key');?>" class="form-control" style="
    float: left;
    width: 23%;
    margin-right: 29px;
">
      <input type="submit" name="Submit" value="Search"  class="btn btn-primary btn-block btn-flat" style="
    width: 14%;
" />  
     </div>
     
      <?php echo form_close(); 
  

      //echo $links;
?>
<div id="pagination" style="text-align: right;">
<ul class="pagination pagination-sm" style="    margin-top: 4px;
    margin-bottom: 2px;">
<?php
$links=isset($links)?$links:[];
 foreach ((array)$links as $link) {
echo "<li>". $link."</li>";
} 
     ?>
   </ul>
 </div>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>S.No</th>
          <th>Form Type</th>
          <th>Customer Id</th>
          <th>Name</th>
       <!--    <th>State</th> -->
          <th>City</th>
          <th>Mobile</th>
          <th>Renewal</th>
          <th>Date</th>
       <!--    <th>Updated</th> -->
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
<script type="text/javascript">
  function getView(id){
       $.ajax({
        // Your server script to process the upload
        url:"<?php echo base_url(); ?>" + "index.php/pages/getCustomer_1",
        type: 'POST',
        data:  {'id':id},
        cache: false,
        success:function(data){
         // console.log(data);
         data=JSON.parse(data);
          var tr='';
          jQuery.each(data['view'],function(k,v){

                tr+="<tr><td>"+k+"</td><td>"+v+"</td></tr>";    
          })
          console.log(tr);
          jQuery("#view_customer").text("");
          jQuery("#view_customer").append(tr);
          modal.style.display = "block";
               
          }
       });   
  }
</script>

<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <table id="view_customer" class="table">
    
    </table>
  </div>

</div>
<style type="text/css">
  /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 37%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
<script type="text/javascript">
  // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>
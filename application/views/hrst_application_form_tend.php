<?php $this->load->view('hrst_common_header');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper ">
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


      echo form_open_multipart('pages/new_application','id="form_app"'); 

    

       ?>
      
      <div class="left-reg col-xs-12 col-sm-8 col-md-8"> 
  
        <!-- start-->
        <div class="form-group has-feedback">
<<<<<<< HEAD
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Customer Id...</label>
=======
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Customer Id</label>
>>>>>>> 37d938a4cce3891b6cc6ecb9a28911c3b455d431
          <div class="col-xs-12 col-sm-5 col-md-5">
             <select  class="form-control" name="customer_id" onchange="getCustomer(this.value)" style="    margin-bottom: 9px;">
              <option value="">--select option--</option>
              <?php
                  foreach ($customer_ids as $k => $v) {
                                  echo '<option value='.$v.'>'.$v.'</option>';  
                  }
              ?>

            </select>
            <span class="er_vld" id="er_customer_id">
            </span> 
          </div>


   <div>
    
    <table class="table table-striped table-bordered table-hover table-condensed" id='customer_dtails' style="    margin-left: 15px;">
     
    </table>
   </div>
        </div>
         <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Name Of The Department</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="department_name"/>
            <span class="er_vld" id="er_department_name">
            </span> 
          </div>

        </div>
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Divisions</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="divisions" />
            <span class="er_vld" id="er_divisions">
            </span> 
          </div>
        </div>
        <!-- start-->
        <div class="digi" style="padding-left:12px;">
          <h3>Work Details:</h3>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Work Name</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="work_name" />
            <span class="er_vld" id="er_work_name">
            </span> 
          </div>
        </div>
        <!-- start-->
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Estimated Value</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="estimated_val" />
            <span class="er_vld" id="er_estimated_val">
            </span> 
          </div>
        </div>
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Closing Date</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input type="text" class="form-control pull-right" id="dt_pkr_closing" name="closing_date">
             
            </div>
             <span class="er_vld" id="er_closing_date">
            </span> 
          </div>
        </div>
        <!-- start-->
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Payment Mode</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <select  class="form-control" name="payment_mode">
              <option value="">--select option--</option>
            <option value="Out self" >Our Self</option>
            <option value="Client" >Client</option>
            </select>
            <span class="er_vld" id="er_payment_mode">
            </span> 
          </div>
        </div>
        <!-- start-->
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">EMD Fees</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" placeholder="Customer Id" name="emd_customer_id" />
             <span class="er_vld" id="er_emd_customer_id"></span>
            <br/>
            <input type="text" class="form-control" placeholder="Amount" name="emd_amount" />
            <span class="er_vld" id="er_emd_amount">
            </span> 
            <br/>
            <select class="form-control" name="emd_card">
              <option value="">--select option--</option>
            <option value="Card" <?('emd_card')=='Card'?'selected':''?>>Card</option>
            <option value="Online" <?('emd_card')=='Online'?'selected':''?>>Online</option>
            <option value="Cash" <?('emd_card')=='Cash'?'selected':''?>> Cash</option>
            </select>
             <span class="er_vld" id="er_emd_amount"></span>
            </span> 
          </div>
        </div>
        <!-- start-->
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Processing Charges</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" placeholder="Customer Id" name="process_customer_id" />
             <span class="er_vld" id="er_process_customer_id"></span>
            <br/>
            <input type="text" class="form-control" placeholder="Amount" name="process_amount" />
            <span class="er_vld" id="er_process_amount">
            </span> 
            <br/>
            <select  class="form-control" name="process_card" >
              <option value="">--select option--</option>
             <option value="Card" >Card</option>
            <option value="Online" >Online</option>
            <option value="Cash" > Cash</option>
            </select>
             <span class="er_vld" id="er_process_card">
            </span> 
          </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Transaction Charges</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" placeholder="Transaction Id" name="trans_customer_id" />
             <span class="er_vld" id="er_trans_customer_id"></span>
            <br/>
            <input type="text" class="form-control" placeholder="Amount" name="trans_amount" />
            <span class="er_vld" id="er_trans_amount">
            </span> 
            <br/>
            <select class="form-control" name="trans_card">
              <option value="">--select option--</option>
              <option value="Card" >Card</option>
            <option value="Online" >Online</option>
            <option value="Cash" > Cash</option>
            </select>
             <span class="er_vld" id="er_trans_card">
            </span> 
          </div>
        </div>
  
        <!-- start-->
            <div class="form-group has-feedback">
              <div class="col-xs-12 col-sm-5 col-md-5">
            
                <div class="inp-sub">
                  <input class="btn btn-primary btn-block btn-flat" type="button" value="Submit" onclick="return validateDocs()" />
                  <input type="hidden" name="act" value="update" />
                  <input type="hidden" name="form_id"  value="">
                  <input type="hidden" name="customer_account" value="1" />
                </div>
              </div>
            </div>
  <?php echo form_close(); ?>
      <div>
  
<?php

$obj =& get_instance();

$avail_docs='';

$j=1;

function getValid($val){

    if($val!='' && $val!='0'){

      return $val;

    }else{

      return '';

    }

}

      ?>
 
         </div>
          </div>
        </div>
      </div>  </section>

     </div>
    <!-- /.row (main row) -->
  <!-- /.content -->
<!-- /.content-wrapper -->
<?php $this->load->view('hrst_footer')?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
</body>

<!-- iCheck -->
<script src="<?=base_url()?>plugins/iCheck/icheck.min.js"></script>
<script>
 
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional,
    });
  });
</script>
</body>
</html>
<!-- Bootstrap 3.3.6 -->

<!-- Select2 -->
<script src="<?=base_url()?>plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url()?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url()?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url()?>plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url()?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<!-- iCheck 1.0.1 -->
<script src="<?=base_url()?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#dt_pkr_dob').datepicker({
      autoclose: true
    });
     $('#dt_pkr_closing').datepicker({
      autoclose: true
    });
      
    $('.form_type').on('ifChecked', function(event){
      
        if(jQuery(this).val()==1){

        window.location.href='application_form';
       }else if(jQuery(this).val()==2){
        window.location.href='application_form_trade';
       }
    });
    
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<!--inputupload code-->
<link rel="stylesheet" href="<?=base_url()?>dist/css/jquery.inputfile.css">
<!--<link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
--><link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="<?=base_url()?>dist/js/jquery.inputfile.js"></script>
<script>
    $('input[type="file"]').inputfile({
        uploadText: '<span class="glyphicon glyphicon-upload"></span> Select a file',
        removeText: '<span class="glyphicon glyphicon-trash"></span>',
        restoreText: '<span class="glyphicon glyphicon-remove"></span>',
        
        uploadButtonClass: 'btn btn-primary',
        removeButtonClass: 'btn btn-default'
    });

    </script>
      <script type="text/javascript">

        var class_signs={1:'1.1 RCAI Class 2 for Individual - Signing 2 Years Validity',
2:'1.2 RCAI Class 2 for Individual with Organisation Name - Signing 2 Years Validity',
3:'2.1 RCAI Class 3 for Individual - Signing 1 Year Validity',
4:'2.2 RCAI Class 3 for Individual Signing 2 Years Validity',
5:'2.3 RCAI Class 3 for Individual With Organisation Name - Signing 1 Year Validity',
6:'2.4 RCAI Class 3 for Individual with Organisation Name - Signing 2 Years Validity'};
var class_encrypt={1:'1.3 RCAI Class 2 for Individual - Encryption 2 Years Validity',
2:'1.4 RCAI Class 2 for Individual With Organisation Name - Encryption 2 Year Validity',
3:'2.5 RCAI Class 3 for Individual Encryption 2 Years Validity',
4:'2.6 RCAI Class 3 for Individual Encryption 2 Years Validity',
5:'2.7 RCAI Class 3 for Individual With Organisation Name - Encryption 1 Year Validity',
6:'2.8 RCAI Class 3 for Individual with Organisation Name - Encryption 2 Years Validity'};
console.log(class_signs);
console.log(class_signs[1]);


  function getCustomer(id){
    console.log(id);
       $.ajax({
        // Your server script to process the upload
        url:"<?php echo base_url(); ?>" + "index.php/pages/getCustomer",
        type: 'post',
        data:  {'id':id},
         enctype: 'multipart/form-data',
          // Important!
        cache: false,
        success:function(data){
          data=JSON.parse(data);

          //console.log(data);
           jQuery.each(data['view'],function(k,v){

             if(k=='class_sign'){
              k='Class Of Signification Signing';
                v=class_signs[v];
             }else 
             if(k=='class_encypt'){
              k='Class Of Signification Encription';
                v=class_encrypt[v];
             }
             k=k.replace("_", " ");

                  jQuery("#customer_dtails").append("<tr><td>"+k+"</td><td>"+v+"</td></tr>");
           });
           jQuery.each(data['update'],function(k,v){
            if(k=='closing_date'){
                var dateAr = v.split('-');
                var v = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
            }
             if(k=='payment_mode' || k=='emd_card' || k=='process_card' || k=='trans_card'){
jQuery("select[name="+k+"]").val(v);
             }
            jQuery("input[name="+k+"]").val(v);
           });

        }
 });
     }

 function validateDocs(){
  var err=0;

  var formdata=new FormData(jQuery('#form_app')[0]);
   
      $.ajax({
        // Your server script to process the upload
        url:"<?php echo base_url(); ?>" + "index.php/pages/getvalidate",
        type: 'POST',
        data:  formdata,
         enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        success:function(data){
          //console.log(data);
         // eturn false;
          jQuery(".er_vld").text("");
          data=JSON.parse(data);
           //return false;
          if(data['err']!=0){
           jQuery.each(data,function(k,v){
                  jQuery('#er_'+k).html(v);
             });
             var errs=1;
             return false;
          }else{
             jQuery("#form_app").submit();
          }
          
        }
});
     
 }

 </script>

       
    
<!--inputupload code-->
</html>
<?php $this->load->view('hrst_common_header');?>
<style type="text/css">
  #customer_jobs a{
      cursor: pointer;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper ">
  <?php $this->load->view('hrst_header');?>
  <div class="" id='ajx_msg_blk' style="display: none;">
      <button type="button" class="close" id="ajx_msg_blk_close" aria-hidden="true">×</button>
      <strong id="ajx_msg">
      </strong>
    </div>


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
 // print_r($customer_ids);exit;

      echo form_open_multipart('pages/customer_jobs','id="form_app"'); 

    

       ?>
      
      <div class="left-reg col-xs-12 col-sm-8 col-md-8"> 
  
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Customer Id</label>
          <div class="col-xs-12 col-sm-5 col-md-5" style="margin-bottom: 21px;">
             <select  class="form-control" name="customer_id" onchange="getCustomer(this.value)" >
              <option value="">--select option--</option>
              <?php

                  foreach ($customer_ids as $k => $v) {
                                  echo '<option value='.$v->customer_id.'>'.$v->customer_id.'</option>';  
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
         <div class="form-group has-feedback" id="start_from">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Tender Id</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="tender_id"/>
            <span class="er_vld" id="er_tender_id">
            </span> 
          </div>

        </div>
         <div class="form-group has-feedback" id="start_from">
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
            <select  class="form-control" name="payment_mode" onchange="getFee(this.value)">
              <option value="">--select option--</option>
            <option value="Our self" >Our Self</option>
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
           
            <input type="text" class="form-control" placeholder="Amount" name="emd_amount" /> 
            <input type="file" name="emd_doc" />
            <span id="emd_doc"></span>
            <span class="er_vld" id="er_emd_amount">
            </span> 
            <br/>
            <select class="form-control" name="emd_card">
              <option value="">--select option--</option>
            <option value="Card" <?('emd_card')=='Card'?'selected':''?>>Card</option>
            <option value="Online" <?('emd_card')=='Online'?'selected':''?>>Online</option>
            <option value="DD/BG" <?('emd_card')==' DD/BG'?'selected':''?>> DD/BG</option>
            </select>

             <span class="er_vld" id="er_emd_amount"></span>
            </span> <br/>
             <input type="text" class="form-control" placeholder="Remarks" name="emd_remarks" />
             <span class="er_vld" id="er_emd_remarks"></span>
            
          </div>
        </div>
        <!-- start-->
        <!-- start-->
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Processing Charges</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
           
            <input type="text" class="form-control" placeholder="Amount" name="process_amount" />
            <input type="file" name="process_doc" />
            <span id="process_doc"></span>

            <span class="er_vld" id="er_process_amount">
            </span> 
            <br/>
            <select  class="form-control" name="process_card" >
              <option value="">--select option--</option>
           <option value="Card" <?('process_card')=='Card'?'selected':''?>>Card</option>
            <option value="Online" <?('process_card')=='Online'?'selected':''?>>Online</option>
            <option value="DD/BG" <?('process_card')==' DD/BG'?'selected':''?>> DD/BG</option>
            </select>
             <span class="er_vld" id="er_process_card">
            </span>  <br/>
             <input type="text" class="form-control" placeholder="Remarks" name="process_remarks" />
             <span class="er_vld" id="er_process_remarks"></span>
           
          </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Transaction Charges</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            
            <input type="text" class="form-control" placeholder="Amount" name="trans_amount" />
            <input type="file" name="trans_doc" />
            <span id="trans_doc"></span>

            <span class="er_vld" id="er_trans_amount">
            </span> 
            <br/>
            <select class="form-control" name="trans_card">
              <option value="">--select option--</option>
              <option value="Card" <?('trans_card')=='Card'?'selected':''?>>Card</option>
            <option value="Online" <?('trans_card')=='Online'?'selected':''?>>Online</option>
            <option value="DD/BG" <?('trans_card')==' DD/BG'?'selected':''?>> DD/BG</option>
            </select>
             <span class="er_vld" id="er_trans_card">
            </span>   <br/>
            <input type="text" class="form-control" placeholder="Remarks" name="trans_remarks" />
             <span class="er_vld" id="er_trans_remarks"></span>
          
          </div>
        </div>
   <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Fee</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="our_fee" onkeyup="getamount_(this.value)" readonly />
            <span class="er_vld" id="er_amount">
            </span> 
          </div>
        </div>
   <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Amount</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="amount" onkeyup="getamount_(this.value)"/>
            <span class="er_vld" id="er_amount">
            </span> 
          </div>
        </div>

 <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Paid</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="paid" onkeyup="getamount_(this.value)"/>
            <span class="er_vld" id="er_paid">
            </span> 
          </div>
        </div>

 <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-7 col-md-7 control-label">Unpaid</label>
          <div class="col-xs-12 col-sm-5 col-md-5">
            <input type="text" class="form-control" name="unpaid" readonly />
            <span class="er_vld" id="er_unpaid">
            </span> 
          </div>
        </div>

        <!-- start-->
            <div class="form-group has-feedback">
              <div class="col-xs-12 col-sm-5 col-md-5">
            
                <div class="inp-sub">
                  <input class="btn btn-primary btn-block btn-flat" type="button" value="Submit" onclick="return validateDocs()" />
                 
                  <input type="hidden" name="job_id"  value=0>
                  <input type="hidden" name="customer_account" value="1" />
                  <input type="hidden" name="add_job" value="1" />

                </div>
              </div>
            </div>
  <?php echo form_close(); ?>
      <div>
   <table class="table table-striped table-bordered table-hover table-condensed" id='customer_jobs_blk' style="    margin-left: 15px;display: none;">
     <tr>
       <th>S.No.</th>
       <th>Customer Id</th>
       <th>Dept.Name</th>
       <th>Work Name</th>

       <th>Amount</th>
       <th>Fee(our self)</th>
       <th>Paid</th>
       <th>Unpaid</th>
       <th>Action</th>
     </tr>
      <tbody id="customer_jobs">
        
      </tbody>
    </table>
    <div id="customer_jobs_acc" style="display: none;"></div>
<?php

$obj =& get_instance();

$avail_docs='';

$j=1;



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
  var our_fee=0;
 function getFee(ref){
         if(ref=='Our self'){
            our_fee=1
            jQuery("input[name='our_fee']").prop('readonly',false);
         }  else{
          our_fee=0
          jQuery("input[name='our_fee']").prop('readonly',true);
         }
 }
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
<!-- <link rel="stylesheet" href="<?=base_url()?>dist/css/jquery.inputfile.css"> -->
<!--<link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
--><!-- <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="<?=base_url()?>dist/js/jquery.inputfile.js"></script> -->
<script>
    // $('input[type="file"]').inputfile({
    //     uploadText: '<span class="glyphicon glyphicon-upload"></span> Select a file',
    //     removeText: '<span class="glyphicon glyphicon-trash"></span>',
    //     restoreText: '<span class="glyphicon glyphicon-remove"></span>',
        
    //     uploadButtonClass: 'btn btn-primary',
    //     removeButtonClass: 'btn btn-default'
    // });

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
     cust_id=jQuery("select[name='customer_id']").val();
     jQuery("#emd_doc,#process_doc,#trans_doc").text("");
          jQuery("#form_app").trigger("reset");
    console.log('working');
       $.ajax({
        // Your server script to process the upload
        url:"<?php echo base_url(); ?>" + "index.php/pages/getCustomer",
        type: 'post',
        data:  {'id':id,'account':1},
         enctype: 'multipart/form-data',
          // Important!
        cache: false,
        success:function(data){
          data=JSON.parse(data);
          jQuery("#customer_dtails").text("");
          //console.log(data);
         
          jQuery("select[name='customer_id']").val(cust_id);
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
           var n=0;
           jQuery("#customer_jobs").text("");
           var tr='';
           var amount=paid=unpaid=0;
           jQuery.each(data['customer_jobs'],function(k,v){
             n=n+1;
                 amount=amount+parseInt(v['amount']);
                 paid=paid+parseInt(v['paid']);
                 unpaid=unpaid+parseInt(v['unpaid']);
                 tr+="<tr><td>"+n+"</td>";
                 tr+="<td>"+v['customer_id']+"</td>";
                 tr+="<td>"+v['department_name']+"</td>";
                 tr+="<td>"+v['work_name']+"</td>";
                 tr+="<td>"+v['amount']+"</td>";
                 tr+="<td>"+v['our_fee']+"</td>";
                 tr+="<td>"+v['paid']+"</td>";
                 tr+="<td>"+v['unpaid']+"</td>";
                 tr+="<td><a onclick=getCustomer_job("+v['id']+")>Update</a></td></tr>";
                
           });
           jQuery("#customer_jobs").append(tr);
            jQuery("#customer_jobs").append("</table><table style='margin-top:2px;'>");
           jQuery("#customer_jobs").append("<tr><th>Total Amount</th><td>"+amount+"</td></tr>");
           jQuery("#customer_jobs").append("<tr><th>Total Paid</th><td>"+paid+"</td></tr>");
           jQuery("#customer_jobs").append("<tr><th>Total Due</th><td>"+unpaid+"</td></tr>");
            jQuery("#customer_jobs").append("</table>");
           jQuery("#customer_jobs_blk").show();

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
          
         // eturn false;
          jQuery(".er_vld").text("");
          data=JSON.parse(data);
           //return false;
          if(data['err']!=0){
           jQuery.each(data,function(k,v){
                  jQuery('#er_'+k).html(v);
             });
          }else{
             //     console.log(data);
             // console.log(data['ajx_status']);
             //  console.log(data['ajx_msg']);
            jQuery("#ajx_msg").text(data['ajx_msg']);

            if(data['ajx_status']==1){
                
                getCustomer(jQuery("select[name='customer_id']").val());
                jQuery("#ajx_msg_blk").prop('class','alert alert-success').show();
            }else if(data['ajx_status']==2){
              jQuery("#ajx_msg_blk").prop('class','alert alert-warning').show();
            }
          }
          return false;
        }
});
     
 }
 function getCustomer_job(id){
  console.log(id);
   var doc_path='<?=base_url('uploads/fee_docs/')?>';
        $.ajax({
        // Your server script to process the upload
        url:"<?php echo base_url(); ?>" + "index.php/pages/getcustomer_job",
        type: 'post',
        data:  {'id':id},
         enctype: 'multipart/form-data',
          // Important!
        cache: false,
        success:function(data){
          data=JSON.parse(data);
      
           jQuery.each(data['update'],function(k,v){
            if(k=='emd_doc' || k=='process_doc' || k=='trans_doc'){
                jQuery("#"+k).html('<a href='+doc_path+v+' target="_blank">'+v+'</a>');
            }else{
                jQuery(" input[name="+k+"]").val(v);
            }
                
                  jQuery("select[name="+k+"]").val(v);
           });
          $("#start_from").get(0).scrollIntoView();
         }
       


 });
      }
        jQuery(document).ready(function(){
          jQuery("#ajx_msg_blk_close").click(function(){
              jQuery("#ajx_msg_blk").hide();
          })
            $('input').keypress(function (e) {
            if (e.which == 13) {
            validateDocs();
            return false;    //<---- Add this line
            }
            });
            
        })  
        function getamount_(value){
          if(our_fee==1){
            var unpaid=(parseInt(jQuery("input[name='our_fee']").val())+parseInt(jQuery("input[name='amount']").val()))-jQuery("input[name='paid']").val();
          }else{
            var unpaid=jQuery("input[name='amount']").val()-jQuery("input[name='paid']").val();
          }
               
               jQuery("input[name='unpaid']").val(unpaid);
        }
 </script>

       
    
<!--inputupload code-->
</html>
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
    <?php }?>
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="box box-primary">
      <!-- /.box-header -->
      <!-- form start -->
      <?php echo form_open_multipart('pages/new_application','id="form_app"'); 

       $disable_type=$this->uri->segment(3)?'disabled':'';
function unq() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = substr($s,12,4);
    return $guidText;
}
// End Generate Guid 

$unq = unq();

       ?>
      <div class="left-reg col-xs-12 col-sm-8 col-md-8"> 
       
         <div class="form-group has-feedback">
       <label class="col-xs-12 col-sm-4 col-md-4 control-label" >Tender</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            
                <input class="form-control" value="1"  type="checkbox" name="tender" <?=isset($dtls->id)?'disabled':''?>>
                
            </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label" >Customer Id</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control"  type="text" name="customer_id" value="SETS<?=$unq?>" readonly>
            <span class="er_vld" id="er_customer_id">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label" >Class Of Signification Signing</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <select class="form-control " name="class_sign">
              <?php 
$class_signs=[
1=>'1.1 RCAI Class 2 for Individual - Signing 2 Years Validity',
2=>'1.2 RCAI Class 2 for Individual with Organisation Name - Signing 2 Years Validity',
3=>'2.1 RCAI Class 3 for Individual - Signing 1 Year Validity',
4=>'2.2 RCAI Class 3 for Individual Signing 2 Years Validity',
5=>'2.3 RCAI Class 3 for Individual With Organisation Name - Signing 1 Year Validity',
6=>'2.4 RCAI Class 3 for Individual with Organisation Name - Signing 2 Years Validity'
];
              ?>
            <option value="">--select option--</option>
                      <?php 
                       foreach ($class_signs as $key => $value) {
                         echo '<option value="'.$key.'" '.($key==$dtls->class_sign?'selected':'').'>'.$value.'</option>';
                       }
                      ?>
                      
            </select>
            <span class="er_vld" id="er_class_sign">
            </span> </div>
        </div>
     <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label" >Class Of Signification Encription</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <?php
         $class_encrypts=[
1=>'1.3 RCAI Class 2 for Individual - Encryption 2 Years Validity',
2=>'1.4 RCAI Class 2 for Individual With Organisation Name - Encryption 2 Year Validity',
3=>'2.5 RCAI Class 3 for Individual Encryption 2 Years Validity',
4=>'2.6 RCAI Class 3 for Individual Encryption 2 Years Validity',
5=>'2.7 RCAI Class 3 for Individual With Organisation Name - Encryption 1 Year Validity',
6=>'2.8 RCAI Class 3 for Individual with Organisation Name - Encryption 2 Years Validity'
         ];
            ?>
            <select class="form-control " name="class_encypt">
              <option value="">--select option--</option>
                      <?php 
                       foreach ($class_encrypts as $key => $value) {
                         echo '<option value="'.$key.'" '.($key==$dtls->class_encypt?'selected':'').'>'.$value.'</option>';
                       }
                      ?>
                      
            </select>
            <span class="er_vld" id="er_class_encypt">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Name</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="name">
            <span class="er_vld" id="er_name">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Date OF Birth</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6" >
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input type="text" class="form-control pull-right" id="dt_pkr_dob" name="dob">
                   </div>
                   <span class="er_vld" id="er_dob">
                  </span>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label class="control-label">Gender</label>
                : Male
                <input class="form-control" value="1"  type="checkbox" name="gender">
                Female
                <input class="form-control" value="2"  type="checkbox" name="gender">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">House Identifier(Address)</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="address">
            <span class="er_vld" id="er_address">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Street Name</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="street">
            <span class="er_vld" id="er_street">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Landmark</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="landmark">
            <span class="er_vld" id="er_landmark">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Locality</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="locality">
            <span class="er_vld" id="er_locality">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Village/Town/City</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="city">
            <span class="er_vld" id="er_city">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label" >Postoffice Name</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="post_office">
            <span class="er_vld" id="er_post_office">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Sub-District</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="row">
              <div class="col-xs-12 col-sm-5 col-md-5">
                <input class="form-control" value=""  type="text" name="sub_district">
                <span class="er_vld" id="er_sub_district">
                </span> </div>
              <div class="col-xs-12 col-sm-7 col-md-7">
                <div class="row">
                  <label class="control-label col-xs-12 col-sm-3 col-md-3">District</label>
                  <div class="col-xs-12 col-sm-9 col-md-9">
                    <?php
              $districts=[
"East Godavari",
"West Godavari",
"Anantapur",
"Chittoor",
"Guntur",
"Krishna",
"Kurnool",
"Prakasam",
"Srikakulam",
"SriPotti Sri Ramulu Nellore",
"Vishakhapatnam",
"Vizianagaram",
"Cudappah"];
                    ?>
                    <select name="district" class="form-control">
                      <option value="">--select option--</option>
                      <?php 
                       foreach ($districts as $key => $value) {
                         echo '<option value="'.$value.'" '.($value==$dtls->district?'selected':'').'>'.$value.'</option>';
                       }
                      ?>
                      
                        
                    </select>
                    <span class="er_vld" id="er_district">
                    </span> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">State/Union Territory</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <?php
 $states=["Andhra Pradesh",
"Arunachal Pradesh",
"Assam",
"Bihar",
"Chhattisgarh",
"Dadra and Nagar Haveli",
"Daman and Diu",
"Delhi",
"Goa",
"Gujarat",
"Haryana",
"Himachal Pradesh",
"Jammu and Kashmir",
"Jharkhand",
"Karnataka",
"Kerala",
"Madhya Pradesh",
"Maharashtra",
"Manipur",
"Meghalaya",
"Mizoram",
"Nagaland",
"Orissa",
"Puducherry",
"Punjab",
"Rajasthan",
"Sikkim",
"Tamil Nadu",
"Telangana",
"Tripura",
"Uttar Pradesh",
"Uttarakhand",
"West Bengal"];
            ?>
            <select class="form-control" name="state">
             <option value="">--select option--</option>
                      <?php 
                       foreach ($districts as $key => $value) {
                         echo '<option value="'.$value.'" '.($value==$dtls->state?'selected':'').'>'.$value.'</option>';
                       }
                      ?>
            </select>
            <span class="er_vld" id="er_state">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">PIN Code</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <div class="row">
              <div class="col-xs-12 col-sm-5 col-md-5">
                <input class="form-control" value=""  type="text" name="pin">
                <span class="er_vld" id="er_pin">
                </span> </div>
              <div class="col-xs-12 col-sm-7 col-md-7">
                <div class="row">
                  <label class="control-label col-xs-12 col-sm-3 col-md-3">Country</label>
                  <div class="col-xs-12 col-sm-9 col-md-9">
                    <?php
$country=["IND"=>'India',
"IDN"=>'Indonesia',
"AU"=>'Australia',
"CA"=>'Canada',
"JP"=>'Japan',
"AE"=>'United Arab Emirates',
"GB"=>'United Kingdom',
"US"=>'United States'];
                    ?>
                    <select class="form-control" name="country">
                      <option value="">--select option--</option>
                      <?php 
                       foreach ($country as $key => $value) {
                         echo '<option value="'.$key.'" '.($key==$dtls->country?'selected':'').'>'.$value.'</option>';
                       }
                      ?>
                    </select>
                    <span class="er_vld" id="er_country">
                    </span> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">E-mail Id</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="email">
            <span class="er_vld" id="er_email">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Mobile Number</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="mobile">
            <span class="er_vld" id="er_mobile">
            </span> </div>
        </div>
         <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">PAN</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="pan">
            <span class="er_vld" id="er_pan">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Identity Proof Name</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
             <select class="form-control" name="id_proof_name">

              <option value="">--Select proof--</option>
              <?php
               $proof_names=['Aadhar','PAN','Voter Id','Driving Licence','Passsport'];
               foreach ($proof_names as $key => $value) {
                  echo '<option value="'.$value.'"  '.($dtls->id_proof_name==$value?'selected':'').' >'.$value.'</option>';
               }
              ?>
              
              
             </select>
            <span class="er_vld" id="er_id_proof_name">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Address Proof Name</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="address_proof_name">
            <span class="er_vld" id="er_address_proof_name">
            </span> </div>
        </div>
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Aadhar Card Number</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value=""  type="text" name="aadhar_no">
            <span class="er_vld" id="er_aadhar_no">
            </span> </div>
        </div>
      </div>
      <div class="right-reg col-xs-12 col-sm-4 col-md-4">
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Request Id 1</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value="" name="request_id_1" id="request_id_1" type="text">
            <span class="er_vld" id="er_request_id">
            </span> </div>
      
        </div>
      </div>
       <div class="right-reg col-xs-12 col-sm-4 col-md-4">
        <div class="form-group has-feedback">
          <label class="col-xs-12 col-sm-4 col-md-4 control-label">Request Id 2</label>
          <div class="col-xs-12 col-sm-8 col-md-8">
            <input class="form-control" value="" name="request_id_2" id="request_id_2" type="text">
            <span class="er_vld" id="er_request_id">
            </span> </div>
      
        </div>
      </div>
      <div class="con-tent">
         <script type="text/javascript">

  var added=1;
 function addMore(){

  var input = jQuery('<p class="'+added+' form_group" ><input type="text" name="doc_types[doc_'+added+']" class="doc_types form-control" id="'+added+'" /><input class="doc_names" type="file" value="Upload"  data-value="Upload" data-text="Image Name" name="doc_'+added+'" id="doc_'+added+'" /><a href="javascript:void(0);" onclick=remv('+added+') class="btn_add" style="    margin-left: 23px;">-</a><span class="er_vld" id="er_doc_'+added+'" ></span><p>');

    jQuery("#docs").append(input);
    
      $('#doc_'+added).inputfile({
        uploadText: '<span class="glyphicon glyphicon-upload"></span> Select a file',
        removeText: '<span class="glyphicon glyphicon-trash"></span>',
        restoreText: '<span class="glyphicon glyphicon-remove"></span>',
        
        uploadButtonClass: 'btn btn-primary',
        removeButtonClass: 'btn btn-default'
    });
      added++;
 }

 function remv(remv_id){
  jQuery("."+remv_id).remove();
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
          console.log(data);
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
       
          <div class="require-doc">
            <h3>Required Doc For Contractors In Registration</h3>
            <p id="docs" class="form-group">
             <input type="text" name="doc_types[doc_0]" class="doc_types form-control" id='0' />
               <input type="file" value="Upload" data-value="Upload" data-text="Image Name" name="doc_0"   class="doc_names" id="doc_0"/>
               <a href="javascript:void(0);" onclick="addMore()" class="btn_add">+</a>
               <span id='er_doc_0' class="er_vld"></span>
            </p>
            <div class="form-group has-feedback">
              <div class="col-xs-12 col-sm-5 col-md-5">
            
                <div class="inp-sub">
                  <input class="btn btn-primary btn-block btn-flat" type="button" value="Submit" onclick="return validateDocs()" />
                  <input type="hidden" name="act" value="<?=(isset($dtls->customer_id)?'update':'')?>" />
                  <input type="hidden" name="form_id" value="<?=(isset($dtls->id)?$dtls->id:'')?>" />
                </div>
              </div>
            </div>
  <?php echo form_close(); ?>
      <div>
   Available Douments
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



$j=1;
if(isset($dtls->id)){
foreach ((array)$dtls_docs as $row) {

    if($row){

    $avail_docs.="<tr><td>".$j++."</td>";


    $avail_docs.="<td>".getValid($row->doc_type)."</td>";


    $avail_docs.="<td><a href='".base_url('uploads/')."/".$row->doc_name."'>Download</a></td></tr>";

    }


}  
}



      ?>
      <table class="table">
        <tr>
          <th>S.No</th>
          
          <th>Document Name</th>
          <th>Document</th>
    
        </tr>
        <?=$avail_docs?>
      </table>
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
    

var input_vals='<?=isset($dtls)?json_encode($dtls):''?>';
var input_vals_docs='<?=isset($dtls_docs)?json_encode($dtls_docs):''?>';


input_vals=input_vals?JSON.parse(input_vals):'';
input_vals_docs=input_vals_docs?JSON.parse(input_vals_docs):'';
  console.log(input_vals);

jQuery.each(input_vals,function(k,v){

  if(k=='dob'){
  var dateAr = v.split('-');
  var v = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
  console.log(v);
   }
  if(k=='gender' || k=='tender'){
    console.log(k+v);
    if(v==1)
    jQuery("input[name="+k+"]").first().attr('checked',true);
  else
    jQuery("input[name="+k+"]").next().attr('checked',true);
  }
   else{
    jQuery("input[name="+k+"]").val(v);
  }
       
})
console.log(input_vals_docs);
jQuery.each(input_vals_docs,function(k,v){
 console.log(v['doc_type']);
  // jQuery("#"+v['doc_type']).text(v['doc_name']);
//addMore();

});
    </script>
<!--inputupload code-->
</html>
    <?php
    /**
     *
     */
    class Pages extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
    // Load session library
            $this->load->library('session');
    // Load form helper library
            $this->load->helper('login');
            if (!is_logged_in()) {
                header('location: /harshit/index.php/user_login_process');
                exit;
            }
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper('date');
    // Load form validation library
            $this->load->library('form_validation');
            $this->load->library('pagination');
            //$this->load->library('phpexcel');
// require_once(APPPATH.'controllers/Phpexcel.php'); 
//             $phpexcel =  new Phpexcel();
            // $phpexcel->download();
            // $this->load->library('phpexcel');
    // Load database
            $this->load->model('Hc_database');
           // $CI =& get_instance();
            $this->load->model('phpexcel_model');
            $this->load->library('phpexcel');
            

            

            $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
 //cache            
if ( ! $this->token_types = $this->cache->get('token_types'))
{
        // echo 'Saving to the cache!<br />';
        $token_types=[1=>'Renewal',2=>'E-pass',3=>'E-token',4=>'Safe net'];

     // Save into the cache for 5 minutes
     $this->cache->save('token_types', $token_types);
}
if ( ! $this->org_types = $this->cache->get('org_types'))
{
        // echo 'Saving to the cache!<br />';
        $org_types=[1=>'Individual',2=>'Proprietorship',3=>'Partnership',3=>'Pvt.Ltd'];

     // Save into the cache for 5 minutes
     $this->cache->save('org_types', $org_types);
}


        }

        public function getView($page,$params){
             if($this->session->userdata['logged_in']['userid']!=1){
               
                    if($page=='hrst_registration_form' && $this->session->userdata['logged_in']['member_register']!=1){
                    $params['error_message']="Oops! You are not authorized to access this page.please contact admin.";
                    $this->load->view('hrst_noaccess', $params);
                    }else if($page=='hrst_job_assign' && $this->session->userdata['logged_in']['job_assign']!=1){
                    $params['error_message']="Oops! You are not authorized to access this page.please contact admin.";
                    $this->load->view('hrst_noaccess', $params);
                    }else if($page=='hrst_application_form_tend' && $this->session->userdata['logged_in']['customer_account']!=1){
                    $params['error_message']="Oops! You are not authorized to access this page.please contact admin.";
                    $this->load->view('hrst_noaccess', $params);
                    }else{
                        $this->load->view($page, $params);
                    }
             }else{
                    $this->load->view($page, $params);  
             }
                
            
        }
        public function my_jobs(){
                $data['nav_title'] = 'My Jobs';
                $data['result']      = $this->db->select('customer_id,priority,assigned_date')->where('assign_to='.$this->session->userdata['logged_in']['userid'])->order_by('id', "asc")->get('subscription_forms')->result();
               
                $this->getView('my_jobs',$data);

        }

     public function job_assign($params=[])
        {
            $data['nav_title'] = 'Customer Job Assign';
            if(isset($params['message_display'])){
                $data['message_display'] = $params['message_display']; 
            }
           

            $data['customer_ids']      = $this->db->select('customer_id')->where('tender=1')->order_by('id', "asc")->get('subscription_forms')->result();
              $data['execs']      = $this->db->select('user_name as name,id')->where('tender=1')->order_by('id', "asc")->get('user_login')->result();
             //echo '<pre>'; print_r($data['execs']);exit; 
              $this->getView('hrst_job_assign',$data);

        }
        public function assign_job(){
            $resp=[];

             foreach ($this->input->post() as $key => $value) {
                if($value==""){
                        $resp['err']=1;
                        
                        $resp['errs'][$key]=ucfirst(str_replace("_", " ", $key))." should not be empty";
                }

                 $post_vls[$key]=$value;
             }
                    $post_vls['updated']=date('Y-m-d H:i:s');
                    $post_vls['assigned_date']=date('Y-m-d H:i:s');
                    $post_vls['action_by_id']   = $this->session->userdata['logged_in']['userid'];
                    $post_vls['action_by_name'] = $this->session->userdata['logged_in']['username'];     
             //echo '<pre>';print_r( $post_vls);exit;
            if(!$resp){
             $result = $this->Hc_database->application_update($post_vls);
             if($result){
             $resp['err']=0;
            }
          }
            
            echo json_encode($resp);exit;

        }
    // Show registration page
        public function getSearchReg()
        {
            $params     = [];
            $params['search_key'] = $this->input->post('search_key');
            $params['nav_title'] = "Search";
    // print_r($params['result']);exit;
            $this->registrationdtails($params);
        }
        public function getvalidate()
        {
            $resp        = [];
            $escape_vld = ['our_fee'=>1,'dsc_amount'=>1,'dsc_paid'=>1,'dsc_unpaid'=>1,'tender_username'=>1,'tender_password'=>1, 'request_id_1'=>1,'request_id_2'=>1,'form_id' => 1, 'act' => 1, 'doc_types' => 1, 'locality' => 1, 'landmark' => 1, 'post_office' => 1, 'sub_district' => 1,'class_encrypt'=>1,'street'=>1,'address'=>1,'amount'=>1,'paid'=>1,'unpaid'=>1,'trans_remarks'=>1,'trans_card'=>1,'trans_amount'=>1,'process_remarks'=>1,'process_card'=>1,'process_amount'=>1,'emd_remarks'=>1,'emd_card'=>1,'emd_amount'=>1];
            if($this->input->post('org_type')==1 || $this->input->post('org_type')==''){
                $escape_vld['org_name']=1;
                $escape_vld['org_pan']=1;
            }
            foreach ($this->input->post() as $l => $m) {
                if (!isset($escape_vld[$l])) {
                    $this->form_validation->set_rules($l, ucfirst($l), 'trim|required|xss_clean');
                }

            }

                
            if ($this->form_validation->run() == false) {
                foreach ($this->input->post() as $l => $m) {
                    if ($l && form_error($l)) {
                        $resp[$l] = str_replace('_', ' ', form_error($l));
                    }
                }
            }
            // $gender=$this->input->post('gender');
            // if(!isset($gender)){
            //                 $resp['gender'] = "Gender should not be empty.";
            //     }
    // if($_FILES['self_image']['name']==""){
            //         $resp['self_image']="File should not be empty";
            // }
            if(!$this->input->post('customer_account')){
                  $j = 1;
            foreach ($this->input->post('doc_types') as $key => $value) {
                if ($value) {
                     $file_info            = pathinfo($_FILES[$key]['name']);
                     //echo $file_info['extension'];exit;
                    if ($_FILES[$key]['name'] == "") {
                        $resp[$key] = "File " . ($j) . " should not be empty";
                    }else if(!preg_match("/(gif|jpg|png|jpeg|pdf)/i", $file_info['extension'])){
                        $resp[$key] = "File " . ($j) . " should be in format (gif/jpg/png/jpeg/pdf) only";
                    }else {
                        $condition = "doc_type =" . "'" . $value . "'";
                        $this->db->select('id');
                        $this->db->from('subscription_form_proofs');
                        $this->db->where($condition);
                        $this->db->limit(1);
                        $query = $this->db->get();
                        if ($query->num_rows() == 1) {
                            $resp[$key] = "File " . ($j) . " already exists";
                        }
                    }
                }
                $j++;
    # code...
            }
            }
            
            if($this->input->post('customer_account')){
                $fee_docs=['emd_doc'=>1,'process_doc'=>1,'trans_doc'=>1];
                $j=1;
                 foreach ($fee_docs as $key => $value) {
                     $file_info            = pathinfo($_FILES[$key]['name']);
                     if ($_FILES[$key]['name'] != "") {
                      if(!preg_match("/(gif|jpg|png|jpeg|pdf)/i", $file_info['extension'])){
                        $resp[$key] = "File " . ($j++) . " should be in format (gif/jpg/png/jpeg/pdf) only";
                    }else{
                        $post_vls[$key]=$this->input->post('customer_id')."_".time().".".$file_info['extension'];
                    }
                }
                 }

            }
            if (empty($resp)) {
                $resp['err'] = 0;
                if($this->input->post('add_job')){
                        $this->customer_jobs();
                }
            } else {
                $resp['err'] = 1;
            }
            echo json_encode($resp);
            exit;
            
        }
        public function index()
        {
            $data['nav_title'] = 'Dashboard';
           
             $this->getView('dashboard',$data);
        }
        public function user_registration_show()
        {
            $params              = [];
            $params['nav_title'] = 'Member Registration';
    // $params['uniq']=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('subscription_forms')->row();
            
            $this->getView('hrst_registration_form',$params);
        }
        public function application_form()
        {
            $data['nav_title'] = 'Customer';
            $data['uniq']      = $this->db->select('id')->order_by('id', "desc")->limit(1)->get('subscription_forms')->row();
           

            $this->getView('hrst_application_form',$data);
        }
        public function registrationdtails($params = [])
        {

            if(isset($params['customer_account'])){ //when update account dtails
            
               $this->application_form_tend($params);
              return true;
            }

          
    //$data = ['table'=>$this->data['table'],'flds'=>$this->data['flds'],'w_clse'=>isset($this->data['w_clse'])?$this->data['w_clse']:''];
            
            // $data   = ['table' => $table, 'flds' => $flds, 'w_clse' => isset($w_clse) ? $w_clse : ''];
           
    //
           
        
            $params['nav_title'] = $this->uri->segment(2) == 2 ? 'Tenders' : ($this->uri->segment(2) == 1 ? 'DSC' : 'Customer details');
    //  print_r($params);
// Set array for PAGINATION LIBRARY, and show view data according to page.

            $flds                = ['customer_id', 'name', 'renewal', 'city', 'mobile', 'added', 'dsc','tender', 'id', 'updated'];
            $table               = 'subscription_forms';

          

            if(isset($params['search_key']) && empty($params['search_key'])){
               
               $this->getView('hrst_registration_dtails',$params);
            }else if(isset($params['search_key']) && $params['search_key']!=''){
                $w_clse['search_key']=$params['search_key'];
            }
            $segment2=$this->uri->segment(2);
            if(isset($segment2) && is_numeric($segment2)){
            $form_type=($segment2==1?'dsc':'tender');
            $w_clse[$form_type]=1;      
            }
            if(isset($_GET)){
                foreach ($_GET as $key => $value) {
                     $w_clse[$key]=$value;
                }
            }

             
            $data   = ['table' => $table , 'w_clse'=>(isset($w_clse)?$w_clse:'')];
// print_r($w_clse);
            if(isset($w_clse)){
                foreach ((array)$w_clse as $key => $value) {
                      $_GET[$key]=$value;
                }
            }
            
            
            
            $config = array();
            $config["base_url"] = base_url() . "index.php/registration_dtails/page/";
            $config['reuse_query_string'] = true;
            $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
            $total_row = $this->Hc_database->record_count($data);
           
            $config["total_rows"] = $total_row;
            $config["per_page"] = 10;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';

            $this->pagination->initialize($config);
            if($this->uri->segment(3)){
            $start = ($this->uri->segment(3)) ;
            }
            else{
            $start = 1;
            }
             
            //search
         
            $data   = ['table' => $table, 'flds' => $flds, 'w_clse' => isset($w_clse) ? $w_clse : '','start'=>$start,'limit'=>$config["per_page"],'order_by'=>'updated'];
            $params["result"] = $this->Hc_database->read_info($data);
           //excel
            // echo APPPATH.'controllers/Phpexcel.php';exit;
            
    //end   
            //$params['result_']=$this->phpexcel_model->get_users();
            //$this->phpexcel->download($params);
            
            $str_links = $this->pagination->create_links();

            $params["links"] = explode('&nbsp;',$str_links );

// View data according to array.

           
           $this->getView('hrst_registration_dtails',$params);
    //
            //
        }
        public function users_show($params = [])
        {
            $flds                = ['user_name', 'id', 'user_email', 'tender','dsc','member_register','job_assign','customer_account', 'added', 'ip', 'updated'];
            $table               = 'user_login';
            $data                = ['table' => $table, 'flds' => $flds, 'w_clse' => isset($w_clse) ? $w_clse : ''];
            $result              = $this->Hc_database->read_info($data);
            $params['result']    = $result;
            $params['nav_title'] = 'Members';
           
        $this->getView('hrst_members',$params);
        }
        public function application_form_tend($params=[])
        {
            $data['nav_title'] = 'Customer Job';
            if(isset($params['message_display'])){
                $data['message_display'] = $params['message_display']; 
            }
           

            $data['customer_ids']      = $this->db->select('customer_id')->where('tender=1 and assign_to='.$this->session->userdata['logged_in']['userid'].'')->order_by('id', "asc")->get('subscription_forms')->result();
            // echo '<pre>'; print_r($data['customer_ids']);exit; 
          
$this->getView('hrst_application_form_tend',$data);
        }
     public function getCustomer(){
      $flds=['id','name','dob','class_sign','class_encrypt','address','city','state','pin','email','mobile'];
         $cond=' customer_id="'.$_POST['id'].'" and tender=1';
       //  print_r($_POST);exit;
        if(isset($_POST['id']) && !isset($_POST['account'])){
            $flds_1=['priority','assign_to'];
        }else{
            $flds_1=[];
            $flds_2=['id','customer_id','department_name','work_name','amount','paid','unpaid','our_fee'];
            $cond='customer_id="'.$_POST['id'].'"';
       
             $customer_jobs = $this->db->select($flds_2)->where($cond)->order_by('id', "asc")->get('customer_jobs')->result();
            // print_r($customer_jobs);exit;
           // $flds_1=['department_name','divisions','work_name','estimated_val','closing_date','payment_mode','emd_customer_id','emd_amount','emd_card','process_customer_id','process_amount','process_card','trans_customer_id','trans_amount','trans_card'];     
        }
       
        
        $flds_all=$flds_1?implode(",", array_merge($flds,$flds_1)):implode(",", $flds);
        
        $customer = $this->db->select('id as form_id,'.$flds_all)->where($cond)->order_by('id', "asc")->get('subscription_forms')->result();
        //print_r($customer[0]);exit;
        $ar_customer=[];
        foreach ($flds as $k => $v) {
           //echo $customer[0]->$v;
              $ar_customer['view'][$v]=$customer[0]->$v;
        }
         if(!empty($flds_1)){
            foreach ((array)$flds_1 as $k => $v) {
            $ar_customer['update'][$v]=$customer[0]->$v;
            }   
         }
       
          $ar_customer['customer_jobs']=isset($customer_jobs)?$customer_jobs:'';
             
         $ar_customer['update']['form_id']=$customer[0]->form_id;
           echo json_encode($ar_customer);
           exit;
     }
     public function getCustomer_1(){
     
         $flds=['name','dob','class_sign','class_encrypt','address','city','state','pin','email','mobile','gst','expiry_date','org_type','org_name','org_pan','designation','token_type'];
         $cond=' id="'.$_POST['id'].'"';
        $customer = $this->db->select($flds)->where($cond)->order_by('id', "asc")->get('subscription_forms')->result();
        //print_r($customer[0]);exit;
        $ar_customer=[];
        foreach ($flds as $k => $v) {
           //echo $customer[0]->$v;
              $v_=ucfirst(str_replace("_", " ", $v));
              if($v=='expiry_date' || $v=='dob'){
                $v_1=($customer[0]->$v?nice_date($customer[0]->$v, 'd-M-y'):'');
              }else if($v=='org_type'){
                $v_1=$customer[0]->$v?$this->org_types[$customer[0]->$v]:'';
              }else if($v=='token_type'){
                $v_1=$customer[0]->$v?$this->token_types[$customer[0]->$v]:'';
              }else{
                $v_1=$customer[0]->$v;
              }
              //$v_1=$customer[0]->$v;
              $ar_customer['view'][$v_]=$v_1;
        }
           echo json_encode($ar_customer);
           exit;
     
     }
        public function getcustomer_job(){
                $ar_customer=[];
                $cond=' id="'.$_POST['id'].'"';

                $flds=['department_name','divisions','work_name','estimated_val','closing_date','payment_mode','emd_remarks','emd_amount','emd_card','process_remarks','process_amount','process_card','trans_remarks','trans_amount','trans_card','emd_doc','process_doc','trans_doc','amount','paid','unpaid','tender_id','our_fee'];     
                $flds_=implode(',',$flds);
                $customer = $this->db->select('id as job_id,'.$flds_)->where($cond)->order_by('id', "asc")->get('customer_jobs')->result();
                //print_r($customer[0]);exit;
                $ar_customer=[];
                foreach ((array)$flds as $k => $v) {
                $ar_customer['update'][$v]=$customer[0]->$v;
                } 
                 $ar_customer['update']['job_id']=$customer[0]->job_id;  
                echo json_encode($ar_customer);
                exit;
        }
        public function update_user()
        {
            $id = $this->uri->segment(3);
            if ($id) {
                $flds = '';
            } else {
                $flds = ['id', 'user_name', 'user_email'];
            }
            $data = ['table' => 'user_login', 'flds' => $flds,
                'w_clse'         => ['id' => $id]];
            $params              = [];
            $params['result']    = $this->Hc_database->read_info($data);
            $params['nav_title'] = 'Member Registration';
                $this->getView('hrst_registration_form',$params);
            
        }
        public function update_reg($id_)
        {
            $id = $id_;
    //exit;
            if ($id) {
                $flds = '';
            } else {
                $flds = ['id', 'form_type', 'customer_id', 'name', 'state', 'city', 'mobile', 'added'];
            }
            $data = ['table' => 'subscription_forms', 'flds' => $flds,
                'w_clse'         => ['id' => $id]];

            
            $params['dtls'] = $this->Hc_database->read_info($data)[0];
       
            $cred_data = ['table' => 'tender_credentials', 'flds' => ['customer_id','username','password'], 'w_clse'=> ['customer_id' => $params['dtls']->customer_id]];
            $params['creds'] = json_decode(json_encode($this->Hc_database->read_info($cred_data)),true);
    //for docs
            $flds = ['id', 'subscription_id', 'doc_type', 'doc_name'];
            $data = ['table' => 'subscription_form_proofs', 'flds' => $flds,
                'w_clse'         => ['subscription_id' => $id]];
            $params['dtls_docs'] = $this->Hc_database->read_info($data);
            // $viewpge             = $params['dtls']->form_type == 1 ? 'hrst_application_form' : 'hrst_application_form_tend;
             $viewpge             = 'hrst_application_form';
            $params['nav_title'] = 'Customer';
           
            $this->getView($viewpge,$params);
        }
    // Validate and store registration data in database
        public function user_registration()
        {
            // print_r($this->input->post());
            // exit;
    // Check validation for user input in SignUp form
            $this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean');
            if ($this->form_validation->run() == false) {
                $data['post_data'] = $this->input->post();
                $data['nav_title'] = 'Member Registration';
               
                $this->getView('hrst_registration_form',$data);
            } else {
                $data = array(
                    'user_name'     => $this->input->post('user_name'),
                    'user_email'    => $this->input->post('user_email'),
                    'user_password' => $this->input->post('user_password'),
                    'tender'   => $this->input->post('tender')?$this->input->post('tender'):0,
                    'dsc'   => $this->input->post('dsc')?$this->input->post('dsc'):0,
                     'member_register'   => $this->input->post('member_register')?$this->input->post('member_register'):0,
                      'job_assign'   => $this->input->post('job_assign')?$this->input->post('job_assign'):0,
                        'customer_account'   => $this->input->post('customer_account')?$this->input->post('customer_account'):0,
                  
                    'ip'            => $this->input->ip_address(),
                );
                if ($this->input->post('user_id')) {
                    $updated         = true;
                    $data['user_id'] = $this->input->post('user_id');
                    $data['updated'] = date('Y-m-d H:i:s');
                    $result          = $this->Hc_database->registration_insert($data);
                } else {
                    $updated       = false;
                    $data['added'] = date('Y-m-d H:i:s');
                    $result        = $this->Hc_database->registration_insert($data);
                }
                if ($result == true) {
                    $params['message_display'] = $updated ? 'Updated Successfully!' : 'Registration Successfully !';
                } else {
                    $params['message_display'] = 'Username already exist!';
                }
                $this->users_show($params);
            }
        }
        public function new_application()
        {

            $post_vls = [];
          
            if($this->input->post('customer_account')){
                $params['customer_account']=true;
            }
                //  echo '<pre>';
                // print_r($this->input->post());
                // exit;
            foreach ($this->input->post() as $l => $m) {
                if ($this->input->post($l)) {

                    if ( $l=='tender_username' || $l=='tender_password' || $l=='customer_account' || $l=='submit' || $l == 'act' || $l == 'doc_types' || $l == 'self_image' || preg_match("/^doc_+/", $l)) {continue;}
                    $post_vls[$l] = $this->input->post($l);
                }
                if ($l == 'dob' || $l == 'closing_date' || $l == 'expiry_date') {
                    $post_vls[$l] = date("Y-m-d", strtotime($this->input->post($l)));
                }
            }
            if ($this->input->post('act') == 'update') {
                $update              = true;
                $post_vls['form_id'] = $this->input->post('form_id');
                $post_vls['updated'] = date('Y-m-d H:i:s');
            } else {
                $update            = false;
                $post_vls['added'] = date('Y-m-d H:i:s');
            }
            $post_vls['ip']             = $_SERVER['REMOTE_ADDR'];
            $post_vls['action']         = 'subscription registration';
            $post_vls['action_by_id']   = $this->session->userdata['logged_in']['userid'];
            $post_vls['action_by_name'] = $this->session->userdata['logged_in']['username'];
              // echo '<pre>';
              //   print_r($post_vls);
              //   exit;
            //renew
            // print_r($post_vls);exit;
            $renewal=false;
            if(isset($post_vls['renewal']) && $post_vls['renewal']){
                $renewal=true;
                $post_vls['renewal_date']=date('Y-m-d H:i:s');
            }
            //end
            $tender=isset($post_vls['tender'])?$post_vls['tender']:0;
            $dsc=isset($post_vls['dsc'])?$post_vls['dsc']:0;

            $tender_=isset($post_vls['tender_exist'])?$post_vls['tender_exist']:0;
            $dsc_=isset($post_vls['dsc_exist'])?$post_vls['dsc_exist']:0;
            unset($post_vls['tender_exist']);
            unset($post_vls['dsc_exist']);
              if(($dsc || $tender) && ($tender_ || $dsc_) )
            {
                 $form_type=2;
            
             }else{
                 $form_type=1;
             }

           
             if($tender_==1){
                //  print_r($this->input->post('tender_username'));
                $tndr_usrs=$this->input->post('tender_username');
                $tndr_pwds=$this->input->post('tender_password');
                $customer_id=$this->input->post('customer_id');
                $cred_vals=[];$j=0;
                if(!empty($tndr_usrs)){
                     foreach ($tndr_usrs as $key => $value) {
                          // $cred_vals[]="('".$customer_id."','".$value."','".$tndr_pwds[$j]."')";
                        if($value!='' && $tndr_pwds[$j]!=''){
                             $cred_vals[] =[
                                'customer_id' => $customer_id ,
                                'username' => $value,
                                'password' => $tndr_pwds[$j],
                                'date'=>date('Y-m-d H:i:s'),
                                'ip'=>$_SERVER['REMOTE_ADDR']
                                ];    
                        }
                              
                                


                          $j++;
                    }
                    $this->db->insert_batch('tender_credentials', $cred_vals); 
                }
                   
             }
             
            if ($update) {
                unset($post_vls['tender']);
                unset($post_vls['dsc']);
                unset($post_vls['form_type']);
                $result = $this->Hc_database->application_update($post_vls);
            }

            
            unset($post_vls['form_id']);
            if($dsc==1){

            $post_vls['tender']=0;
            $post_vls['dsc']=1;
            $post_vls['added'] = date('Y-m-d H:i:s');
            $result = $this->Hc_database->application_insert($post_vls);
            }
            //print_r($post_vls);
            if($tender==1){
            $post_vls['tender']=1;
            $post_vls['dsc']=0;
            $post_vls['added'] = date('Y-m-d H:i:s');
            $result = $this->Hc_database->application_insert($post_vls);

              //add/update customer credentials
             foreach ($_POST as $key => $value) {
                 # code...
             }

            }

            //customer credentials


             //update form type
            //echo $form_type;exit;
            if($form_type==2){
                $this->db->where('customer_id', $post_vls['customer_id']);
                $this->db->update('subscription_forms', ['form_type'=>$form_type]); 
            }
         
   

             //renew
            if($renewal){
                $result = $this->Hc_database->application_renewed_insert($post_vls);
            }
            //end
            $post_vls = [];
            foreach ($_FILES as $r => $s) {
                if ($s['name'] != "") {
                    $file_info            = pathinfo($s['name']);
                    $doc_tpe              = $this->input->post('doc_types')[$r];
                    $post_vls['doc_type'] = $doc_tpe;
                    $post_vls['doc_name'] = $doc_tpe . "_" . time() . "." . $file_info['extension'];
                    if ($this->do_upload($r, $post_vls['doc_name'])) {
                        $result_docs = $this->Hc_database->application_doc_insert($post_vls);
                    }
                }
            }
            $params['nav_title'] = $this->input->post('form_type') == 1 ? 'DSC' : 'Tender';
            if ($result == true) {
                
                $params['message_display'] = 'Application has been ' . ($update ? 'Updated' : 'Added') . ' Successfully !';
                if ($update) {

                    $this->registrationdtails($params);
                  
                } else {
                   
                    $this->getView('hrst_application_form',$params);
                }
            } else {
                
                $params['message_display'] = 'Oops! Something went wrong on server.';
               
                $this->getView('hrst_application_form',$params);

            }
        }
    //uploads
        public function do_upload($doc_type, $filename = '',$req_path='')
        {
            global $_FILES;
            $config['upload_path']   = './uploads/'.$req_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']      = 1000;
    // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($doc_type, $filename)) {
                $error             = array('error' => $this->upload->display_errors());
                $data['nav_title'] = 'Customer';
               
                $this->getView('hrst_application_form',$error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                return true;
    // $this->load->view('upload_success', $data);
            }
        }
        public function customer_jobs(){

            $post_vls =$resp=[];
           //  echo '<pre>';
           // print_r($this->input->post());exit;
            foreach ($this->input->post() as $l => $m) {
                if ($this->input->post($l)) {

                    if ($l=='add_job' || $l=='customer_account' || $l == 'act' || $l == 'doc_types' || $l == 'self_image' || preg_match("/^doc_+/", $l)) {continue;}
                            $post_vls[$l] = $this->input->post($l);
                }
                if ($l == 'closing_date') {
                    $post_vls[$l] = date("Y-m-d", strtotime($this->input->post($l)));
                }
            }
            if ($this->input->post('job_id')) {
                $update              = true;
                $post_vls['updated'] = date('Y-m-d H:i:s');
            } else {
                $update            = false;
                $post_vls['added'] = date('Y-m-d H:i:s');
            }

            $post_vls['ip']             = $_SERVER['REMOTE_ADDR'];
            $post_vls['action_by_id']   = $this->session->userdata['logged_in']['userid'];
            $post_vls['action_by_name'] = $this->session->userdata['logged_in']['username'];
              
              //print_r($post_vls);exit;

            //check work exist/not
             $resp['err']=0; 
             if($update){
                 $result_exist=$this->db->select('id')
           ->where('customer_id ="'. $post_vls['customer_id'].'"')
           ->where('id !='. $post_vls['job_id'])
           ->where('work_name ="'. $post_vls['work_name'].'"')
           ->get('customer_jobs');
            if ($result_exist->num_rows() > 0) {
                   
                    $resp['ajx_status']=2;
                    $resp['ajx_msg']='Oops! This work already assigned.';
                     echo json_encode($resp);
               exit;
            }
        }else{
             $result_exist=$this->db->select('id')
           ->where('customer_id ="'. $post_vls['customer_id'].'"')
         
           ->where('work_name ="'. $post_vls['work_name'].'"')
           ->get('customer_jobs');
            if ($result_exist->num_rows() > 0) {
                   
                    $resp['ajx_status']=2;
                    $resp['ajx_msg']='Oops! This work already assigned.';
                     echo json_encode($resp);
               exit;
            }
        }
            
            //
                $fee_docs=['emd_doc'=>1,'process_doc'=>1,'trans_doc'=>1];
                 $j=0;foreach ($fee_docs as $key => $value) {
                    $j++;
                     $file_info            = pathinfo($_FILES[$key]['name']);
                     if ($_FILES[$key]['name'] == "") {
                        $resp[$key] = "File " . ($j) . " should not be empty";
                    }else if(!preg_match("/(gif|jpg|png|jpeg|pdf)/i", $file_info['extension'])){
                        $resp[$key] = "File " . ($j) . " should be in format (gif/jpg/png/jpeg/pdf) only";
                    }else{
                       
                        $post_vls[$key]=$post_vls['customer_id']."_".time().$j.".".$file_info['extension'];
                       $this->do_upload($key, $post_vls[$key],'fee_docs');
                    }
                 }
            //      echo "<pre>";
            // print_r($post_vls);exit;
            if (!$update) {
                $result = $this->Hc_database->customer_jobs_insert($post_vls);
            } else {
                $result = $this->Hc_database->customer_jobs_update($post_vls);
            }

           
               

            
            //end
            
            // $params['nav_title'] = $this->input->post('form_type') == 1 ? 'DSC' : 'Tender';
                
            if ($result == true) {
                $resp['ajx_status']=1;
                $resp['ajx_msg']='Customer Job has been ' . ($update ? 'Updated' : 'Added') . ' Successfully !';
                // $params['message_display'] = 'Customer Job has been ' . ($update ? 'Updated' : 'Added') . ' Successfully !';
                
            } else {
                $resp['ajx_status']=2;
                $resp['ajx_msg']='Oops! Something went wrong on server.';
                /*$params['message_display'] = 'Oops! Something went wrong on server.';*/
            }
               echo json_encode($resp);
               exit;
              // $this->getView('hrst_application_form_tend',$params);
        
        }
    }

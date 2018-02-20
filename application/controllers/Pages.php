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
// Load database
        $this->load->model('Hc_database');
    }
// Show registration page
    public function getSearchReg()
    {
        $params     = [];
        $search_key = $this->input->post('search_key');
        if (empty($search_key)) {
            $params['result_status'] = 'No Records Found.';
            $params['result']        = '';
        } else {
            $result = $this->db->like('customer_id', $search_key)
                ->or_like('name', $search_key)
                ->get('subscription_forms');
            $params['result']        = $result->result();
            $params['result_status'] = '';
        }
        $params['nav_title'] = "Search";
// print_r($params['result']);exit;
        $this->load->view('hrst_registration_dtails', $params);
    }
    public function getvalidate()
    {
        $ers        = [];
        $escape_vld = ['request_id_1'=>1,'request_id_2'=>1,'form_id' => 1, 'act' => 1, 'doc_types' => 1, 'locality' => 1, 'landmark' => 1, 'post_office' => 1, 'sub_district' => 1];
        foreach ($this->input->post() as $l => $m) {
            if (!isset($escape_vld[$l])) {
                $this->form_validation->set_rules($l, ucfirst($l), 'trim|required|xss_clean');
            }
        }
        if ($this->form_validation->run() == false) {
            foreach ($this->input->post() as $l => $m) {
                if ($l && form_error($l)) {
                    $ers[$l] = str_replace('_', ' ', form_error($l));
                }
            }
        }
// if($_FILES['self_image']['name']==""){
        //         $ers['self_image']="File should not be empty";
        // }
        if(!$this->input->post('customer_account')){
              $j = 1;
        foreach ($this->input->post('doc_types') as $key => $value) {
            if ($value) {
                if ($_FILES[$key]['name'] == "") {
                    $ers[$key] = "File " . ($j) . " should not be empty";
                } else {
                    $condition = "doc_type =" . "'" . $value . "'";
                    $this->db->select('id');
                    $this->db->from('subscription_form_proofs');
                    $this->db->where($condition);
                    $this->db->limit(1);
                    $query = $this->db->get();
                    if ($query->num_rows() == 1) {
                        $ers[$key] = "File " . ($j) . " already exists";
                    }
                }
            }
            $j++;
# code...
        }
        }
      
        if (empty($ers)) {
            $ers['err'] = 0;
        } else {
            $ers['err'] = 1;
        }
        echo json_encode($ers);
        exit;
        
    }
    public function index()
    {
        $data['nav_title'] = 'Dashboard';
        $this->load->view('dashboard', $data);
    }
    public function user_registration_show()
    {
        $params              = [];
        $params['nav_title'] = 'Member Registration';
// $params['uniq']=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('subscription_forms')->row();
        $this->load->view('hrst_registration_form', $params);
    }
    public function application_form()
    {
        $data['nav_title'] = 'Customer';
        $data['uniq']      = $this->db->select('id')->order_by('id', "desc")->limit(1)->get('subscription_forms')->row();
        $this->load->view('hrst_application_form', $data);
    }
    public function registrationdtails($params = [])
    {

        if(isset($params['customer_account'])){ //when update account dtails
        
           $this->application_form_tend($params);
          return true;
        }

        $flds                = ['customer_id', 'name', 'state', 'city', 'mobile', 'added', 'dsc','tender', 'id', 'updated'];
        $table               = 'subscription_forms';
        $segment2=$this->uri->segment(2);
        if(isset($segment2) && is_numeric($segment2)){
                $form_type=($segment2==1?'dsc':'tender');
                $w_clse[$form_type]=1;    	
        }
    
//$data = ['table'=>$this->data['table'],'flds'=>$this->data['flds'],'w_clse'=>isset($this->data['w_clse'])?$this->data['w_clse']:''];
        $data   = ['table' => $table, 'flds' => $flds, 'w_clse' => isset($w_clse) ? $w_clse : ''];
        $result = $this->Hc_database->read_info($data);
//
        $params['result'] = $result;
// $limit_per_page = 1;
        // $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;[]
        // $total_records = $this->Hc_database->rowss;
        // if ($total_records > 0)
        // {
        //     // get current page records
        //     $params["results"] =$result ;
        //     $config['base_url'] = base_url() . 'paging/index';
        //     $config['total_rows'] = $total_records;
        //     $config['per_page'] = $limit_per_page;
        //     $config["uri_segment"] = 3;
        //     $this->pagination->initialize($config);
        //     // build paging links
        //     $this->links = $this->pagination->create_links();
        // }
        //return $params;
        $params['nav_title'] = $this->uri->segment(2) == 2 ? 'Tenders' : ($this->uri->segment(2) == 1 ? 'DSC' : 'Customer details');
//  print_r($params);
        $this->load->view('hrst_registration_dtails', $params);
//
        //
    }
    public function users_show($params = [])
    {
        $flds                = ['user_name', 'id', 'user_email', 'user_rights', 'added', 'ip', 'updated'];
        $table               = 'user_login';
        $data                = ['table' => $table, 'flds' => $flds, 'w_clse' => isset($w_clse) ? $w_clse : ''];
        $result              = $this->Hc_database->read_info($data);
        $params['result']    = $result;
        $params['nav_title'] = 'Members';
        $this->load->view('hrst_members', $params);
    }
    public function application_form_tend($params=[])
    {
        $data['nav_title'] = 'Customer Account';
        if(isset($params['message_display'])){
            $data['message_display'] = $params['message_display']; 
        }
       

        $data['customer_ids']      = $this->db->select('customer_id')->order_by('id', "asc")->get('subscription_forms')->row();
        $this->load->view('hrst_application_form_tend', $data);

    }
 public function getCustomer(){
    $flds=['name','dob','class_sign','class_encypt','address','city','state','pin','email','mobile'];
    $flds_1=['department_name','divisions','work_name','estimated_val','closing_date','payment_mode','emd_customer_id','emd_amount','emd_card','process_customer_id','process_amount','process_card','trans_customer_id','trans_amount','trans_card'];
     $cond='customer_id="'.$_POST['id'].'" and tender=1';
      $flds_all=implode(",", array_merge($flds,$flds_1));
    $customer = $this->db->select('id as form_id,'.$flds_all)->where($cond)->order_by('id', "asc")->get('subscription_forms')->result();
    // print_r($customer[0]);exit;
    $ar_customer=[];
    foreach ($flds as $k => $v) {
       //echo $customer[0]->$v;
          $ar_customer['view'][$v]=$customer[0]->$v;
    }
    
     foreach ($flds_1 as $k => $v) {
          $ar_customer['update'][$v]=$customer[0]->$v;
    }
     $ar_customer['update']['form_id']=$customer[0]->form_id;
       echo json_encode($ar_customer);
       exit;
 }
    public function update_user()
    {
        $id = $this->uri->segment(3);
        if ($id) {
            $flds = '';
        } else {
            $flds = ['id', 'user_name', 'user_email', 'user_rights'];
        }
        $data = ['table' => 'user_login', 'flds' => $flds,
            'w_clse'         => ['id' => $id]];
        $params              = [];
        $params['result']    = $this->Hc_database->read_info($data);
        $params['nav_title'] = 'Member Registration';
        $this->load->view('hrst_registration_form', $params);
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
//for docs
        $flds = ['id', 'subscription_id', 'doc_type', 'doc_name'];
        $data = ['table' => 'subscription_form_proofs', 'flds' => $flds,
            'w_clse'         => ['subscription_id' => $id]];
        $params['dtls_docs'] = $this->Hc_database->read_info($data);
        // $viewpge             = $params['dtls']->form_type == 1 ? 'hrst_application_form' : 'hrst_application_form_tend;
         $viewpge             = 'hrst_application_form';
        $params['nav_title'] = 'Customer';
        $this->load->view($viewpge, $params);
    }
// Validate and store registration data in database
    public function user_registration()
    {
// Check validation for user input in SignUp form
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $data['post_data'] = $this->input->post();
            $data['nav_title'] = 'Member Registration';
            $this->load->view('hrst_registration_form', $data);
        } else {
            $data = array(
                'user_name'     => $this->input->post('user_name'),
                'user_email'    => $this->input->post('user_email'),
                'user_password' => $this->input->post('user_password'),
                'user_rights'   => $this->input->post('user_rights'),
              
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
        
        //unset($this->input->post('customer_account'));
        
        if($this->input->post('customer_account')){
            $params['customer_account']=true;
        }
        foreach ($this->input->post() as $l => $m) {
            if ($this->input->post($l)) {

                if ($l=='customer_account' || $l == 'act' || $l == 'doc_types' || $l == 'self_image' || preg_match("/^doc_+/", $l)) {continue;}
                $post_vls[$l] = $this->input->post($l);
            }
            if ($l == 'dob' || $l == 'closing_date') {
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
     

        if (!$update) {
            $tender=isset($post_vls['tender'])?$post_vls['tender']:'';
            $post_vls['tender']=0;
            $result = $this->Hc_database->application_insert($post_vls);
            if($tender==1){
                 $post_vls['dsc']=0;
                 $result = $this->Hc_database->application_insert($post_vls);
            }
        } else {

            $result = $this->Hc_database->application_update($post_vls);
        }
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
                $this->load->view('hrst_application_form', $params);
            }
        } else {
            $params['message_display'] = 'Oops! Something went wrong on server.';
            $this->load->view('hrst_application_form', $params);
        }
    }
//uploads
    public function do_upload($doc_type, $filename = '')
    {
        global $_FILES;
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 1000;
// $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($doc_type, $filename)) {
            $error             = array('error' => $this->upload->display_errors());
            $data['nav_title'] = 'Customer';
            $this->load->view('hrst_application_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            return true;
// $this->load->view('upload_success', $data);
        }
    }
}

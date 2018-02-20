<?php

 //we need to start session in order to access it through CI
// if(!isset($_SESSION)){
//    session_start();
// }


Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('url');
$this->load->helper('form');
$this->load->helper('date');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');


// Load database
$this->load->model('Hc_database');

}

// Show login page
public function index() {
	 $data['nav_title']='Dashboard';
$this->load->view('welcome');
}





//get registration details



// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){
	$data['nav_title']='Dashboard';
$this->load->view('dashboard',$data);
}else{

$this->load->view('login_form');
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->Hc_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->Hc_database->read_user_information($username);
if ($result != false) {
//remember
	if($this->input->post('remember')) {
				setcookie ("username",$this->input->post('username'),time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("password",$this->input->post('password'),time()+ (10 * 365 * 24 * 60 * 60));
			}


$session_data = array(
'userid' => $result[0]->id,
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
'user_rights' => $result[0]->user_rights,
);
// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
$data['nav_title']='Dashboard';
$this->load->view('dashboard',$data);
}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password'),
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login_form', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}





}

?>
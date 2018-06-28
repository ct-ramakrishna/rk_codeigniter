<?php

Class HC_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
if(isset($data['user_id'])){
	$condition = "user_name =" . "'" . $data['user_name'] . "' and id<>'".$data['user_id']."'";
}else{
	$condition = "user_name =" . "'" . $data['user_name'] . "' ";
}


$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

if(isset($data['user_id'])){
	// Query to insert data in database

	$this->db->where('id', $data['user_id']);
	unset($data['user_id']);
	$this->db->update('user_login', $data);
}else{
	// Query to insert data in database
$this->db->insert('user_login', $data);
}

if ($this->db->affected_rows() > 0) {
$this->db->insert('user_logins_log', $data);
return $data;
}
} else {
return false;
}
}

//appication insert

public function application_insert($data) {

// Query to insert data in database

$this->db->insert('subscription_forms', $data);
	if ($this->db->affected_rows() > 0) {
$this->subscription_id=$this->db->insert_id();
$this->db->insert('subscription_forms_log', $data);
		return true;
	}else{
		return false;
	}
}
public function application_update($data) {

// Query to insert data in database

	$this->db->where('id', $data['form_id']);
	$this->subscription_id=$data['form_id'];
	unset($data['form_id']);
	$this->db->update('subscription_forms', $data);
	$this->db->insert('subscription_forms_log', $data);
	return true;
}
public function customer_jobs_insert($data) {

// Query to insert data in database

$this->db->insert('customer_jobs', $data);
	if ($this->db->affected_rows() > 0) {
$this->subscription_id=$this->db->insert_id();
$this->db->insert('customer_jobs_log', $data);
		return true;
	}else{
		return false;
	}
}
public function customer_jobs_update($data) {

// Query to insert data in database

	$this->db->where('id', $data['job_id']);

	 unset($data['job_id']);
	$this->db->update('customer_jobs', $data);
	$this->db->insert('customer_jobs_log', $data);
	return true;
}

public function application_renewed_insert($data) {

// Query to insert data in database
unset($data['form_id']);
$this->db->insert('subscription_forms_renewed', $data);
	if ($this->db->affected_rows() > 0) {
$this->subscription_id=$this->db->insert_id();
$this->db->insert('subscription_forms_log', $data);
		return true;
	}else{
		return false;
	}
}



public function application_doc_insert($data) {

// Query to insert data in database
$data['subscription_id']=$this->subscription_id;
$this->db->insert('subscription_form_proofs', $data);
	if ($this->db->affected_rows() > 0) {
		$this->db->last_id=$this->db->insert_id();
		return true;
	}else{
		return false;
	}
}


// Read data using username and password

public function login($data) {

$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
	// //update login
	// 	$this->db->where('id', $data['user_id']);
	// 	unset($data['user_id']);
	// 	$this->db->update('user_login', $data);
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "user_name =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}
// Read data from database to show data in admin page
public function record_count($data) {
	$condition='';
	if(isset($data['w_clse']['search_key'])){
		  $condition = " customer_id =" . "'" . $data['w_clse']['search_key'] . "' or name =" . "'" . $data['w_clse']['search_key'] . "' or city =" . "'" . $data['w_clse']['search_key'] . "'";
		  $this->db->where($condition);
}
if(isset($data['w_clse']['dsc'])){
		  $condition = " dsc =" . "'" . $data['w_clse']['dsc'] . "'";
		  $this->db->where($condition);
}
if(isset($data['w_clse']['tender'])){
		  $condition = " tender =" . "'" . $data['w_clse']['tender'] . "'";
		  $this->db->where($condition);
}
	
 return  $this->db->from($data['table'])->count_all_results();
}

public function read_info($data) {
$condition=$order_by='';
if($data['flds']){
	$flds=implode(",",$data['flds']);
}
else{
	$flds="*";
}
if(isset($data['w_clse']['id'])){
		$condition = " id =" . "'" . $data['w_clse']['id'] . "'";
}
if(isset($data['w_clse']['subscription_id'])){
		  $condition = " subscription_id =" . "'" . $data['w_clse']['subscription_id'] . "'";
}
if(isset($data['w_clse']['tender'])){
		  $condition = " tender =" . "'" . $data['w_clse']['tender'] . "'";
}
if(isset($data['w_clse']['dsc'])){
		  $condition = " dsc =" . "'" . $data['w_clse']['dsc'] . "'";
}
if(isset($data['w_clse']['customer_id'])){
		  $condition = " customer_id =" . "'" . $data['w_clse']['customer_id'] . "'";
}
if(isset($data['w_clse']['search_key'])){
		  $condition = " customer_id  like " . "'%" . $data['w_clse']['search_key'] . "%'or name like " . "'%" . $data['w_clse']['search_key'] . "%' or city like" . "'%" . $data['w_clse']['search_key'] . "%'";
}
if(isset($data['limit']) && $data['limit']){
	 $limit=$data['limit'];
}
if(isset($data['order_by']) && $data['order_by']){
	 $order_by=$data['order_by'];
}
if(isset($data['start']) && $data['start']){
	  $start=$data['start'];
	  $offset = ($start-1)*$limit;
}
$this->db->select($flds);
$this->db->from($data['table']);


if($condition){
	$this->db->where($condition);	
}
if($order_by){
	$this->db->order_by($order_by,'desc');	
}
	
if(isset($start)){
	//echo 'working';
	$this->db->limit($limit, $offset);
}else if(isset($limit)){
	//echo 'test';
	$this->db->limit($limit);
}

	
	// $this->db->limit($limit);

// $this->output->enable_profiler(TRUE) ;
// $this->db->limit(1);
$query = $this->db->get();
//echo $query->num_rows();
if ($query->num_rows()) {
$this->rowss=$query->num_rows();
return $query->result();
} else {
return false;
}
}

}

?>
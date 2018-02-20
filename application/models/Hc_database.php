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

$data['user_rights']=$data['user_rights']?implode("#",$data['user_rights']):'';
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
public function read_info($data) {
$condition='';
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

if(isset($data['limit']) && $data['limit']){
	 $limit=$data['limit'];
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

	
if(isset($start)){
	//echo 'working';
	$this->db->limit($limit, $offset);
}else if(isset($limit)){
	//echo 'test';
	$this->db->limit($limit);
}
	
	// $this->db->limit($limit);


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
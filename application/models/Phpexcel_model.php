<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ahmed Fakhr
 * @email webeasystep@gmail.com
 * @link http://www.webeasystep.com
 */
class Phpexcel_model extends CI_Model {

    function get_users() {
        $query = $this->db->get('customer_jobs');
        return $query->result_array();
    }




}

/* End of file blog_model.php */
    /* Location: ./application/models/blog_model.php */    
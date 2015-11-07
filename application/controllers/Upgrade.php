<?php

/*
 *  Created on :Aug 18, 2015, 6:45:17 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class update {

    public $version;
    public $updates = array();

}

class Upgrade extends CI_Controller {

    function index() {
        $update_list = array();
	

        //Don't edit after this line
        $this->run_upgrades($update_list);
        redirect("login" . "?" . $_SERVER['QUERY_STRING']);
    }

    function run_upgrades($update_list) {
        if (!$this->db->table_exists('update_info')) {
            $this->db->query("create table update_info (version FLOAT)");
            $this->db->query("insert into update_info (version) values ('1.0') ");
        }

        foreach ($update_list as $value) {
            $version_q = $this->db->query(" select * from update_info");
            $version_r = $version_q->row(0);
            $version = $version_r->version;
            if ($value->version > $version) {
                foreach ($value->updates as $row) {
                    $this->db->query($row);
                }
                $this->db->query("update update_info set version = '$value->version' ");
            }

            if ($version == 4.4) {
                //IMPORTANT PATCH
                $this->load->model('New_user_uploads');
                $this->New_user_uploads->patch();
                $this->db->query("update update_info set version = '4.45' ");
            }
        }
    }

}

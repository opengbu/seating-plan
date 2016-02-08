<?php

/*
 *  Created on :Nov 13, 2015, 7:38:40 PM
 *  Author     :Varun Garg <varun.10@live.com>

    This room is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This room is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this room.  If not, see <http://www.gnu.org/licenses/>. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {

    function index() {
        redirect(base_url() . 'Rooms/view_all');
    }

    function secure_hard() {
        if ($this->permissions->get_level() == 0) {
            echo $this->load->view('common/header', '', TRUE);
            $message['errors'] = "Insufficient Privelleges. Please Contact Our Content Head";
            echo $this->load->view('Error_message', $message, TRUE);
            echo $this->load->view('common/footer', '', TRUE);
            die();
        }
        return 1;
    }

    function CreateOrUpdate() {
        $this->secure_hard();

        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('room_no', 'Room Number', 'required');
        $this->form_validation->set_rules('rows', 'Rows', 'required');
        $this->form_validation->set_rules('columns', 'Columns', 'required');

        $this->load->view('common/header');
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            if ($this->input->get("room_id") != NULL) {

                $query = $this->db->get_where('rooms', array('id' => $this->input->get('room_id')));
                if ($query->num_rows() == 0) {
                    echo "<br /><br /><br /><br />No such Room exists";
                    die();
                }
                $form_data = $query->row();
                $this->load->view('Room_form', $form_data);
            } else
                $this->load->view('Room_form');
        } else {
            $this->load->helper('htmlpurifier');
            $form_data = array(
                'room_no' => html_purify($this->input->post('room_no')),
                'rows' => html_purify($this->input->post('rows')),
                'columns' => html_purify($this->input->post('columns')),
            );
            if ($this->input->get('room_id') != "") { // update
                $this->db->update('rooms', $form_data, " id = '" . $this->input->get('room_id') . "'");
                $this->logger->insert('Updated room Number' .  $this->input->post('room_no') . ' (' . $this->input->get('room_id') . ')');
            } else {
                $this->db->insert('rooms', $form_data);
                $this->logger->insert('Created room number - ' . $this->input->post('room_no'));
            }
            redirect(base_url() . 'Rooms/view_all');
        }

        $this->load->view('common/footer');
    }

    function view_all() {

        $this->load->view('common/header');
        $this->load->view('Rooms_all');
        $this->load->view('common/footer');
    }

    function delete() {
        $this->secure_hard();

        $title_q = $this->db->query("select * from rooms where id = '" . $this->input->get('room_id') . "' ");
        $title_r = $title_q->row();
        $title = $title_r->room_no;

        $this->db->query("delete from rooms where id = '" . $this->input->get('room_id') . "'");

        $this->logger->insert('Deleted room ' . $title . ' (' . $this->input->get('room_id') . ')', TRUE);

        redirect(base_url() . 'Rooms/view_all');
    }
	
	/**  Created on :Nov 25, 2015, 2:24:49 AM
 *  Author     :Rishabh Ahuja <rishabhahuja279@gmail.com>*/
	function upload_roomdata()
		{
		$this->load->model('Upload_rooms');
		$data['result']=$this->Upload_rooms->room_data_csv();
		redirect(base_url() . 'Rooms/view_all');
		
		

		}

}

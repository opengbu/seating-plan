<?php

/*
 *  Created on :Nov 13, 2015, 7:38:40 PM
 *  Author     :Varun Garg <varun.10@live.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

    function index() {
        redirect(base_url() . 'Programs/view_all');
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
        $this->form_validation->set_rules('program', 'Program\'s name', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('subjects', 'Subjects', 'required');


        $this->load->view('common/header');
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            if ($this->input->get("program_id") != NULL) {

                $query = $this->db->get_where('program_details', array('id' => $this->input->get('program_id')));
                if ($query->num_rows() == 0) {
                    echo "<br /><br /><br /><br />No such Program exists";
                    die();
                }
                $form_data = $query->row();
                $this->load->view('Program_form', $form_data);
            } else
                $this->load->view('Program_form');
        } else {
            $this->load->helper('htmlpurifier');
            $form_data = array(
                'program' => html_purify($this->input->post('program')),
                'semester' => html_purify($this->input->post('semester')),
                'branch' => html_purify($this->input->post('branch')),
                'subjects' => html_purify($this->input->post('subjects')),
            );
            if ($this->input->get('program_id') != "") { // update
                $this->db->update('program_details', $form_data, " id = '" . $this->input->get('program_id') . "'");
                $this->logger->insert('Updated program - ' . $this->input->post('branch') . ' (' . $this->input->post('branch') .') -' . $this->input->post('program') . ' (' . $this->input->get('program_id') . ')');
            } else {
                $this->db->insert('program_details', $form_data);
                $this->logger->insert('Created program - ' . $this->input->post('branch') . ' (' . $this->input->post('branch') .') -' . $this->input->post('program'));
            }
            redirect(base_url() . 'Programs/view_all');
        }

        $this->load->view('common/footer');
    }

    function view_all() {

        $this->load->view('common/header');
        $this->load->view('Programs_all');
        $this->load->view('common/footer');
    }

    function delete() {
        $this->secure_hard();

        $title_q = $this->db->query("select * from program_details where id = '" . $this->input->get('program_id') . "' ");
        $title_r = $title_q->row();
        $title = $title_r->brach . ' (' .$title_r->semester .') -' .$title_r->program;

        $this->db->query("delete from program_details where id = '" . $this->input->get('program_id') . "'");

        $this->logger->insert('Deleted program ' . $title . ' (' . $this->input->get('program_id') . ')', TRUE);

        redirect(base_url() . 'Programs/view_all');
    }

}

/**  Created on :Nov 25, 2015, 2:24:49 AM
 *  Author     :Rishabh Ahuja <rishabhahuja279@gmail.com>*/
	function upload_sampledata()
		{
		$this->load->model('upload_program');
		$data['result']=$this->upload_form->upload_sampledata_csv();
		redirect(base_url() . 'Rooms/view_all');
		
		

		}


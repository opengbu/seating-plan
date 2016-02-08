<?php

/*
 *  Created on :Nov 13, 2015, 7:38:40 PM
 *  Author     :Varun Garg <varun.10@live.com>

  This student is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This student is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this student.  If not, see <http://www.gnu.org/licenses/>.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    function index() {
        redirect(base_url() . 'Students/view_all');
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
        $this->form_validation->set_rules('roll_no', 'Roll Number', 'required');
        $this->form_validation->set_rules('program_id', 'Program', 'required');

        $this->load->view('common/header');
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            if ($this->input->get("student_id") != NULL) {

                $query = $this->db->get_where('student_details', array('id' => $this->input->get('student_id')));
                if ($query->num_rows() == 0) {
                    echo "<br /><br /><br /><br />No such Student exists";
                    die();
                }
                $form_data = $query->row();
                $this->load->view('Student_form', $form_data);
            } else
                $this->load->view('Student_form');
        } else {
            $this->load->helper('htmlpurifier');
            if ($this->input->get('student_id') != "") { // update
                $form_data = array(
                    'roll_no' => html_purify($this->input->post('roll_no')),
                    'program_id' => html_purify($this->input->post('program_id')),
                );
                $this->db->update('student_details', $form_data, " id = '" . $this->input->get('student_id') . "'");
                $this->logger->insert('Updated Roll Number' . $this->input->post('roll_no') . ' (' . $this->input->get('student_id') . ')');
            } else {
                $arr = explode(' ', html_purify($this->input->post('roll_no')));
                if (!isset($arr[2])) { 
                    $form_data = array(
                        'roll_no' => html_purify($this->input->post('roll_no')),
                        'program_id' => html_purify($this->input->post('program_id')),
                    );
                    $this->db->insert('student_details', $form_data);
                    $this->logger->insert('Created roll number - ' . $this->input->post('roll_no'));
                } else {
                    $roll_prefix = $arr[0];
                    $roll_beg = $arr[1];
                    $roll_end = $arr[2];
                    
                    $form_data = array(
                        'program_id' => html_purify($this->input->post('program_id')),
                    );
                    $beg_len = strlen($roll_beg);
                    $end_len = strlen($roll_end);
                    
                    if($end_len > $beg_len) $max_len = $end_len;
                    else $max_len = $beg_len;
                    
                    for($i = $roll_beg; $i<=$roll_end;$i++)
                    {
                        $new_roll_no = $roll_prefix . str_pad($i, $max_len, "0",STR_PAD_LEFT);
                        $form_data['roll_no'] = $new_roll_no;
                        $this->db->insert('student_details', $form_data);
                    }
                    $this->logger->insert('Created roll numbers Range - ' . $this->input->post('roll_no'));
                }
            }
            redirect(base_url() . 'Students/view_all');
        }

        $this->load->view('common/footer');
    }
	
	
	
	

    function view_all() {

        $this->load->view('common/header');
        $this->load->view('Students_all');
        $this->load->view('common/footer');
    }

    function delete() {
        $this->secure_hard();

        $title_q = $this->db->query("select * from student_details where id = '" . $this->input->get('student_id') . "' ");
        $title_r = $title_q->row();
        $title = $title_r->student_no;

        $this->db->query("delete from student_details where id = '" . $this->input->get('student_id') . "'");

        $this->logger->insert('Deleted student ' . $title . ' (' . $this->input->get('student_id') . ')', TRUE);

        redirect(base_url() . 'Students/view_all');
    }
	
	function upload_studentdata()
	{
		$this->load->model('Upload_students');
		$data['result']=$this->Upload_students->student_data_csv();
		redirect(base_url() . 'Students/view_all');
		
	}

}

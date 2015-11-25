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

class room {

    var $rows;
    var $coloumns;
    var $room_no;
    var $data;
    var $odd_subjects = array();
    var $even_subjects = array();

    public function __construct($rows, $coloumns) {
        $this->rows = $rows;
        $this->coloumns = $coloumns;
        for ($i = 1; $i <= $rows; $i++) {
            for ($j = 1; $j <= $coloumns; $j++) {
                $this->data[$i][$j] = "EMPTY";
            }
        }
    }

    public function get_data() {
        return $this->data;
    }

    function get_odd_even($sub_name) {
        if (in_array($sub_name, $this->odd_subjects))
            return "odd";
        else if ((in_array($sub_name, $this->even_subjects)))
            return "even";
        else {
            $odd_count = 0;
            $even_count = 0;


            for ($i = 1; $i <= $this->rows; $i++) {
                for ($j = 1; $j <= $this->coloumns; $j+=2) {
                    if ($this->data[$i][$j] == "EMPTY")
                        $odd_count ++;
                }
            }

            for ($i = 1; $i <= $this->rows; $i++) {
                for ($j = 2; $j <= $this->coloumns; $j+=2) {
                    if ($this->data[$i][$j] == "EMPTY")
                        $even_count ++;
                }
            }
            if ($odd_count == 0 && $even_count == 0)
                return "FULL";
            if ($odd_count >= $even_count)
                return "odd";
            else
                return "even";
        }
    }

    function insert($roll_no, $pos, $sub) {
        if ($pos == "FULL")
            return -1;
        if ($pos == "odd")
            $j = 1;
        else
            $j = 2;

        for (; $j <= $this->coloumns; $j+=2) {
            for ($i = 1; $i <= $this->rows; $i++) {

                if ($this->data[$i][$j] == "EMPTY") {
                    $this->data[$i][$j] = $roll_no;
                    if ($pos == "odd")
                        array_push($this->odd_subjects, $sub);
                    else
                        array_push($this->even_subjects, $sub);
                    return 1;
                }
            }
        }
        return -1;
    }

}

class Master_Element {

    var $min;
    var $max;
    var $room_no;
    var $sub;

}

function push_students(&$rooms, $students, $sub, &$master) {
    $i = 0;
    $rlen = count($rooms);
    $master_elem = new Master_Element();
    $master_elem->min = $students[0];
    $previousValue = null;
    foreach ($students as $student) {
        $bool = 0;
        while ($bool != 1) {
            if ($i >= $rlen) {
                echo "Error: (Student Overflow): Students are more than rooms. <br />" . $i;
                print_r($rooms);
                die();
            }
            $room = $rooms[$i]; // we only go to next room when it fails
            $pos = $room->get_odd_even($sub);
            if ($room->insert($student, $pos, $sub) == 1) {
                $rooms[$i] = $room; //update our array
                $bool = 1;
            } else {
                if ($previousValue != $master_elem->min) { //atleast one student was inserted in that room
                    $master_elem->max = $previousValue;
                    $master_elem->sub = $sub;
                    $master_elem->room_no = $room->room_no;
                    array_push($master, $master_elem);

                    $master_elem->min = $student;
                }


                $i++; //we failed, now next room
            }
        }
        $previousValue = $student;
    }
    if ($master_elem->min != end($students)) {
        $room = $rooms[$i];

        $master_elem->max = end($students);
        $master_elem->room_no = $room->room_no;
        $master_elem->sub = $sub;
        array_push($master, $master_elem);
    }
}

class Exams extends CI_Controller {

    function List_schedules() {
        $this->load->view('common/header_2');

        $this->load->view('List_schedules');
        $this->load->view('common/footer_2');
    }

    function print_data() {
        $query = $this->db->get_where('exams', array('id' => $this->input->get('exam_id')));
        $row = $query->row();
        $data['rooms'] = unserialize($row->arrangement_data);
        $data['master'] = unserialize($row->master);

        $this->load->view('common/header_2', $data);

        $this->load->view('Display_exam', $data);
        $this->load->view('common/footer_2', $data);
    }

    function pdf_data() {
        $query = $this->db->get_where('exams', array('id' => $this->input->get('exam_id')));
        $row = $query->row();
        $data['rooms'] = unserialize($row->arrangement_data);

        $this->load->view('common/header_2', $data);

        $this->load->view('Exam_excel', $data);
        $this->load->view('common/footer_2', $data);
    }

    function index() {
        redirect(base_url() . 'Exams/view_all');
    }

    function get_subjects() {
        $pg_id = $this->input->get('pg_id');
        $sub_id = $this->input->get('sub_id');
        $res_q = $this->db->query("select subjects from program_details where id = '$pg_id'");
        $res = $res_q->row();
        $arr = explode(' ', $res->subjects);
        foreach ($arr as $element) {
            $new_arr[$element] = $element;
        }
        echo form_dropdown('subject_' . $sub_id, $new_arr, '', ' data-width="100%" data-live-search="true"');
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
        $this->form_validation->set_rules('date', 'Exam\'s Date', 'required');
        $this->form_validation->set_rules('shift', 'Shift', 'required');
        $this->form_validation->set_rules('time', 'time', 'required');


        $this->load->view('common/header');
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            if ($this->input->get("exam_id") != NULL) {

                $query = $this->db->get_where('exams', array('id' => $this->input->get('exam_id')));
                if ($query->num_rows() == 0) {
                    echo "<br /><br /><br /><br />No such Exam exists";
                    die();
                }
                $form_data = $query->row();
                $this->load->view('Exam_form', $form_data);
            } else
                $this->load->view('Exam_form');
        } else {
            $this->load->helper('htmlpurifier');


            $i = 1;
            $room_ids = '';
            $room_arr = array();

            while (isset($_POST['room_' . $i])) {
                $room_ids .= $_POST['room_' . $i] . ' ';

                $q = $this->db->query("select * from rooms where id = '" . $_POST['room_' . $i] . " '");
                $res = $q->row();
                $room = new room($res->rows, $res->columns);
                $room->room_no = $res->room_no;
                array_push($room_arr, $room);
                $i++;
            }


            $master = array();

            $i = 1;
            $pg_sub_ids = '';
            while (isset($_POST['subject_' . $i])) {
                $pg_sub_ids .= $_POST['program_' . $i] . ':' . $_POST['subject_' . $i] . ' ';

                $q = $this->db->query("select * from student_details where program_id = '" . $_POST['program_' . $i] . " '");
                $student_arr = array();
                foreach ($q->result() as $row) {
                    array_push($student_arr, $row->roll_no);
                }

                push_students($room_arr, $student_arr, $_POST['subject_' . $i], $master);

                $i++;
            }

            $form_data = array(
                'date' => html_purify($this->input->post('date')),
                'shift' => html_purify($this->input->post('shift')),
                'time' => html_purify($this->input->post('time')),
                'pg_sub_ids' => $pg_sub_ids,
                'room_ids' => $room_ids,
                'arrangement_data' => serialize($room_arr),
                'master' => serialize($master),
            );
            if ($this->input->get('exam_id') != "") { // update
                if (strlen($room_ids) == 0 || strlen($pg_sub_ids) == 0) {
                    unset($form_data['pg_sub_ids']);
                    unset($form_data['room_ids']);
                    unset($form_data['arrangement_ids']);
                    unset($form_data['master']);
                }
                $this->db->update('exams', $form_data, " id = '" . $this->input->get('exam_id') . "'");
                $this->logger->insert('Updated exam - ' . $this->input->post('branch') . ' (' . $this->input->post('branch') . ') -' . $this->input->post('exam') . ' (' . $this->input->get('exam_id') . ')');
            } else {
                $this->db->insert('exams', $form_data);
                $this->logger->insert('Created exam - ' . $this->input->post('branch') . ' (' . $this->input->post('branch') . ') -' . $this->input->post('exam'));
            }
            redirect(base_url() . 'Exams/view_all');
        }

        $this->load->view('common/footer');
    }

    function view_all() {

        $this->load->view('common/header');
        $this->load->view('Exams_all');
        $this->load->view('common/footer');
    }

    function delete() {
        $this->secure_hard();

        $title_q = $this->db->query("select * from exams where id = '" . $this->input->get('exam_id') . "' ");
        $title_r = $title_q->row();
        $title = $title_r->brach . ' (' . $title_r->semester . ') -' . $title_r->exam;

        $this->db->query("delete from exams where id = '" . $this->input->get('exam_id') . "'");

        $this->logger->insert('Deleted exam ' . $title . ' (' . $this->input->get('exam_id') . ')', TRUE);

        redirect(base_url() . 'Exams/view_all');
    }

}

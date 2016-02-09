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
?>
<script>
    function del_ask(str, id)
    {
        var x = confirm("Do you want to delete " + str + "?");
        if (x === true)
            location.href = "<?php echo base_url() ?>" + "Exams/delete?exam_id=" + id;
    }
</script>
<div class ="col-sm-10">
    <ul class="nav nav-list col-sm-12">
        <li class="list-group-item">
            <div class="row">
                <b>
                    <div class="col-sm-2">
                        Exam Date
                    </div>
                    <div class="col-sm-2">
                        Shift
                    </div>
                    <div class="col-sm-2">
                        Time
                    </div>
                    <div class="col-sm-2">
                        Edit
                    </div>

                    <div class="col-sm-2">
                        Manage Status
                    </div>
                    <div class="col-sm-2">
                        Print
                        <div class="pull-right">
                            Delete</div>
                    </div>
                </b>
            </div>
        </li>

        <?php
        $current_user_type = $this->session->userdata('type');
        $query = $this->db->query('select * from exams');
        foreach ($query->result() as $row) {
            ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-2">
                        <?php
                        if ($row->status == 0) {
                            $color = 'blue';
                        } else if ($row->status == 1) {
                            $color = 'green';
                        }
                        echo '<b><font color="' . $color . '">' . $row->date . '</font></b>';
                        ?>

                    </div>

                    <div class="col-sm-2">
                        <?php
                        echo ucfirst($row->shift);
                        ?>
                    </div>
                    <div class="col-sm-2">
                        <?php
                        echo $row->time;
                        ?>

                    </div>
                    <div class="col-sm-2">

                        <?php
                        if ($this->permissions->get_level() > 0)
                            echo '<a class="btn btn-xs btn-default " href="' . base_url() . "Exams/CreateOrUpdate?exam_id=$row->id" . '"><i class="fa fa-pencil fa-fw"></i>Edit</a>';
                        else
                            echo "<font color='gray'>You cant edit this</font>";
                        ?>

                    </div>
                    <div class="col-sm-2">
                        <?php
                        $c_string = base_url() . 'exams/update_status?exam_id=' . $row->id;
                        $options['Default'] = 'Select';

                        $options[$c_string . '&status=1'] = 'Mark as Visible';
                        $options[$c_string . '&status=0'] = 'Mark as Hidden';
                        unset($options[$c_string . '&status=' . $row->status]);

                        echo form_dropdown('', $options, '', 'class="selectpicker" data-style="btn btn-xs" data-width="60%"'
                                . 'onchange="if (this.value) window.location.href = this.value"');
                        unset($options);
                        ?>
                    </div>
                    <div class="col-sm-2">
                        <?php
                        echo '<a class="btn btn-xs btn-success " href="' . base_url() . "Exams/Print_data?exam_id=$row->id" . '"></i>Print</a>';

                        if ($this->permissions->get_level() == 2 || $this->permissions->get_level() >= 4) {
                            ?>
                            <a onclick="del_ask('<?php echo $row->date; ?>',
                                                    '<?php echo $row->id ?>')" class="pull-right btn btn-xs btn-danger"><i class="fa fa-trash-o fa-lg"></i> Delete</a>  
                            <?php
                        } else
                            echo "<font color='gray'>You cant delete this</font>";
                        ?>

                    </div>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
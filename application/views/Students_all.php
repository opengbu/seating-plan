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
            location.href = "<?php echo base_url() ?>" + "Students/delete?student_id=" + id;
    }
</script>
<div class ="col-sm-10">
    <ul class="nav nav-list col-sm-12">
        <li class="list-group-item">
            <div class="row">
                <b>
                    <div class="col-sm-3">
                        Roll Number
                    </div>
                    <div class="col-sm-5">
                        Program Info
                    </div>
                    <div class="col-sm-2">
                        Edit
                    </div>
                    <div class="col-sm-2">
                        <div class="pull-right">
                            Delete</div>
                    </div>
                </b>
            </div>
        </li>

        <?php
        $current_user_type = $this->session->userdata('type');
        $query = $this->db->query('select student_details.*, program, branch, semester from student_details,program_details where student_details.program_id = program_details.id');
        foreach ($query->result() as $row) {
            ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-3">
                        <?php
                        echo $row->roll_no;
                        ?>
                    </div>

                    <div class="col-sm-5">
                        <?php
                        echo $row->branch . ' (' .$row->semester . ') - '. $row->program;
                        ?>
                    </div>
                    <div class="col-sm-2">

                        <?php
                        if ($this->permissions->get_level() > 0)
                            echo '<a class="btn btn-xs btn-default " href="' . base_url() . "Students/CreateOrUpdate?student_id=$row->id" . '"><i class="fa fa-pencil fa-fw"></i>Edit</a>';
                        else
                            echo "<font color='gray'>You cant edit this</font>";
                        ?>

                    </div>
                    <div class="col-sm-2">
                        <?php
                        if ($this->permissions->get_level() == 2 || $this->permissions->get_level() >= 4) {
                            ?>
                            <a onclick="del_ask('<?php echo $row->roll_no;?>',
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
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
<div class ="col-sm-12">
    <ul class="nav nav-list col-sm-12">
        <li class="list-group-item">
            <div class="row">
                <b>
                    <div class="col-sm-4">
                        Exam Date
                    </div>

                    <div class="col-sm-3">
                        Time
                    </div>
                    <div class="col-sm-2">
                        Shift
                    </div>
                    <div class="col-sm-3">
                        <div class="pull-right">
                            View
                        </div>
                    </div>
                </b>
            </div>
        </li>

        <?php
        $current_user_type = $this->session->userdata('type');
        $query = $this->db->query('select * from exams order by id desc');
        foreach ($query->result() as $row) {
            ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4">
                        <?php
                        echo $row->date;
                        ?>
                    </div>

                    <div class="col-sm-3">
                        <?php
                        echo $row->time;
                        ?>

                    </div>
                    
                    <div class="col-sm-2">
                        <?php
                        echo ucfirst($row->shift);
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <div class="pull-right">
                            <?php
                            echo '<a class="btn btn-xs btn-success " href="' . base_url() . "Exams/Print_data?exam_id=$row->id" . '"></i>View</a>';
                            ?>&nbsp;&nbsp;
							<?php
                            echo '<a class="btn btn-xs btn-warning " href="' . base_url() . "Exams/Print_data?exam_id=$row->id&print=1" . '"></i>Print</a>';
                            ?>&nbsp;&nbsp;&nbsp;<?php
                            echo '<a class="btn btn-xs btn-danger" href="' . base_url() . "Exams/Print_data?exam_id=$row->id&pdf=1" . '"></i>PDF</a>';
                            ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
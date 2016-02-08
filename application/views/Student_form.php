<?php
/*
 *  Created on :Sep 10, 2015, 7:24:49 AM
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

function add_prefix(&$item1, $key, $prefix) {
    $item1 = $prefix . $item1;
}
?>
<div class="col-sm-8" >
    <?php
    echo form_open(current_url() . "?" . $_SERVER['QUERY_STRING']);
    ?>

    <label>Roll Number</label>
    <input type="text" class="form-control" name="roll_no" value="<?php echo set_value('roll_no', @$roll_no); ?>" placeholder="13ics057"/>

    <label><font color="red">Note: You can perform a bulk insert of a range in this format - "</font>13ics 001 057<font color="red">"</font></label>
    <br />
    (The 2 spaces between parameters <b>13ics 001 057</b> are important)
    <br /><br />

    <label>Program</label><br />
    <?php
    $programs;
    $programs_q = $this->db->query("select id,program,branch,semester from program_details");
    foreach ($programs_q->result() as $row) {
        $programs[$row->id] = $row->branch . ' ( ' . $row->semester . ' ) ' . $row->program;
    }
    echo form_dropdown('program_id', $programs, set_value('program_id', @$program_id), 'class="selectpicker" data-width="100%" data-live-search="true"');
    ?>
    <br /><br />
    <?php
    echo '<label><font color="red">' . validation_errors() . '</font></label><br>';
    ?>
    <div><input type="submit" value="Save / Update" class="btn btn-primary"/></div><br>
    <?php
    echo form_close();
    ?>


</div>

<div class="col-sm-10" >
    <form action="<?= site_url('students/upload_studentdata') ?>" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
        <table>
            <tr>
                <td> Choose your .csv file: </td>
                <td><input type="file" class="" name="userfile" id="userfile"  align="center"/>
                </td>
            </tr></table> 
        <button type="submit" name="submit" class="btn btn-primary"  > Save</button>
    </form>
</div>
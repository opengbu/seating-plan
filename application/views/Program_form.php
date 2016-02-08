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

    <label>Program Name</label>
    <input type="text" class="form-control" name="program" value="<?php echo set_value('program', @$program); ?>" placeholder="Dual Degree Program"/>
    <br>

    <label>Branch</label>
    <input type="text" class="form-control" name="branch" value="<?php echo set_value('branch', @$branch); ?>" placeholder="CSE"/>
    <br>

    <?php
//    echo form_dropdown('sc_name', $schools, set_value('sc_name', @$sc_name), 'class="selectpicker"');
    ?>

    <label>Semester</label>
    <input type="text" class="form-control" name="semester" value="<?php echo set_value('semester', @$semester); ?>" placeholder="5"/>
    <br>

    <label>Subjects</label>
    <input type="text" class="form-control" name="subjects" value="<?php echo set_value('subjects', @$subjects); ?>" placeholder="CY101 MA101 CE101 CS101 EC101 HU101 SS101"/>

    <?php
    echo '<br /><label><font color="red">' . validation_errors() . '</font></label><br>';
    ?>
    <br>
    <div><input type="submit" value="Save / Update" class="btn btn-primary"/></div><br>

    <?php
    echo form_close();
    ?>

</div>


<div class="col-sm-10" >






<form action="<?=site_url('Programs/upload_programdata')?>" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
<table>
<tr>
<td> Choose your .csv file: </td>
<td><input type="file" class="" name="userfile" id="userfile"  align="center"/>
</td>
</tr></table> 
<button type="submit" name="submit" class="btn btn-primary"  > Save</button>
</form>
</div>
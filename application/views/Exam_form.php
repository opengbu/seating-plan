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
<script type="text/javascript" src="<?php echo base_url() . 'application/views/common/' . 'js/bootstrap-datepicker.js' ?>"></script>
<link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/datepicker.css' ?>">
<script>
    $i = 0;

    function add_sub($pg_id, $sub_id)
    {
        $.ajax({
            type: "GET",
            url: "<?= base_url('Exams/get_subjects?pg_id=') ?>" + $pg_id + "&sub_id=" + $sub_id,
            success: function (msg) {
                var pg = document.getElementById("sub_" + $sub_id);
                pg.innerHTML = msg;
            }
        });

    }

    function add_pg_sub()
    {
        $i++;
        var data = '<div class="row" id = "pg_sub_' + $i + '"><div class="col-sm-6"> \ \n' +
                '<?php
$programs;
$programs_q = $this->db->query("select id,program,branch,semester from program_details");
$beg_r = $programs_q->row(0);
$beg_id = $beg_r->id; //to initalize later
//echo ;
echo '<select class="selectpicker" onchange="add_sub(this.value,'
?>' + $i + ')" name="program_' + $i + '" \
<?php
echo ' data-width="100%" data-live-search="true">';

foreach ($programs_q->result() as $row) {
    $programs[$row->id] = $row->branch . ' ( ' . $row->semester . ' ) ' . $row->program;
    echo '<option value = "' . $row->id . '">' . $programs[$row->id] . '</option>' . '\\ \n';
}
echo '</select> \\ \n';
echo '</div><div class="col-sm-3" id="sub_';
?>' + $i + '"></div>'
                + '<div class = "btn btn-danger btn-xs" onclick="$(\'#pg_sub_' + $i + '\').remove();"> Remove </div>'
                + '<br /><br /></div>';
        $(".pg_sub").append(data);
        add_sub(<?= $beg_id ?>, $i);

        $('.selectpicker').selectpicker('refresh');

    }

    $ri = 0;
    function add_room()
    {
        $ri++;
        var data = '<?php
$programs;
$programs_q = $this->db->query("select id,room_no,rows,columns from rooms");
echo '<div class="row"><div class="col-sm-6"> \\ \n';
echo '<select '
?> name="room_' + $ri + '" \
<?php
echo 'class="selectpicker" data-width="100%" data-live-search="true">';

foreach ($programs_q->result() as $row) {
    $programs[$row->id] = $row->room_no . ' ( ' . $row->rows * $row->columns . ' : ' . $row->rows . ' * ' . $row->columns . ' ) ';
    echo '<option value = "' . $row->id . '">' . $programs[$row->id] . '</option>' . '\\ \n';
}
echo '</select> \\ \n';
echo '</div>';
?>' + '<br /></div>';
        $(".room_sub").append(data);
        $('.selectpicker').selectpicker('refresh');
    }

    function addParam() {
        document.getElementsByName('max_programs')[0].value = $i;
    }

    $('.datepicker').datepicker({
        autoclose: true
    });
</script>
<div class="col-sm-8" >
    <?php
    echo form_open(current_url() . "?" . $_SERVER['QUERY_STRING']);
    ?>

    <label>Date</label>
    <input type="text" class="form-control" name="date" value="<?php echo set_value('date', @$date); ?>" placeholder="YYYY-MM-DD"
           data-provide="datepicker" data-date-format="yyyy-mm-dd" class="datepicker form-control"/>
    <br>

    <label>Shift</label>
    <input type="text" class="form-control" name="shift" value="<?php echo set_value('shift', @$shift); ?>" placeholder="first"/>
    <br>


    <div id="pg_sub" class="pg_sub">
        <b>Programs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>  
        <input type="button" onclick="add_pg_sub()" value="Add program" class="btn btn-warning btn-xs"/><br /><br />

    </div>

    <label>Time</label>
    <input type="text" class="form-control" name="time" value="<?php echo set_value('time', @$time); ?>" placeholder="10:30 AM -12:30 PM"/>
    <br>


    <!--
    <div id="room_sub" class="room_sub">
        <b>Rooms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>  
        <input type="button" onclick="add_room()" value="Add Room" class="btn btn-warning btn-xs"/><br /><br />
    </div>
    -->

    <?php
    echo '<br /><label><font color="red">' . validation_errors() . '</font></label><br>';
    ?>

    <input type='hidden' name='max_programs' />
    <div><input type="submit" value="Save / Update" class="btn btn-primary" onclick='addParam()' /></div>

    <?php
    echo form_close();
    ?>

</div>
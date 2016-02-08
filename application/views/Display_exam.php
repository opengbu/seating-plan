<?php
if ($this->input->get('pdf') != null)
    $pdf_flag = $this->input->get('pdf');
else
    $pdf_flag = 0;

if ($pdf_flag == 0) {
    ?>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <?php
} else {
    ?>
    <?php
}
?>
<style>
    .table
    {
        background-color: #95e594;
        margin-bottom: 0px;
    }
</style>
<div class="container-fluid" style="font-family: 'Roboto', sans-serif;">

    <?php
    $query = $this->db->query("select * from exams where id = '" . $this->input->get('exam_id') . "'");
    $exam_info = $query->row();
    ?>
    <div class="row col-sm-12">
        <div class="pull-left">
            <h2>Master Plan</h2>
        </div>
        <div class="pull-right">
            <h3><?php
    echo ucfirst($exam_info->shift) . ' Shift: ' . $exam_info->time . ', ' . $exam_info->date;
    ?></h3>
        </div>
    </div>
    <ul class = "nav nav-list col-sm-12" style = "padding-bottom: 1cm;">

        <li class = "list-group-item">
            <b><div class = "row">
                    <div class = "col-sm-3">
                        <div class = "text-center">Roll Number </div>
                        First <div class = "pull-right">Last</div>
                    </div>

                    <div class = "col-sm-3">
                        Batch
                    </div>

                    <div class = "col-sm-2">
                        Subject
                    </div>

                    <div class = "col-sm-2">
                        Room Number
                    </div>

                    <div class = "col-sm-2">
                        Number Of Students
                    </div>
                </div></b>
        </li>
        <?php
        foreach ($master as $element) {
            $query = $this->db->query('select program_details.* from program_details,student_details where '
                    . "roll_no = '$element->min' and program_id = program_details.id");
            $program_data = $query->row();
            ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-3">
                        <?= $element->min; ?>

                        <div class="pull-right">
                            <?= $element->max; ?>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <?php
                        echo $program_data->branch . ' (' . $program_data->semester . ') - ' . $program_data->program;
                        ?>
                    </div>

                    <div class="col-sm-2">
                        <?= $element->sub; ?>
                    </div>

                    <div class="col-sm-2">
                        <?= $element->room_no; ?>
                    </div>

                    <div class="col-sm-2">
                        <?= $element->num_students; ?>
                    </div>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>

    <h2>Room Wise Plan</h2>
    <?php
    foreach ($rooms as $room) {
	$flag = 0;
                foreach ($master as $element) {
                    if ($element->room_no == $room->room_no) {
                        $flag = 1;
                        break;
                    }
                }
                if ($flag == 0)
                    continue; //empty room
					
        ?>
        <div class="row" style="    border: 2px solid #73AD21; border-radius: 25px 25px 0px 0px;">
            <div class="text-center" style="padding-top: 5px">
                <b><?= $room->room_no ?> [<?php
    foreach ($room->odd_subjects as $odd)
        echo $odd . ' ';

    foreach ($room->even_subjects as $even)
        echo $even . ' ';
        ?> ]</b>
            </div>
            <div class="row col-sm-12">
                    <?php
                    echo '&nbsp;&nbsp;' . ucfirst($exam_info->shift) . ' Shift: ' . $exam_info->time . ', ' . $exam_info->date;
                    ?>
                <br />
            </div>
            <div class="row col-sm-12 text-center">
                Board Facing Side 
            </div>
            <table class="text-center table table-bordered table-striped  table-responsive" style="margin-top: 5px;">

                <?php
                for ($i = 1; $i <= $room->rows; $i++) {
                    echo '<tr >';
                    for ($j = 1; $j <= $room->coloumns; $j++) {
                        echo '<td> ';
                        if ($room->data[$i][$j] != "EMPTY")
                            echo $room->data[$i][$j];
                        else
                            echo '<font color="GREY">BLANK</font>';
                        echo ' </td>';
                    }
                    echo '</tr />';
                }
                ?>
            </table>
        </div>
        <br /><br />
        <?php
    }
    ?>
</div>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<style>
    .table
    {
        background-color: #95e594;
        margin-bottom: 0px;
    }
</style>
<div class="container" style="font-family: 'Roboto', sans-serif;">

    <h2>Master Plan</h2>
    <ul class="nav nav-list col-sm-12" style="padding-bottom: 1cm;">

        <li class="list-group-item">
            <b><div class="row">
                    <div class="col-sm-3">
                        Starting Roll Number
                    </div>

                    <div class="col-sm-3">
                        Last Roll Number
                    </div>

                    <div class="col-sm-3">
                        Subject
                    </div>

                    <div class="col-sm-3">
                        Room Number
                    </div>
                </div></b>
        </li>
        <?php
        foreach ($master as $element) {
            ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-3">
                        <?= $element->min; ?>
                    </div>

                    <div class="col-sm-3">
                        <?= $element->max; ?>
                    </div>

                    <div class="col-sm-3">
                        <?= $element->sub; ?>
                    </div>

                    <div class="col-sm-3">
                        <?= $element->room_no; ?>
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
        ?>
        <div class="row text-center" style="    border: 2px solid #73AD21; border-radius: 25px 25px 0px 0px;">
            <div style="padding-top: 5px">
                <b><?= $room->room_no ?> [<?php
                    foreach ($room->odd_subjects as $odd)
                        echo $odd . ' ';

                    foreach ($room->even_subjects as $even)
                        echo $even . ' ';
                    ?> ]</b>
            </div>
            <table class="table table-bordered table-striped  table-responsive" style="margin-top: 5px;">

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
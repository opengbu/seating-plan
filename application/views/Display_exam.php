<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<style>
    .table
    {
        background-color: #95e594;
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
        echo '<table class="table table-striped table-hover table-responsive">';
        ?>
        <thead>
            <tr>
                <th><?= $room->room_no ?></th>
            </tr>
        </thead>
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
        echo '</table><br />';
    }
    ?>
</div>
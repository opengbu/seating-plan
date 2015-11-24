<div class="container">
    <?php
    foreach ($rooms as $room) {
        echo '<table class="table table-striped">';
        ?>
        <thead>
            <tr>
                <th><?=$room->room_no?></th>
            </tr>
        </thead>
        <?php
        for ($i = 1; $i <= $room->rows; $i++) {
            echo '<tr >';
            for ($j = 1; $j <= $room->coloumns; $j++)
                echo '<td> ' . $room->data[$i][$j] . ' </td>';
            echo '</tr />';
        }
        echo '</table><br /><br />';
    }
    ?>
</div>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach ($rooms as $room) {
    echo $room->room_no . '<br /><br />';
    echo '<table>';
    for ($i = 1; $i <= $room->rows; $i++) {
        echo '<tr >';
        for ($j = 1; $j <= $room->coloumns; $j++)
            echo '<td> ' . $room->data[$i][$j] . ' </td>';
        echo '</tr />';
    }
    echo '</table><br /><br />';
}


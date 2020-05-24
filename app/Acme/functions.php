<?php
function recursive($number) {
    if (strlen($number) == 1) {
        return $number;
    } else {
        $number = $number."";
        $n = $number[0] + $number[1]."";
        while (strlen($n) > 1) {
            $n = $n[0] + $n[1];
        }
        return $n;
    }
}

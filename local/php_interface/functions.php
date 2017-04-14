<?php

    function FormatNumber($digit) {
        $res = number_format($digit, 0, ' ', ' ');;
        return $res;
    }
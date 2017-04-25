<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

    if (!function_exists('SliceOnTwoColumns')) {
        function SliceOnTwoColumns($array) {
            $countValues = count($array);
            $res = ceil($countValues/2);
            return $res;
        }
    }
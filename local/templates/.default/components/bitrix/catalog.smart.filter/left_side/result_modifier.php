<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    require_once($templateFolder ."/functions.php");
    
    $arResult["TOTAL_COUNT_WITH_VALUES"] = 0;
    $totalCountInColumns = 14;
    foreach($arResult["ITEMS"] as $key=>$arItem) {
        if(
            empty($arItem["VALUES"])
            || isset($arItem["PRICE"])
        )
            continue;

        if (
            $arItem["DISPLAY_TYPE"] == "A"
            && (
                $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
            )
        )
            continue;
            
        $arResult["ITEMS"][$key]["UPPER_NAME"] = ToUpper($arItem["NAME"]);
        
        $sliceValues = array_slice($arItem["VALUES"], 0, $totalCountInColumns);
        $sliceValues2 = array_slice($arItem["VALUES"], $totalCountInColumns);
        $arResult["ITEMS"][$key]["VALUES_1"] = $sliceValues;
        $arResult["ITEMS"][$key]["VALUES_2"] = $sliceValues2;
        
        $arResult["ITEMS"][$key]["COUNT_VALUES_IN_COLUMN_PART_1"] = SliceOnTwoColumns($sliceValues);
        
        $arResult["ITEMS"][$key]["COUNT_VALUES_IN_COLUMN_PART_2"] = SliceOnTwoColumns($sliceValues2);
        
        $arResult["ITEMS"][$key]["COUNT_VALUES_IN_COLUMN"] = SliceOnTwoColumns($arItem["VALUES"]);
        
        $arResult["TOTAL_COUNT_WITH_VALUES"]++;
    }
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    require_once(__DIR__ ."/functions.php");
    
    $arResult["TOTAL_COUNT_WITH_VALUES"] = 0;
    $totalCountInColumns = 14;
    $morpher = new Morpher;
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
        
        if (!empty($sliceValues2)) {
            $arResult["ITEMS"][$key]["PLURAL_WORD"] = $morpher->GetPluralByWord(ToLower($arItem["NAME"]));
            if (empty($arResult["ITEMS"][$key]["PLURAL_WORD"])) {
                $arResult["ITEMS"][$key]["PLURAL_WORD"] = $arItem["NAME"];
            }
        }
        
        $arResult["ITEMS"][$key]["COUNT_VALUES_IN_COLUMN_PART_1"] = SliceOnTwoColumns($sliceValues);
        
        $arResult["ITEMS"][$key]["COUNT_VALUES_IN_COLUMN_PART_2"] = SliceOnTwoColumns($sliceValues2);
        
        $arResult["ITEMS"][$key]["COUNT_VALUES_IN_COLUMN"] = SliceOnTwoColumns($arItem["VALUES"]);
        
        $arResult["TOTAL_COUNT_WITH_VALUES"]++;
    }
    
    //Поля для сортировки
    $arResult["SORT_FIELDS"] = array(
        array(
            "TITLE" => GetMessage("SORT_BY_PRICE_TITLE"),
            "FIELD" => "CATALOG_PRICE_1"
        )
    );
    
    
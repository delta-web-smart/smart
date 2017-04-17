<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    CModule::IncludeModule("iblock");
    global ${$arParams["FILTER_NAME"]};
    $arrFilter = ${$arParams["FILTER_NAME"]};
    $obCache = new CPHPCache;
    $life_time = $arParams['CACHE_TIME'];

    $cache_id = "count-elements-".$this->GetTemplateName()."-".$arParams["IBLOCK_ID"];

    if (!empty($arrFilter)) {
        $cache_id .= "-".serialize($arrFilter);
    }

    $cacheData = $obCache->InitCache($life_time, $cache_id, "/");
    if ($arParams['CACHE_TYPE'] == 'N') {
        $cacheData = false;
    }

    if($cacheData):
        $vars = $obCache->GetVars();
        $res = $vars["COUNT_ELEMENTS"];
    else:
        $arFilter = array("IBLOCK_ID"=>$arParams["IBLOCK_ID"]);
        if (!empty($arrFilter)) {
            $arrFilter = array_merge($arFilter, $arrFilter);
        }
        $arSelect = $arParams["FIELD_CODE"];
        $res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect)->SelectedRowsCount();
    endif;
    if($obCache->StartDataCache()):
      $obCache->EndDataCache(array("COUNT_ELEMENTS" => $res));
    endif;
    $arResult["COUNT_ELEMENTS"] = $res;
    $this->IncludeComponentTemplate();
?>
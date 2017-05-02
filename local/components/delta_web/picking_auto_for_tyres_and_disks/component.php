<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    if (empty($arParams["IBLOCK_ID"])) {
        return false;
    }
    CModule::IncludeModule("iblock");
    $obCache = new CPHPCache;
    $life_time = $arParams['CACHE_TIME'];

    $cache_id = "picking-auto-for-tyres-and-disks-".$this->GetTemplateName()."-".$arParams["IBLOCK_ID"];

    $pickingAutoForTyresAndDisks = new PickingAutoForTyresAndDisks;
    
    $cacheData = $obCache->InitCache($life_time, $cache_id, "/");
    if ($arParams['CACHE_TYPE'] == 'N') {
        $cacheData = false;
    }

    if($cacheData):
        $vars = $obCache->GetVars();
        $res = $vars["VENDOR"];
    else:
        $res = $pickingAutoForTyresAndDisks->GetVendors($arParams["IBLOCK_ID"]);
    endif;
    if($obCache->StartDataCache()):
      $obCache->EndDataCache(array("VENDOR" => $res));
    endif;
    $arResult["VENDOR"] = $res;
    
    if (!empty($_POST)) {
        $values = array();
        foreach($_POST as $name => $value) {
            $values[$name] = htmlspecialchars(stripslashes($value));
        }
        if (!empty($values["VENDOR"]) && !empty($values["CAR"]) && !empty($values["YEAR"])) {
            $arResult["ITEMS"] = $pickingAutoForTyresAndDisks->GetModifications($arParams["IBLOCK_ID"], $values["VENDOR"], $values["CAR"], $values["YEAR"]);
            $arResult["PROPERTY"] = "MODIFICATION";
        } elseif(!empty($values["VENDOR"]) && !empty($values["CAR"])) {
            $arResult["ITEMS"] = $pickingAutoForTyresAndDisks->GetYears($arParams["IBLOCK_ID"], $values["VENDOR"], $values["CAR"]);
            $arResult["PROPERTY"] = "YEAR";
        } elseif(!empty($values["VENDOR"])) {
            $arResult["ITEMS"] = $pickingAutoForTyresAndDisks->GetCars($arParams["IBLOCK_ID"], $values["VENDOR"]);
            $arResult["PROPERTY"] = "CAR";
        }
        $this->IncludeComponentTemplate("html_select");
    } else {
        $this->IncludeComponentTemplate();
    }
?>
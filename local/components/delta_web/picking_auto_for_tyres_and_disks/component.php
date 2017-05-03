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
        $arResult["VALUES"] = $values;
        if (isset($values["RESULT_PODBOR"])) {
            $arResult["ERRORS"] = array();
            $arResult["DATA"] = array();
            if (empty($values["VENDOR"])) {
                $arResult["ERRORS"]["VENDOR"] = GetMessage("VENDOR_CHOOSE_EMPTY");
            }
            if (empty($values["CAR"])) {
                $arResult["ERRORS"]["CAR"] = GetMessage("CAR_CHOOSE_EMPTY");
            }
            if (empty($values["YEAR"])) {
                $arResult["ERRORS"]["YEAR"] = GetMessage("YEAR_CHOOSE_EMPTY");
            }
            if (empty($values["MODIFICATION"])) {
                $arResult["ERRORS"]["MODIFICATION"] = GetMessage("MODIFICATION_CHOOSE_EMPTY");
            }
            
            if(!empty($values["VENDOR"])) {
                $arResult["CAR"] = $pickingAutoForTyresAndDisks->GetCars($arParams["IBLOCK_ID"], $values["VENDOR"]);
            }
            
            if(!empty($values["VENDOR"]) && !empty($values["CAR"])) {
                $arResult["YEAR"] = $pickingAutoForTyresAndDisks->GetYears($arParams["IBLOCK_ID"], $values["VENDOR"], $values["CAR"]);
            }
            
            if (!empty($values["VENDOR"]) && !empty($values["CAR"]) && !empty($values["YEAR"])) {
                $arResult["MODIFICATION"] = $pickingAutoForTyresAndDisks->GetModifications($arParams["IBLOCK_ID"], $values["VENDOR"], $values["CAR"], $values["YEAR"]);
            }
            
            if (!empty($values["VENDOR"]) && !empty($values["CAR"]) && !empty($values["YEAR"]) && !empty($values["MODIFICATION"])) {
                $arResult["DATA"] = $pickingAutoForTyresAndDisks->GetData($arParams["IBLOCK_ID"], $values["VENDOR"], $values["CAR"], $values["YEAR"], $values["MODIFICATION"]);
            }
            
            $this->IncludeComponentTemplate();
            
        } else {
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
        }
    } else {
        $this->IncludeComponentTemplate();
    }
?>
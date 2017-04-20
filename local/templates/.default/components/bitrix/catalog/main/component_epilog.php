<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die?>
<?
    if (!empty($arResult["SECTIONS"]["PARENT"]["DESCRIPTION"])) {
        $description = $arResult["SECTIONS"]["PARENT"]["DESCRIPTION"];
    } elseif(!empty($arResult["SECTIONS"]["CHILD"]["DESCRIPTION"])) {
        $description = $arResult["SECTIONS"]["CHILD"]["DESCRIPTION"];
    } elseif(!empty($arResult["SECTIONS"]["IBLOCK"]["DESCRIPTION"])) {
        $description = $arResult["SECTIONS"]["IBLOCK"]["DESCRIPTION"];  
    }
    $this->__template->SetViewTarget("BOTTOM_DESCRIPTION");
        echo $description;
    $this->__template->EndViewTarget();
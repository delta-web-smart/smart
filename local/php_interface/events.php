<?php

AddEventHandler("main", "OnEpilog", "CustomPage404");
function CustomPage404()
{
    if(defined('ERROR_404') && ERROR_404 == 'Y')
    {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        include $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/header.php';
        include $_SERVER['DOCUMENT_ROOT'].'/404.php';
        include $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/footer.php';
    }
}

//Для обновления параметра UF_SHOW_TOP_MENU для разделов каталога
AddEventHandler("iblock", "OnAfterIBlockSectionUpdate", "AfterUpdateCatalogSections");
function AfterUpdateCatalogSections($arFields) {
    global $APPLICATION, $DB;
    if (
        $APPLICATION->GetCurPage(false) == '/bitrix/admin/iblock_section_edit.php' &&
        IBLOCK_ID_CATALOG == $arFields["IBLOCK_ID"]
    ) {
        $rsSection = CIBlockSection::GetList(array(), array("IBLOCK_ID"=> $arFields["IBLOCK_ID"], "ID"=>$arFields["ID"]), false, array("UF_*"));
        $parentSection = $rsSection->Fetch();
        if (
            $parentSection["DEPTH_LEVEL"] == 1 && 
            $arFields["UF_SHOW_TOP_MENU"] == 0
        ) {
            $arFilter = array(
                "IBLOCK_ID" => $arFields["IBLOCK_ID"],
                ">LEFT_MARGIN" => $parentSection["LEFT_MARGIN"],
                "<RIGHT_MARGIN" => $parentSection["RIGHT_MARGIN"]
            );
            $query = CIBlockSection::GetTreeList($arFilter);
            while($arSection = $query->GetNext()) {
                $strSql = "SELECT * FROM b_uts_iblock_". IBLOCK_ID_CATALOG ."_section WHERE VALUE_ID = '".$arSection["ID"]."'";
                $issetRow = $DB->Query($strSql, false, $err_mess.__LINE__)->Fetch();
                if(!$issetRow) {
                    $arFieldsInsert = array(
                        "VALUE_ID" => $arSection["ID"],
                        "UF_SHOW_TOP_MENU" => $arFields["UF_SHOW_TOP_MENU"],
                    );
                    $result = $DB->Insert("b_uts_iblock_". IBLOCK_ID_CATALOG ."_section", $arFieldsInsert, $err_mess.__LINE__);
                } else {
                    $arFieldsUpdate = array(
                        "UF_SHOW_TOP_MENU" => $arFields["UF_SHOW_TOP_MENU"],
                    );
                    $result = $DB->Update("b_uts_iblock_". IBLOCK_ID_CATALOG ."_section", $arFieldsUpdate, "WHERE VALUE_ID='".$arSection["ID"]."'", $err_mess.__LINE__);
                }
            }
        } else {
            $arSection = CIBlockSection::GetNavChain($arFields["IBLOCK_ID"], $arFields["ID"])->Fetch();
            $strSql = "SELECT * FROM b_uts_iblock_". IBLOCK_ID_CATALOG ."_section WHERE VALUE_ID = '".$arSection["ID"]."'";
            $issetRow = $DB->Query($strSql, false, $err_mess.__LINE__)->Fetch();
            if (!$issetRow) {
                $arFieldsInsert = array(
                    "VALUE_ID" => $arSection["ID"],
                    "UF_SHOW_TOP_MENU" => $arFields["UF_SHOW_TOP_MENU"],
                );
                $result = $DB->Insert("b_uts_iblock_". IBLOCK_ID_CATALOG ."_section", $arFieldsInsert, $err_mess.__LINE__);
            } else {
                $arFieldsUpdate = array(
                    "UF_SHOW_TOP_MENU" => $arFields["UF_SHOW_TOP_MENU"],
                );
                $result = $DB->Update("b_uts_iblock_". IBLOCK_ID_CATALOG ."_section", $arFieldsUpdate, "WHERE VALUE_ID='".$arSection["ID"]."'", $err_mess.__LINE__);
            }
        }
    }
}

//Событие при добавлении, обновлении, удалении товаров в корзине для записи количества товаров в корзине в сессию
AddEventHandler("sale", "OnBasketAdd", "SaveQuantityInSession");
AddEventHandler("sale", "OnBasketUpdate", "SaveQuantityInSession");
AddEventHandler("sale", "OnBasketDelete", "SaveQuantityInSession");
function SaveQuantityInSession() {
    global $USER;
    $currentBasket = GetCurrentBasket();
    $quantity = 0;
    foreach ($currentBasket as $arItem) {
        $quantity += $arItem["QUANTITY"];
    }
    $_SESSION["TOTAL_QUANTITY_PRODUCTS"][SITE_ID][$USER->GetID()] = $quantity;
}

AddEventHandler("main", "OnBeforeProlog", "UpdateQuantityInSession");
function UpdateQuantityInSession() {
    global $USER, $APPLICATION;
    if (!strpos($APPLICATION->GetCurPage(false), "/bitrix/admin/")) {
        if (empty($USER)) {
            $currentUserId = CUser::GetID();
        } else {
            $currentUserId = $USER->GetID();
        }
        if (empty($_SESSION["TOTAL_QUANTITY_PRODUCTS"][SITE_ID][$currentUserId])) {
            $quantity = TotalQuantityInBasket();
            $_SESSION["TOTAL_QUANTITY_PRODUCTS"][SITE_ID][$currentUserId] = $quantity;
        }
    }
}
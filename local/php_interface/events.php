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
        } elseif($parentSection["DEPTH_LEVEL"] == 2 && $arFields["UF_SHOW_TOP_MENU"] == 1) {
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
    $_SESSION["SALE_BASKET_NUM_PRODUCTS"][LANGUAGE_ID] = 1;
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

AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
function BeforeIndexHandler($arFields)
{
    if($arFields["MODULE_ID"] == "iblock" && $arFields["PARAM1"] == "1c_catalog" && substr($arFields["ITEM_ID"], 0, 1) != "S")
    {
        $arFields["PARAMS"]["iblock_section"] = array();
        $rsSections = CIBlockElement::GetElementGroups($arFields["ITEM_ID"], true);
        while($arSection = $rsSections->Fetch())
        {
            $arFields["PARAMS"]["iblock_section"][] = $arSection["ID"];
        }
    }
    return $arFields;
}

AddEventHandler("main", "OnAdminTabControlBegin", "ChangeUserPropsForFilter");
function ChangeUserPropsForFilter(&$form) {
    if(($GLOBALS["APPLICATION"]->GetCurPage() == "/bitrix/admin/iblock_section_edit.php" || $GLOBALS["APPLICATION"]->GetCurPage() == '/bitrix/admin/cat_section_edit.php') && $_REQUEST['IBLOCK_ID'] == IBLOCK_ID_CATALOG) {
		CUtil::InitJSCore();
		CJSCore::Init(array("jquery"));
		?>
			<script>
				$(function() {
					$('#table_<?=SECTION_UF_PROPERTY_CATALOG?>').closest('tr').detach();
                    $('#table_<?=SECTION_UF_PROPERTY_OFFER?>').closest('tr').detach();
				});
			</script>
		<?
        $titleCatalogProperty = "";
        $titleOfferProperty = "";
        $selectedCatalogProps = array();
        $selectedOffersProps = array();
        foreach($form->tabs as $arTab) {
            if ($arTab["DIV"] == "user_fields_tab") {
            
                $titleCatalogProperty = $arTab["FIELDS"][SECTION_UF_PROPERTY_CATALOG]["content"];
                
                $titleOfferProperty = $arTab["FIELDS"][SECTION_UF_PROPERTY_OFFER]["content"];
                
                preg_match_all("!value=\"(\d+)\"!", $arTab["FIELDS"][SECTION_UF_PROPERTY_CATALOG]["hidden"], $selectedCatalogProps);
                $selectedCatalogProps = $selectedCatalogProps[1];
                
                preg_match_all("!value=\"(\d+)\"!", $arTab["FIELDS"][SECTION_UF_PROPERTY_OFFER]["hidden"], $selectedOffersProps);
                $selectedOffersProps = $selectedOffersProps[1];
            }
        }

		$props = GetListPropertiesForSection(IBLOCK_ID_CATALOG, $_REQUEST["ID"]);
        $htmlPropertyCatalog = '<tr valign="top"><td>'.$titleCatalogProperty.'</td><td>';
        if (!empty($props)) {
            $htmlPropertyCatalog .= '<select name="'.SECTION_UF_PROPERTY_CATALOG.'[]" multiple="multiple">';
            foreach($props as $arProp) {
                $selected = "";
                if (in_array($arProp['ID'], $selectedCatalogProps)) {
                    $selected = "selected";
                }
                $htmlPropertyCatalog .= '<option '.$selected.' value="'.$arProp['ID'].'">['.$arProp["ID"].'] '.$arProp['NAME'].'</option>';
            }
            $htmlPropertyCatalog .= '</select>';
        } else {
            $htmlPropertyCatalog = 'Не найдено свойств каталога, привязанных к разделу';
        }
        $htmlPropertyCatalog .= '</td></tr>';
        
        $props = GetListPropertiesForSection(IBLOCK_ID_CATALOG_OFFERS, $_REQUEST["ID"]);
        $htmlPropertyOffer = '<tr valign="top"><td>'.$titleOfferProperty.'</td><td>';
        if (!empty($props)) {
            $htmlPropertyOffer .= '<select name="'.SECTION_UF_PROPERTY_OFFER.'[]" multiple="multiple">';
            foreach($props as $arProp) {
                $selected = "";
                if (in_array($arProp['ID'], $selectedOffersProps)) {
                    $selected = "selected";
                }
                $htmlPropertyOffer .= '<option '.$selected.' value="'.$arProp['ID'].'">['.$arProp["ID"].'] '.$arProp['NAME'].'</option>';
            }
            $htmlPropertyOffer .= '</select>';
        } else {
            $htmlPropertyOffer = 'Не найдено свойств торговых предложений, привязанных к разделу';
        }
        $htmlPropertyOffer .= '</td></tr>';
        
		
		$form->tabs[] = array(
			"DIV" => "picker_filter_by_sizes_and_parametres",
			"TAB" => "Подбор по размерам и параметрам",
			"ICON" => "main_user_edit",
			"TITLE" => "Подбор по размерам и параметрам",
			"CONTENT" => $htmlPropertyCatalog ."<br/>". $htmlPropertyOffer
		);
	}
}

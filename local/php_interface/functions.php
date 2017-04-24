<?php
    
    function FormatNumber($digit) {
        $res = number_format($digit, 0, ' ', ' ');;
        return $res;
    }
    
    function GetCurrentBasket() {
        if (!class_exists("CSaleBasket")) {
            CModule::IncludeModule("sale");
        }
        $arID = array();
        $arBasketItems = array();
        $dbBasketItems = CSaleBasket::GetList(
            array(
                "NAME" => "ASC",
                "ID" => "ASC"
            ),
            array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL"
            ),
            false,
            false,
            array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "PRODUCT_PROVIDER_CLASS")
        );
        while ($arItems = $dbBasketItems->Fetch())
        {
            if ('' != $arItems['PRODUCT_PROVIDER_CLASS'] || '' != $arItems["CALLBACK_FUNC"])
            {
                CSaleBasket::UpdatePrice($arItems["ID"],
                    $arItems["CALLBACK_FUNC"],
                    $arItems["MODULE"],
                    $arItems["PRODUCT_ID"],
                    $arItems["QUANTITY"],
                    "N",
                    $arItems["PRODUCT_PROVIDER_CLASS"]
                );
                $arID[] = $arItems["ID"];
            }
        }
        if (!empty($arID)) {
            $dbBasketItems = CSaleBasket::GetList(
                array(
                    "NAME" => "ASC",
                    "ID" => "ASC"
                ),
                array(
                    "ID" => $arID,
                    "ORDER_ID" => "NULL"
                ),
                false,
                false,
                array(
                    "ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "DELAY", "CAN_BUY", "PRICE", "WEIGHT", "PRODUCT_PROVIDER_CLASS", "NAME"
                )
            );
            while ($arItems = $dbBasketItems->Fetch())
            {
                $arBasketItems[] = $arItems;
            }
        }
        return $arBasketItems;
    }
    
    function TotalQuantityInBasket() {
        $currentBasket = GetCurrentBasket();
        $res = 0;
        foreach ($currentBasket as $arItem) {
            $res += $arItem["QUANTITY"];
        }
        return $res;
    }
    
    //Формирование URL для детальной страницы торговых предложений
    function PathForOffer($parent, $child) {
        $res = $parent["DETAIL_PAGE_URL"]."?OFFER_ID=".$child["ID"];
        return $res;
    }
    
    //Сохраняем в кэш название шаблона вывода товаров в зависимости от раздела каталога
    function SaveCacheForParentAndChildSections($iblockId, $sectionCode = "", $sectionId = "") {
        global $USER_FIELD_MANAGER;
        $obCache = new CPHPCache;
        $life_time = 36000;
        $cache_id = "template-name-for-sections-" .$iblockId;
        if (!empty($sectionCode)) {
            $cache_id .= "-" . $sectionCode;
        }
        if (!empty($sectionId)) {
            $cache_id .= "-" . $sectionId;
        }
        $cacheData = $obCache->InitCache($life_time, $cache_id, "/");
        if($cacheData):
            $vars = $obCache->GetVars();
            $res = $vars["SECTIONS"];
        else:
            if (!empty($sectionId)) {
                $childSection = CIBlockSection::GetList(array(), array("IBLOCK_ID"=>$iblockId, "ID"=>$sectionId), false, array("UF_*"))->Fetch()->Fetch();
                $sectionId = $sectionId;
            } elseif (!empty($sectionCode)) {
                $childSection = CIBlockSection::GetList(array(), array("IBLOCK_ID"=>$iblockId, "CODE"=>$sectionCode), false, array("UF_*"))->Fetch();
                $sectionId = $childSection["ID"];                
            } else {
                $sectionId = 0;
            }
            $parent = CIBlockSection::GetNavChain($iblockId, $sectionId)->Fetch();
            $parentSection = CIBlockSection::GetList(array(), array(
                "IBLOCK_ID" => $iblockId,
                "ID" => $parent["ID"]
            ), false, array("UF_*"))->Fetch();
            
            $obEnum = new CUserFieldEnum;
            
            if (!empty($parentSection["UF_TEMPLATE_NAME"])) {
                $arEnum = $obEnum->GetList(array(), array("ID" => $parentSection["UF_TEMPLATE_NAME"]))->Fetch();
                $parentSection["UF_TEMPLATE_NAME"] = $arEnum["XML_ID"];
            }
            
            if (!empty($childSection["UF_TEMPLATE_NAME"])) {
                $arEnum = $obEnum->GetList(array(), array("ID" => $childSection["UF_TEMPLATE_NAME"]))->Fetch();
                $childSection["UF_TEMPLATE_NAME"] = $arEnum["XML_ID"];
            }

            $iblock = CIBlock::GetByID($iblockId)->Fetch();
            
            if (!empty($childSection["UF_TEMPLATE_NAME"])) {
                $templateName = $childSection["UF_TEMPLATE_NAME"];
            } else {
                $templateName = $parentSection["UF_TEMPLATE_NAME"];
            }
            $res = array(
                "PARENT" => $parentSection,
                "CHILD" => $childSection,
                "IBLOCK" => $iblock,
                "TEMPLATE_NAME" => $templateName
            );
        endif;
        if($obCache->StartDataCache()):
          $obCache->EndDataCache(array("SECTIONS" => $res));
        endif;
        return $res;
    }

    function CustomGetProperty($property_id, $default_value=false) 
    { 
        global $APPLICATION; 
            return $APPLICATION->AddBufferContent(Array(&$APPLICATION, "GetProperty"), $property_id, $default_value);
    }
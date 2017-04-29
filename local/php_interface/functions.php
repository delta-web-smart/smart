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
    
    //Получение описание для раздела каталога
    function GetDescriptionForSection($iblockId, $sectionCode = "", $sectionId = "") {
    
        $res = "";
        if (!empty($sectionCode)) {
            $section = CIBlockSection::GetList(array(), array("CODE" => $sectionCode, "IBLOCK_ID" => $iblockId), false, array("DESCRIPTION", "ID"))->Fetch();
            $res = $section["DESCRIPTION"];
            if (empty($res)) {
                $section = CIBlockSection::GetNavChain($iblockId, $section["ID"])->Fetch();
                $res = $section["DESCRIPTION"];
            }
        }
        
        if (!empty($sectionId)) {
            $section = CIBlockSection::GetList(array(), array("ID" => $sectionId, "IBLOCK_ID" => $iblockId), false, array("DESCRIPTION"))->Fetch();
            $res = $section["DESCRIPTION"];
            if (empty($res)) {
                $section = CIBlockSection::GetNavChain($iblockId, $sectionId)->Fetch();
                $res = $section["DESCRIPTION"];
            }
        }
        
        if (empty($res)) {
            $iblock = CIBlock::GetById($iblockId)->Fetch();
            $res = $iblock["DESCRIPTION"];
        }
        return $res;
    }

    function CustomGetProperty($property_id, $default_value=false) 
    { 
        global $APPLICATION; 
            return $APPLICATION->AddBufferContent(Array(&$APPLICATION, "GetProperty"), $property_id, $default_value);
    }
    
    function xml2array($xmlObject, $out = array())
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) ||  is_array ( $node ) ) ? xml2array ( $node ) : $node;

        return $out;
    }
    
    function FindMinPriceByOffers($offers) {
        if (!empty($offers)) {
            $count = 0;
            $newOffers = array();
            foreach($offers as $i => $arOffer) {
                if ($arOffer["CAN_BUY"]) {
                    $newOffers[$count] = $arOffer;
                    $count++;
                }
            }
            
            if (!empty($newOffers)) {
                $minPrice = $newOffers[0]["MIN_PRICE"]["DISCOUNT_VALUE"];
                $offerId = $newOffers[0]["ID"];
                foreach($newOffers as $i=>$arOffer) {
                    if ($minPrice > $arOffer["MIN_PRICE"]["DISCOUNT_VALUE"]) {
                        $minPrice = $arOffer["MIN_PRICE"]["DISCOUNT_VALUE"];
                        $offerId = $arOffer["ID"];
                    }
                }
            }
        }
        $canBuy = false;
        if (!empty($minPrice)) {
            $canBuy = true;
        }
        $res = array(
            "MIN_PRICE" => $minPrice,
            "OFFER_ID" => $offerId,
            "CAN_BUY" => $canBuy
        );
        
        return $res;
    }
    
    //Получить преобразованные ЧПУ у каталога
    function GetSefRules() {
        $engine = new CComponentEngine();
        $arUrlTemplates = array(
            "section" => SECTION_PATH,
            "smart_filter" => SMART_FILTER_PATH,
        );
        if (\Bitrix\Main\Loader::includeModule('iblock'))
        {
            $engine->addGreedyPart("#SECTION_CODE_PATH#");
            $engine->addGreedyPart("#SMART_FILTER_PATH#");
            $engine->setResolveCallback(array("CIBlockFindTools", "resolveComponentEngine"));
        }
        $componentPage = $engine->guessComponentPath(
            CATALOG_URL,
            $arUrlTemplates,
            $arVariables
        );
        $res = $arVariables;
        return $res;
    }
    
    //Получить список свойств, привязанных к разделу для умного фильтра
    function GetListPropertiesForSection($iblockId, $sectionId) {
        $res = array();
        $props = CIBlockSectionPropertyLink::GetArray($iblockId, $sectionId);
        foreach($props as $PID => $arLink) {
            if($arLink["SMART_FILTER"] !== "Y") {
				continue;
            }
            $rsProperty = CIBlockProperty::GetByID($PID);
            $arProperty = $rsProperty->Fetch();
            if($arProperty)
            {
                $res[$arProperty["ID"]] = array(
                    "ID" => $arProperty["ID"],
                    "IBLOCK_ID" => $arProperty["IBLOCK_ID"],
                    "CODE" => $arProperty["CODE"],
                    "NAME" => $arProperty["NAME"],
                    "PROPERTY_TYPE" => $arProperty["PROPERTY_TYPE"],
                    "USER_TYPE" => $arProperty["USER_TYPE"],
                    "USER_TYPE_SETTINGS" => $arProperty["USER_TYPE_SETTINGS"],
                    "DISPLAY_TYPE" => $arLink["DISPLAY_TYPE"],
                    "DISPLAY_EXPANDED" => $arLink["DISPLAY_EXPANDED"],
                    "FILTER_HINT" => $arLink["FILTER_HINT"],
                    "VALUES" => array(),
                );
            }
        }
        return $res;
    }
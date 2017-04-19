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
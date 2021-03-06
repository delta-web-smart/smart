<?php

    class ProductStickers {
        
        const COUNT_PURCHASE = 20;
        const CACHE_TIME = 3600;
        const IBLOCK_ID = IBLOCK_ID_CATALOG;
    
        public function IsNewProductByDate($date) {
            $offsetTime = time() - COUNT_DAYS_FOR_NEW_PRODUCTS;
            $res = false;
            if (strtotime($date) < time() && strtotime($date) > $offsetTime) {
                $res = true;
            }
            return $res;
        }
        
        public function IsDiscountProduct() {
            global $APPLICATION;
            $res = $APPLICATION->IncludeComponent(
            "delta_web:get_discount_elements_ids", 
            "", 
                array(
                    "IBLOCK_ID" => self::IBLOCK_ID,
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => self::CACHE_TIME
                ),
                false
            );
            return $res;
        }
        
        public function IsHitProduct() {
            global $APPLICATION;
            $res = $APPLICATION->IncludeComponent(
                "delta_web:get_hit_elements_ids", 
                "", 
                array(
                    "COUNT_PURCHASE" => self::COUNT_PURCHASE,
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => self::CACHE_TIME
                ),
                false
            );
            return $res;
        }
        
        public function AllStickers($arItem) {
            $res["IS_NEW"] = $this->IsNewProductByDate($arItem["DATE_CREATE"]);
            $res["IS_DISCOUNT"] = false;
            if (in_array($arItem["ID"], $this->IsDiscountProduct())) {
                $res["IS_DISCOUNT"] =  true;
            }
            $res["IS_HIT"] = false;
            if (in_array($arItem["ID"], $this->IsHitProduct())) {
                $res["IS_HIT"] = true;
            }
            return $res;
        }
        
    }
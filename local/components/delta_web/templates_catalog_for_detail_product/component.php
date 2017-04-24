<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    $obCache = new CPHPCache;
    $life_time = $arParams['CACHE_TIME'];
    $arResult = $arParams["~RESULT"];
    unset($arParams["RESULT"]);
    unset($arParams["~RESULT"]);
    $cache_id = "catalog-detail-for-product-".$this->GetTemplateName()."-".serialize($arParams);
    $cacheData = $obCache->InitCache($life_time, $cache_id, "/");
    if ($arParams['CACHE_TYPE'] == 'N') {
        $cacheData = false;
    }
    if($cacheData):
        $vars = $obCache->GetVars();
        $arResult = $vars["RESULT"];
    else:
        $arEmptyPreview = false;
        $strEmptyPreview = MAIN_TEMPLATE_PATH.'/img/no_photo.png';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$strEmptyPreview))
        {
            $arSizes = getimagesize($_SERVER['DOCUMENT_ROOT'].$strEmptyPreview);
            if (!empty($arSizes))
            {
                $arEmptyPreview = array(
                    'src' => $strEmptyPreview,
                    'width' => intval($arSizes[0]),
                    'height' => intval($arSizes[1])
                );
            }
            unset($arSizes);
        }
        unset($strEmptyPreview);  
    
        //Параметр группировки
        $propertyForGroup = $arParams["PROPERTY_FOR_GROUP_OFFERS"];
        if (empty($propertyForGroup)) {
            $propertyForGroup = "DIAMETR";
        }
    
        $arResult["PICTURE"] = CFile::GetPath($arResult["DETAIL_PICTURE"]["ID"]);
        $arResult["RESIZE_PICTURE"] = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>210, 'height'=>260), BX_RESIZE_IMAGE_PROPORTIONAL, true);

        if (empty($arResult["PICTURE"])) {
            $arResult["PICTURE"] = $arEmptyPreview["src"];
            $arResult["RESIZE_PICTURE"] = $arEmptyPreview;
        }

        $productStickers = new ProductStickers;
        $arResult["ALL_STICKERS"] = $productStickers->AllStickers($arResult);

        //Получить количество просмотров элемента
        $arFilter = array("ID"=>$arResult["ID"], "IBLOCK_ID"=>$arResult["IBLOCK_ID"]);
        $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, Array("ID","NAME", "SHOW_COUNTER"))->Fetch();
        $arResult["SHOW_COUNTER"] = $res["SHOW_COUNTER"];

        //Группировка торговых предложений $propertyForGroup
        $offers = $arResult['OFFERS'];
        uasort($offers, function($a, $b) {
            if($a["PROPERTIES"][$propertyForGroup]["VALUE"] < $b["PROPERTIES"][$propertyForGroup]["VALUE"]) return -1;
            elseif($a["PROPERTIES"][$propertyForGroup]["VALUE"] > $b["PROPERTIES"][$propertyForGroup]["VALUE"]) return 1;
            else return 0;
        });
        $arResult["CUSTOM_OFFERS"] = array();
        foreach($offers as $arOffer) {
        
            $fullTextForOffer = "";
            if (!empty($arParams["MASK_FOR_FULL_TEXT_SIZE_IN_TABLE"])) {
                $fullTextForOffer = $arParams["MASK_FOR_FULL_TEXT_SIZE_IN_TABLE"];
                foreach($arOffer["PROPERTIES"] as $arProperty) {
                    $arOffer["PROPERTIES"][$arProperty["CODE"]] = $arProperty;
                }
                
                foreach($arOffer["PROPERTIES"] as $code => $arProperty) {
                    $fullTextForOffer = str_replace("#" .$code. "#", $arOffer["PROPERTIES"][$code]["VALUE"], $fullTextForOffer);
                }
            }
            
            $arOffer["FULL_TEXT_FOR_NAME"] = $fullTextForOffer;
            
            $arOffer["DETAIL_PAGE_URL"] = PathForOffer($arResult, $arOffer);
            $arOffer["PRICE"] = FormatNumber($arOffer["MIN_PRICE"]["DISCOUNT_VALUE"]);
            
            //Список отображаемых свойств для основного каталога      
            $arResult["SHOW_PROPERTIES"] = array();
            if (!empty($arParams["SHOW_PROPERTIES"])) {
                foreach($arParams["SHOW_PROPERTIES"] as $arShowProperty) {
                    $arResult["SHOW_PROPERTIES"][] = $arResult["PROPERTIES"][$arShowProperty];
                }
            }

            $arResult["CUSTOM_OFFERS"][$arOffer["PROPERTIES"][$propertyForGroup]["VALUE"]][] = $arOffer;
        }
        
        if (empty($arResult["CUSTOM_OFFERS"])) {
            $arResult["PRICE"] = FormatNumber($arResult["MIN_PRICE"]["DISCOUNT_VALUE"]);
        }
        
        if (!empty($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])) {
            $arResult["PHOTOS"] = array();
            foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $photoId) {
                $smallPhoto = CFile::ResizeImageGet($photoId, array('width'=>105, 'height'=>105), BX_RESIZE_IMAGE_EXACT, true);
                $bigPhoto = CFile::GetPath($photoId);
                $arResult["PHOTOS"][] = array(
                    "SMALL_PHOTO" => $smallPhoto,
                    "BIG_PHOTO" => $bigPhoto
                );
            }
        }
    endif;
    if($obCache->StartDataCache()):
      $obCache->EndDataCache(array("RESULT" => $arResult));
    endif;
    $this->IncludeComponentTemplate();
?>
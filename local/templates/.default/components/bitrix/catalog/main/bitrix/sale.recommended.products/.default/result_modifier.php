<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

//Кастомизация
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

$skuPropList = array();
    
if (!empty($arResult['ITEMS']))
{
    $catalogs = array();
	foreach($arResult['CATALOGS'] as $catalog)
	{
		$offersCatalogId = (int)$catalog['OFFERS_IBLOCK_ID'];
		$offersPropId = (int)$catalog['OFFERS_PROPERTY_ID'];
		$catalogId = (int)$catalog['IBLOCK_ID'];
		$sku = false;
		if($offersCatalogId > 0 && $offersPropId > 0)
			$sku = array("IBLOCK_ID" => $offersCatalogId, "SKU_PROPERTY_ID" => $offersPropId, "PRODUCT_IBLOCK_ID" => $catalogId);


		if (!empty($sku) && is_array($sku))
		{
			$skuPropList[$catalogId] = CIBlockPriceTools::getTreeProperties(
				$sku,
				$arParams['OFFER_TREE_PROPS'][$offersCatalogId],
				array(
					'PICT' => $arEmptyPreview,
					'NAME' => '-'
				)
			);

			$needValues = array();
			CIBlockPriceTools::getTreePropertyValues($skuPropList[$catalogId], $needValues);

			$skuPropIds[$catalogId] = array_keys($skuPropList[$catalogId]);
			if (!empty($skuPropIds[$catalogId]))
				$skuPropKeys[$catalogId] = array_fill_keys($skuPropIds[$catalogId], false);
		}
	}

	$arNewItemsList = array();
	foreach ($arResult['ITEMS'] as $key => $arItem)
	{
		$arItem['CATALOG'] = true;
		
		// Offers
		if ($arItem['CATALOG'] && isset($arItem['OFFERS']) && !empty($arItem['OFFERS']))
		{
            $arSKUPropIDs = isset($skuPropIds[$arItem['IBLOCK_ID']]) ? $skuPropIds[$arItem['IBLOCK_ID']] : array();
			$arSKUPropList = isset($skuPropList[$arItem['IBLOCK_ID']]) ? $skuPropList[$arItem['IBLOCK_ID']] : array();

			$arMatrixFields = $arSKUPropKeys;
			$arMatrix = array();

			$arNewOffers = array();
			$boolSKUDisplayProperties = false;
			$arItem['OFFERS_PROP'] = false;

			foreach ($arItem['OFFERS'] as $keyOffer => $arOffer)
			{
				$arRow = array();
				foreach ($arSKUPropIDs as $propkey => $strOneCode)
				{
					$arCell = array(
						'VALUE' => 0,
						'SORT' => PHP_INT_MAX,
						'NA' => true
					);

					if (isset($arOffer['DISPLAY_PROPERTIES'][$strOneCode]))
					{
						$arMatrixFields[$strOneCode] = true;
						$arCell['NA'] = false;
						if ('directory' == $arSKUPropList[$strOneCode]['USER_TYPE'])
						{
							$intValue = $arSKUPropList[$strOneCode]['XML_MAP'][$arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE']];
							$arCell['VALUE'] = $intValue;
						}
						elseif ('L' == $arSKUPropList[$strOneCode]['PROPERTY_TYPE'])
						{
							$arCell['VALUE'] = intval($arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE_ENUM_ID']);
						}
						elseif ('E' == $arSKUPropList[$strOneCode]['PROPERTY_TYPE'])
						{
							$arCell['VALUE'] = intval($arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE']);
						}
						$arCell['SORT'] = $arSKUPropList[$strOneCode]['VALUES'][$arCell['VALUE']]['SORT'];
					}
					$arRow[$strOneCode] = $arCell;
				}
				$arMatrix[$keyOffer] = $arRow;
			}
            
            $arSortFields = array();
            $arUsedFields = array();

			foreach ($arSKUPropIDs as $propkey => $strOneCode)
			{
				$boolExist = $arMatrixFields[$strOneCode];
				foreach ($arMatrix as $keyOffer => $arRow)
				{
					if ($boolExist)
					{
						if (!isset($arItem['OFFERS'][$keyOffer]['TREE']))
							$arItem['OFFERS'][$keyOffer]['TREE'] = array();
						$arItem['OFFERS'][$keyOffer]['TREE']['PROP_' . $arSKUPropList[$strOneCode]['ID']] = $arMatrix[$keyOffer][$strOneCode]['VALUE'];
						$arItem['OFFERS'][$keyOffer]['SKU_SORT_' . $strOneCode] = $arMatrix[$keyOffer][$strOneCode]['SORT'];
						$arUsedFields[$strOneCode] = true;
						$arSortFields['SKU_SORT_' . $strOneCode] = SORT_NUMERIC;
					}
					else
					{
						unset($arMatrix[$keyOffer][$strOneCode]);
					}
				}
			}
			$arItem['OFFERS_PROP'] = $arUsedFields;
            
			\Bitrix\Main\Type\Collection::sortByColumn($arItem['OFFERS'], $arSortFields);

			$intSelected = -1;
            $arItem['MIN_PRICE'] = false;
            
            foreach ($arItem['OFFERS'] as $keyOffer => $arOffer)
            {
                if (empty($arItem['MIN_PRICE']))
                {
                    if ($arItem['OFFER_ID_SELECTED'] > 0)
                        $foundOffer = ($arItem['OFFER_ID_SELECTED'] == $arOffer['ID']);
                    else
                        $foundOffer = $arOffer['CAN_BUY'];
                    if ($foundOffer)
                    {
                        $intSelected = $keyOffer;
                        $arItem['MIN_PRICE'] = (isset($arOffer['RATIO_PRICE']) ? $arOffer['RATIO_PRICE'] : $arOffer['MIN_PRICE']);
                        $arItem['MIN_BASIS_PRICE'] = $arOffer['MIN_PRICE'];
                    }
                    unset($foundOffer);
                }
            }
            if (-1 == $intSelected)
            {
                $intSelected = 0;
                $arItem['MIN_PRICE'] = (isset($arItem['OFFERS'][0]['RATIO_PRICE']) ? $arItem['OFFERS'][0]['RATIO_PRICE'] : $arItem['OFFERS'][0]['MIN_PRICE']);
                $arItem['MIN_BASIS_PRICE'] = $arItem['OFFERS'][0]['MIN_PRICE'];
            }
		}

		if ($arItem['CATALOG'] && CCatalogProduct::TYPE_PRODUCT == $arItem['CATALOG_TYPE'])
		{
			CIBlockPriceTools::setRatioMinPrice($arItem, true);
		}
        
        //Кастомизация
        if (!empty($arItem['MIN_PRICE']))
        {
            if (isset($arItem['OFFERS']) && !empty($arItem['OFFERS']))
            {
                $arItem["PRICE_DISCOUNT_VALUE"] = FormatNumber($arItem['MIN_PRICE']['DISCOUNT_VALUE']);
            }
            else
            {
                $arItem["PRICE_DISCOUNT_VALUE"] = FormatNumber($arItem['MIN_PRICE']['DISCOUNT_VALUE']);
            }
            if ('Y' == $arParams['SHOW_OLD_PRICE'] && $arItem['MIN_PRICE']['DISCOUNT_VALUE'] < $arItem['MIN_PRICE']['VALUE'])
            {
                $arItem["OLD_PRICE"] = FormatNumber($arItem['MIN_PRICE']['VALUE']);
            }
        }
        $arItem["PICTURE"] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        
        if (empty($arItem["PICTURE"])) {
            $arItem["PICTURE"] = $arEmptyPreview;
        }
        
        $productStickers = new ProductStickers;
        $arItem["ALL_STICKERS"] = $productStickers->AllStickers($arItem);
        
		$arNewItemsList[$key] = $arItem;
	}

	$arResult['ITEMS'] = $arNewItemsList;
    
    $this->__component->SetResultCacheKeys(array("ITEMS"));
}
?>
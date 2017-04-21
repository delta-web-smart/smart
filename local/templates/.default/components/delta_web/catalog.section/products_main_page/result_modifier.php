<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
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

if (!empty($arResult['ITEMS']))
{
	$arNewItemsList = array();
	foreach ($arResult['ITEMS'] as $key => $arItem)
	{
		if ($arItem['CATALOG'] && isset($arItem['OFFERS']) && !empty($arItem['OFFERS']))
		{
			if ('Y' == $arParams['PRODUCT_DISPLAY_MODE'])
			{                
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
			else
			{
				$arItem['MIN_PRICE'] = CIBlockPriceTools::getMinPriceFromOffers(
					$arItem['OFFERS'],
					$boolConvert ? $arResult['CONVERT_CURRENCY']['CURRENCY_ID'] : $strBaseCurrency
				);
			}
		}

        //Кастомизация
        $arItem["PICTURE"] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
            $minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);
        $arItem["PRICE_DISCOUNT_VALUE"] = FormatNumber($minPrice["DISCOUNT_VALUE"]);
        
        if (empty($arItem["PICTURE"])) {
            $arItem["PICTURE"] = $arEmptyPreview;
        }
		$arNewItemsList[$key] = $arItem;
	}
	$arResult['ITEMS'] = $arNewItemsList;

    $this->__component->SetResultCacheKeys(array("ITEMS"));
}
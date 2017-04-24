<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<button id="add_to_basket" data-id="<?=$addBasketId?>" class="price-btn"><?=$arItem["PRICE_DISCOUNT_VALUE"]?><i>i</i></button>
<input type="text" class="spinner" id="quantity" value="<? if ($PARAMS['USE_PRODUCT_QUANTITY'] == "Y"):?><? echo $arItem['CATALOG_MEASURE_RATIO']; ?><?else:?>0<?endif;?>">
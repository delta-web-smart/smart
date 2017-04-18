<? foreach($arResult['ITEMS'] as $productId=>$arItem):?>
    <? 
        if ($LABEL_FOR_SALE == "hit" || $LABEL_FOR_SALE == "viewed") {
            $addBasketId = $productId;
        } else {
            $addBasketId = $arItem["ID"];
        }
    ?>
    <li>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img-wrap">
            <img src="<?=$arItem["PICTURE"]["src"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>">
            <?if($LABEL_FOR_SALE != "viewed"):?>
                <div class="action-label <?=$LABEL_FOR_SALE?>"></div>
            <?endif;?>
        </a>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name"><?=$arItem["NAME"]?></a>
        <? if (!empty($arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])):?>
            <span class="article"><?=GetMessage("CML2_ARTICLE_TITLE");?> <?=$arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></span>
        <? endif;?>
        <? if (!isset($arItem['OFFERS']) || empty($arItem['OFFERS'])):?>
            <? if ($arItem["CAN_BUY"]):?>
                <input type="text" class="spinner" value="<? if ($arParams['USE_PRODUCT_QUANTITY'] == "Y"):?><? echo $arItem['CATALOG_MEASURE_RATIO']; ?><?else:?>0<?endif;?>">
                <button class="price-btn"><?=$arItem["PRICE_DISCOUNT_VALUE"]?><i>i</i></button>
            <? endif;?>
         <? else:?>
            <input type="text" class="spinner" value="<? if ($arParams['USE_PRODUCT_QUANTITY'] == "Y"):?><? echo $arItem['CATALOG_MEASURE_RATIO']; ?><?else:?>0<?endif;?>">
            <button class="price-btn"><?=$arItem["PRICE_DISCOUNT_VALUE"]?><i>i</i></button>
         <? endif;?>
    </li>
<? endforeach;?>
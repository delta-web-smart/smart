<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<? foreach($arResult['ITEMS'] as $productId=>$arItem):?>
    <? 
        $differentTags = array("viewed");
        if (in_array($LABEL_FOR_SALE, $differentTags)) {
            $addBasketId = $productId;
        } else {
            $addBasketId = $arItem["ID"];
        }
    ?>
    <li id="product">
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img-wrap">
            <img src="<?=$arItem["PICTURE"]["src"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>">
            <?if($LABEL_FOR_SALE == "viewed"):?>
                <? if (in_array($arItem["ID"], $DISCOUNT_IDS)):?>
                    <div class="action-label"></div>
                <? endif;?>
            <?else:?>
                <div class="action-label <?=$LABEL_FOR_SALE?>"></div>
            <? endif;?>
        </a>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name"><?=$arItem["NAME"]?></a>
        <? if (!empty($arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])):?>
            <span class="article"><?=GetMessage("CML2_ARTICLE_TITLE");?> <?=$arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></span>
        <? endif;?>
        <? if (!isset($arItem['OFFERS']) || empty($arItem['OFFERS'])):?>
            <? if ($arItem["CAN_BUY"]):?>
                <?
                    $APPLICATION->IncludeFile(SITE_DIR. "include/catalog/block_with_buy_button.php", array(
                        "addBasketId" => $addBasketId,
                        "PARAMS" => $PARAMS,
                        "arItem" => $arItem
                    ));
                ?>
            <? endif;?>
         <? else:?>
            <?
                $APPLICATION->IncludeFile(SITE_DIR. "include/catalog/block_with_buy_button.php", array(
                    "addBasketId" => $addBasketId,
                    "PARAMS" => $PARAMS,
                    "arItem" => $arItem
                ));
            ?>
         <? endif;?>
    </li>
<? endforeach;?>
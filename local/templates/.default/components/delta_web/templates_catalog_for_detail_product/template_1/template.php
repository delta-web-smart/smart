<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="product-card <?if(!empty($arResult["CUSTOM_OFFERS"])):?>model<?endif;?>">
    <?if(!empty($arResult["CUSTOM_OFFERS"])):?>
        <div class="left-block">
    <?endif;?>
        <div class="preview">
            <a title="<?=$arResult["NAME"]?>" href="<?=$arResult["PICTURE"]?>" class="big-view fancybox">
                <img src="<?=$arResult["RESIZE_PICTURE"]["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>">
                <div class="loupe"></div>
                <? if ($arResult["ALL_STICKERS"]["IS_DISCOUNT"]):?>
                    <div class="action-label"></div>
                <? elseif($arResult["ALL_STICKERS"]["IS_NEW"]):?>
                    <div class="action-label new"></div>
                <? elseif($arResult["ALL_STICKERS"]["IS_HIT"]):?>
                    <div class="action-label hit"></div>
                <? endif;?>
            </a>
            <? if (!empty($arResult["PHOTOS"])):?>
                <div class="small-views">
                    <? foreach($arResult["PHOTOS"] as $arPhoto):?>
                        <a rel="photos" title="<?=$arResult["NAME"]?>" class="fancybox" href="<?=$arPhoto["BIG_PHOTO"]?>"><img src="<?=$arPhoto["SMALL_PHOTO"]["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"></a>
                    <? endforeach;?>
                </div>
            <? endif;?>
        </div>
        <div class="central-part">
            <div class="article">
                <? if (!empty($arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])):?>
                    <span><?=GetMessage("PRODUCT_CML2_ARTICLE_TITLE")?> <?=$arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></span>
                <? endif;?>
                <a href="#" class="trademark">
                    <img src="<?=MAIN_TEMPLATE_PATH?>img/trademark1.jpg" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>">
                </a>
            </div>
            <table>
                <? foreach($arResult["SHOW_PROPERTIES"] as $arShowProperty):?>
                    <? if (!empty($arShowProperty["VALUE"])):?>
                        <tr>
                            <td><?=GetMessage($arShowProperty["CODE"]."_TITLE");?></td>
                            <td><?=$arShowProperty["VALUE"]?>
                                <? if ($arShowProperty["IS_SEZON"]):?>
                                    <? if ($arShowProperty["CUSTOM_ALL_WEATHER"]):?>
                                        <i class="season-ico <?=GetMessage("SEZON_ID_TITLE_30")?>"></i>
                                        <i class="season-ico <?=GetMessage("SEZON_ID_TITLE_31")?>"></i>
                                    <? else:?>
                                        <i class="season-ico <?=GetMessage("SEZON_ID_TITLE_".$arShowProperty["VALUE_ENUM_ID"])?>"></i>
                                    <? endif;?>
                                <? endif;?>
                            </td>
                        </tr>
                    <? endif;?>
                <? endforeach;?>
                <? if (empty($arResult["CUSTOM_OFFERS"])):?>
                    <tr>
                      <td><?=GetMessage("WEIGHT_TITLE")?></td>
                      <td><?=$arResult["CATALOG_WEIGHT"]?></td>
                    </tr>
                    <tr class="available">
                      <td><?=GetMessage("AVAILABILITY_TITLE")?></td>
                      <? if ($arResult["CATALOG_QUANTITY"] >= LIMIT_QUANTITY):?>
                        <td class="avalible">><?=LIMIT_QUANTITY?></td>
                      <? else:?>
                        <td class="avalible few"><<?=LIMIT_QUANTITY?></td>
                      <? endif;?>
                    </tr>
                <? endif;?>
            </table>
            <div class="features">
                <? if (!empty($arResult["PROPERTIES"]["SHIP"]["VALUE"])):?>
                    <img src="<?=MAIN_TEMPLATE_PATH?>img/spike-ico.png" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>">
                <? endif;?>
                <!--<img src="<?=MAIN_TEMPLATE_PATH?>img/features-label.png" title="<?=$arResult["NAME"]?>" alt="<?=$arResult["NAME"]?>">-->
            </div>
            <? if (empty($arResult["CUSTOM_OFFERS"]) && $arResult["CAN_BUY"]):?>
                <div class="order-controls" id="product">
                    <input type="text" id="quantity" class="spinner" value="0">
                    <button id="add_to_basket" data-id="<?=$arResult["ID"]?>" class="price-btn"><?=$arResult["PRICE"]?><i>e</i></button>
                    <div class="clear"></div>
                    <a href="#" class="one-click"><?=GetMessage("ORDER_IN_ONE_CLICK_TITLE")?></a>
                </div>
            <? endif;?>
        </div>
        <?if(!empty($arResult["CUSTOM_OFFERS"])):?>
            <div class="clear"></div>
        <? endif;?>
        <div class="description">
            <?=$arResult["DETAIL_TEXT"]?>
        </div>
    <?if(!empty($arResult["CUSTOM_OFFERS"])):?>
        </div>
    <? endif;?>
    <?
        $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/catalog/right_menu.php"), false);
    ?>
</div>
<div class="product-support">
    <ul class="markers">
        <? if (!empty($arResult["CUSTOM_OFFERS"])):?>
            <li>
                <a href="#"><span><?=GetMessage("SIZES_TAB_TITLE")?></span></a>
            </li>
        <? elseif(!empty($arResult["DETAIL_TEXT"])):?>
            <li>
                <a href="#"><span><?=GetMessage("DESCRIPTION_TAB_TITLE")?></span></a>
            </li>
        <? endif;?>
        <? $APPLICATION->ShowViewContent('TAB_FOR_RECOMMNDED_PRODUCTS'); ?>
        <li>
            <a href="#"><span><?=GetMessage("ASK_QUESTION_TAB_TITLE")?></span></a>
        </li>
    </ul>
    <div class="sizes-info">
        <? if (!empty($arResult["CUSTOM_OFFERS"])):?>
            <ul class="size-list">
                <li>
                    <a href="#"><?=GetMessage("ALL_SIZES_SHOW_TITLE")?></a>
                </li>
                <? $count = 0;?>
                <? foreach($arResult["CUSTOM_OFFERS"] as $diameterValue => $arOffers):?>
                    <? 
                        if ($count == 0) {
                        $active = "active";
                        } else {
                        $active = "";
                        }
                    ?>
                    <li class="<?=$active?>">
                        <a href="#"><?=GetMessage("PREFIX_DIAMETER_TITLE")?><?=$diameterValue?></a>
                    </li>
                    <? $count++;?>
                <? endforeach;?>
            </ul>
            <table class="size-table tire">
                <tr class="size-title">
                    <td class="size"><?=GetMessage("OFFER_SIZE_TITLE")?></td>
                    <td class="article"><?=GetMessage("OFFER_CML2_ARTICLE_TITLE")?></td>
                    <td class="speed"><?=GetMessage("OFFER_INDEKS_SKOROSTI_TITLE")?></td>
                    <td class="load"><?=GetMessage("OFFER_INDEKS_NAGRUZKI_TITLE")?></td>
                    <td class="avalible"><?=GetMessage("OFFER_QUANTITY_TITLE")?></td>
                    <td class="price"><?=GetMessage("OFFER_PRICE_TITLE")?></td>
                </tr>
                <? $count = 0;?>
                <? foreach($arResult["CUSTOM_OFFERS"] as $diameterValue => $arOffers):?>
                    <tr class="size-divider offer_block" data-page="<?=$count?>">
                        <td><?=GetMessage("PREFIX_DIAMETER_TITLE")?><?=$diameterValue?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <? foreach($arOffers as $arOffer):?>
                        <tr id="product" class="offer_block" data-page="<?=$count?>">
                            <td class="size">
                                <a href="<?=$arOffer["DETAIL_PAGE_URL"]?>">
                                    <?=$arOffer["FULL_TEXT_FOR_NAME"]?>
                                </a>
                            </td>
                            <td class="article">
                                <?=$arOffer["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?>
                            </td>
                            <td class="speed">
                                <?=$arOffer["PROPERTIES"]["INDEKS_SKOROSTI"]["VALUE"]?>
                            </td>
                            <td class="load">
                                <?=$arOffer["PROPERTIES"]["INDEKS_NAGRUZKI"]["VALUE"]?>
                            </td>
                            <? if ($arOffer["CAN_BUY"] && $arOffer["CATALOG_QUANTITY"] > 4):?>
                                <? if ($arOffer["CATALOG_QUANTITY"] >= LIMIT_QUANTITY):?>
                                    <td class="avalible">
                                        ><?=LIMIT_QUANTITY?>
                                    </td>
                                <? elseif($arOffer["CATALOG_QUANTITY"] < LIMIT_QUANTITY && $arOffer["CATALOG_QUANTITY"] > 8):?>
                                    <td class="avalible">
                                        <?=$arOffer["CATALOG_QUANTITY"]?>
                                    </td>
                                <? elseif($arOffer["CATALOG_QUANTITY"] <= 8):?>
                                    <td class="avalible few">
                                        <?=$arOffer["CATALOG_QUANTITY"]?>
                                    </td> 
                                <? endif;?>
                            <? else:?>
                                    <td class="avalible preorder"><?=GetMessage("PREORDER_TITLE")?></td>
                            <? endif;?>

                            <td class="price">
                                <button id="add_to_basket" data-id="<?=$arOffer["ID"]?>" class="price-btn"><?=$arOffer["PRICE"]?><i>e</i></button>
                                <input type="text" id="quantity" class="spinner" value="0">
                            </td>
                        </tr>
                    <? endforeach;?>
                    <? $count++;?>
                <? endforeach;?>
            </table>
        <? elseif(!empty($arResult["DETAIL_TEXT"])):?>
            <div class="sizes-info">
                <div class="product-info">
                  <?=$arResult["DETAIL_TEXT"]?>
                </div>
            </div>
        <? endif;?>
    </div>
    <? $APPLICATION->ShowViewContent('RECOMMENDED_BLOCK');?>
    <div class="sizes-info">
        asdasdas
    </div>
    <div class="views-informer">
        <a href="#" class="print-btn">Распечатать</a>
        <span class="views"><?=GetMessage("COUNT_VIEWES_TITLE");?> <?=$arResult["SHOW_COUNTER"]?></span>
    </div>
</div>
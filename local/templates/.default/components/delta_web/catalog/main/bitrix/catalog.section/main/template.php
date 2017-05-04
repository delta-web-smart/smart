<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<? if (!empty($arResult['ITEMS'])):?>
    <ul class="search-results">
        <? foreach($arResult['ITEMS'] as $arItem):?>
            <? 
                if (!empty($arItem["CURRENT_OFFER_ID"])) {
                    $addBasketId = $arItem["CURRENT_OFFER_ID"];
                } else {
                    $addBasketId = $arItem["ID"];
                }
            ?>
            <li class="mini-card" id="product">
                <a title="<?=$arItem["NAME"]?>" href="<?=$arItem["BIG_PICTURE"]?>" class="preview fancybox">
                    <img alt="<?=$arItem["NAME"]?>" src="<?=$arItem["SMALL_PICTURE"]["src"]?>">
                    <div class="loupe"></div>
                    <? if ($arItem["ALL_STICKERS"]["IS_DISCOUNT"]):?>
                        <div class="action-label"></div>
                    <? elseif($arItem["ALL_STICKERS"]["IS_NEW"]):?>
                        <div class="action-label new"></div>
                    <? elseif($arItem["ALL_STICKERS"]["IS_HIT"]):?>
                        <div class="action-label hit"></div>
                    <? endif;?>
                </a>
                <div class="right-part">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name"><?=$arItem["NAME"]?></a>
                    <? if (!empty($arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])):?>
                        <span class="article"><?=GetMessage("CML2_ARTICLE_TITLE")?> <?=$arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></span>
                    <? endif;?>
                    <table>
                      <? foreach($arItem["DISPLAY_PROPERTIES"] as $arProp):?>
                        <? if (!empty($arProp['DISPLAY_VALUE'])):?>
                            <tr>
                                <td><? echo $arProp['NAME']; ?>:</td>
                                <td>
                                    <?
                                        echo (
                                            is_array($arProp['DISPLAY_VALUE'])
                                            ? implode(' / ', $arProp['DISPLAY_VALUE'])
                                            : $arProp['DISPLAY_VALUE']
                                        );
                                    ?>
                                </td>
                            </tr>
                        <? endif;?>
                      <? endforeach;?>
                      <tr class="available">
                        <td><?=GetMessage("AVAILABILITY_TITLE")?></td>
                        <? if ($arItem["CATALOG_QUANTITY"] >= LIMIT_QUANTITY):?>
                            <td class="avalible">><?=LIMIT_QUANTITY?></td>
                        <? else:?>
                            <td class="avalible few"><<?=LIMIT_QUANTITY?></td>
                        <? endif;?>
                      </tr>
                    </table>
                </div>
                <div class="clear"></div>
                <div class="controls">
                    <? if ($arItem["CAN_BUY"]):?>
                        <?
                            $APPLICATION->IncludeFile($templateFolder. "/block_with_buy_button.php", array(
                                "addBasketId" => $addBasketId,
                                "PARAMS" => $arParams,
                                "arItem" => $arItem
                            ));
                        ?>
                     <? endif;?>
                </div>
            </li>
        <? endforeach;?>
    </ul>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"] == "Y"):?>
        <?=$arResult["NAV_STRING"]?>
    <? endif;?>
<? endif;?>
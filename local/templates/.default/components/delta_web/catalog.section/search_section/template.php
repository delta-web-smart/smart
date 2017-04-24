<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<? if (!empty($arResult['ITEMS'])):?>
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
                <span class="article">Артикул: 0023402</span>
                <table>
                  <tr>
                    <td>OEM №:</td>
                    <td>2385723D39</td>
                  </tr>
                  <tr>
                    <td>Диаметр:</td>
                    <td>323</td>
                  </tr>
                  <tr>
                    <td>Ширина:</td>
                    <td>21</td>
                  </tr>
                  <tr class="available">
                    <td><?=GetMessage("AVAILABILITY_TITLE")?></td>
                    <? if ($arResult["CATALOG_QUANTITY"] >= LIMIT_QUANTITY):?>
                        <td class="avalible">><?=LIMIT_QUANTITY?></td>
                    <? else:?>
                        <td class="avalible few"><<?=LIMIT_QUANTITY?></td>
                    <? endif;?>
                  </tr>
                </table>
            </div>
            <div class="clear"></div>
            <div class="controls">
                 <? if (!isset($arItem['OFFERS']) || empty($arItem['OFFERS'])):?>                        <? if ($arItem["CAN_BUY"]):?>
                        <?
                            $APPLICATION->IncludeFile($templateFolder. "/block_with_buy_button.php", array(
                                "addBasketId" => $addBasketId,
                                "PARAMS" => $arParams,
                                "arItem" => $arItem
                            ));
                        ?>
                    <? endif;?>
                 <? else:?>
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
<? endif;?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<? if (!empty($arResult)):?>
    <div class="product-card model">
        <div class="left-block">
          <div class="preview">
            <a class="fancybox" href="<?=$arResult["PICTURE"]?>" class="big-view">
              <img src="<?=$arResult["RESIZE_PICTURE"]["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>">
              <div class="loupe"></div>
              <? if (in_array($arResult["ID"], $arResult["DISCOUNT_IDS"])):?>
                <div class="action-label"></div>
              <? endif;?>
            </a>
          </div>
          <div class="central-part">
            <div class="article"><a href="#" class="trademark"><img src="<?=MAIN_TEMPLATE_PATH?>img/trademark1.jpg" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"></a></div>
            <table>
              <? if (!empty($arResult["PROPERTIES"]["CML2_MANUFACTURER"]["VALUE"])):?>
                  <tr>
                    <td><?=GetMessage("CML2_MANUFACTURER_TITLE")?></td>
                    <td><?=$arResult["PROPERTIES"]["CML2_MANUFACTURER"]["VALUE"]?></td>
                  </tr>
              <? endif;?>
              <? if (!empty($arResult["PROPERTIES"]["SEZON"]["VALUE"])):?>
                  <tr>
                    <td><?=GetMessage("SEZON_TITLE")?></td>
                    <td><?=$arResult["PROPERTIES"]["SEZON"]["VALUE"]?>
                    <? if ($arResult["PROPERTIES"]["SEZON"]["VALUE_ENUM_ID"] == 32):?>
                        <i class="season-ico <?=GetMessage("SEZON_ID_TITLE_30")?>"></i>
                        <i class="season-ico <?=GetMessage("SEZON_ID_TITLE_31")?>"></i>
                     <? else:?>
                        <i class="season-ico <?=GetMessage("SEZON_ID_TITLE_".$arResult["PROPERTIES"]["SEZON"]["VALUE_ENUM_ID"])?>"></i>
                     <? endif;?>
                    </td>
                  </tr>
              <? endif;?>
              <? if (!empty($arResult["PROPERTIES"]["TIP_AVTO"]["VALUE"])):?>
                  <tr>
                    <td><?=GetMessage("TIP_AVTO_TITLE")?></td>
                    <td><?=$arResult["PROPERTIES"]["TIP_AVTO"]["VALUE"]?></td>
                  </tr>
              <? endif;?>
            </table>
            <div class="features">
                <? if (!empty($arResult["PROPERTIES"]["SHIP"]["VALUE"])):?>
                    <img src="<?=MAIN_TEMPLATE_PATH?>img/spike-ico.png" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>">
                <? endif;?>
                <!--<img src="<?=MAIN_TEMPLATE_PATH?>img/features-label.png" title="<?=$arResult["NAME"]?>" alt="<?=$arResult["NAME"]?>">-->
            </div>
          </div>
          <div class="clear"></div>
          <div class="description">
            <?=$arResult["DETAIL_TEXT"]?>
          </div>
        </div>
        <?
            $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/catalog/right_menu.php"), false);
        ?>
    </div>
    <div class="product-support">
        <ul class="markers">
          <li class="active"><a href="#"><span><?=GetMessage("SIZES_TAB_TITLE")?></span></a></li>
          <li><a href="#"><?=GetMessage("RECOMMENDED_TAB_TITLE")?></a></li>
          <li><a href="#"><?=GetMessage("ASK_QUESTION_TAB_TITLE")?></a></li>
        </ul>
        <div class="sizes-info">
          <? if (!empty($arResult["CUSTOM_OFFERS"])):?>
              <ul class="size-list">
                <li><a href="#"><?=GetMessage("ALL_SIZES_SHOW_TITLE")?></a></li>
                <? $count = 0;?>
                <? foreach($arResult["CUSTOM_OFFERS"] as $diameterValue => $arOffers):?>
                    <? 
                        if ($count == 0) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                    ?>
                    <li class="<?=$active?>"><a href="#"><?=GetMessage("PREFIX_DIAMETER_TITLE")?><?=$diameterValue?></a></li>
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
                          <td class="size"><a href="<?=$arOffer["DETAIL_PAGE_URL"]?>"><?=GetMessage("FULL_TEXT_SIZE", array(
                            "SHIRINA" => $arOffer["PROPERTIES"]["SHIRINA"]["VALUE"],
                            "VYSOTA" => $arOffer["PROPERTIES"]["VYSOTA"]["VALUE"],
                            "DIAMETR" => $arOffer["PROPERTIES"]["DIAMETR"]["VALUE"],
                          ))?></a></td>
                          <td class="article"><?=$arOffer["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></td>
                          <td class="speed"><?=$arOffer["PROPERTIES"]["INDEKS_SKOROSTI"]["VALUE"]?></td>
                          <td class="load"><?=$arOffer["PROPERTIES"]["INDEKS_NAGRUZKI"]["VALUE"]?></td>
                          
                          <? if ($arOffer["CAN_BUY"] && $arOffer["CATALOG_QUANTITY"] > 4):?>
                            <? if ($arOffer["CATALOG_QUANTITY"] >= 12):?>
                              <td class="avalible">
                                >12
                              </td>
                            <? elseif($arOffer["CATALOG_QUANTITY"] < 12 && $arOffer["CATALOG_QUANTITY"] > 8):?>
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
            <? endif;?>
        </div>
        <div class="sizes-info">
            <? $APPLICATION->ShowViewContent('RECOMMENDED_BLOCK');?>
        </div>
        <div class="sizes-info">
            asdasdas
        </div>
        <div class="views-informer">
          <a href="#" class="print-btn">Распечатать</a>
          <span class="views"><?=GetMessage("COUNT_VIEWES_TITLE");?> <?=$arResult["SHOW_COUNTER"]?></span>
        </div>
      </div>
<? endif;?>
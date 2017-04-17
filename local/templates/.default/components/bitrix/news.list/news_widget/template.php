<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["ITEMS"])):?>
    <div class="news-widget">
      <h3><?=GetMessage('NEWS_WIDGET_TITLE');?></h3>
      <ul>
        <? foreach($arResult["ITEMS"] as $arItem):?>
            <li>
              <span class="date"><?=$arItem["DATE"]?></span>
              <a class="news-title" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
              <div class="news">
                <div class="img-wrap"><img src="<?=$arItem["PICTURE"]["src"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"></div>
                <p><?=$arItem["PREVIEW_TEXT"]?></p>
              </div>
            </li>
        <? endforeach;?>
      </ul>
    </div>
<? endif;?>
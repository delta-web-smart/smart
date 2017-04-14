<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["ITEMS"])):?>
    <div class="main-slider">
      <div class="overflow">
        <div class="slides">
          <? foreach($arResult["ITEMS"] as $arItem):?>
              <a href="<? if (!empty($arItem["PROPERTIES"]["LINK"]["VALUE"])):?><?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?><? else:?>#<? endif;?>" class="slide">
                <img src="<?=$arItem["PICTURE"]["src"]?>" title="<?=$arItem["NAME"]?>" alt="<?=$arItem["NAME"]?>">
              </a>
          <? endforeach;?>
        </div>
      </div>
      <ul class="dots">
        <? for($i = 1; $i <= count($arResult["ITEMS"]); $i++):?>
            <li class="<? if($i == 1):?>s<?endif;?>"><?=$i?></li>
        <? endfor;?>
      </ul>
    </div>
<? endif;?>
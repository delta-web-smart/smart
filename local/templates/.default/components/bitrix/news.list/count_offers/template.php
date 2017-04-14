<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["ITEMS"])):?>
    <span class="about-catalog"><?=GetMessage("COUNT_OFFERS_TITLE", array("COUNT_OFFERS"=>$arResult["COUNT_OFFERS"]))?></span>
    <div class="clear"></div>
<? endif;?>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><span><?=GetMessage($arResult["PROPERTY"]."_TITLE")?></span>
<select name="<?=$arResult["PROPERTY"]?>" class="select-style">
    <option value=""><?=GetMessage($arResult["PROPERTY"]. "_CHOOSE_TITLE")?></option>
    <? foreach($arResult["ITEMS"] as $value):?>
        <option value="<?=$value?>"><?=$value?></option>
    <? endforeach;?>
</select>
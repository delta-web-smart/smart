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
<? 
    if (!empty($arParams["FORM_ACTION"])) {
        $formAction = $arParams["FORM_ACTION"];
    } else {
        $formAction = $arResult["FORM_ACTION"];
    }
?>
<form class="header_filter" name="<?echo $arParams["FILTER_NAME"]."_form"?>" action="<?echo $formAction?>" method="get">
    <?foreach($arResult["HIDDEN"] as $arItem):?>
        <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
    <?endforeach;?>
    
    <div class="options-wrap clearfix">
        <? foreach($arResult["ITEMS"] as $arItem):?>
            <? 
                if(
                    empty($arItem["VALUES"])
                    || isset($arItem["PRICE"])
                )
                    continue;

                if (
                    $arItem["DISPLAY_TYPE"] == "A"
                    && (
                        $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
                    )
                )
                    continue; 
            ?>
            <? 
                $isBlockClear = false;
                if ($arItem["CODE"] == SEZON_PROPERTY_CODE) {
                    $class = "seasonality";
                    $isBlockClear = true;
                } else {
                    $class = "narrow";
                }
            ?>
            <div class="option <?=$class?>">
                <span class="label"><?=$arItem["NAME"]?></span>
                <? if ($isBlockClear):?>
                    <div class="clear"></div>
                <? endif;?>
                <? if ($arItem["CODE"] == SEZON_PROPERTY_CODE):?>
                    <? foreach($arItem["VALUES"] as $ar):?>
                        <? 
                            $checked = "";
                            if ($ar["CHECKED"]) {
                                $checked = "checked";
                            }
                        ?>
                        <input <?=$checked?> class="radio-style check" type="radio" id="<?=$ar["CONTROL_ID"]?>" value="<? echo $ar["HTML_VALUE"] ?>" name="<?=$ar["CONTROL_NAME"]?>"></input>
                        <label class="<? if ($ar["PROP_ENUM"]["ID"] == SEZON_SUMMER_VALUE_ENUM_ID):?>summery<?elseif($ar["PROP_ENUM"]["ID"] == SEZON_WINTER_VALUE_ENUM_ID):?>wintery<?endif;?>" for="<?=$ar["CONTROL_ID"]?>"><?=$ar["VALUE"]?></label>
                    <? endforeach;?>
                    <div class="clear"></div>
                 <? else:?>
                    <select name="" class="select-style" onchange="smartFilterTop.change(this)">
                        <option value=""><?=GetMessage("CHOOSE_TITLE")?></option>
                        <? foreach($arItem["VALUES"] as $ar):?>
                            <? 
                                if ($ar["CHECKED"]) {
                                    $selected = 'selected="selected"';
                                } else {
                                    $selected = "";
                                }
                            ?>
                            <option data-name="<?=$ar["CONTROL_NAME"]?>" <?=$selected?> value="<? echo $ar["HTML_VALUE"] ?>"><? echo $ar["VALUE"] ?></option>
                        <? endforeach;?>
                    </select>
                 <? endif;?>
            </div>
        <? endforeach;?>
            
        <button class="orange-btn" type="submit"><?=GetMessage("PICKED_BUTTON_TITLE")?></button>
        
    </div>
    
    <input
        class="btn btn-themes"
        type="hidden"
        id="set_filter"
        name="set_filter"
        value="<?=GetMessage("CT_BCSF_SET_FILTER")?>"
    />
    <input
        class="btn btn-link"
        type="hidden"
        id="del_filter"
        name="del_filter"
        value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>"
    />
</form>
<script>
	var smartFilterTop = new JCSmartFilterTop('<?echo CUtil::JSEscape($formAction)?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>
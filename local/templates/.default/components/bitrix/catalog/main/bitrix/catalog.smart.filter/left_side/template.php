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
$this->SetViewTarget('LEFT_SIDE_FILTER');
?>
<form class="filter" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
    <?foreach($arResult["HIDDEN"] as $arItem):?>
        <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
    <?endforeach;?>
    <h4><?=GetMessage("FILTER_TITLE");?></h4>
    <? foreach($arResult["SORT_FIELDS"] as $arSort):?>
        <div class="sort category price" data-by="<?=$arSort["FIELD"];?>">
            <span class="category-title"><?=$arSort["TITLE"];?></span>
            <? 
                if ($arSort["FIELD"] == $_REQUEST["by"] && $_REQUEST["order"] == "asc") {
                    $activeAsc = "active";
                } else {
                    $activeAsc = "";
                }
                if ($arSort["FIELD"] == $_REQUEST["by"] && $_REQUEST["order"] == "desc") {
                    $activeDesc = "active";
                } else {
                    $activeDesc = "";
                }
            ?>
            <button class="<?=$activeDesc?>"></button>
            <button class="up <?=$activeAsc?>"></button>
        </div>
    <? endforeach;?>
    <? $totalCount = 0;?>
    <? foreach($arResult["ITEMS"] as $key=>$arItem) {
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
                    $totalCount++;    
                    ?>
        <div class="category <? if ($arResult["TOTAL_COUNT_WITH_VALUES"] != $totalCount):?>dual-checks<?else:?>last<?endif;?>">
            <span class="category-title"><?=$arItem["UPPER_NAME"]?></span>
            <? 
                switch ($arItem["DISPLAY_TYPE"]):
                    case "A": 
           ?>
                <div class="range">
                    <span class="label">
                        <?=GetMessage("CT_BCSF_FILTER_FROM")?>
                        <input type="text" name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" class="amount-min" value="<?echo $arItem["VALUES"]["MIN"]["VALUE"]?>" onkeyup="smartFilter.keyup(this)" id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>">
                        <?=GetMessage("CT_BCSF_FILTER_TO")?>
                        <input type="text" name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" value="<?echo $arItem["VALUES"]["MAX"]["VALUE"]?>" class="amount-max" onkeyup="smartFilter.keyup(this)" id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>">
                    </span>
                    <div class="filter-slider-range"></div>
                </div>
            <?
                    break;
            ?>
            <? default:?>
                <?
                    $APPLICATION->IncludeFile($templateFolder ."/default_values.php", array(
                        "ITEMS" => $arItem["VALUES_1"],
                        "SLICE_COLUMNS" => $arItem["COUNT_VALUES_IN_COLUMN_PART_1"]
                    ));
                ?>
                <?
                    $APPLICATION->IncludeFile($templateFolder ."/default_values.php", array(
                        "ITEMS" => $arItem["VALUES"],
                        "SLICE_COLUMNS" => $arItem["COUNT_VALUES_IN_COLUMN"],
                        "HIDE" => true
                    ));
                ?>
            <? endswitch;?>
            <? if (!empty($arItem["VALUES_2"])):?>
                <a href="#" class="select-all"><?=GetMessage("ALL_PROPERTY_TITLE", array("PLURAL_WORD" => $arItem["PLURAL_WORD"]));?></a>
            <? endif;?>
            <div class="clear"></div>
        </div>
    <? 
        } 
    ?>
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
    <div class="bx-filter-popup-result <? echo $arParams["POPUP_POSITION"]?>" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
        <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
        <span class="arrow"></span>
        <br/>
        <a href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
    </div>
</form>
<script>
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>
<? $this->EndViewTarget(); ?>
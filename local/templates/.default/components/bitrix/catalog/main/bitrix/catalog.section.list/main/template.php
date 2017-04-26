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
if (!empty($arResult["SECTIONS"])):?>
    <ul class="all-for-auto">
        <? foreach($arResult["SECTIONS"] as $i=>$arSection):?>
            <? if ($arSection['DEPTH_LEVEL'] == 1):?>
                <li>
                  <a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="category-name"><img src="<?=$arSection["PICTURE"]["src"]?>" title="<?=$arSection["NAME"]?>" alt="<?=$arSection["NAME"]?>"><span><?=$arSection["NAME"]?></span></a>
            <? else:?>
                  <a style="margin-left: <?=(10*$arSection["DEPTH_LEVEL"])?>px" href="<?=$arSection["SECTION_PAGE_URL"]?>" class="sub-category"><?=$arSection["NAME"]?></a>
            <? endif;?>
            <? if (empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"]) || $arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1):?>
                </li>
            <? endif;?>
        <? endforeach;?>
    </ul>
<? endif;?>
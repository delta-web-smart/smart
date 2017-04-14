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
<?php if (!empty($arResult["SECTIONS"])):?>
    <nav class="product-nav">
        <ul class="clearfix">
          <? foreach($arResult["SECTIONS"] as $i=>$arSection):?>
            <? if ($arSection['DEPTH_LEVEL'] == 1):?>
                <li class="<?if($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1 || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>no-sub<? endif;?> product<?=$i+1?>">
                    <? if ($prevDepthLevel > 2):?>
                        </li>
                    <? endif;?>
                    <? if($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1 || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>
                        <a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="no-sub-link">
                    <? endif;?>
                <? endif;?>
                <? if ($arSection['DEPTH_LEVEL'] == 1):?>
                    <span class="item-name">
                        <?=$arSection["NAME"]?>
                <? endif;?>
                <? if ($arSection["DEPTH_LEVEL"] > 1):?>
                    <? if ($arSection["DEPTH_LEVEL"] - $prevDepthLevel && $arSection["DEPTH_LEVEL"] > $prevDepthLevel):?>
                        <i class="dropdown"></i>
                        <div class="sub-nav">
                            <div class="list">
                    <? endif;?>
                                <a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
                    <? if ($arSection["DEPTH_LEVEL"] != $arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>
                        <? if (empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])) {
                            $arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] = 1;
                        } ?>
                        <?=str_repeat('</div><img src="'.SITE_TEMPLATE_PATH.'/img/sub-nav-img.png" alt=""></div>', $arSection["DEPTH_LEVEL"] - $arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"]);?>
                    <? endif;?>     
                <? endif;?>
                <? if ($arSection['DEPTH_LEVEL'] == 1):?>
                    </span>
                    <div class="product-img"></div>
                     <? if($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1 || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>
                        </a>
                    <? endif;?>
                <? endif;?>
                <? if (empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"]) || $arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1):?>
                    </li>
                <? endif;?>
                <? $prevDepthLevel = $arSection["DEPTH_LEVEL"];?>
            <? endforeach;?>
        </ul>
      </nav>
<? endif;?>
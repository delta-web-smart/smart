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
          <? $count = 1;?>
          <? foreach($arResult["SECTIONS"] as $i=>$arSection):?>
            <? if ($arSection['DEPTH_LEVEL'] == 1):?>
                <li class="<?if($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1 || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>no-sub<? endif;?> product<?=$count?>">
                <? if ($prevDepthLevel > 2):?>
                    </li>
                <? endif;?>
                <? if($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1 || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>
                    <a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="no-sub-link">
                <? endif;?>
               <? $count++; ?>
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
                        <? 
                            if (!empty($arResult["SECTIONS"][$i-1]["IMAGE_2"]["src"])) {
                                $image = '<img src="'. $arResult["SECTIONS"][$i-1]["IMAGE_2"]["src"] .'" alt="">';
                            }
                        ?>
                        <?=str_repeat('</div>'.$image.'</div>', $arSection["DEPTH_LEVEL"] - $arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"]);?>
                    <? endif;?>     
                <? endif;?>
                <? if ($arSection['DEPTH_LEVEL'] == 1):?>
                    </span>
                    <div class="product-img" <?if(!empty($arSection["IMAGE_1"]["src"])):?>style="background-image: url('<?=$arSection["IMAGE_1"]["src"]?>');"<?endif;?>></div>
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
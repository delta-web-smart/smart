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
                    <li class="product<?=$count?> <?if($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1 || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>no-sub<? endif;?>">
                        <span class="item-name">
                            <?=$arSection["NAME"]?>
                            <? $count++;?>
                            <? 
                                $image_1 = $arSection["IMAGE_1"]["src"];
                                $image_2 = CFile::ShowImage($arSection["IMAGE_2"]["src"], 0, 0, "title='".$arSection["NAME"]."' alt='".$arSection["NAME"]."'");
                            ?>
                <? else:?>
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
						<?=str_repeat("</div>".$image_2."</div>", $arSection["DEPTH_LEVEL"] - $arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"]);?>
					<? endif;?>
                <? endif;?>
                <? if ($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"] == 1 || empty($arResult["SECTIONS"][$i+1]["DEPTH_LEVEL"])):?>
                        </span>
                        <div class="product-img" <?if(!empty($image_1)):?>style="background-image: url('<?=$image_1?>');"<?endif;?>></div>
                    </li>
				<? endif;?>
                <? $prevDepthLevel = $arSection["DEPTH_LEVEL"];?>
            <? endforeach;?>
        </ul>
      </nav>
<? endif;?>
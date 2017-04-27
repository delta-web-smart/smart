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
    <div class="sort-item right" id="catalog_top_filter" data-url="<?=SITE_DIR. "include/catalog/filter_picking_by_sizes.php"?>">
        <h3><?=GetMessage("PICKING_BY_SIZES_TITLE")?></h3>
        <ul class="category">
            <? foreach($arResult["SECTIONS"] as $i => $arSection):?>
                <? 
                    if (empty($arResult["ACTIVE_SECTION"])) {
                        if ($i == 0) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        $section_id = $arResult["SECTIONS"][0]["ID"];
                        $properties = $arResult["SECTIONS"][0]["SHOW_PROPERTIES"];
                    } else {
                        if ($arResult["ACTIVE_SECTION"]["ID"] == $arSection["ID"]) {
                            $active = "active";
                            $section_id = $arResult["ACTIVE_SECTION"]["ID"];
                             $properties = $arSection["SHOW_PROPERTIES"];
                        } else {
                            $active = "";
                        }
                    }
                ?>
                <li data-properties='<?=json_encode($arSection["SHOW_PROPERTIES"])?>' data-id="<?=$arSection["ID"]?>" class="<?=$active?>"><a href="#"><?=$arSection["NAME"]?></a></li>
            <? endforeach;?>
        </ul>
        <div id="filter_top">
            <?
                $APPLICATION->IncludeFile(SITE_DIR. "include/catalog/filter_picking_by_sizes.php", array(
                    "section_id" => $section_id,
                    "properties" => $properties
                ));
            ?>
        </div>
    </div>
<? endif;?>
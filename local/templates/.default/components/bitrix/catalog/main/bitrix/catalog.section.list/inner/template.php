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
    <ul class="brands-search tire-catalog">
        <? foreach($arResult["SECTIONS"] as $i=>$arSection):?>
                <li>
                  <a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="brand-link">
                    <div class="img-wrap"><img src="<?=$arSection["PICTURE"]["src"]?>" alt="<?=$arSection["NAME"]?>" title="<?=$arSection["NAME"]?>"></div>
                    <div class="name-wrap"><span><?=$arSection["NAME"]?></span></div>
                  </a>
                  <div class="season">
                    <a href="#" class="summer"><?=GetMessage("SUMMER_TYRES_TITLE")?></a>
                    <a href="#" class="winter"><?=GetMessage("WINTER_TYRES_TITLE")?></a>
                  </div>
                </li>
        <? endforeach;?>
    </ul>
<? endif;?>
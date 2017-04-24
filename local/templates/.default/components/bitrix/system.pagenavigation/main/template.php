<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false) || $arResult["NavShowAll"])
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
$arResult["nEndPage"]--;
?>
<div class="page-nav">
    <? if ($arResult["bShowAll"]):?>
        <a class="view-all" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow"><?=GetMessage("SHOW_ALL_PAGES_TITLE");?></a>
    <? endif;?>
    <ul>
        <?if($arResult["bDescPageNumbering"] === true):?>
            <?while($arResult["nStartPage"] >= $arResult["nEndPage"]):?>
                <?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

                <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                    <li class="current"><a href="#"><?=$NavRecordGroupPrint?></a></li>
                <?elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):?>
                    <li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a></li>
                <?else:?>
                    <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a></li>
                <?endif?>

                <?$arResult["nStartPage"]--?>
            <?endwhile?>
        <?else:?>	
            <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
                <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                    <li class="current"><a href="#"><?=$arResult["nStartPage"]?></a></li>
                <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
                    <li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a></li>
                <?else:?>
                    <li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></li>
                <?endif?>
                <?$arResult["nStartPage"]++?>
            <?endwhile?>
        <?endif?>
    </ul>
</div>
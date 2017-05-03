<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["ERRORS"])):?>
    <ul class="errors">
        <? foreach($arResult["ERRORS"] as $error):?>
            <li><?=$error?></li>
        <? endforeach;?>
    </ul>
<? else:?>
    <? if (!empty($arResult["DATA"])):?>
        <TABLE BORDER=0 width="100%">
            
            <TR><TD><b><h2><?=GetMessage("DISK_PARAMETERS_TITLE")?></h2></b></TD></TR>
            <TR><TD><?=GetMessage("PCD_TITLE")?> <?=$arResult["DATA"]["PROPERTIES"]["PCD"]["VALUE"]?>; <?=GetMessage("DIAMETR_TITLE")?> <?=$arResult["DATA"]["PROPERTIES"]["DIAMETR"]["VALUE"]?>; <?=$arResult["DATA"]["PROPERTIES"]["GAIKA"]["VALUE"]?></TD></TR>
            
            <? foreach($arResult["MULTIPLY_PROPERTIES"] as $key => $arProperty):?>
                <TR><TD><h3><?=GetMessage($key."_TITLE")?></h3></TD></TR>
                <? if (!empty($arProperty["FRONT_AXLE"]) && !empty($arProperty["REAR_AXLE"])):?>
                    <TR><TD>
                        <?=GetMessage("FRONT_AXLE_TITLE")?> 
                        <a href="<?=$arProperty["FRONT_AXLE"]["URL"]?>">
                            <?=$arProperty["FRONT_AXLE"]["VALUE"]?>
                        </a><br/>
                        <?=GetMessage("REAR_AXLE_TITLE")?><a href="<?=$arProperty["REAR_AXLE"]["URL"]?>">
                            <?=$arProperty["REAR_AXLE"]["VALUE"]?>
                        </a>
                    </TD></TR>
                <? endif;?>
                <? if (!empty($arProperty["VALUES"])):?>
                    <? foreach($arProperty["VALUES"] as $arValue):?>
                        <TR><TD><a href="<?=$arValue["URL"]?>"><?=$arValue["VALUE"]?></a></TD></TR>
                    <? endforeach;?>
                <? endif;?>
            <? endforeach;?>
            
        </TABLE>
    <? else:?>
        <p><?=GetMessage("RESULT_PODBOR_EMPTY")?></p>
    <? endif;?>
<? endif;?>
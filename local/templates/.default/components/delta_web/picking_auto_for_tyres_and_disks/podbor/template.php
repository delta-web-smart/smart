<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["ERRORS"])):?>
    <ul class="errors">
        <? foreach($arResult["ERRORS"] as $error):?>
            <li><?=$error?></li>
        <? endforeach;?>
    </ul>
<? else:?>
    <? if (!empty($arResult["DATA"])):?>
        <table class="table-info" border="0" cellpadding="0" cellspacing="1">
            <tr class="head">
                <td colspan="4"><b><?=$arResult["MAIN_TITLE"]?></b></td>
            </tr>
            <tr class="head">
                <td colspan="2"><b><?=GetMessage("TYRES_TITLE")?></b></td>
                <td colspan="2"><b><?=GetMessage("DISKS_TITLE")?></b></td>
            </tr>
            <tr class="head">
				<td colspan="2"><?=GetMessage("MAIN_PARAMETRES_TYRES_TITLE")?></td>
				<td colspan="2"><?=GetMessage("MAIN_PARAMETRES_DISKS_TITLE")?></td>
			</tr>
			<tr>
				<td colspan="2">
					
				</td>
				<td colspan="2">
					<table class="table-info child" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td><?=GetMessage("PCD_TITLE")?> <?=$arResult["DATA"]["PROPERTIES"]["PCD"]["VALUE"]?></td>
                        </tr>
						<tr>
							<td><?=$arResult["DATA"]["PROPERTIES"]["GAIKA"]["VALUE"]?></td>				
                        </tr>
						<tr>
							<td><?=GetMessage("DIAMETR_TITLE")?> <?=$arResult["DATA"]["PROPERTIES"]["DIAMETR"]["VALUE"]?></td>
                        </tr>
					</table>
				</td>
			</tr>
            
            <? foreach($arResult["MULTIPLY_PROPERTIES"] as $arProperties):?>
                <tr class="head">
                    <? foreach($arProperties as $propertyCode => $arProperty):?>
                        <td colspan="2"><?=GetMessage($propertyCode."_TITLE")?></td>
                    <? endforeach;?>
                </tr>
                <tr>
                    <? foreach($arProperties as $propertyCode => $arProperty):?>
                        <td colspan="2">
                            <table class="table-info child" border="0" cellpadding="0" cellspacing="0">
                                <? if (!empty($arProperty["FRONT_AXLE"]) && !empty($arProperty["REAR_AXLE"])):?>
                                    <tr>
                                        <td>
                                            <?=GetMessage("FRONT_AXLE_TITLE")?> 
                                            <a href="<?=$arProperty["FRONT_AXLE"]["URL"]?>">
                                                <?=$arProperty["FRONT_AXLE"]["VALUE"]?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?=GetMessage("REAR_AXLE_TITLE")?><a href="<?=$arProperty["REAR_AXLE"]["URL"]?>">
                                                <?=$arProperty["REAR_AXLE"]["VALUE"]?>
                                            </a>
                                        </td>
                                    </tr>
                                <? endif;?>
                                <? if (!empty($arProperty["VALUES"])):?>
                                    <? foreach($arProperty["VALUES"] as $arValue):?>
                                        <tr>
                                            <td>
                                                <a href="<?=$arValue["URL"]?>">
                                                    <?=$arValue["VALUE"]?>
                                                </a>
                                            </td>
                                        </tr>
                                    <? endforeach;?>
                                <? endif;?>
                            </table>
                        </td>
                    <? endforeach;?>
                </tr>
            <? endforeach;?>
        </table>
    <? else:?>
        <p><?=GetMessage("RESULT_PODBOR_EMPTY")?></p>
    <? endif;?>
<? endif;?>
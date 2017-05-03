<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["VENDOR"])):?>
    <form class="sort-item left" method="POST" data-action_podbor="<?=$arParams["RESULT_URL"]?>" action="<?=SITE_DIR."include/picking_auto_for_tyres_and_disks.php"?>">
        <div class="title">
            <div class="img-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/sort-type-img.png" alt=""></div>
            <h3><?=GetMessage("PICKING_AUTO_TITLE")?></h3>
        </div>
        <div class="options-wrap clearfix">
            <div class="option">
              <span><?=GetMessage("VENDOR_TITLE")?></span>
              <select name="VENDOR" class="select-style">
                <option value=""><?=GetMessage("VENDOR_CHOOSE_TITLE")?></option>
                <? foreach($arResult["VENDOR"] as $vendorValue):?>
                    <? 
                        $selected = "";
                        if ($arResult["VALUES"]["VENDOR"] == $vendorValue) {
                            $selected = "selected";
                        }
                    ?>
                    <option <?=$selected?> value="<?=$vendorValue?>"><?=$vendorValue?></option>
                <? endforeach;?>
              </select>
            </div>
            <div class="option <? if (empty($arResult["CAR"])):?>disable<?endif;?>">
              <span><?=GetMessage("CAR_TITLE")?></span>
              <select name="CAR" class="select-style" <? if (empty($arResult["CAR"])):?>disabled="disabled"<?endif;?>>
                <option value=""><?=GetMessage("CAR_CHOOSE_TITLE")?></option>
                <? if (!empty($arResult["CAR"])):?>
                    <? foreach($arResult["CAR"] as $carValue):?>
                        <? 
                            $selected = "";
                            if ($arResult["VALUES"]["CAR"] == $carValue) {
                                $selected = "selected";
                            }
                        ?>
                        <option <?=$selected?> value="<?=$carValue?>"><?=$carValue?></option>
                    <? endforeach;?>
                <? endif;?>
              </select>
            </div>
        </div>
        <div class="options-wrap clearfix">
            <div class="option year <? if (empty($arResult["YEAR"])):?>disable<?endif;?>">
              <span><?=GetMessage("YEAR_TITLE")?></span>
              <select name="YEAR" class="select-style" <? if (empty($arResult["YEAR"])):?>disabled="disabled"<?endif;?>>
                <option value=""><?=GetMessage("YEAR_CHOOSE_TITLE")?></option>
                <? if (!empty($arResult["YEAR"])):?>
                    <? foreach($arResult["YEAR"] as $yearValue):?>
                        <? 
                            $selected = "";
                            if ($arResult["VALUES"]["YEAR"] == $yearValue) {
                                $selected = "selected";
                            }
                        ?>
                        <option <?=$selected?> value="<?=$yearValue?>"><?=$yearValue?></option>
                    <? endforeach;?>
                <? endif;?>
              </select>
            </div>
            <div class="option mod <? if (empty($arResult["MODIFICATION"])):?>disable<?endif;?>">
              <span><?=GetMessage("MODIFICATION_TITLE")?></span>
              <select name="MODIFICATION" <? if (empty($arResult["MODIFICATION"])):?>disabled="disabled"<?endif;?> class="select-style">
                <option value=""><?=GetMessage("MODIFICATION_CHOOSE_TITLE")?></option>
                <? if (!empty($arResult["MODIFICATION"])):?>
                    <? foreach($arResult["MODIFICATION"] as $modificationValue):?>
                        <? 
                            $selected = "";
                            if ($arResult["VALUES"]["MODIFICATION"] == $modificationValue) {
                                $selected = "selected";
                            }
                        ?>
                        <option <?=$selected?> value="<?=$modificationValue?>"><?=$modificationValue?></option>
                    <? endforeach;?>
                <? endif;?>
              </select>
            </div>
            <input type="hidden" name="RESULT_PODBOR">
            <button class="orange-btn" id="picking_auto_button"><?=GetMessage("PICKING_BUTTON_TITLE")?></button>
        </div>
    </form>
<? endif;?>
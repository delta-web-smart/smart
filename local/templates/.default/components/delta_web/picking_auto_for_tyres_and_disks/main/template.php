<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult["VENDOR"])):?>
    <form class="sort-item left" action="<?=SITE_DIR."include/picking_auto_for_tyres_and_disks.php"?>">
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
            <div class="option disable">
              <span><?=GetMessage("CAR_TITLE")?></span>
              <select name="CAR" class="select-style" disabled="disabled">
                <option value=""><?=GetMessage("CAR_CHOOSE_TITLE")?></option>
              </select>
            </div>
        </div>
        <div class="options-wrap clearfix">
            <div class="option year disable">
              <span><?=GetMessage("YEAR_TITLE")?></span>
              <select name="YEAR" class="select-style" disabled="disabled">
                <option value=""><?=GetMessage("YEAR_CHOOSE_TITLE")?></option>
              </select>
            </div>
            <div class="option mod disable">
              <span><?=GetMessage("MODIFICATION_TITLE")?></span>
              <select name="MODIFICATION" disabled="disabled" class="select-style">
                <option value=""><?=GetMessage("MODIFICATION_CHOOSE_TITLE")?></option>
              </select>
            </div>
            <button class="orange-btn" id="picking_auto_button"><?=GetMessage("PICKING_BUTTON_TITLE")?></button>
        </div>
    </form>
<? endif;?>
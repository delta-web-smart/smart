<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $count = 0;?>
<? foreach($ITEMS as $val => $ar):?>
    <? if ($count == 0 || $count == $SLICE_COLUMNS):?>
        <div class="checks-wrap" <?if($HIDE):?>style="display:none;"<?endif;?>>
    <? endif;?>
        <div class="check-item">
            <input
                <?if(!$HIDE):?>class="check-style"<?endif;?>
                type="checkbox"
                value="<? echo $ar["HTML_VALUE"] ?>"
                name="<? echo $ar["CONTROL_NAME"] ?>"
                id="<? echo $ar["CONTROL_ID"] ?>"
                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
            />
            <label for="<? echo $ar["CONTROL_ID"] ?>"><?=$ar["VALUE"]?></label>
        </div>
    <? if ($count == count($ITEMS)-1 || $count == $SLICE_COLUMNS-1):?>
        </div>
    <? endif;?>
    <? $count++;?>
<? endforeach;?>
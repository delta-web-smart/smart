<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<div class="search-wrap">
    <form action="<?=$arResult["FORM_ACTION"]?>">
        <input type="text" name="q" class="search">
        <button class="search-btn orange-btn" name="s" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>"><?=GetMessage('FIND_TITLE')?></button>
    </form>
</div>
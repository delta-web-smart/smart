<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    global $APPLICATION;
    if (count($arResult["ITEMS"]) > 0): 
        $this->__template->SetViewTarget($arParams["LABEL_FOR_SALE"]."_main_page");
?>  
    <li class="<?=$arParams["LABEL_FOR_SALE"]?> <? if($arParams["LABEL_FOR_SALE"] == "new"):?>active<?endif;?>">
        <a href="#"><?=GetMessage(ToUpper($arParams["LABEL_FOR_SALE"])."_MAIN_PAGE_TITLE")?></a>
    </li>
<?  
        $this->__template->EndViewTarget();
    endif;
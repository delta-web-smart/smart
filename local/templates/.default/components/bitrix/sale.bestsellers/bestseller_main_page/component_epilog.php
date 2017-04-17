<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    global $APPLICATION;
    if (count($arResult["ITEMS"]) > 0): 
        $this->__template->SetViewTarget("hit_main_page");
?>  
    <li class="hit">
        <a href="#"><?=GetMessage("HIT_MAIN_PAGE_TITLE")?></a>
    </li>
<?  
        $this->__template->EndViewTarget();
    endif;
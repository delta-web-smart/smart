<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    global $APPLICATION;
    if (count($arResult["ITEMS"]) > 0): 
        $this->__template->SetViewTarget("hit_tabs_products");
?>  
    <li class="hit">
        <a href="#"><?=GetMessage("HIT_TABS_PRODUCTS_TITLE")?></a>
    </li>
<?  
        $this->__template->EndViewTarget();
    endif;
<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div id="small_basket">
    <?
        $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "small_basket", array(
            "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
            "PATH_TO_PERSONAL" => SITE_DIR."personal/",
            "SHOW_PERSONAL_LINK" => "N",
            "SHOW_NUM_PRODUCTS" => "Y",
            "SHOW_TOTAL_PRICE" => "Y",
            "SHOW_PRODUCTS" => "N",
            "POSITION_FIXED" =>"N",
            "SHOW_AUTHOR" => "Y",
            "PATH_TO_REGISTER" => SITE_DIR."login/",
            "PATH_TO_PROFILE" => SITE_DIR."personal/"
        ),
        false,
        array()
    );?>
</div>
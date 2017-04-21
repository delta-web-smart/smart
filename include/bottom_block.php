<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    $labelsForSale = array(
        "viewed"
    );
?>
<ul class="top-category">
  <? foreach($labelsForSale as $label):?>
    <? $APPLICATION->ShowViewContent($label.'_tabs_products'); ?>
  <? endforeach;?>
</ul>
<?$APPLICATION->IncludeComponent(
"bitrix:catalog.viewed.products",
    "viewed",
    Array(
        "IBLOCK_TYPE" => "1c_catalog",
        "IBLOCK_ID" => IBLOCK_ID_CATALOG,
        "SHOW_FROM_SECTION" => "Y",
        "HIDE_NOT_AVAILABLE" => "N",
        "SHOW_DISCOUNT_PERCENT" => "Y",
        "PRODUCT_SUBSCRIPTION" => "N",
        "SHOW_NAME" => "Y",
        "SHOW_IMAGE" => "Y",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "PAGE_ELEMENT_COUNT" => "5",
        "LINE_ELEMENT_COUNT" => "3",
        "TEMPLATE_THEME" => "blue",
        "DETAIL_URL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "SHOW_OLD_PRICE" => "N",
        "PRICE_CODE" => array("BASE"),
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "CONVERT_CURRENCY" => "N",
        "BASKET_URL" => "/personal/basket.php",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "USE_PRODUCT_QUANTITY" => "N",
        "SHOW_PRODUCTS_".IBLOCK_ID_CATALOG => "Y",
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "SECTION_ELEMENT_ID" => "",
        "SECTION_ELEMENT_CODE" => "",
        "DEPTH" => "3",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "PROPERTY_CODE_2" => array("MANUFACTURER", "MATERIAL", ""),
        "CART_PROPERTIES_2" => array("", ""),
        "ADDITIONAL_PICT_PROP_2" => "MORE_PHOTO",
        "LABEL_PROP_2" => "NEWPRODUCT",
        "PROPERTY_CODE_3" => array("", "COLOR_REF", "SIZES_SHOES", "SIZES_CLOTHES", ""),
        "CART_PROPERTIES_3" => array("COLOR_REF", "SIZES_SHOES", "SIZES_CLOTHES", ""),
        "ADDITIONAL_PICT_PROP_3" => "MORE_PHOTO",
        "OFFER_TREE_PROPS_".IBLOCK_ID_CATALOG_OFFERS => array("")
    )
);?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Смарт Тайер");
?>
<?
    $APPLICATION->IncludeComponent(
        "bitrix:news.list", 
        "main_slider", 
        array(
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => IBLOCK_ID_SLIDER_MAIN_PAGE,
            "NEWS_COUNT" => "100000",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_BY2" => "ID",
            "SORT_ORDER2" => "DESC",
            "FILTER_NAME" => "",
            "FIELD_CODE" => array(
                0 => "ID",
                1 => "NAME",
                2 => "DETAIL_PICTURE",
                3 => "",
            ),
            "PROPERTY_CODE" => array(
                0 => "LINK",
                1 => "IMAGE",
                2 => "",
            ),
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "PREVIEW_TRUNCATE_LEN" => "",
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "SET_TITLE" => "N",
            "SET_BROWSER_TITLE" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_STATUS_404" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "INCLUDE_SUBSECTIONS" => "Y",
            "PAGER_TEMPLATE" => ".default",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "PAGER_TITLE" => "Новости",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "COMPONENT_TEMPLATE" => "banner_2",
            "SET_LAST_MODIFIED" => "N",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "SHOW_404" => "N",
            "MESSAGE_404" => ""
        ),
        false
    );
?>
<?
    $labelsForSale = array(
        "new",
        "sale",
        "hit"
    );
?>
<ul class="top-category">
  <? foreach($labelsForSale as $label):?>
    <? $APPLICATION->ShowViewContent($label.'_tabs_products'); ?>
  <? endforeach;?>
</ul>
<?
    global $arrFilterNew;
    $offsetTime = time() - COUNT_DAYS_FOR_NEW_PRODUCTS;
    $arrFilterNew = array("<=DATE_CREATE" => date("d.m.Y H:i:s", time()), ">=DATE_CREATE" => date("d.m.Y H:i:s", $offsetTime));
?>
<?$APPLICATION->IncludeComponent(
    "delta_web:catalog.section",
    "products_main_page",
    Array(
        "LABEL_FOR_SALE" => "new",
        "ACTION_VARIABLE" => "action",
        "ADD_PICT_PROP" => "MORE_PHOTO",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "ADD_TO_BASKET_ACTION" => "ADD",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
        "BASKET_URL" => "/personal/cart/",
        "BRAND_PROPERTY" => "BRAND_REF",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COMPATIBLE_MODE" => "Y",
        "CONVERT_CURRENCY" => "Y",
        "CURRENCY_ID" => "RUB",
        "CUSTOM_FILTER" => "",
        "DATA_LAYER_NAME" => "",
        "DETAIL_URL" => "",
        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
        "DISCOUNT_PERCENT_POSITION" => "bottom-right",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_SORT_FIELD" => "created",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER" => "desc",
        "ELEMENT_SORT_ORDER2" => "desc",
        "ENLARGE_PRODUCT" => "PROP",
        "ENLARGE_PROP" => "NEWPRODUCT",
        "FILTER_NAME" => "arrFilterNew",
        "HIDE_NOT_AVAILABLE" => "N",
        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
        "IBLOCK_ID" => IBLOCK_ID_CATALOG,
        "IBLOCK_TYPE" => "1c_catalog",
        "INCLUDE_SUBSECTIONS" => "Y",
        "LABEL_PROP" => array(""),
        "LABEL_PROP_MOBILE" => array(),
        "LABEL_PROP_POSITION" => "top-left",
        "LAZY_LOAD" => "Y",
        "LINE_ELEMENT_COUNT" => "3",
        "LOAD_ON_SCROLL" => "N",
        "MESSAGE_404" => "",
        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_BTN_LAZY_LOAD" => "Показать ещё",
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "MESS_NOT_AVAILABLE" => "Нет в наличии",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "OFFERS_CART_PROPERTIES" => array(""),
        "OFFERS_FIELD_CODE" => array("NAME"),
        "OFFERS_LIMIT" => "0",
        "OFFERS_PROPERTY_CODE" => array(""),
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_FIELD2" => "id",
        "OFFERS_SORT_ORDER" => "asc",
        "OFFERS_SORT_ORDER2" => "desc",
        "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
        "OFFER_TREE_PROPS" => array(""),
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Товары",
        "PAGE_ELEMENT_COUNT" => "12",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRICE_CODE" => array("BASE"),
        "PRICE_VAT_INCLUDE" => "Y",
        "PRODUCT_BLOCKS_ORDER" => "",
        "PRODUCT_DISPLAY_MODE" => "Y",
        "PRODUCT_ID_VARIABLE" => "id",
        "PRODUCT_PROPERTIES" => array(""),
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PRODUCT_QUANTITY_VARIABLE" => "",
        "PRODUCT_ROW_VARIANTS" => "",
        "PRODUCT_SUBSCRIPTION" => "Y",
        "PROPERTY_CODE" => array(""),
        "PROPERTY_CODE_MOBILE" => array(),
        "RCM_PROD_ID" => "",
        "RCM_TYPE" => "",
        "SECTION_CODE" => "",
        "SECTION_ID" => "",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "SECTION_URL" => "",
        "SECTION_USER_FIELDS" => array(""),
        "SEF_MODE" => "N",
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SHOW_ALL_WO_SECTION" => "Y",
        "SHOW_CLOSE_POPUP" => "N",
        "SHOW_DISCOUNT_PERCENT" => "Y",
        "SHOW_FROM_SECTION" => "N",
        "SHOW_MAX_QUANTITY" => "N",
        "SHOW_OLD_PRICE" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "SHOW_SLIDER" => "N",
        "SLIDER_INTERVAL" => "3000",
        "SLIDER_PROGRESS" => "N",
        "TEMPLATE_THEME" => "blue",
        "USE_ENHANCED_ECOMMERCE" => "Y",
        "USE_MAIN_ELEMENT_SECTION" => "N",
        "USE_PRICE_COUNT" => "N",
        "USE_PRODUCT_QUANTITY" => "N"
    )
);?>
<?
    $arDiscountElementID = $APPLICATION->IncludeComponent(
	"delta_web:get_discount_elements_ids", 
	"", 
	array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	),
	false
);
    global $arrFilterSale;
    $arrFilterSale = array("ID" => $arDiscountElementID);
?>
<? if (!empty($arDiscountElementID)):?>
    <?$APPLICATION->IncludeComponent(
        "delta_web:catalog.section",
        "products_main_page",
        Array(
            "LABEL_FOR_SALE" => "sale",
            "ACTION_VARIABLE" => "action",
            "ADD_PICT_PROP" => "MORE_PHOTO",
            "ADD_PROPERTIES_TO_BASKET" => "Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "ADD_TO_BASKET_ACTION" => "ADD",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
            "BASKET_URL" => "/personal/cart/",
            "BRAND_PROPERTY" => "BRAND_REF",
            "BROWSER_TITLE" => "-",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMPATIBLE_MODE" => "Y",
            "CONVERT_CURRENCY" => "Y",
            "CURRENCY_ID" => "RUB",
            "CUSTOM_FILTER" => "",
            "DATA_LAYER_NAME" => "",
            "DETAIL_URL" => "",
            "DISABLE_INIT_JS_IN_COMPONENT" => "N",
            "DISCOUNT_PERCENT_POSITION" => "bottom-right",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_SORT_FIELD" => "created",
            "ELEMENT_SORT_FIELD2" => "id",
            "ELEMENT_SORT_ORDER" => "desc",
            "ELEMENT_SORT_ORDER2" => "desc",
            "ENLARGE_PRODUCT" => "PROP",
            "ENLARGE_PROP" => "NEWPRODUCT",
            "FILTER_NAME" => "arrFilterSale",
            "HIDE_NOT_AVAILABLE" => "N",
            "HIDE_NOT_AVAILABLE_OFFERS" => "N",
            "IBLOCK_ID" => IBLOCK_ID_CATALOG,
            "IBLOCK_TYPE" => "1c_catalog",
            "INCLUDE_SUBSECTIONS" => "Y",
            "LABEL_PROP" => array(""),
            "LABEL_PROP_MOBILE" => array(),
            "LABEL_PROP_POSITION" => "top-left",
            "LAZY_LOAD" => "Y",
            "LINE_ELEMENT_COUNT" => "3",
            "LOAD_ON_SCROLL" => "N",
            "MESSAGE_404" => "",
            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
            "MESS_BTN_BUY" => "Купить",
            "MESS_BTN_DETAIL" => "Подробнее",
            "MESS_BTN_LAZY_LOAD" => "Показать ещё",
            "MESS_BTN_SUBSCRIBE" => "Подписаться",
            "MESS_NOT_AVAILABLE" => "Нет в наличии",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "OFFERS_CART_PROPERTIES" => array(""),
            "OFFERS_FIELD_CODE" => array("NAME"),
            "OFFERS_LIMIT" => "0",
            "OFFERS_PROPERTY_CODE" => array(""),
            "OFFERS_SORT_FIELD" => "sort",
            "OFFERS_SORT_FIELD2" => "id",
            "OFFERS_SORT_ORDER" => "asc",
            "OFFERS_SORT_ORDER2" => "desc",
            "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
            "OFFER_TREE_PROPS" => array(""),
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Товары",
            "PAGE_ELEMENT_COUNT" => "12",
            "PARTIAL_PRODUCT_PROPERTIES" => "N",
            "PRICE_CODE" => array("BASE"),
            "PRICE_VAT_INCLUDE" => "Y",
            "PRODUCT_BLOCKS_ORDER" => "",
            "PRODUCT_DISPLAY_MODE" => "Y",
            "PRODUCT_ID_VARIABLE" => "id",
            "PRODUCT_PROPERTIES" => array(""),
            "PRODUCT_PROPS_VARIABLE" => "prop",
            "PRODUCT_QUANTITY_VARIABLE" => "",
            "PRODUCT_ROW_VARIANTS" => "",
            "PRODUCT_SUBSCRIPTION" => "Y",
            "PROPERTY_CODE" => array(""),
            "PROPERTY_CODE_MOBILE" => array(),
            "RCM_PROD_ID" => "",
            "RCM_TYPE" => "",
            "SECTION_CODE" => "",
            "SECTION_ID" => "",
            "SECTION_ID_VARIABLE" => "SECTION_ID",
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array(""),
            "SEF_MODE" => "N",
            "SET_BROWSER_TITLE" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SHOW_ALL_WO_SECTION" => "Y",
            "SHOW_CLOSE_POPUP" => "N",
            "SHOW_DISCOUNT_PERCENT" => "Y",
            "SHOW_FROM_SECTION" => "N",
            "SHOW_MAX_QUANTITY" => "N",
            "SHOW_OLD_PRICE" => "N",
            "SHOW_PRICE_COUNT" => "1",
            "SHOW_SLIDER" => "N",
            "SLIDER_INTERVAL" => "3000",
            "SLIDER_PROGRESS" => "N",
            "TEMPLATE_THEME" => "blue",
            "USE_ENHANCED_ECOMMERCE" => "Y",
            "USE_MAIN_ELEMENT_SECTION" => "N",
            "USE_PRICE_COUNT" => "N",
            "USE_PRODUCT_QUANTITY" => "N"
        )
    );?>
<? endif;?>
<?
    $arHitIds = $APPLICATION->IncludeComponent(
	"delta_web:get_hit_elements_ids", 
	"", 
	array(
        "COUNT_PURCHASE" => 20,
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	),
	false
);
    global $arrFilterHit;
    $arrFilterHit = array("ID" => $arHitIds);
?>
<? if (!empty($arHitIds)):?>
    <?$APPLICATION->IncludeComponent(
        "delta_web:catalog.section",
        "products_main_page",
        Array(
            "LABEL_FOR_SALE" => "hit",
            "ACTION_VARIABLE" => "action",
            "ADD_PICT_PROP" => "MORE_PHOTO",
            "ADD_PROPERTIES_TO_BASKET" => "Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "ADD_TO_BASKET_ACTION" => "ADD",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
            "BASKET_URL" => "/personal/cart/",
            "BRAND_PROPERTY" => "BRAND_REF",
            "BROWSER_TITLE" => "-",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMPATIBLE_MODE" => "Y",
            "CONVERT_CURRENCY" => "Y",
            "CURRENCY_ID" => "RUB",
            "CUSTOM_FILTER" => "",
            "DATA_LAYER_NAME" => "",
            "DETAIL_URL" => "",
            "DISABLE_INIT_JS_IN_COMPONENT" => "N",
            "DISCOUNT_PERCENT_POSITION" => "bottom-right",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_SORT_FIELD" => "created",
            "ELEMENT_SORT_FIELD2" => "id",
            "ELEMENT_SORT_ORDER" => "desc",
            "ELEMENT_SORT_ORDER2" => "desc",
            "ENLARGE_PRODUCT" => "PROP",
            "ENLARGE_PROP" => "NEWPRODUCT",
            "FILTER_NAME" => "arrFilterHit",
            "HIDE_NOT_AVAILABLE" => "N",
            "HIDE_NOT_AVAILABLE_OFFERS" => "N",
            "IBLOCK_ID" => IBLOCK_ID_CATALOG,
            "IBLOCK_TYPE" => "1c_catalog",
            "INCLUDE_SUBSECTIONS" => "Y",
            "LABEL_PROP" => array(""),
            "LABEL_PROP_MOBILE" => array(),
            "LABEL_PROP_POSITION" => "top-left",
            "LAZY_LOAD" => "Y",
            "LINE_ELEMENT_COUNT" => "3",
            "LOAD_ON_SCROLL" => "N",
            "MESSAGE_404" => "",
            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
            "MESS_BTN_BUY" => "Купить",
            "MESS_BTN_DETAIL" => "Подробнее",
            "MESS_BTN_LAZY_LOAD" => "Показать ещё",
            "MESS_BTN_SUBSCRIBE" => "Подписаться",
            "MESS_NOT_AVAILABLE" => "Нет в наличии",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "OFFERS_CART_PROPERTIES" => array(""),
            "OFFERS_FIELD_CODE" => array("NAME"),
            "OFFERS_LIMIT" => "0",
            "OFFERS_PROPERTY_CODE" => array(""),
            "OFFERS_SORT_FIELD" => "sort",
            "OFFERS_SORT_FIELD2" => "id",
            "OFFERS_SORT_ORDER" => "asc",
            "OFFERS_SORT_ORDER2" => "desc",
            "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
            "OFFER_TREE_PROPS" => array(""),
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Товары",
            "PAGE_ELEMENT_COUNT" => "12",
            "PARTIAL_PRODUCT_PROPERTIES" => "N",
            "PRICE_CODE" => array("BASE"),
            "PRICE_VAT_INCLUDE" => "Y",
            "PRODUCT_BLOCKS_ORDER" => "",
            "PRODUCT_DISPLAY_MODE" => "Y",
            "PRODUCT_ID_VARIABLE" => "id",
            "PRODUCT_PROPERTIES" => array(""),
            "PRODUCT_PROPS_VARIABLE" => "prop",
            "PRODUCT_QUANTITY_VARIABLE" => "",
            "PRODUCT_ROW_VARIANTS" => "",
            "PRODUCT_SUBSCRIPTION" => "Y",
            "PROPERTY_CODE" => array(""),
            "PROPERTY_CODE_MOBILE" => array(),
            "RCM_PROD_ID" => "",
            "RCM_TYPE" => "",
            "SECTION_CODE" => "",
            "SECTION_ID" => "",
            "SECTION_ID_VARIABLE" => "SECTION_ID",
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array(""),
            "SEF_MODE" => "N",
            "SET_BROWSER_TITLE" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SHOW_ALL_WO_SECTION" => "Y",
            "SHOW_CLOSE_POPUP" => "N",
            "SHOW_DISCOUNT_PERCENT" => "Y",
            "SHOW_FROM_SECTION" => "N",
            "SHOW_MAX_QUANTITY" => "N",
            "SHOW_OLD_PRICE" => "N",
            "SHOW_PRICE_COUNT" => "1",
            "SHOW_SLIDER" => "N",
            "SLIDER_INTERVAL" => "3000",
            "SLIDER_PROGRESS" => "N",
            "TEMPLATE_THEME" => "blue",
            "USE_ENHANCED_ECOMMERCE" => "Y",
            "USE_MAIN_ELEMENT_SECTION" => "N",
            "USE_PRICE_COUNT" => "N",
            "USE_PRODUCT_QUANTITY" => "N"
        )
    );?>
<? endif;?>
<article class="bottom-article">
    <?
        $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/description.php"), false);
    ?>
</article>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
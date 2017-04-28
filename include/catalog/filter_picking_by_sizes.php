<?
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    }
?>
<?
    $sefRules = GetSefRules();
    if (!empty($_REQUEST["section_id"])) {
        $section_id = htmlspecialchars($_REQUEST["section_id"]);
    }
    if (!empty($_REQUEST["properties"])) {
        $properties = $_REQUEST["properties"];
    }
    if (!empty($_REQUEST["filter_url"])) {
        $filter_url = htmlspecialchars($_REQUEST["filter_url"]);
    }
    $APPLICATION->IncludeComponent(
        "delta_web:catalog.smart.filter", 
        "filter_picking_by_sizes", 
        array(
            "FORM_ACTION" => $filter_url,
            "SHOW_PROPERTIES" => $properties,
            "IBLOCK_TYPE" => "1c_catalog",
            "IBLOCK_ID" => IBLOCK_ID_CATALOG,
            "SECTION_ID" => $section_id,
            "SECTION_CODE" => "",
            "FILTER_NAME" => FILTER_NAME_FOR_CATALOG,
            "HIDE_NOT_AVAILABLE" => "N",
            "TEMPLATE_THEME" => "blue",
            "FILTER_VIEW_MODE" => "horizontal",
            "DISPLAY_ELEMENT_COUNT" => "Y",
            "SEF_MODE" => "Y",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_GROUPS" => "Y",
            "SAVE_IN_SESSION" => "N",
            "INSTANT_RELOAD" => "N",
            "PAGER_PARAMS_NAME" => "arrPager",
            "PRICE_CODE" => array(
                0 => "BASE",
            ),
            "CONVERT_CURRENCY" => "Y",
            "XML_EXPORT" => "Y",
            "SECTION_TITLE" => "-",
            "SECTION_DESCRIPTION" => "-",
            "POPUP_POSITION" => "right",
            "SEF_RULE" => CATALOG_URL.SMART_FILTER_PATH,
            "SECTION_CODE_PATH" => "",
            "SMART_FILTER_PATH" => $sefRules["SMART_FILTER_PATH"],
            "CURRENCY_ID" => "RUB"
        ),
        false
    );
?>
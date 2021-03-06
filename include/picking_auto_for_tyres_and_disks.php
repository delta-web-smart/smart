<?
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    }
?>
<?
    if (empty($template)) {
        $template = "main";
    }
    $APPLICATION->IncludeComponent(
        "delta_web:picking_auto_for_tyres_and_disks", 
        $template, 
        array(
            "COMPONENT_TEMPLATE" => $template,
            "IBLOCK_TYPE" => "auto_picking",
            "IBLOCK_ID" => IBLOCK_ID_PICKING_AUTO_FOR_TYRES_AND_DISKS,
            "RESULT_URL" => "/podbor/",
            "SEF_RULE" => FILTER_URL_FOR_PODBOR,
            "MULTIPLY_PROPERTIES" => array(
                "ZAVOD_SHINI",
                "ZAVOD_DISKOV",
                "ZAMEN_SHINI",
                "ZAMEN_DISKOV",
                "TUNING_SHINI",
                "TUNING_DISKI"
            ),
            "PROPERTIES_FOR_GENERATE_URL_1" => array(
                "SHIRINA",
                "VYSOTA",
                "DIAMETR"
            ),
            "PROPERTIES_FOR_GENERATE_URL_2" => array(
                "SHIRINA",
                "DIAMETR",
                "ET"
            ),
            "AJAX_MODE" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600"
        ),
        false
    );
?>
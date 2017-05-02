<?
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    }
?>
<?
    $APPLICATION->IncludeComponent(
        "delta_web:picking_auto_for_tyres_and_disks", 
        "main", 
        array(
            "COMPONENT_TEMPLATE" => "main",
            "IBLOCK_TYPE" => "auto_picking",
            "IBLOCK_ID" => IBLOCK_ID_PICKING_AUTO_FOR_TYRES_AND_DISKS,
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
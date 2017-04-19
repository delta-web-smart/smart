<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
"GROUPS" => array(),
    "PARAMETERS" => array(
        "CACHE_TIME" => array(
            "PARENT" => "BASE",
            "NAME" => "Кэш",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => 3600,
        ),
        "COUNT_PURCHASE" => array(
            "PARENT" => "BASE",
            "NAME" => "Количество покупок",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => 20,
        ),
    ),
);
?>
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
        "ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Идентификатор товара",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "OFFER_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Идентификатор торгового предложения",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "PROPERTY_FOR_GROUP_OFFERS" => array(
            "PARENT" => "BASE",
            "NAME" => "Наименование свойства для группировки торговых предложений",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "MASK_FOR_FULL_TEXT_SIZE_IN_TABLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Маска для отображения текста в таблице с торговыми предложениями",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "SHOW_PROPERTIES" => array(
            "PARENT" => "BASE",
            "NAME" => "Отображаемые основные свойства",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => "",
        ),
        "SECTION_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Идентификатор раздела",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        )
    ),
);
?>
<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(Array("-"=>" "));

$arIBlocks=Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
	$arIBlocks[$arRes["ID"]] = $arRes["NAME"];
$arComponentParameters = array(
"GROUPS" => array(),
    "PARAMETERS" => array(
        'IBLOCK_TYPE' => array(
            'NAME' => 'Тип инфоблока',
            'TYPE' => 'LIST',
            'MULTIPLE' => 'N',
            'VALUES'=>$arTypesEx,
            'PARENT' => 'BASE',
            'DEFAULT'=>"news",
            "REFRESH" => "Y",
        ),
        'IBLOCK_ID' => array(
            'NAME' => 'ID инфоблока',
            'TYPE' => 'LIST',
            'MULTIPLE' => 'N',
            'VALUES'=>$arIBlocks,
            'PARENT' => 'BASE',
            "DEFAULT" => '={$_REQUEST["ID"]}',
            "REFRESH" => "Y",
        ),
        "RESULT_URL" => array(
            "PARENT" => "BASE",
            "NAME" => "Результирующая ссылка",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "MULTIPLY_PROPERTIES" => array(
            "PARENT" => "BASE",
            "NAME" => "Свойства со множественной вставкой",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => "",
        ),
        "PROPERTIES_FOR_GENERATE_URL_1" => array(
            "PARENT" => "BASE",
            "NAME" => "Свойства для генерации URL 1",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => "",
        ),
        "PROPERTIES_FOR_GENERATE_URL_2" => array(
            "PARENT" => "BASE",
            "NAME" => "Свойства для генерации URL 2",
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "DEFAULT" => "",
        ),
        "SEF_RULE" => array(
            "PARENT" => "BASE",
            "NAME" => "Адрес генерируемой ссылки",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        'AJAX_MODE'=>array(),
        "CACHE_TIME" => array(
            "PARENT" => "BASE",
            "NAME" => "Кэш",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => 3600,
        ),
    ),
);
?>
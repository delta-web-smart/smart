<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(Array("-"=>" "));

$arIBlocks=Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
	$arIBlocks[$arRes["ID"]] = $arRes["NAME"];

$listActive = array();
$listActive[''] = 'Без учета активности';
$listActive['Y'] = 'Только активные элементы';
$listActive['N'] = 'Только неактивные элементы';
$arComponentParameters = array(
"GROUPS" => array(),
    "PARAMETERS" => array(
        "CACHE_TIME" => array(
            "PARENT" => "BASE",
            "NAME" => "Кэш",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => 3600,
        )
    ),
);
?>
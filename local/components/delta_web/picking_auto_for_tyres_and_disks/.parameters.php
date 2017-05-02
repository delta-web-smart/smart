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
<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    CJSCore::Init(array("fx", "window", "popup"));
    IncludeTemplateLangFile(__DIR__ . "/header.php");
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta charset="<?=LANG_CHARSET?>">
    <? 
        $APPLICATION->SetAdditionalCSS(MAIN_TEMPLATE_PATH. "css/reset.css");
        $APPLICATION->SetAdditionalCSS(MAIN_TEMPLATE_PATH. "css/custom.css");
        $APPLICATION->SetAdditionalCSS(MAIN_TEMPLATE_PATH. "css/jquery.formstyler.css");
        $APPLICATION->SetAdditionalCSS(MAIN_TEMPLATE_PATH. "fonts/fonts.css");
        $APPLICATION->SetAdditionalCSS(MAIN_TEMPLATE_PATH. "css/jquery-ui-1.10.4.custom.css");
        $APPLICATION->SetAdditionalCSS(MAIN_TEMPLATE_PATH. "js/colorbox/css/colorbox.css");
        $APPLICATION->AddHeadString('<link rel="shortcut icon" type="image/x-icon" href="'.SITE_DIR.'favicon.ico" />');
        //$APPLICATION->AddHeadString('<link rel="stylesheet" href="'. SITE_TEMPLATE_PATH .'/css/global.css">');
    ?>
    <?$APPLICATION->AddHeadString('<!--[if IE 7]><link rel="stylesheet" href="'. MAIN_TEMPLATE_PATH .'main/css/ie7.css" /><![endif]-->')?>
	<?$APPLICATION->AddHeadString('<!--[if IE 8]><link rel="stylesheet" href="'. MAIN_TEMPLATE_PATH .'css/ie8.css" /><![endif]-->')?>
    <?
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/jquery-1.9.1.min.js");
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/jquery.formstyler.min.js");
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/jquery.easing.js");
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/simpslider.js");
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/bootstrap.touchspin.js");
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/jquery-ui-1.10.4.custom.min.js");
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/custom.js");
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/colorbox/js/jquery.colorbox-min.js");
        $APPLICATION->AddHeadString('<script type="text/javascript" src="//vk.com/js/api/openapi.js?144"></script>');
        $APPLICATION->AddHeadScript(MAIN_TEMPLATE_PATH. "js/common.js");
    ?>
    <?$APPLICATION->ShowHead();?>
</head>
<body>
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>  
  <div class="body-wrap">
    <header class="header">
      <div class="top-line">
        <div class="in-top-line clearfix">
          <a href="#" class="entry"><i class="entry-ico"></i></a>
          <a href="#" class="reg">Регистрация</a>
        </div>
      </div>
      <div class="main-part clearfix">
        <?
            $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/logo.php"), false);
        ?>
        <?
            $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/phones.php"), false);
        ?>
        <?
            $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/small_basket.php"), false);
        ?>
      </div>
      <div class="bottom-part clearfix">
        <?
            $APPLICATION->IncludeComponent(
	"delta_web:count_elements", 
	"count_offers", 
	array(
		"COMPONENT_TEMPLATE" => "count_offers",
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => IBLOCK_ID_CATALOG_OFFERS,
		"ONLY_ACTIVE" => "",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
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
        <?
            $APPLICATION->IncludeComponent("bitrix:search.form","top_search_form",Array(
                    "USE_SUGGEST" => "N",
                    "PAGE" => "#SITE_DIR#search/index.php"
                )
            );
        ?>
        <?
            $APPLICATION->IncludeComponent('bitrix:menu', "top_menu", array(
                    "ROOT_MENU_TYPE" => "top",
                    "CHILD_MENU_TYPE" => "top_child", 
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "36000000",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MAX_LEVEL" => "2",
                    "USE_EXT" => "Y",
                    "ALLOW_MULTI_SELECT" => "N"
                )
            );
        ?>
      </div>
      <div class="header-shadow"></div>
    </header>
    
    <section class="content-wrap">
      <a href="#" class="ask-question">Задать вопрос</a>
      <a href="#" class="to-up"><i>Наверх</i></a>
      <?
		global $arFilterSectionMenu;
        $arFilterSectionMenu = array("UF_SHOW_TOP_MENU"=>1);
        $APPLICATION->IncludeComponent("delta_web:catalog.section.list","top_sections_menu",
        Array(
                "FILTER_NAME" => "arFilterSectionMenu",
                "VIEW_MODE" => "TEXT",
                "SHOW_PARENT_NAME" => "Y",
                "IBLOCK_TYPE" => "1c_catalog",
                "IBLOCK_ID" => IBLOCK_ID_CATALOG,
                "SECTION_ID" => "",
                "SECTION_CODE" => "",
                "SECTION_URL" => "",
                "COUNT_ELEMENTS" => "Y",
                "TOP_DEPTH" => "2",
                "SECTION_FIELDS" => "",
                "SECTION_USER_FIELDS" => array('UF_*'),
                "ADD_SECTIONS_CHAIN" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_NOTES" => "",
                "CACHE_GROUPS" => "Y"
            )		
        );
      ?>
      <div class="sort-main clearfix">
        <form class="sort-item left">
          <div class="title">
            <div class="img-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/sort-type-img.png" alt=""></div>
            <h3>ПОДБОР ПО АВТОМОБИЛЮ</h3>
          </div>
          <div class="options-wrap clearfix">
            <div class="option">
              <span>Марка</span>
              <select name="" class="select-style">
                <option value="">Chevrolet</option>
                <option value="">Chevrolet</option>
                <option value="">Chevrolet</option>
                <option value="">Chevrolet</option>
              </select>
            </div>
            <div class="option">
              <span>Модель</span>
              <select name="" class="select-style">
                <option value="">Trailblazer</option>
                <option value="">Trailblazer</option>
                <option value="">Trailblazer</option>
                <option value="">Trailblazer</option>
              </select>
            </div>
          </div>
          <div class="options-wrap clearfix">
            <div class="option year">
              <span>Год выпуска</span>
              <select name="" class="select-style">
                <option value="">2007</option>
                <option value="">2008</option>
                <option value="">2009</option>
                <option value="">2010</option>
                <option value="">2011</option>
                <option value="">2012</option>
                <option value="">2013</option>
              </select>
            </div>
            <div class="option mod disable">
              <span>Модификация</span>
              <select name="" disabled="disabled" class="select-style">
                <option value=""></option>
              </select>
            </div>
            <button class="orange-btn">Подобрать</button>
          </div>
        </form>        
        <?
            global $arFilterPickingSizes;
            $arFilterPickingSizes = array("UF_SHOW_IN_FILTER"=>1);
            $APPLICATION->IncludeComponent("delta_web:catalog.section.list", "sections_picking_by_sizes",
            Array(
                    "FILTER_NAME" => "arFilterPickingSizes",
                    "VIEW_MODE" => "TEXT",
                    "SHOW_PARENT_NAME" => "Y",
                    "IBLOCK_TYPE" => "1c_catalog",
                    "IBLOCK_ID" => IBLOCK_ID_CATALOG,
                    "SECTION_ID" => "",
                    "SECTION_CODE" => "",
                    "SECTION_URL" => "",
                    "COUNT_ELEMENTS" => "Y",
                    "TOP_DEPTH" => "3",
                    "SECTION_FIELDS" => "",
                    "SECTION_USER_FIELDS" => array('UF_*'),
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_GROUPS" => "Y"
                )		
            );
        ?>
      </div>
      <div class="clear"></div>
      <aside class="sidebar">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "sect",
                "AREA_FILE_SUFFIX" => "sidebar",
                "AREA_FILE_RECURSIVE" => "Y",
                "EDIT_MODE" => "html",
            ),
            false,
            Array('HIDE_ICONS' => 'Y')
        );?>
      </aside>
      <div class="content">
		
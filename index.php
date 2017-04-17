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
<ul class="top-category">
  <li class="new">
    <a href="#">НОВИНКИ</a>
  </li>
  <li class="sale">
    <a href="#">РАСПРОДАЖА</a>
  </li>
  <li class="hit">
    <a href="#">ХИТ СЕЗОНА!</a>
  </li>
</ul>
<ul class="catalog">
  <li>
    <a href="#" class="img-wrap"><div class="action-label"></div><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-item-photo.jpg" alt=""><div class="loupe"></div></a>
    <a href="#" class="name">Глушитель CBD Chevrolet Lacetti</a>
    <span class="article">Артикул: 00964</span>
    <input type="text" class="spinner" value="0">
    <button class="price-btn">99 999<i>i</i></button>
  </li>
  <li>
    <a href="#" class="img-wrap"><div class="action-label new"></div><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-item-photo.jpg" alt=""><div class="loupe"></div></a>
    <a href="#" class="name">Глушитель CBD Chevrolet Lacetti</a>
    <span class="article">Артикул: 00964</span>
    <input type="text" class="spinner" value="0">
    <button class="price-btn">99 999<i>i</i></button>
  </li>
  <li>
    <a href="#" class="img-wrap"><div class="action-label hit"></div><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-item-photo.jpg" alt=""><div class="loupe"></div></a>
    <a href="#" class="name">Глушитель CBD Chevrolet Lacetti</a>
    <span class="article">Артикул: 00964</span>
    <input type="text" class="spinner" value="0">
    <button class="price-btn">99 999<i>i</i></button>
  </li>
  <li>
    <a href="#" class="img-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-item-photo.jpg" alt=""><div class="loupe"></div></a>
    <a href="#" class="name">Глушитель CBD Chevrolet Lacetti</a>
    <span class="article">Артикул: 00964</span>
    <input type="text" class="spinner" value="0">
    <button class="price-btn">99 999<i>i</i></button>
  </li>
  <li>
    <a href="#" class="img-wrap"><div class="action-label new"></div><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-item-photo.jpg" alt=""><div class="loupe"></div></a>
    <a href="#" class="name">Глушитель CBD Chevrolet Lacetti</a>
    <span class="article">Артикул: 00964</span>
    <input type="text" class="spinner" value="0">
    <button class="price-btn">99 999<i>i</i></button>
  </li>
  <li>
    <a href="#" class="img-wrap"><div class="action-label hit"></div><img src="<?=SITE_TEMPLATE_PATH?>/img/catalog-item-photo.jpg" alt=""><div class="loupe"></div></a>
    <a href="#" class="name">Глушитель CBD Chevrolet Lacetti</a>
    <span class="article">Артикул: 00964</span>
    <input type="text" class="spinner" value="0">
    <button class="price-btn">99 999<i>i</i></button>
  </li>
</ul>
<article class="bottom-article">
  <p>Вы можете подумать, что Смарт Тайер – это просто очередной интернет-магазин автозапчастей в Москве и будете не правы. Мы действительно шины, диски, масла детские автомобильные кресла, а также различные автозапчасти для отечественных автомобилей и иномарок, но будете не правы. Так как здесь наше сходство с другими магазинами заканчивается. Мы – принципиально другие!</p>
  <p>Работая на рынке автозапчастей более десяти лет менеджеры нашей компании накопили огромный багаж знаний для того, чтобы предложить Вам действительно качественный, актуальный и превосходный по цене товар в Москве! И поверьте, это не пустые слова. Сотни часов на выставках и семинарах и многолетнее сотрудничество с лучшими дистрибьюторскими компаниями позволяет нам презентовать действительно выдающийся ассортимент. Нас выбрали тысячи автовладельцев, так как мы не обманываем ожиданий!</p>
</article>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
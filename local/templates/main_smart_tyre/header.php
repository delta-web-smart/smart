<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    CJSCore::Init(array("fx"));
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta charset="<?=LANG_CHARSET?>">
    <? 
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH. "/css/reset.css");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH. "/css/custom.css");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH. "/css/jquery.formstyler.css");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH. "/fonts/fonts.css");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH. "/css/jquery-ui-1.10.4.custom.css");
        //$APPLICATION->AddHeadString('<link rel="stylesheet" href="'. SITE_TEMPLATE_PATH .'/css/global.css">');
    ?>
    <?$APPLICATION->AddHeadString('<!--[if IE 7]><link rel="stylesheet" href="'. SITE_TEMPLATE_PATH .'/css/ie7.css" /><![endif]-->')?>
	<?$APPLICATION->AddHeadString('<!--[if IE 8]><link rel="stylesheet" href="'. SITE_TEMPLATE_PATH .'/css/ie8.css" /><![endif]-->')?>
    <?
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH. "/js/jquery-1.9.1.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH. "/js/jquery.formstyler.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH. "/js/jquery.easing.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH. "/js/simpslider.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH. "/js/bootstrap.touchspin.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH. "/js/jquery-ui-1.10.4.custom.min.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH. "/js/custom.js");
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
        <a href="#" class="logo-wrap">
          <img src="<?=SITE_TEMPLATE_PATH?>/img/logo-main.png" alt="">
          <div class="slogan">
            <span>Смарт Тайер</span>
            Виртуальный гипермаркет<br>автотоваров в Москве
          </div>
        </a>
        <div class="phone-wrap">
          <div class="phone">
            (495)
             <span>551-52-51</span>
            <a href="#">Обратный звонок</a>
          </div>
          <span class='address'>г. Москва ул. Южнопортовая, 7<br>Пн – Пт: с 9 до 21. <i>Сб с 9 до 17</i></span>
        </div>
        <div class="corf">
          <a href="#" class="corf-ico"></a>
          <span class="title">Корзина:</span>
          <div class="goods"><span class="count">Товаров: <b>21</b></span><span class="price">21 232 <b>c</b></span></div>
        </div>
      </div>
      <div class="bottom-part clearfix">
        <span class="about-catalog">В нашем каталоге <b>более 10 000</b> товаров!</span>
        <div class="clear"></div>
        <div class="search-wrap">
          <input type="text" class="search">
          <button class="search-btn orange-btn">Найти</button>
        </div>
        <nav class="main-nav">
          <ul>
            <li><a href="#">ГЛАВНАЯ</a></li>
            <li><a href="#">О КОМПАНИИ</a></li>
            <li><a href="#">ДОСТАВКА</a></li>
            <li><a href="#">ПОКУПАТЕЛЮ</a></li>
            <li class="last"><a href="#">КОНТАКТЫ</a></li>
          </ul>
        </nav>
      </div>
      <div class="header-shadow"></div>
    </header>
    
    <section class="content-wrap">
       <a href="#" class="ask-question">Задать вопрос</a>
      <a href="#" class="to-up"><i>Наверх</i></a>
      <nav class="product-nav">
        <ul class="clearfix">
          <li class="product1">
            <span class="item-name">
              Шины<i class="dropdown"></i>
              <div class="sub-nav">
                <div class="list">
                  <a href="#">Автошины</a>
                  <a href="#">Мотошины</a>
                  <a href="#">Грузовые шины</a>
                  <a href="#">Спецшины</a>
                </div>
                <img src="<?=SITE_TEMPLATE_PATH?>/img/sub-nav-img.png" alt="">
              </div>
            </span>
            <div class="product-img"></div>
          </li>          
          <li class="product2">
            <span class="item-name">
              Диски<i class="dropdown"></i>
              <div class="sub-nav">
                <div class="list">
                  <a href="#">Автодиски</a>
                  <a href="#">Груз. диски</a>
                </div>
                <img src="<?=SITE_TEMPLATE_PATH?>/img/sub-nav-img.png" alt="">
              </div>
            </span>
            <div class="product-img"></div>
          </li>
          <li class="no-sub product3">
            <a href="#" class="no-sub-link">
              <span class="item-name">Автокресла</span>
              <div class="product-img"></div>
            </a>
          </li>
          <li class="no-sub product4">
            <a href="#" class="no-sub-link">
              <span class="item-name">Аккумуляторы</span>
              <div class="product-img"></div>
            </a>
          </li>
          <li class="product5">
            <span class="item-name">
              Масла<i class="dropdown"></i>
              <div class="sub-nav">
                <div class="list">
                  <a href="#">Моторное</a>
                  <a href="#">Трансмиссионное</a>
                </div>
                <img src="<?=SITE_TEMPLATE_PATH?>/img/sub-nav-img.png" alt="">
              </div>
            </span>
            <div class="product-img"></div>
          </li>
          <li class="no-sub product6">
            <a href="#" class="no-sub-link">
              <span class="item-name">Крепеж и секретки</span>
              <div class="product-img"></div>
            </a>
          </li>
          <li class="no-sub product7">
            <a href="#" class="no-sub-link">
              <span class="item-name">Выхлопная система</span>
              <div class="product-img"></div>
            </a>
          </li>
          <li class="last product8">
            <span class="item-name">
              Всё для авто<i class="dropdown"></i>
              <div class="sub-nav">
                <div class="list">
                  <a href="#">Фильтры</a>
                  <a href="#">Колодки</a>
                  <a href="#">Противоугонные системы</a>
                  <a href="#">Камера и ободные ленты</a>
                  <a href="#">Автолампы</a>
                  <a href="#">Автоинструмент</a>
                </div>
                <img src="<?=SITE_TEMPLATE_PATH?>/img/sub-nav-img.png" alt="">
              </div>
            </span>
            <div class="product-img"></div>
          </li>
        </ul>
      </nav>
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
        <form class="sort-item right">
          <h3>ПОДБОР ПО РАЗМЕРУ и ПАРАМЕТРАМ</h3>
          <ul class="category">
            <li class="active"><a href="#">Автошины</a></li>
            <li><a href="#">Автодиски</a></li>
            <li><a href="#">Мотошины</a></li>
            <li><a href="#">Груз. шины</a></li>
            <li><a href="#">Груз. диски</a></li>
            <li><a href="#">Спецшины</a></li>
          </ul>
          <div class="options-wrap clearfix">
            <div class="option narrow">
              <span class="label">Ширина</span>
              <select name="" class="select-style">
                <option value="">255</option>
                <option value="">260</option>
                <option value="">265</option>
                <option value="">270</option>
              </select>
            </div>
            <div class="divider">/</div>
            <div class="option narrow">
              <span class="label">Профиль</span>
              <select name="" class="select-style">
                <option value="">255</option>
                <option value="">260</option>
                <option value="">265</option>
                <option value="">270</option>
              </select>
            </div>
            <div class="option narrow diameter">
              <span class="label">Диаметр</span>
              <select name="" class="select-style">
                <option value="">255</option>
                <option value="">260</option>
                <option value="">265</option>
                <option value="">270</option>
              </select>
            </div>
            <div class="option seasonality">
              <span class="label">Сезонность</span>
              <div class="clear"></div>
              <input class="radio-style check" type="radio" id="radio1" name="seasonality">
              <label class="summery" for="radio1">Летние</label>
              <input class="radio-style check" type="radio" id="radio2" name="seasonality">
              <label for="radio2">Летние</label>
              <div class="clear"></div>
            </div>
            <button class="orange-btn">Подобрать</button>
          </div>
        </form>
      </div>
      <div class="clear"></div>
      <aside class="sidebar">
        <ul class="promo-nav">
          <li><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/sidebar-promo-img.png" alt=""><span>ГАРАНТИЯ КАЧЕСТВА</span></a></li>
          <li><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/sidebar-promo-img1.png" alt=""><span>СПРАВЕДЛИВЫЕ ЦЕНЫ</span></a></li>
          <li><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/sidebar-promo-img2.png" alt=""><span>ШИРОЧАЙШИЙ АССОРТИМЕНТ</span></a></li>
          <li><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/sidebar-promo-img3.png" alt=""><span>ПРОФЕССИОНАЛЬНАЯ<br>КОНСУЛЬТАЦИЯ</span></a></li>
        </ul>
        <div class="yandex-widget-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/temp-yandex-widget.png" alt=""></div>
        <div class="news-widget">
          <h3>НОВОСТИ КОМПАНИИ</h3>
          <ul>
            <li>
              <span class="date">25 ноября 2013</span>
              <a class="news-title" href="#">Объявляем предновогоднюю распродажу зимних шин KUMHO R17</a>
              <div class="news">
                <div class="img-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/news-widget-img.jpg" alt=""></div>
                <p>В ассортименте в наличии радиусы от R15 до R18 шипы и липучка. Торопитесь, количество ограничено!</p>
              </div>
            </li>
            <li>
              <span class="date">25 ноября 2013</span>
              <a class="news-title" href="#">Объявляем предновогоднюю распродажу зимних шин KUMHO R17</a>
              <div class="news">
                <div class="img-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/news-widget-img.jpg" alt=""></div>
                <p>В ассортименте в наличии радиусы от R15 до R18 шипы и липучка. Торопитесь, количество ограничено!</p>
              </div>
            </li>
            <li class="last">
              <span class="date">25 ноября 2013</span>
              <a class="news-title" href="#">Объявляем предновогоднюю распродажу зимних шин KUMHO R17</a>
              <div class="news">
                <div class="img-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/news-widget-img.jpg" alt=""></div>
                <p>В ассортименте в наличии радиусы от R15 до R18 шипы и липучка. Торопитесь,<br><a href="#">Подробнее в каталоге</a></p>
              </div>
            </li>
          </ul>
        </div>
        <div class="vk-widget-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/temp-vk-widget.png" alt=""></div>
      </aside>
      <div class="content">
		
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<? if (!empty($arResult['ITEMS'])):?>
    <div class="product-card model">
        <div class="left-block">
          <div class="preview">
            <a href="#" class="big-view">
              <img src="img/product-photo10.jpg" alt="">
              <div class="loupe"></div>
              <div class="action-label hit"></div>
            </a>
          </div>
          <div class="central-part">
            <div class="article"><a href="#" class="trademark"><img src="img/trademark1.jpg" alt=""></a></div>
            <table>
              <tr>
                <td>Производитель:</td>
                <td>Michelin</td>
              </tr>
              <tr>
                <td>Сезон шины:</td>
                <td>Зимние <i class="season-ico winter"></i></td>
              </tr>
              <tr>
                <td>Тип авто:</td>
                <td>Внедорожник</td>
              </tr>
            </table>
            <div class="features"><img src="img/spike-ico.png" alt=""><img src="img/features-label.png" alt=""></div>
          </div>
          <div class="clear"></div>
          <div class="description">
            <p>Bridgestone Blizzak Spike-01 - это новые шипованные зимние шины сезона 2013-2014 разработанные специально для России и стран СНГ.</p>
            <p>Разработка данной шины велась с учетом особенностей российских дорог. В результате многочисленных тестов на этапе разработки, новинка получила прочную и надежную боковину, новый самоочищающийся протектор, мягкую</p>
          </div>
        </div>
        <ul class="services">
          <li>
            <a href="#">
              <img src="img/services-ico.png" alt="">
              <span>Как заказать<br>товар в нашем<br>магазине?</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="img/services-ico1.png" alt="">
              <span>О доставке по<br>Москве и России</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="img/services-ico2.png" alt="">
              <span>Способы оплаты<br>товара</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="img/services-ico3.png" alt="">
              <span>Гарантия на<br>купленный товар</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="img/services-ico4.png" alt="">
              <span>Самовывоз<br>со склада</span>
            </a>
          </li>
          <li class="last">
            <a href="#">
              <img src="img/services-ico5.png" alt="">
              <span>Полезная<br>информация</span>
            </a>
          </li>
        </ul>
        <div class="clear"></div>
    </div>
<? endif;?>
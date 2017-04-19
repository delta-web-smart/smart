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
<? if (!empty($arResult)):?>
    <div class="product-card model">
        <div class="left-block">
          <div class="preview">
            <a href="<?=$arResult["PICTURE"]?>" class="big-view">
              <img src="<?=$arResult["RESIZE_PICTURE"]["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>">
              <div class="loupe"></div>
              <div class="action-label hit"></div>
              <div class="action-label"></div>
            </a>
          </div>
          <? var_Dump($arResult);die();?>
          <div class="central-part">
            <div class="article"><a href="#" class="trademark"><img src="<?=MAIN_TEMPLATE_PATH?>img/trademark1.jpg" alt=""></a></div>
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
            <div class="features"><img src="<?=MAIN_TEMPLATE_PATH?>img/spike-ico.png" alt=""><img src="<?=MAIN_TEMPLATE_PATH?>img/features-label.png" alt=""></div>
          </div>
          <div class="clear"></div>
          <div class="description">
            <?=$arResult["DETAIL_TEXT"]?>
          </div>
        </div>
        <ul class="services">
          <li>
            <a href="#">
              <img src="<?=MAIN_TEMPLATE_PATH?>img/services-ico.png" alt="">
              <span>Как заказать<br>товар в нашем<br>магазине?</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="<?=MAIN_TEMPLATE_PATH?>img/services-ico1.png" alt="">
              <span>О доставке по<br>Москве и России</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="<?=MAIN_TEMPLATE_PATH?>img/services-ico2.png" alt="">
              <span>Способы оплаты<br>товара</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="<?=MAIN_TEMPLATE_PATH?>img/services-ico3.png" alt="">
              <span>Гарантия на<br>купленный товар</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="<?=MAIN_TEMPLATE_PATH?>img/services-ico4.png" alt="">
              <span>Самовывоз<br>со склада</span>
            </a>
          </li>
          <li class="last">
            <a href="#">
              <img src="<?=MAIN_TEMPLATE_PATH?>img/services-ico5.png" alt="">
              <span>Полезная<br>информация</span>
            </a>
          </li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="product-support">
        <ul class="markers">
          <li class="active"><span>Размеры</span></li>
          <li><a href="#">С этим товаром покупают</a></li>
          <li><a href="#">Задать вопрос по товару</a></li>
        </ul>
        <div class="sizes-info">
          <ul class="size-list">
            <li><a href="#">Показать всё</a></li>
            <li><a href="#">R13</a></li>
            <li><a href="#">R14</a></li>
            <li class="active"><a href="#">R15</a></li>
            <li><a href="#">R16</a></li>
            <li><a href="#">R17</a></li>
            <li><a href="#">R18</a></li>
            <li><a href="#">R19</a></li>
          </ul>
          <table class="size-table tire">
            <tr class="size-title">
              <td class="size">Размер</td>
              <td class="article">Артикул</td>
              <td class="speed">Скокрость</td>
              <td class="load">Нагрузка</td>
              <td class="avalible">Наличие, шт.</td>
              <td class="price">Цена, руб.</td>
            </tr>
            <tr class="size-divider">
              <td>R13</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="size"><a href="#">175/70 R13</a></td>
              <td class="article">0004324</td>
              <td class="speed">S</td>
              <td class="load">80</td>
              <td class="avalible">> 12</td>
              <td class="price">
                <button class="price-btn">999 720<i>e</i></button>
                <input type="text" class="spinner" value="0">
              </td>
            </tr>
            <tr>
              <td class="size"><a href="#">175/70 R13</a></td>
              <td class="article">0004324</td>
              <td class="speed">S</td>
              <td class="load">80</td>
              <td class="avalible few">> 12</td>
              <td class="price">
                <button class="price-btn">5 720<i>e</i></button>
                <input type="text" class="spinner" value="0">
              </td>
            </tr>
            <tr>
              <td class="size"><a href="#">175/70 R13</a></td>
              <td class="article">0004324</td>
              <td class="speed">S</td>
              <td class="load">80</td>
              <td class="avalible preorder">под заказ</td>
              <td class="price">
                <button class="price-btn">5 720<i>e</i></button>
                <input type="text" class="spinner" value="0">
              </td>
            </tr>
            <tr class="size-divider">
              <td>R14</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="size"><a href="#">175/70 R13</a></td>
              <td class="article">0004324</td>
              <td class="speed">S</td>
              <td class="load">80</td>
              <td class="avalible">> 12</td>
              <td class="price">
                <button class="price-btn">999 720<i>e</i></button>
                <input type="text" class="spinner" value="0">
              </td>
            </tr>
            <tr>
              <td class="size"><a href="#">175/70 R13</a></td>
              <td class="article">0004324</td>
              <td class="speed">S</td>
              <td class="load">80</td>
              <td class="avalible few">> 12</td>
              <td class="price">
                <button class="price-btn">5 720<i>e</i></button>
                <input type="text" class="spinner" value="0">
              </td>
            </tr>
            <tr>
              <td class="size"><a href="#">175/70 R13</a></td>
              <td class="article">0004324</td>
              <td class="speed">S</td>
              <td class="load">80</td>
              <td class="avalible preorder">под заказ</td>
              <td class="price">
                <button class="price-btn">5 720<i>e</i></button>
                <input type="text" class="spinner" value="0">
              </td>
            </tr>
          </table>
        </div>
        <div class="views-informer">
          <a href="#" class="print-btn">Распечатать</a>
          <span class="views">Просмотрено: 323</span>
        </div>
      </div>
<? endif;?>
<?php
    if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<a href="<?if($APPLICATION->GetCurPage(false) == "/"):?>#<?else:?>/<?endif;?>" class="logo-wrap">
  <img src="<?=MAIN_TEMPLATE_PATH?>img/logo-main.png" alt="">
  <div class="slogan">
    <span>Смарт Тайер</span>
    Виртуальный гипермаркет<br>автотоваров в Москве
  </div>
</a>
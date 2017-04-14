<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
    <nav class="main-nav">
        <ul>
            <? foreach($arResult as $i=>$arItem):?>
                <li class="<? if($i == count($arResult)-1):?>last<? endif;?>"><a href="<?=$arItem["LINK"]?>"><?=ToUpper($arItem["TEXT"])?></a></li>
            <? endforeach;?>
        </ul>
    </nav>
<?endif?>
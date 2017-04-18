//IE7,8 html 5
if (!$.support.leadingWhitespace) {
    var e = ("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video,figcaption,summary").split(',');
	for (var i = 0; i < e.length; i++){
	    document.createElement(e[i]);
	}
}

var centerizeVert=function(items,posPlus,onWindowLoad,isCustomFont){var items=$(items);if(!items.length)return;var plus=0;if(typeof posPlus!=="undefined")plus=posPlus;items.each(function(){var item=$(this);if(!item.height())if(item.is("img")){item.hide();var interval=setInterval(function(){if(item.height()){clearInterval(interval);item.show();centerize(item)}},20);return}else return;centerize(item);if(isCustomFont){var top=item.css("top");var interval2=setInterval(function(){centerize(item);if(item.css("top")!== top)clearInterval(interval2)},20);$(window).load(function(){clearInterval(interval2)})}});function centerize(item){var parent=item.parent();var css={top:~~((parent.height()-item.height())/2+plus)};if($.inArray(item.css("position"),["absolute","relative"])<0)css.position="relative";item.css(css)}if(onWindowLoad)$(window).load(function(){centerizeVert(items,posPlus)})};

$(document).ready( domReady );
$(window).load( windowOnload );

function domReady(){

  centerizeVert('aside.sidebar ul.promo-nav li a img', 0, 1, 0);
  centerizeVert('aside.sidebar ul.promo-nav li a span', 0, 1, 0);
  centerizeVert('.content ul.catalog li a.img-wrap img', 0, 1, 0);
  centerizeVert('.content .product-card ul.services li a span', 0, 1, 1);
  centerizeVert('.content .search-results li.mini-card .preview img', 0, 1, 0);
  centerizeVert('.content .product-card .central-part .article a.trademark img', 0, 1, 0);
  centerizeVert('.content .border-wrap ul.brands-search li a div.name-wrap span', 0, 1, 0);
  centerizeVert('.content .border-wrap ul.brands-search.tire-catalog li a div.img-wrap img', 0, 1, 0);

  $(".select-style, .radio-style, .check-style").styler();

  $("div.content-wrap div.content div.main-slider").simpslider({
    width : 693,
    height : 294,
    mover : $(this).find('.slides'),
    itemsClass : '.slide',
    dots : $(this).find('ul.dots li'),
    createStructure : false,
    speed : 700,
    wait : 4000
  });

  function headerAnimate (){
    var logoWrap = $('.header .main-part .logo-wrap');
    var logo = logoWrap.find('img');
    var slogan = logoWrap.find('.slogan');
    var phone = $('.header .main-part .phone-wrap');
    var corf = $('.header .main-part .corf');
    var bottomPart = $('.header .bottom-part');
    logo.animate({"top": "+=200px", "opacity": "toggle"}, 600, 'easeOutBack');
    slogan.delay(100).animate({"top": "+=200px", "opacity": "toggle"}, 600, 'easeOutBack');
    phone.delay(200).animate({"top": "+=212px", "opacity": "toggle"}, 600, 'easeOutBack');
    corf.delay(300).animate({"top": "+=214px", "opacity": "toggle"}, 600, 'easeOutBack');
    bottomPart.find('span.about-catalog').delay(600).fadeIn(1000);
    bottomPart.find('.search-wrap').delay(900).show(300);
    bottomPart.find('nav.main-nav').delay(1300).fadeIn(1200);
  };
  headerAnimate();

  /*http://www.virtuosoft.eu/code/bootstrap-touchspin/*/
  $("input.spinner").TouchSpin({
    min: 1,
    max: 999
  });

  /*to-up link function*/
  (function(){
    $(window).scroll( function(){
      var top = $(window).scrollTop();
      var toUp = $('section.content-wrap a.to-up');
      if (top > 50) {
        toUp.fadeIn(200);
      }
      else {
        toUp.fadeOut(200);
      }
    });
  })();


  /*Sort show/hide function*/
  (function(){
    var sortMain = $('section.content-wrap div.sort-main');
    var sortSwich = $('section.content-wrap div.show-sort-swich');
    sortSwich.click(function(){
      sortMain.toggle(250);
      $(this).toggleClass('show');
      if ($(this).text() == "Скрыть") {
        $(this).text("Развернуть");
      }
      else {
        $(this).text("Скрыть");
      }
    });
  })();


  /*Sidebar filter slider range inicialization*/

  /*Инициализация слайдера для фильтра масел*/
  $( "#slider-range" ).slider({
    range: true,
    animate: true,
    min: 1,
    max: 5,
    values: [ 1, 5 ],
    slide: function( event, ui ) {
      $( "#amount-min" ).val( ui.values[ 0 ] );
      $( "#amount-max" ).val( ui.values[ 1 ] );
    }
  });
  $( "#amount-min" ).val($( "#slider-range" ).slider( "values", 0 ));
  $( "#amount-max" ).val($( "#slider-range" ).slider( "values", 1 ));

  /*Инициализация слайдера для фильтра аккумуляторов*/
  /*Длина аккумулятора*/
  $( "#slider-range-a" ).slider({
    range: true,
    animate: true,
    min: 0,
    max: 600,
    values: [ 0, 600 ],
    slide: function( event, ui ) {
      $( "#amount-min-a" ).val( ui.values[ 0 ] );
      $( "#amount-max-a" ).val( ui.values[ 1 ] );
    }
  });
  $( "#amount-min-a" ).val($( "#slider-range-a" ).slider( "values", 0 ));
  $( "#amount-max-a" ).val($( "#slider-range-a" ).slider( "values", 1 ));

  /*Ширина аккумулятора*/
  $( "#slider-range-b" ).slider({
    range: true,
    animate: true,
    min: 0,
    max: 600,
    values: [ 0, 600 ],
    slide: function( event, ui ) {
      $( "#amount-min-b" ).val( ui.values[ 0 ] );
      $( "#amount-max-b" ).val( ui.values[ 1 ] );
    }
  });
  $( "#amount-min-b" ).val($( "#slider-range-b" ).slider( "values", 0 ));
  $( "#amount-max-b" ).val($( "#slider-range-b" ).slider( "values", 1 ));

  /*Высота аккумулятора*/
  $( "#slider-range-c" ).slider({
    range: true,
    animate: true,
    min: 0,
    max: 600,
    values: [ 0, 600 ],
    slide: function( event, ui ) {
      $( "#amount-min-c" ).val( ui.values[ 0 ] );
      $( "#amount-max-c" ).val( ui.values[ 1 ] );
    }
  });
  $( "#amount-min-c" ).val($( "#slider-range-c" ).slider( "values", 0 ));
  $( "#amount-max-c" ).val($( "#slider-range-c" ).slider( "values", 1 ));

  /*Длина резьбы (крепеж)*/
  $( "#slider-range-d" ).slider({
    range: true,
    animate: true,
    min: 0,
    max: 35,
    values: [ 0, 35 ],
    slide: function( event, ui ) {
      $( "#amount-min-d" ).val( ui.values[ 0 ] );
      $( "#amount-max-d" ).val( ui.values[ 1 ] );
    }
  });
  $( "#amount-min-d" ).val($( "#slider-range-d" ).slider( "values", 0 ));
  $( "#amount-max-d" ).val($( "#slider-range-d" ).slider( "values", 1 ));

  /*Диаметр камеры*/
  $( "#slider-range-e" ).slider({
    range: true,
    animate: true,
    min: 0,
    max: 600,
    values: [ 0, 600 ],
    slide: function( event, ui ) {
      $( "#amount-min-e" ).val( ui.values[ 0 ] );
      $( "#amount-max-e" ).val( ui.values[ 1 ] );
    }
  });
  $( "#amount-min-e" ).val($( "#slider-range-e" ).slider( "values", 0 ));
  $( "#amount-max-e" ).val($( "#slider-range-e" ).slider( "values", 1 ));

  /*Ширина камеры*/
  $( "#slider-range-f" ).slider({
    range: true,
    animate: true,
    min: 0,
    max: 600,
    values: [ 0, 600 ],
    slide: function( event, ui ) {
      $( "#amount-min-f" ).val( ui.values[ 0 ] );
      $( "#amount-max-f" ).val( ui.values[ 1 ] );
    }
  });
  $( "#amount-min-f" ).val($( "#slider-range-f" ).slider( "values", 0 ));
  $( "#amount-max-f" ).val($( "#slider-range-f" ).slider( "values", 1 ));

  /*Дружим инпуты со слайдером 
  (Передача значений от инпутов в слайдер при редактировании инпута.
  Значение передаеться при потере фокуса у инпута.
  В стандартном варианте ui такой функции нет)*/
  $("form.filter .category .range").each(function(){
    var amountMin = $(this).find("input.amount-min");
    var amountMax = $(this).find("input.amount-max");
    var sliderR = $(this).find(".slider-range");
    amountMin.change(function(){
      var value1= amountMin.val();
      var value2= amountMax.val();
      if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        amountMin.val(value1);
      }
      sliderR.slider("values",0,value1);  
    });
  });
  $("form.filter .category .range").each(function(){
    var amountMin = $(this).find("input.amount-min");
    var amountMax = $(this).find("input.amount-max");
    var sliderR = $(this).find(".slider-range");
    amountMax.change(function(){
      var value1 = amountMin.val();
      var value2 = amountMax.val();
      if (value2 > 1000) { value2 = 1000; amountMax.val(1000)}
      if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
      amountMax.val(value2);
      }
      sliderR.slider("values",1,value2);
    });
  });
  
  /*Исключаем ввод букв в инпуты слайдера регулярным выражением*/
  $('input#amount-min, input#amount-max').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
  });
  /*END sidebar filter slider range inicialization*/






}

function windowOnload(){
	
	
	
	
}
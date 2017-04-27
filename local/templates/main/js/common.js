$(function() {

    //Переключение разделов в подборе по размеру и параметрам
    $(document).on("click", "#catalog_top_filter a", function(e) {
        e.preventDefault();
        $("#catalog_top_filter li").removeClass("active");
        var selector = $(this).closest("li");
        selector.addClass("active");
        var url = $(this).closest("#catalog_top_filter").data("url");
        var section_id = selector.data("id");
        var properties = selector.data("properties");
        var filter_url = $(".header_filter").attr("action");
        BX.showWait();
        $.post(
            url,
            {
                section_id: section_id,
                properties: properties,
                filter_url: filter_url
            },
            function(data) {
                BX.closeWait();
                $("#filter_top").html(data);
                $(".select-style").styler();
            }
        );
    });

    //Событие по клику на кнопку в блоке "Подбор по размеру и параметрам"
    $(document).on("click", "form.header_filter button", function(e) {
        e.preventDefault();
        smartFilterTop.reload(this);
    });

    //Сортировка по полям для левого фильтра
    $(document).on("click", ".filter .sort button", function(e) {
        e.preventDefault();
        $(this).closest(".sort").find("button").each(function() {
            $(this).removeClass("active");
        });
        $(this).addClass("active");
        var by = $(this).closest(".sort").data("by");
        var order = "";
        if ($(this).hasClass("up")) {
            order = "asc";
        } else {
            order = "desc";
        }
        SetAttrUrlForSort({
            by: by,
            order: order
        });
    });

    //Для ajax-фильтра в левой колонке
    $(function() {
        $(document).on("change", ".filter input", function() {
            smartFilter.keyup(this);
        });
    });

    //Исключаем ввод букв в инпуты слайдера регулярным выражением
    $('input.amount-min, input.amount-max').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

    //Инициализация слайдера в фильтре слева
    $( ".filter-slider-range" ).each(function() {
        var selectorMin = $(this).closest(".range").find(".amount-min");
        var selectorMax = $(this).closest(".range").find(".amount-max");
        var currentSlider = $(this);
        var min = selectorMin.val()-0;
        var max = selectorMax.val()-0;
        $(this).slider({
            range: true,
            animate: true,
            min: min,
            max: max,
            values: [ min, max ],
            slide: function( event, ui ) {
                selectorMin.val( ui.values[ 0 ] );
                selectorMax.val( ui.values[ 1 ] );
            },
            stop: function() {
                smartFilter.keyup(this);
            }
        });
        
        selectorMax.change(function() {
            currentSlider.slider("values", [ selectorMin.val()-0, selectorMax.val()-0 ]);
        });
        
        selectorMin.change(function() {
            currentSlider.slider("values", [ selectorMin.val()-0, selectorMax.val()-0 ]);
        });
        
    });

    //Обработчик по клику "Все #название свойства инфоблока#" в левом фильтре
    $(".filter .select-all").click(function(e) {
        e.preventDefault();
        var selectorColumns = $(this).closest(".category").find(".checks-wrap");
        
        var checkedValues = [];
        selectorColumns.each(function(i) {
            if ($(this).is(":visible")) {
                $(this).find("input").each(function() {
                    if ($(this).prop("checked")) {
                        checkedValues.push($(this).attr("id"));
                    }
                });
            }
        });

        selectorColumns.each(function(i) {
            if ($(this).is(":hidden")) {
                selectorColumns.eq(i-2).html($(this).html());
                $(this).detach();
            }
        });
        $(this).closest(".category").hide().slideDown();
        $(this).detach();
        selectorColumns.each(function(i) {
            $(this).find("input").each(function() {
                if (in_array($(this).attr("id"), checkedValues)) {
                    $(this).prop("checked", true);
                }
                $(this).addClass("check-style").styler();
            });
        });
    });

    VK.Widgets.Group("vk_groups", {mode: 3, width: "270"}, 145254067);

    setEqualHeight($(".all-for-auto > li"));

    $("a.fancybox").colorbox({
        maxWidth : "95%",
        maxHeight: "95%",
        current: ""
    });
    
    if ($('.bottom-article').html().trim() == "") {
        $('.bottom-article').detach();
    }
    
    //Работа с табами: Новинки, Распродажа, Хит сезона, Просмотренные
    $(".top-category").customTabs({
        parent : ".top-category",
        child : ".catalog.tabs"
    });
    
    $(".markers").customTabs({
        parent: ".markers",
        child : ".sizes-info"
    });
        
    TabsForOffers();
    
    var $customBasket = new CustomBasket();
    $customBasket.Init();
    
    function CustomBasket() {
        
        this.Init = function() {
            this.addSmallBasket();
            this.addBigBasket();
            this.updateBigBasket();
            this.deleteBigBasket();
        };
        
        this.updateBlockSmallBasket = function(data) {
            $('#small_basket').replaceWith(data.small_basket);
            var corf = $('.header .main-part .corf');
            corf.delay(300).animate({"top": "+=214px", "opacity": "toggle"}, 600, 'easeOutBack');
        };
        
        //Обновление товаров в малой корзине при добавлении позиции товара в корзину
        this.addSmallBasket = function() {
            $(document).on('click', '#add_to_basket', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var quantity = $(this).closest('#product').find('#quantity').val();
                BX.showWait();
                $.post(
                    '/ajax/add_basket.php',
                    {
                        id: id,
                        quantity: quantity,
                        custom_action: 'ADD2BASKET'
                    },
                    function(data) {
                        if (data.small_basket) {
                            var $customBasket = new CustomBasket();
                            $customBasket.updateBlockSmallBasket(data);
                        }
                        if (data.success) {
                            PopupMessage(data.success);
                        }
                        if (data.error) {
                            PopupMessage(data.error);
                        }
                        BX.closeWait();
                    },
                    'JSON'
                );
            });
        };
        
        //Обновление товаров в большой корзине при изменении количества товаров в позиции корзины
        this.addBigBasket = function() {
            $(document).on('change', '#basket_position .quantity', function(e) {
                e.preventDefault();
                var quantity = $(this).closest('#basket_position').find('#quantity').val();
                var id = $(this).data('id');
                BX.showWait();
                $.post(
                    '/ajax/add_basket.php',
                    {
                        id: id,
                        quantity: quantity,
                        custom_action: 'UPDATE2BASKET'
                    },
                    function(data) {
                        if (data.small_basket) {
                            var $customBasket = new CustomBasket();
                            $customBasket.updateBlockSmallBasket(data);
                        }
                        if (data.big_basket) {
                            $('#big_basket').replaceWith(data.big_basket);
                        }
                        if (data.success) {
                            PopupMessage(data.success);
                        }
                        if (data.error) {
                            PopupMessage(data.error);
                        }
                        BX.closeWait();
                    },
                    'JSON'
                );
            });
        };
        
        //Обновление товаров в большой корзине при изменении количества товаров в позиции корзины при нажатии на плюс и минус
        this.updateBigBasket = function() {    
            var timerBasketUpdate = 0;
            $(document).on('click', '#basket_position .plus, #basket_position .minus', function(e) {
                e.preventDefault();
                var quantity = $(this).closest('#basket_position').find('#quantity').val();
                var id = $(this).data('id');
                clearTimeout(timerBasketUpdate);
                timerBasketUpdate = setTimeout(function() {
                    BX.showWait();
                    $.post(
                        '/ajax/add_basket.php',
                        {
                            id: id,
                            quantity: quantity,
                            custom_action: 'UPDATE2BASKET'
                        },
                        function(data) {
                            if (data.small_basket) {
                                var $customBasket = new CustomBasket();
                                $customBasket.updateBlockSmallBasket(data);
                            }
                            if (data.big_basket) {
                                $('#big_basket').replaceWith(data.big_basket);
                            }
                            if (data.success) {
                                PopupMessage(data.success);
                            }
                            if (data.error) {
                                PopupMessage(data.error);
                            }
                            BX.closeWait();
                        },
                        'JSON'
                    );
                }, 1000);
            });
        };
        
        //Обновление товаров в большой корзине при удалении позиции товара из корзины
        this.deleteBigBasket = function() { 
            $(document).on('click', '#delete_to_basket', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                BX.showWait();
                $.post(
                    '/ajax/add_basket.php',
                    {
                        id: id,
                        custom_action: 'DELETE2BASKET'
                    },
                    function(data) {
                        if (data.small_basket) {
                            var $customBasket = new CustomBasket();
                            $customBasket.updateBlockSmallBasket(data);
                        }
                        if (data.big_basket) {
                            $('#big_basket').replaceWith(data.big_basket);
                        }
                        if (data.success) {
                            PopupMessage(data.success);
                        }
                        if (data.error) {
                            PopupMessage(data.error);
                        }
                        if ($('#basket_position').length == 0) {
                            $('#block_order').detach();
                        }
                        BX.closeWait();
                    },
                    'JSON'
                );
            });
        };
        
        //Событие при добавлении купона
        this.addCoupon = function() { 
            $(document).on('click', '#coupon_submit', function(e) {
                e.preventDefault();
                var coupon = $('#coupon').val();
                BX.showWait();
                $.post(
                    '/ajax/add_basket.php',
                    {
                        custom_action: 'ENTER2COUPON',
                        coupon: coupon
                    },
                    function(data) {
                        if (data.small_basket) {
                            var $customBasket = new CustomBasket();
                            $customBasket.updateBlockSmallBasket(data);
                        }
                        if (data.big_basket) {
                            $('#big_basket').replaceWith(data.big_basket);
                        }
                        if (data.success) {
                            PopupMessage(data.success);
                        }
                        if (data.error) {
                            PopupMessage(data.error);
                        }
                        BX.closeWait();
                    },
                    'JSON'
                );
            });
        };
        
        //Событие при удалении купона
        this.deleteCoupon = function() {
            $(document).on('click', '#coupon_delete', function(e) {
                e.preventDefault();
                var coupon = $(this).data('coupon');
                BX.showWait();
                $.post(
                    '/ajax/add_basket.php',
                    {
                        custom_action: 'DELETE2COUPON',
                        coupon: coupon
                    },
                    function(data) {
                        if (data.small_basket) {
                            var $customBasket = new CustomBasket();
                            $customBasket.updateBlockSmallBasket(data);
                        }
                        if (data.big_basket) {
                            $('#big_basket').replaceWith(data.big_basket);
                        }
                        if (data.success) {
                            PopupMessage(data.success);
                        }
                        if (data.error) {
                            PopupMessage(data.error);
                        }
                        BX.closeWait();
                    },
                    'JSON'
                );
            });
        };
    }    
});

function PopupMessage(message) {
	var addAnswer = new BX.PopupWindow(
     "popup",                
      null, 
     {
        content: message,
        //closeIcon: {right: "20px", top: "10px"},
        titleBar: {content: BX.create("span", {html: '', 'props': {'className': 'access-title-bar'}})},
        zIndex: 0,
        offsetLeft: 0,
        offsetTop: 0,
        overlay: {backgroundColor: 'black', opacity: '80' },
        draggable: false,
        buttons: [
           new BX.PopupWindowButton({
              text: "Закрыть" ,
              className: "webform-button-link-cancel" ,
              events: {click: function(){
                 this.popupWindow.close();
              }}
           })
        ]
     });
     addAnswer.show();
}

jQuery.fn.customTabs = function(options){
    $(options.child).hide();
    $(options.child).each(function(i) {
         if (i == 0) {
            $(this).show();
         }
         $(this).attr("data-index", i);   
    });
    $(options.parent+" li").eq(0).addClass('active');
    
    $(options.parent+" li").on("click", function(e) {
        e.preventDefault();
        $(options.parent+" li").removeClass("active");
        $(this).addClass("active");
        $(options.child).hide();
        index = 0;
        $(options.parent+" li").each(function(i){
            if ($(this).hasClass("active")) {
                index = i;
                return false;
            }
        });
        $(options.child+"[data-index="+index+"]").show();
    });
    
}

function TabsForOffers() {
    var index = 0;
    $(".offer_block").hide();
    $(".size-list li").each(function(i) {
        if ($(this).hasClass('active')) {
            index = i;
        }
    });
    index -= 1;
    $(".offer_block[data-page="+index+"]").show();
    $(".size-list li").on("click", function(e) {
        e.preventDefault();
        var index = 0;
        $(".size-list li").removeClass('active');
        $(this).addClass("active");
        $(".offer_block").hide();
        $(".size-list li").each(function(i) {
            if ($(this).hasClass('active')) {
                index = i;
            }
        });
        index -= 1;
        if (index < 0) {
            $(".offer_block").show();
        } else {
            $(".offer_block[data-page="+index+"]").show();
        }
    });
}

function setEqualHeight(columns)
{
    var tallestcolumn = 0;
    columns.each(
        function()
        {
            currentHeight = $(this).height();
            if(currentHeight > tallestcolumn)
            {
                tallestcolumn = currentHeight;
            }
        }
    );
    columns.height(tallestcolumn);
}

function in_array(value, array) {
    for(var i=0; i<array.length; i++){
        if(value == array[i]) return true;
    }
    return false;
}


function array_key_exists(value, array) {
    for(i in array){
        if(value == i) return true;
    }
    return false;
}

function SetAttrUrlForSort(values){
    var res = '';
	var d = location.href.split("#")[0].split("?");
	var base = d[0];
	var query = d[1];
	if(query) {
		var params = query.split("&");
		for(var i = 0; i < params.length; i++) {
			var keyval = params[i].split("=");
            if (array_key_exists(keyval[0], values)) {
                res += keyval[0] + "=" + values[keyval[0]] + "&";
            } else {
                res += params[i] + "&";
            }
		}
	} else {
        for (i in values) {
            res += i + "=" + values[i] + "&";
        }
    }
    res = res.slice(0, -1);
	window.location.href = base + '?' + res;
	return false;
}
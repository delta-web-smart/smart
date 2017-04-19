$(function() {

    //Работа с табами: Новинки, Распродажа, Хит сезона, Просмотренные
    $(".top-category").customTabs({
        parent : ".top-category",
        child : ".catalog.tabs"
    });
        
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
	alert(message);
}

jQuery.fn.customTabs = function(options){
    $(options.child).hide();
    $(options.child).each(function(i) {
         if (i == 0) {
            $(this).show();
         }
         $(this).attr("data-index", i);   
    });
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
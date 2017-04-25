$(function() {

    //��� ajax-�������
    $(function() {
        $(document).on("change", ".filter input", function() {
            smartFilter.keyup(this);
        });
    });

    //��������� ���� ���� � ������ �������� ���������� ����������
    $('input.amount-min, input.amount-max').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

    //������������� �������� � ������� �����
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

    //���������� �� ����� "��� #�������� �������� ���������#" � ����� �������
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
    
    //������ � ������: �������, ����������, ��� ������, �������������
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
        
        //���������� ������� � ����� ������� ��� ���������� ������� ������ � �������
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
        
        //���������� ������� � ������� ������� ��� ��������� ���������� ������� � ������� �������
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
        
        //���������� ������� � ������� ������� ��� ��������� ���������� ������� � ������� ������� ��� ������� �� ���� � �����
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
        
        //���������� ������� � ������� ������� ��� �������� ������� ������ �� �������
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
        
        //������� ��� ���������� ������
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
        
        //������� ��� �������� ������
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
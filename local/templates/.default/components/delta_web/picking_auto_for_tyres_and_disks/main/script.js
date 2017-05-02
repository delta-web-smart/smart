$(function() {

    //Событие при выборе марки автомобиля
    $(document).on("change", "select[name=VENDOR]", function() {
    
        var vendorSelector = $("select[name=VENDOR]");
        var carSelector = $("select[name=CAR]");
        var yearSelector = $("select[name=YEAR]");
        var modificationSelector = $("select[name=MODIFICATION]");
        
        carSelector.attr("disabled", true).trigger('refresh');
        carSelector.closest(".option").addClass("disable");
        
        yearSelector.attr("disabled", true).trigger('refresh');
        yearSelector.closest(".option").addClass("disable");
        
        modificationSelector.attr("disabled", true).trigger('refresh');
        modificationSelector.closest(".option").addClass("disable");
        
        var vendor = $(this).val();
        var action = $(this).closest("form").attr("action");
        var dataValues = {
            "VENDOR" : vendor
        };
        BX.showWait();
        $.post(action, dataValues, function(data) {
            carSelector.closest(".option").removeClass("disable");
            carSelector.closest(".option").html(data);
            $(".select-style").styler();
            BX.closeWait();
        });
    });
    
    //Событие при выборе модели автомобиля
    $(document).on("change", "select[name=CAR]", function() {
        
        var vendorSelector = $("select[name=VENDOR]");
        var carSelector = $("select[name=CAR]");
        var yearSelector = $("select[name=YEAR]");
        var modificationSelector = $("select[name=MODIFICATION]");
        
        yearSelector.attr("disabled", true).trigger('refresh');
        yearSelector.closest(".option").addClass("disable");
        
        modificationSelector.attr("disabled", true).trigger('refresh');
        modificationSelector.closest(".option").addClass("disable");
    
        var car = $(this).val();
        var vendor = vendorSelector.val();
        var action = $(this).closest("form").attr("action");
        var dataValues = {
            "VENDOR" : vendor,
            "CAR" : car
        };
        BX.showWait();
        $.post(action, dataValues, function(data) {
            yearSelector.closest(".option").removeClass("disable");
            yearSelector.closest(".option").html(data);
            $(".select-style").styler();
            BX.closeWait();
        });
    });
    
    
    //Событие при выборе года автомобиля
    $(document).on("change", "select[name=YEAR]", function() {
    
        var vendorSelector = $("select[name=VENDOR]");
        var carSelector = $("select[name=CAR]");
        var yearSelector = $("select[name=YEAR]");
        var modificationSelector = $("select[name=MODIFICATION]");
        
        modificationSelector.attr("disabled", true).trigger('refresh');
        modificationSelector.closest(".option").addClass("disable");
    
        var car = carSelector.val();
        var vendor = vendorSelector.val();
        var year = $(this).val();
        var action = $(this).closest("form").attr("action");
        var dataValues = {
            "VENDOR" : vendor,
            "CAR" : car,
            "YEAR" : year
        };
        BX.showWait();
        $.post(action, dataValues, function(data) {
            modificationSelector.closest(".option").removeClass("disable");
            modificationSelector.closest(".option").html(data);
            $(".select-style").styler();
            BX.closeWait();
        });
    });
    
    $(document).on("click", "#picking_auto_button", function(e) {
        e.preventDefault();
    });
 
});
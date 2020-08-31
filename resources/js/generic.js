$(function(){
    
    // Select 2
    $(".cbo").css('width', '100%');
    $('.cbo').select2({
      placeholder:$(this).data("placeholder"),
      allowClear:$(this).data("allow-clear")
    });

    

});


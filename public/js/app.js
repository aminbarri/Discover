
$(".reserver").click(function() {
    var reservationDiv = $("#reservation");

    // Check if the display property is 'block'
    if (reservationDiv.css("display") === "block") {
        reservationDiv.css("display", "none");
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    } else {
        reservationDiv.show();
        $('html, body').animate({ scrollTop: $(document).height() }, 'slow');

    }
});
$('.bi-arrow-bar-left').click(function() {
    var clickBtn = $('.nav-list');
    
    clickBtn.css("width", "5%");
    $('.content-elemen').css("width", "95%");
    
 
        $('.bi-arrow-bar-left').hide();
        $('.bi-arrow-bar-right').show();
        $('.hide-text').hide();
    
});

$('.bi-arrow-bar-right').click(function() {
    var clickBtn = $('.nav-list');
    
    clickBtn.css("width", "20%");
    $('.content-elemen').css("width", "80%");
    
    
        $('.bi-arrow-bar-left').show();
        $('.bi-arrow-bar-right').hide();
        setTimeout(function() {
        $('.hide-text').css('display','');
    },500);
});

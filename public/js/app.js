
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



/*

// for left bar 

*/
 
$(document).ready(function() {
    if (localStorage.getItem('navCollapsed') === 'true') {
        collapseNav();
    } else {
        expandNav();
    }

    $('.bi-arrow-bar-left').click(function() {
        collapseNav();
        localStorage.setItem('navCollapsed', 'true');
    });

    $('.bi-arrow-bar-right').click(function() {
        expandNav();
        localStorage.setItem('navCollapsed', 'false');
    });

    function collapseNav() {
        $('.nav-list').css("width", "5%");
        $('.content-elemen').css("width", "95%");
        $('.bi-arrow-bar-left').hide();
        $('.bi-arrow-bar-right').show();
        $('.hide-text').hide();
    }

    function expandNav() {
        $('.nav-list').css("width", "20%");
        $('.content-elemen').css("width", "80%");
        $('.bi-arrow-bar-left').show();
        $('.bi-arrow-bar-right').hide();
        setTimeout(function() {
            $('.hide-text').show();
        }, 500);
    }
});




//for reservation page 

$(".encours").click(function(){
    $("#accepter").hide();
    $("#refuse").hide();
    $("#enours").show();
    $(".encours").css("background-color", "#73BBA3")
    $(".accepte").css("background-color", "#008000")
    $(".refuse").css("background-color", "#ff0000")

});
$(".accepte").click(function(){
    $("#enours").hide();
    $("#refuse").hide();
    $("#accepter").show();
    $(".accepte").css("background-color", "#73BBA3")
    $(".refuse").css("background-color", "#ff0000")
    $(".encours").css("background-color", "#a9a9a9")

});
$(".refuse").click(function(){
    $("#accepter").hide();
    $("#enours").hide();
    $("#refuse").show();
    $(".refuse").css("background-color", "#73BBA3")
    $(".encours").css("background-color", "#a9a9a9")
    $(".accepte").css("background-color", "#008000")
});
$(document).ready(function() {
    $(".collapsible").click(function() {
        $(".content").slideToggle(); // Toggle the content with slide effect
    });
});
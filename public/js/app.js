
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
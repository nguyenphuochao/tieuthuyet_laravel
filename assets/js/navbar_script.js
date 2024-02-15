$(document).ready(function () {
    // Handle the event when navbar-toggle is clicked
    $('.navbar-toggle-sidebar').click(function () {
        $('.sidebar-account').removeClass('active'); // Turn off sidebar-account if turning on
        $('.sidebar').toggleClass('active');
    });

    // Handle the event when the close button is clicked
    $('.sidebar-close').click(function () {
        $('.sidebar').removeClass('active');
    });

    // Handle the event when navbar-toggle-account is clicked
    $('.navbar-toggle-account').click(function () {
        $('.sidebar').removeClass('active'); // Turn off sidebar if turning on
        $('.sidebar-account').toggleClass('active');
    });

    // Handle the event when the close button is clicked
    $('.sidebar-account-close').click(function () {
        $('.sidebar-account').removeClass('active');
    });

    // Automatically handle show list of genres
    $('.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
    });
});
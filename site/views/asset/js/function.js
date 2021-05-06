$(document).ready(function () {
    $('#hover').hover(function () {
            // over
            $('#menu_hover').addClass('show');
        }, function () {
            // out
            $('#menu_hover').removeClass('show');
        }
    );
    // $('.nav-item').click(function (e) { 
    //     e.preventDefault();
    //     $('#click_menu').addClass('active');
    //     console.log('kkk');
    // });
    $('.nav-click').click(function(){
        $('.nav-click').parent().removeClass("active");
        $(this).parent().addClass("active");
    });    
});
$(document).ready(function(){
    $("#s-voting").click(function(){
        $(".notification-time").fadeIn();
    });
    $(".close").click(function(){
        $(".notification-time").fadeOut();
});

    $("#valid").click(function(){
        $(".notification-valid").fadeIn();
    });
    $(".close").click(function(){
        $(".notification-valid").fadeOut();
    });

    $("#enter-key").click(function(){
        $(".notification-key").fadeIn();
    });
    $(".close").click(function(){
        $(".notification-key").fadeOut();
    });
});
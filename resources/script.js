/**
 * Created by Juha on 30.3.2015.
 */



$(document).ready(function(){

    $("#index_h1").animate({left: '230px', opacity: '1'},1000);
    $("#input_url").fadeIn("slow",function(){
        $("#shorten_button").animate({top: '0px', opacity: '1'},1000);;
    });


});
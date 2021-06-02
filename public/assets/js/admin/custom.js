$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    
    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);

});

function readURL(input, ob_img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(ob_img)
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function addMessageExcute(error_ob, success, msg) {    
    var message = "";
    var type = "";
    if(success){
        type = "alert-success";
        message = "<strong>Success!</strong> " + msg;
    }else{
        type = "alert-danger";
        message = "<strong>Danger!</strong> " + msg;
    }
    var box = "<div class='alert " + type + " alert-dismissible fade show'></div>"
    
    var msg_box = $(box);
    $(msg_box).append("<button type='button' class='close' data-dismiss='alert'>&times;</button>");
    $(msg_box).append(message);
    $(error_ob).append(msg_box);          // Insert new elements after <img>
}


function addMessageExcute(error_ob, success, msg) {    
    var message = "";
    var type = "";
    if(success){
        type = "alert-success";
        message = "<strong>Success!</strong> " + msg;
    }else{
        type = "alert-danger";
        message = "<strong>Danger!</strong> " + msg;
    }
    var box = "<div class='alert " + type + " alert-dismissible fade show'></div>"
    
    var msg_box = $(box);
    $(msg_box).append("<button type='button' class='close' data-dismiss='alert'>&times;</button>");
    $(msg_box).append(message);
    $(error_ob).append(msg_box);          // Insert new elements after <img>
}

function showConfirm(msg, callback, html_append = ""){
    $('#confirmModal').modal('show'); 
    $("#confirmModal .modal-body").text(msg); 
    $("#confirmModal .modal-body").append(html_append); 
    $("#confirmModal #confirm").off("click.confirm" );
    if (typeof callback != 'function') { 
        callback = function(){};
    }
    
    $("#confirmModal #confirm").on("click.confirm", callback );
}
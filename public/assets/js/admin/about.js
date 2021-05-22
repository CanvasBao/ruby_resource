/*
Template Name: Admin
Author: bao-nh
File: js
*/
$(function () {
    $("#logoInput").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        if (!fileName || fileName.lenght === 0 ){
            $(this).siblings(".logo-file-name").addClass("selected").html("Chọn hình ảnh logo");
            $(".new-logo-img").hide();
            $(".old-logo-img").show();
            return;
        }
        $(this).siblings(".logo-file-name").addClass("selected").html(fileName);
        $(".old-logo-img").hide();
        $(".new-logo-img").show();
        readURL(this, '#update-form .new-logo-img');
    });
});



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

    
    
    // this is the id of the form
    $("#update-form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var id = $($(this).find('#banner-id')[0]).val();
        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);
        var msg_ob = $(form).find(".msg_show");

        var file = $("#update-form input[name='logo-img']")[0].files[0];
        if(file) { // append file if the file is not empty
            formData.append('file', file, file.name);
        }

        $.ajax({
            type: "POST",
            url: url+"/0",  
            dataType    : 'text',  
            cache       : false,
            contentType : false,
            processData : false,
            data: formData, 
            success: function(json)
            {
                var result = JSON.parse(json);
                if(result.status){
                    //addMessageExcute(msg_ob, true, "update thành công");
                    location.reload();
                }else{
                    //addMessageExcute(msg_ob, false, "update thất bại");
                }
            }
        });
    });
});



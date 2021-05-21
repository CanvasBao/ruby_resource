/*
Template Name: Admin
Author: bao-nh
File: js
*/
$(function () {
    $(".delete-banner").click(function(){
        var delete_ob = this;
        function callback() {

            var id = $(delete_ob).data("id");
            var token = $(delete_ob).data("token");
            var object = $(delete_ob).closest(".card-object");

            $("#confirmModal #confirm").off("click.confirm" );
            $.ajax(
            {
                url: "banner/"+id,
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function (json)
                {
                    if(json.status == true){
                        $(object).remove();
                        alert("Da delete");
                    }else{
                        alert("False");
                    }
                }
            });
        }
        $('#confirmModal').modal('show'); 
        $("#confirmModal .modal-body").text("Bạn có đồng ý xóa hay không?"); 
        $("#confirmModal #confirm").off("click.confirm" );
        $("#confirmModal #confirm").on("click.confirm", callback );
        var msg = "Bạn có đồng ý xóa hay không?";
        showConfirm(msg, callback);
    });

    $("#close-update").click(function(){
        var update_frame = $("#update-frame");
        $(update_frame).hide();

        $($(update_frame).find("#banner-id")).val('');
        $($(update_frame).find("#banner-title")).val('');
        $($(update_frame).find("#banner-content")).val('');

    }); 

    $(".link-banner").click(function(){
        var item = $(this).data("item");
        var update_frame = $("#update-frame");
        
        $($(update_frame).find("#banner-id")).val(item.id);
        $($(update_frame).find("#banner-title")).val(item.title);
        $($(update_frame).find("#banner-content")).val(item.content);
        var img = window.location.origin + '/' + item.img;
        $("#update-frame .card-img").attr('src', img);

        $(update_frame).show();
        $($(update_frame).find("#banner-title")).focus();
    }); 

    // this is the id of the form
    $("#create-form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);
        var msg_ob = $(form).find(".msg_show");

        var file = $("#create-form input[name='img-file']")[0].files[0];
        if(!file) { // returns false if the file is empty
            alert("no file selected");
            return;
        }
        formData.append('file', file, file.name);
        $.ajax({
            type: "POST",
            url: url,  
            dataType    : 'text',  
            cache       : false,
            contentType : false,
            processData : false,
            data: formData, 
            success: function(json)
            {
                var result = JSON.parse(json);
                if(result.status){
                    addMessageExcute(msg_ob, true, "tạo mới thành công");
                }else{
                    addMessageExcute(msg_ob, false, "tạo mới thất bại");
                }
            }
        });
    });

    
    // this is the id of the form
    $("#update-form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var id = $($(this).find('#banner-id')[0]).val();
        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);
        var msg_ob = $(form).find(".msg_show");

        var file = $("#update-form input[name='img-file']")[0].files[0];
        if(file) { // append file if the file is not empty
            formData.append('file', file, file.name);
        }

        $.ajax({
            type: "POST",
            url: url+"/"+id,  
            dataType    : 'text',  
            cache       : false,
            contentType : false,
            processData : false,
            data: formData, 
            success: function(json)
            {
                var result = JSON.parse(json);
                if(result.status){
                    addMessageExcute(msg_ob, true, "update thành công");
                }else{
                    addMessageExcute(msg_ob, false, "update thất bại");
                }
            }
        });
    });
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



/*
Template Name: Admin
Author: bao-nh
File: js
*/
$(function () {
    
    // this is the id of the form
    $("#product-form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var formData = new FormData(form[0]);

        var id = $($(this).find('#product-id')[0]).val();
        var url = form.attr('action');
        if(id) { // append file if the file is not empty
            url = url + "/" + id;
        }

        var msg_ob = $(form).find(".msg_show");

        var file = $("#product-form input[name='product_img']")[0].files[0];
        if(file) { // append file if the file is not empty
            formData.append('file', file, file.name);
        }

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
                    addMessageExcute(msg_ob, true, "update thành công");
                }else{
                    addMessageExcute(msg_ob, false, "update thất bại");
                }
            }
        });
    });

    $(".btn-delete").click(function(){
        var delete_ob = this;
        function callback() {

            var id = $(delete_ob).data("id");
            var token = $(delete_ob).data("token");
            var row = $(delete_ob).closest(".product-row");

            $("#confirmModal #confirm").off("click.confirm" );
            $.ajax(
            {
                url: "product/"+id,
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
                        $(row).remove();
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

    
    $("#imgInput").on("change", function() {
        var imgBox = $(this).closest('.img-select-box')[0];
         if(!imgBox) { // return if the imgBox is empty
            return;
        }
        var fileName = $(this).val().split("\\").pop();
        if (!fileName || fileName.lenght === 0 ){
            $(this).siblings(".img-file-name").addClass("selected").html("Chọn hình ảnh logo");
            $(imgBox).find(".new-img").hide();
            $(imgBox).find(".old-img").show();
            return;
        }
        $(this).siblings(".img-file-name").addClass("selected").html(fileName);
        $(imgBox).find(".old-img").hide();
        $(imgBox).find(".new-img").show();
        readURL(this, $(imgBox).find(".new-img"));
    });

    $("#addDetailImg").click(function(){
        let url = location.origin + "/admin/images-library/show-choose-img";
        newPopup(url);
    });
});




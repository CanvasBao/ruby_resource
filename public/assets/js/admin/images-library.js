
$(function () {
    var grid = new FileFolderGrid('img-grid-view', 'root', '0000', true);
    let id_selected = $("#folder_id_selected").val();
    grid.load(id_selected);

    
    $("#uploadBtn").click(function () {
        let url = location.origin + "/admin/file-upload/create";
        newPopup(url);
    }); 

    $("#createNewFolder").on("click.create",  function() {
        function callback() {
            $("#confirmModal #confirm").off("click.confirm" );
            let folder_name = $("#confirmModal .modal-body input[name='folder_name']").val();
            $.ajax({
                url: "images-library",
                type: 'POST',
                cache       : false,
                dataType: "JSON",
                data: {
                    "id": grid.folder_id,
                    "name": folder_name,
                    "_token": grid.token,
                },
                success: function (json)
                {
                    if(json.status == true){
                        grid.load(grid.folder_id);
                    }else{
                        alert("Load Fail");
                    }
                }
            });
        }
        $('#confirmModal').modal('show');
        $("#confirmModal #confirm").off("click.confirm" );
        $("#confirmModal #confirm").on("click.confirm", callback );
        let msg = grid.name + " > ";
        let html_append = "<input name='folder_name'></input>";
        showConfirm(msg, callback, html_append);
    });

    
    $("#deleteFile").on("click.delete",  function() {
        function callback() {
            $("#confirmModal #confirm").off("click.confirm" );
            $.ajax({
                url: "images-library/" + grid.folder_id,
                type: 'POST',
                cache       : false,
                dataType: "JSON",
                data: {
                    "folder_id": grid.folder_id,
                    "file_id": grid.getSelectedId(),
                    "_token": grid.token,
                    "_method": "DELETE",
                },
                success: function (json)
                {
                    if(json.status == true){
                        grid.load(grid.folder_id);
                    }else{
                        alert("Load Fail");
                    }
                }
            });
        }
        $('#confirmModal').modal('show');
        $("#confirmModal #confirm").off("click.confirm" );
        $("#confirmModal #confirm").on("click.confirm", callback );
        let html_append = "<div class=\"alert alert-danger\"><strong>Delete Image!</strong> Bạn chắc chắn muốn xóa các file đã chọn.</div>";
        showConfirm('', callback, html_append);
    });
});



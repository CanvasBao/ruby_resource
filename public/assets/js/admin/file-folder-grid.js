/*
Template Name: Admin
Author: bao-nh
File: js
*/

class FileFolderGrid {
    constructor(id, name, folder_id, choose_mode = false) {
        this.id = id;
        this.name = name;
        this.parent_id = folder_id;
        this.folder_id = folder_id;
        this.token = '';
        this.choose_mode = choose_mode;
        this.box = $("#"+this.id);
        $(this.box).append("<h3 class=\"box-title\"></h3>");
        this.createtopbar();
    }
    createtopbar(){
        $(this.box).append("<div class=\"box-top-bar\"></div>");
        let topBar = $(this.box).find(".box-top-bar");

        $(topBar).append("<a href=\"#\" class=\"back btn btn-outline-danger\"><i class=\"fas fas fa-backward\"></i> Quay Lại</a>");
        if(!this.choose_mode){
            $(topBar).append("<a href=\"#\" class=\"create btn btn-outline-danger\"><i class=\"fas fa-folder\"></i> Thêm mới</a>");
            $(topBar).append("<a href=\"#\" class=\"btn btn-outline-danger\"><i class=\"fas fa-font\"></i> Đối Tên</a>");
            $(topBar).append("<a href=\"#\" class=\"upload btn btn-outline-danger\"><i class=\"fas fa-upload\"></i> Upload File</a>");
        }

        let that = this;
        $($(this.box).find(".back.btn")).on("click.back-parent",  function() {
            if(that.folder_id == "0000"){
                alert("Thư mục gốc nên ko thể back");
                return;
            }
            that.load(that.parent_id); 
        });

        $($(this.box).find(".create.btn")).on("click.create",  function() {
            function callback() {
                $("#confirmModal #confirm").off("click.confirm" );
                let folder_name = $("#confirmModal .modal-body input[name='folder_name']").val();
                $.ajax({
                    url: "images-library",
                    type: 'POST',
                    cache       : false,
                    dataType: "JSON",
                    data: {
                        "id": that.folder_id,
                        "name": folder_name,
                        "_token": that.token,
                    },
                    success: function (json)
                    {
                        if(json.status == true){
                            that.load(that.folder_id);
                        }else{
                            alert("Load Fail");
                        }
                    }
                });
            }
            $('#confirmModal').modal('show');
            $("#confirmModal #confirm").off("click.confirm" );
            $("#confirmModal #confirm").on("click.confirm", callback );
            let msg = that.name + " > ";
            let html_append = "<input name='folder_name'></input>";
            showConfirm(msg, callback, html_append);
        });

        $($(this.box).find(".upload.btn")).click(function () {
            let url = location.origin + "/admin/file-upload/create";
            newPopup(url);
        }); 
        
    }
    render(folder_list = {}, file_list = {}){
        $(this.box).find("h3.box-title").text(this.name);
        $(this.box).find("div.row.box-content").remove();
        let content = $("<div class=\"row box-content\"></div>");

        // add folder card
        folder_list.forEach(element => {
            let new_card = $("<div class='card-object p-3 folder-box' data-id='"+element.id+"'><div class='card h-100 shadow rounded'></div></div>");
            let imgStr = "<span style=\"font-size: 65px; color: #fece00;\" ><i class=\"fas fa-folder-open\"></i><span>";
            let titleStr = "<div class=\"card-title\"><span>"+ element.name +"</span></div>";
    
            $($(new_card).find(".card")).append(imgStr, titleStr);
            $(content).append(new_card);
        });
        // add file card
        file_list.forEach(element => {
            let new_card = $("<div class='card-object p-3 file-box'><div class='card h-100 shadow rounded '></div></div>");
            let imgStr = "<img class=\"card-img-top\" src=\"" + location.origin + element.icon_path +"\">";
            let hidden_path = "<input type=\"hidden\" data-path=\"" + element.icon_path +"\">";
            let titleStr = "<div class=\"card-title\"><span>"+ element.name +"</span></div>";
           
            $($(new_card).find(".card")).append(imgStr, titleStr, hidden_path);
            $(content).append(new_card);
        });

        $(this.box).append(content);

        let that = this;
        $( $(that.box).find("div.row .folder-box")).off("click.showchild" );
        $( $(that.box).find("div.row .folder-box")).on("click.showchild",  function() { 
            let id = $(this).data("id");
            that.load(id); 
        });

        if(this.choose_mode){
            $( $(that.box).find("div.row .file-box .card")).on("click.select",  function() {
                if($(this).hasClass("selected")){
                    $(this).removeClass("selected");
                }else{
                    $(this).addClass("selected");
                }
            });
        }
    }
    getSelected(){ 
        let select_e = $(this.box).find("div.row .file-box .card.selected input");
        let seleted_path = $(select_e).map(function() {
            return $(this).data("path");
        }).get();
        return seleted_path.join(",");
    }
    load(folder_id = "0000") {
        this.folder_id = folder_id;
        let that = this;
        $.ajax({
            url: "/admin/images-library/" + this.folder_id,
            type: 'GET',
            dataType: "JSON",
            cache       : false,
            contentType : false,
            processData : false,
            data: {},
            success: function (json)
            {
                if(json.status == true){
                    that.token = json.token;
                    that.parent_id = json.parent_id;
                    that.name = json.show_path;
                    that.render(json.folder_list, json.file_list);
                }else{
                    alert("Load Fail");
                }
            }
        });
    }
}

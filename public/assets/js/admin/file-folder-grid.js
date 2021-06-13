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
        let that = this;
    }
    render(folder_list = {}, file_list = {}){
        $(this.box).find("h3.box-title").text(this.name);
        $(this.box).find("div.row.box-content").remove();
        let content = $("<div class=\"row box-content\"></div>");

        // add back to parent box  
        if(this.folder_id != '0000'){
            let back_card = $("<div class='card-object p-3 folder-box' data-id='"+this.parent_id+"'><div class='card h-100 shadow rounded'></div></div>");
            let imgStr = "<span style=\"font-size: 65px; color: #ced4da;\" ><i class=\"fas fa-backward\"></i><span>";
            let titleStr = "<div class=\"card-title\"><span>Quay về</span></div>";
            $($(back_card).find(".card")).append(imgStr, titleStr);
            $(content).append(back_card);
        }

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
            let imgStr = "<div class='h-75 p-1'><img class=\"card-img-bottom\" src=\"" + location.origin + element.icon_path +"\"></div>";
            let hidden_path = "<input type=\"hidden\"data-id=\"" + element.id +"\" data-path=\"" + element.icon_path +"\">";
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
    getSelectedId(){ 
        let select_e = $(this.box).find("div.row .file-box .card.selected input");
        let seleted_path = $(select_e).map(function() {
            return $(this).data("id");
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

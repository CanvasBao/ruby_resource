
$(function () {
    var grid = new FileFolderGrid('img-grid-view', 'root', '0000');
    let id_selected = $("#folder_id_selected").val();
    grid.load(id_selected);
});



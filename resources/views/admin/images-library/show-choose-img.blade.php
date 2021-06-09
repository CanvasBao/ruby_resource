<link href="{{ asset('assets/css/admin/images-library.css') }}" rel="stylesheet">

<input type="hidden" id="folder_id_selected" value={{$folder_id}} >
<div class="row">
    <div class="col-sm-12">
        <div id="img-grid-view" class="white-box"></div>
    </div>
</div>
<div class="button-group">
    <button id="confirmChoose" class="float-sm-right btn btn-success"><i class="fas fa-plus-square"></i> Thêm hình ảnh</button>
</div>
<script>
var grid;
$(function () {
    grid = new FileFolderGrid('img-grid-view', 'root', '0000', true);
    let id_selected = $("#folder_id_selected").val();
    grid.load(id_selected);
    $('#confirmChoose').click(function(){
        let img_select = grid.getSelected().split(",");
        img_select.forEach(element => {
            addDetailImg(element);
        });
        console.log(img_select);
        //addDetailImg(path)
    });
});
</script>

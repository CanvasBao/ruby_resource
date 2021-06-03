<html lang="en">
<head>
  <title>Laravel 7 Multiple File Upload Example</title>
</head>
<body>
<div class="modal-header">
    <h4 class="modal-title">File Upload</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <!-- Modal body -->
  <div class="modal-body">
<form id="upload" method="post" action="{{ route('file-upload.store') }}" enctype="multipart/form-data">
  <div class="msg_show">
  </div>
  @csrf
  <div class="clone hide">
    <div class="hdtuto control-group lst input-group" style="margin-bottom:10px">
      <input type="file" name="filenames[]" class="myfrm form-control">
      <div class="input-group-btn"> 
        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
      </div>
    </div>
  </div>

  <div class="file-upload-box"></div>

  <div class="input-group-btn" style="margin-top:10px"> 
    <button type="submit" class="btn btn-success" >Submit</button>
    <button class="add-new btn btn-success float-sm-right" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
  </div>
</form>
</div>
<!-- Modal footer -->
<div class="modal-footer">
</div>

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-new.btn").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".file-upload-box").append(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto.control-group.lst").remove();
      });

      
      // this is the id of the form
      $("#upload").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        let form = $(this);
        let url = form.attr('action');
        let formData = new FormData(form[0]);
        let msg_ob = $(form).find(".msg_show");
        
        let files = $("#upload input[name='filenames[]']");
        var i = 0, len = files.length, img, reader, file;

        for (; i < len; i++) {
          let file = files[i].files[0];
          if(!file) { // continue if the file is empty
            continue;
          }
          if (formData) {
            formData.append("files[]", file);
          }
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
                  $(".file-upload-box .input-group").remove();
                  addMessageExcute(msg_ob, true, "tạo mới thành công");
                }else{
                    addMessageExcute(msg_ob, false, "tạo mới thất bại");
                }
            }
        });
      });
    });
</script>

</body>
</html>
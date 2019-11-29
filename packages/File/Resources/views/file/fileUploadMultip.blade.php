<div class="form-group">
  <label>Hình khác</label>
  <div class="input_fields_wrap">
    <button class="add_field_button btn btn-success btn-xs" style="margin-bottom: 10px">Thêm Hình</button>
    @if($action == 'add')
      <div class="input-group" style="margin-bottom: 10px">
        <input type="text" class="form-control" name="{{ $nameFile }}" id="post_details" readonly=""/>
        <span class="input-group-addon green-style" onclick="BrowseDetail()" href="javascript:void(0)">
          <i class="fa fa-upload bigger-110"></i>
        </span>
      </div>
      <script type="text/javascript">
          function BrowseDetail() {
              var finder = new CKFinder();
              finder.selectActionFunction = SetFileDetail;
              finder.resourceType   = 'Images';
              finder.startupPath = "Images:/{{ $folder }}/";
              finder.popup();
          }
          function SetFileDetail(fileUrl) {
              document.getElementById('post_details').value = fileUrl;
          }
      </script>
    @endif
  </div>
  <script type="text/javascript">
    function BrowseImage(typeCkfinder) {
        var finder = new CKFinder();
        finder.selectActionData = typeCkfinder;
        finder.resourceType   = 'Images';
        finder.startupPath = "Images:/{{ $folder }}/";
        finder.selectActionFunction = function(fileUrl,data){
          document.getElementById(data["selectActionData"]).value = fileUrl;
        };
        finder.popup();
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
    x++; //text box increment
    var chuoi ="'post_image_"+x+"'";
    $(wrapper).append('<div class="input-group post-slide-input" style="margin-bottom: 10px"><input type="text" class="form-control" name="{{ $nameFile }}" id="post_image_'+x+'" readonly=""/><span class="input-group-addon green-style" onclick="BrowseImage('+chuoi+')" href="javascript:void(0)"><i class="fa fa-upload bigger-110"></i></span><a href="#" class="remove_field" style="float:left; line-height:34px; padding-left:20px; font-size:18px; color:#d10000"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></div>'); //add input box
    }
    });
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
      e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    });
  </script>
</div>
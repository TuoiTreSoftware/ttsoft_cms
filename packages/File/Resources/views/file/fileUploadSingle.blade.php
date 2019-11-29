<div class="form-group">
  <label class="">Hình</label>
  <div class="input-group">
    <input type="text" class="form-control" name="{{ $nameFile }}" id="{{ $idImage }}" value="{{ isset($old) ? $old :  old('image') }}" autocomplete="off" readonly=""/>
    <span class="input-group-addon green-style" onclick="{{ $f }}()" href="javascript:void(0)">
      <i class="fa fa-upload bigger-110"></i>
    </span>
  </div>
  <p style="margin-top: 5px;">
    @if(isset($old) && !empty($old))
      <img src="{{ $old }}" width="150px" style="border: solid 1px #CCC;">
    @endif
  </p>
</div>
<script type='text/javascript'>
  function {{ $f }}() {
      var finder = new CKFinder();
      finder.selectActionFunction = {{ $function }};
      finder.resourceType   = 'Images';
      finder.startupPath = 'Images:/{{ $folder }}/';
      finder.popup();
  }
  function {{ $function }}(fileUrl) {
    // fileUrl = fileUrl.replace('/public','');
    document.getElementById('{{ $idImage }}').value = fileUrl;
  }
</script>
@extends('backend.master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Website Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Website Settings</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<section class="content">
<form class="" action="{{url('addSettings')}}" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
    <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
    <p><img id="output" width="200" /></p>
  </div>
  <div class="form-group  col-md-6">
    <label>Título del Sitio</label>
    <input type="text" name="meta_title" class="form-control">
  </div>
  <div class="form-group  col-md-6">
    <label>Address</label>
    <input type="text" name="address" class="form-control">
  </div>
  <div class="form-group  col-md-6">
    <label>Número de Contacto</label>
    <input type="text" name="contact" class="form-control">
  </div>
  <div class="form-group  col-md-6">
    <label>Email</label>
    <input type="text" name="email" class="form-control">
  </div>
  <div class="form-group  col-md-6">
    <label>Social Profile Links</label>
  </div>
  <div id="socialGroup">
    <div class="form-group socialField  col-md-6">
      <input type="text" name="social[]" class="form-control ">
      <a href="#" class="btn btn-warning addField"><i class="fa fa-plus"></i></a>
    </div>
  </div>
  <div class="alert alert-danger" id="socialError">
    <strong>Sorry!</strong> Alcanzó el número máximo de redes sociales...
  </div>
  <div class="form-group">
    <button class="btn btn-success">Update</button>
  </div>
</form>
</section>

<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
  fieldCounter=1;
  $('.addField').click(function(){
  fieldCounter++;
  if(fieldCounter<=5){
    var newField = $(document.createElement('div')).attr('class','form-group');
    newField.after().html('<label>Social Profile Links</label><input type="text" name="social[]" class="form-control  col-md-6"></div>');
    newField.appendTo('#socialGroup');
  }else{
      $('#socialError').show();
  }
})
</script>
<style>
  .socialField{
    position: relative;
  }
  .addField{
    position: absolute;
    top: 0;
    right: 0;
  }
  #socialError{
    display: none;
  }
</style>

@stop

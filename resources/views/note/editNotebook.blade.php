@extends("layout")
@section("content")

<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title">Notebook</h4>
     
    </div>
    <form action="{{ route('updateNotebook') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($notebooks as $notebook)
    <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="hidden" class="form-control" name="notebookID" value="{{$notebook->id}}" readonly>
          <input type="text" name="notebookTitle"  class="form-control" value="{{$notebook->title}}"/>
        </div>

    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="{{ route('showNotebook') }}" >Back</a>
      <button type="submit" class="btn btn-secondary" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection
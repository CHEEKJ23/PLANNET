@extends("layout")
@section("content")
<head><meta name="viewport" content="width=device-width, initial-scale=1"></head>
<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:	#FDDA0D;">Medium Priority Task</h4>
     
    </div>
    <form action="{{ route('updateMediumTask') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($mediumTasks as $mediumTask)
    <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="hidden" class="form-control" name="mediumTaskID" value="{{$mediumTask->id}}" readonly>
          <input type="text" name="mediumName"  class="form-control" value="{{$mediumTask->title}}"/>
        </div>
        
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="mediumDes" class="form-control" value="{{$mediumTask->description}}"/>
          </div>

    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="/todolist" >Back</a>
      <button type="submit" class="btn btn-warning" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection
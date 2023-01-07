@extends("layout")
@section("content")

<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:green;">Low Priority Task</h4>
     
    </div>
    <form action="{{ route('updateLowTask') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($lowTasks as $lowTask)
    <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="hidden" class="form-control" name="lowTaskID" value="{{$lowTask->id}}" readonly>
          <input type="text" name="lowName"  class="form-control" value="{{$lowTask->title}}"/>
        </div>
        
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="lowDes" class="form-control" value="{{$lowTask->description}}" />
          </div>

    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="/todolist" >Back</a>
      <button type="submit" class="btn btn-success" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection
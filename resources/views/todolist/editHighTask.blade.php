@extends("layout")
@section("content")

<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:red;">High Priority Task</h4>
     
    </div>
    <form action="{{ route('updateHighTask') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($highTasks as $highTask)
    <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="hidden" class="form-control" name="highTaskID" value="{{$highTask->id}}" readonly>
          <input type="text" name="highName"  class="form-control" value="{{$highTask->title}}"/>
        </div>
        
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="highDes" class="form-control" value="{{$highTask->description}}" />
          </div>

    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="/todolist" >Back</a>
      <button type="submit" class="btn btn-danger" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection
@extends("layout")
@section("content")
<style>
  body {
            max-width: 100%;
            overflow-x: hidden;
        }
</style>
<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title">Profile</h4>
     
    </div>
    <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($users as $user)
    <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="hidden" class="form-control" name="userID" value="{{$user->id}}" readonly>
          <input type="text" name="Uname"  class="form-control" value="{{$user->name}}"/>
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="Uemail" class="form-control" value="{{$user->email}}" />
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" value="{{$user->image}}" />
        </div>

    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="/viewProfile" >Back</a>
      <button type="submit" class="btn btn-secondary" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection
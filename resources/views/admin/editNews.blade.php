@extends('layouts.admin')
@section('content')
<div class="row" style="margin-top:5%;">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title">News</h4>
     
    </div>
    <form action="{{ route('updateNews') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($news as $news)
    <div class="modal-body">
        <div class="form-group">
          <label>Title</label>
          <input type="hidden" class="form-control" name="newsID" id="" value="{{$news->id}}" readonly>
          <input type="text" name="nTitle" class="form-control" id="" value="{{$news->title}}"/>
        </div>
        
        <div class="form-group">
          <label>Content</label>
          <input type="text" name="nContent"  class="form-control" id="" value="{{$news->content}}" />
        </div>

        <div class="form-group">
            <label>File</label>
            <input type="file" name="image" class="form-control"/> 
          </div>
    @endforeach
    <div class="modal-footer">
        <a class="btn btn-secondary" href="{{ route('viewNews') }}" id="">Back</a>
        <button type="submit" class="btn btn-primary" href="">Save</button>
    </div>
    </div>
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <br>
            <h2>News List</h2>
            <br>
        </div>

        <div class="col-md-10 ">
            <br>
            <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#createNews-modal">Create News</button>
            <br>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" style="height:50px;width:1000px">
                    <button class="btn btn btn-outline-info" type="submit" style="height:50px;">Search </button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($news))
                        @foreach($news as $news)
                        <tr>
                            <td style="display:none;">{{$news->id}}</td>
                            <td scope="row">{{$news->title}}</td>
                            <td scope="row">{{$news->content}}</td>
                            <td scope="row"><img src="{{asset('images/') }}/{{$news->image}}" width="1500" height="1500" alt="" class="img-fluid"></td>
                            <td>
                                <a class="btn btn btn-outline-success" href="{{route('editNews',['id'=>$news->id])}}" style="font-size:14px;">Edit</a> <br> <br>
                                <a class="btn btn-outline-dark" href="{{route('deleteNews',['id'=>$news->id])}}" style="font-size:14px;" onClick="return confirm('Are you sure you want to delete this news?')"> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    @else   
                        <tr>
                            <th scope="row">--</th>
                            <td>--</td>
                            <td>--</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

  <div class="modal fade" id="createNews-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">News</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <form action="{{ route('addNews') }}" method="post" enctype="multipart/form-data"> @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="newsTitle"  class="form-control" required/>
            </div>
            
            <div class="form-group">
              <label>Content</label>
              <input type="text" name="newsContent"  class="form-control" required/>
            </div>

            <div class="form-group">
                <label>File</label>
                <input type="file" name="newsImage" class="form-control" /> 
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-success" href="">Save</button>
        </div>
      </form> 
      </div>
    </div>
@endsection


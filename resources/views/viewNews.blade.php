@extends('layout')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <style>
     
      
    </style>
</head>

<div class="row">
    <div class="col-md-6 text-center">
        <br>
        <h2>News List   <i class="fa-regular fa-newspaper"></i></h2>
        <br>
    </div>

    <div class="col-md-6 text-center">

    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="accordion" id="accordionExample">
            <div class="card">
                @if(count($news))
                @foreach($news as $news)
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn" data-toggle="collapse" href="#collapse{{$news->id}}" aria-expanded="true" aria-controls="collapseOne">
                    {{$news->title}} 
                  </button>
                </h5>
              </div>
          
              <div id="collapse{{$news->id}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    {{$news->content}} <br>
                    <img src="{{asset('images/') }}/{{$news->image}}" width="500" height="500" alt="" class="img-fluid">
                </div>
              </div>
              @endforeach
                    @else
                        <div class="text-center">No news Available</div>
                    @endif
            </div>
          </div>
    </div>
    <div class="col-md-2"></div>
</div>
<script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
@endsection
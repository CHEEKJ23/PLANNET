@extends('layout')
@section('content')

<head>
  <style>
    .header{
      margin-bottom: 7%;
    }

    /* .card{
      margin-top:-5%;
    } */
  </style>
</head>
<div class="row">
    <div class="col-md-6 text-center">
        <br>
        <h2></h2>
        <br>
    </div>

    <div class="col-md-6 text-center">

    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="accordion" id="accordionExample">
          <div class="header">
            @foreach($feedbacks as $feedback)
            <h3>My Feedback To Admin</h3>
            <hr>
            <h4>Subject: {{$feedback->subject}} </h4>
            
            <p> <strong>Message:</strong>  {{$feedback->message}}</p> 
            @endforeach
            <hr>
          </div>
                
          </div>

          <div class="accordion" id="accordionExample">
            <div class="card">
              <h3 class="text-center">Feedback Reply From Admin</h3>
                @if(count($replies))
                @foreach($replies as $reply)
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    Subject:{{ $reply->subject }} 
                </h5>
                <br>
                <p class="mb-0">
                  Message:{{ $reply->message }}
                </p>
              </div>
              @endforeach
              @else
              <div class="card-header text-center" id="headingOne">No reply from admin yet</div>
          @endif
            </div>
            
          </div>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection
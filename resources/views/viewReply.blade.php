@extends('layout')
@section('content')

<head>
  <style>
    .feedbackList{
      margin-top: -15%;
    }
  </style>
</head>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 mt-5 ml-5 text-center">
        <h1 class="modeLabel"><i class="fa-regular fa-paper-plane"></i> Feedback Sent</h1>
    </div>
    <div class="col-md-2">
        <img src="/images/sentmsg.png" width="250" height="250" style="margin-top:-5px; margin-left:255px;" alt="sent">
    </div>
  </div>

  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
      <div class="feedbackList">
        @if(count($feedbacks))
        @foreach($feedbacks as $feedback)
          <div class="list-group">
            <a href="{{route('viewReplyDetails',['id'=>$feedback->id])}}" class="list-group-item list-group-item-action">{{$feedback->subject}}</a>
          </div>
        @endforeach
      @else
        <div class="text-center ml-4">
          <h5>
            No feedback made
          </h5>
        </div>
        <img src="/images/lofi.png" width="250" height="250" style="margin-top: 5px; margin-left:255px;" alt="book">

      @endif
      </div>
      

    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection
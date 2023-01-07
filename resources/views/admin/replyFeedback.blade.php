@extends('layouts.admin')
@section('content')

<head>

</head>

<div class="row">
    <div class="col-md-6 text-center">
        <br>
        <h2>Feedback Reply</h2>
        <br>
    </div>

    <div class="col-md-6 text-center">

    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="accordion" id="accordionExample">
            <form action="{{ route('replyFeedback') }}" method="post" enctype="multipart/form-data"> @csrf
                @foreach($feedbacks as $feedback)
                <h3>Replying to...</h3>
                {{$feedback->subject}} <br>
                {{$feedback->message}}
                <div class="modal-body">
                    <div class="form-group">
                      <label>Subject</label>
                      <input type="hidden" class="form-control" name="feedbackID" id="feedbackID" value="{{$feedback->id}}" readonly>
                      <input type="text" name="rsubject"  class="form-control" required/>
                    </div>
                    
                    <div class="form-group">
                      <label>Message</label>
                      <input type="text" name="rmessage"  class="form-control" required/>
                    </div>
        
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                  <button type="submit" class="btn btn-success" href="" >Save</button>
                </div>
                </div>
                @endforeach
              </form>
          </div>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection
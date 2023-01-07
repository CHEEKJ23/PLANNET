@extends("layout")
@section("content")

<div class="row">
    <div class="col-sm-2">;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:#6083c4;">Event</h4>
     
    </div>
    <form action="{{ route('updateCountdownEvent') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($countDownEvents as $countDownEvent)
    <div class="modal-body">
        <div class="form-group">
          <label>Name:</label>
          <input type="hidden" class="form-control" name="countdownEventID" value="{{$countDownEvent->id}}" readonly>
          <input type="text" name="eventName"  class="form-control" value="{{$countDownEvent->name}}"/>
        </div>
        
        <div class="form-group">
            <label>Date:</label>
            <input type="datetime-local" name="eventDate" class="form-control" value="{{$countDownEvent->date}}" step="2"/>
        </div>

        <div>
        <label class="m-2">Background image(optional): </label>
        <input type="file" name="image" class="form-control"/> 
        </div>

    <div class="modal-footer">
      <a type="button" class="btn btn-default" href="/eventCountdown" >Back</a>
      <button type="submit" style="background-color:#6083c4; border:none; border-radius:4px;" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2"></div>
</div>
<script>
  var today = new Date().toISOString().slice(0, 16);

document.getElementsByName("eventDate")[0].min = today;
</script>
@endsection
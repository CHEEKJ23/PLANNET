@extends("layout")
@section("content")
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
<!-- font -->

    <style>
      body {
        padding: 0;
        margin: 0;
      }

      .header {
        padding: 40px;
        color: black;
        text-align: center;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
      }

      /* form */
      .dayDetails {
       display: flex;
       justify-content: center;
        margin-top: 10px;
      }

      .dayDetails label {
        float: left;
      }

      .dayDetails input {
      float: right;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 2px 8px;
      -webkit-transition: 0.5s;
      transition: 0.3s;
      outline: none;
    }

    .dayDetails input:focus {
      border: 1px solid #447ACB;
    }

    button {
      border: none solid;
      border-radius: 4px;
      padding: 4px 14px;
      text-align: center;
      font-size: 14px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .dayDetails .btnAdd {
      background-color: #6083c4;
      color: white;
      border: 2px solid #6083c4;
    }

    .dayDetails .btnAdd:hover {
      background-color: #7c94bf;
      color: black ;
    }

    /* event list */
    .lists{
      text-align: center;
      list-style: none;
      margin-left: 10%;
      margin-top:20px;
      margin-bottom: 20px;
      width: 300px;
      height: 170px;
      background: #bfd1f2;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      border-radius: 10px;
      position: relative;
      color: white;
      background-image: linear-gradient(rgba(139, 152, 176, 0.6), rgba(191, 209, 242))
    }

    .lists:hover {
      background: #c9d7f2;
    }

    .list1 img {
      opacity: 0.4;
      border-radius: 8px;
      filter: blur(2px);
      -webkit-filter: blur(2px);  
    }

    .eventTitle {
      position: absolute; /* let text in front of img */
      margin-left: 10%;
      text-align: center;
      margin-top: -50%;
      width: 80%;
      border-bottom: 1px solid rgba(255, 255, 255, 255);
    }

    .eventTitle h4{
      font-weight: 600;
      font-size: 25px;
    }
    
    .eventTitle p {
      font-weight: 400;
      font-size: 12px;
    }

    .eventLeft {
      position: absolute;
      margin-top: -23%;
      margin-left: -4 %;
      text-align: center;
      width: 100%;
    }

    .time {
      padding:2px;
      border-radius: 8px;
      font-size: 17px;
      color: black;
    }

    .list1 .button{
      position: absolute;
      margin-top: -55%;
      margin-left: 90%;
      display: none;
    }

    .list1:hover .button{
      display:block;
    }

    
    </style>
</head>

<div class="container-fluid">
  <form class="form-inline dayDetails" action="{{ route('addcountDownEvent') }}" method="post" enctype="multipart/form-data"> @csrf
        <label class="m-2">Name: </label>
        <input type="text" name="eventName"  class="form-control m-2" required/>
      
        <label class="m-2">Date: </label>
        <input type="datetime-local" name="eventDate" class="form-control m-2" step="2" required/>

        <div >
          <label class="m-2">Background image(optional): </label>
        </div>
      <div style="margin-top:25px; ">
        <div><input type="file" name="image" id="files" class="form-control m-2" /></div>
        <div style="margin-left:15px; font-size: 14px;"><label for="files">*Please insert 16:9 size</label></div>
      </div>
      
       
      
      <button class="btnAdd m-2" type="submit" >Add</button>
  </form>
    
  <div class="header">
    <h1>My Events</h1>
  </div>

  <div class="container-fluid">
    <div class="row">
      @if(count($countDownEvents))
        @foreach ($countDownEvents as $countDownEvent)
          <div class="lists">
            <div class="list1">
              <img src="{{asset('images/') }}/{{$countDownEvent->image}}" width="300" height="170" style="cursor:pointer;" class="rounded mx-auto d-block" onerror="this.style.display='none';" alt="">

              <div class="eventTitle"> 
                <h4>{{ $countDownEvent->name }}</h4>
                <p class="dayDate">{{ $countDownEvent->date }}</p>
              </div>
                
              <div class="eventLeft"> 
                <p>
                  <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($countDownEvent->date)->format('Y/m/d H:i:s') }}"></div>
                  <!-- <div class="clock" data-countdown={{ $countDownEvent->date }}></div>  -->
                </p>   
              </div>

              <div class="button">
                <a class="btnEvent" href="{{route('deleteCountdownEvent',['id'=>$countDownEvent->id])}}" onClick="return confirm('Are you sure you want to delete this event?')"><i class="fa-solid fa-trash-can"></i></a>
                <a class="btnEvent" href="{{route('editCountdownEvent',['id'=>$countDownEvent->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
              </div>
            </div><!-- list1 -->
          </div>
        @endforeach
      @else
        <div class="col-md-12">
          <p class="promptText">No events have been added.</p>
        </div>
      @endif
    </div><!-- row   -->
  </div><!-- container-fluid2 -->
</div><!-- container-fluid1 -->

<script src="{{asset('countdown.js')}}"></script>
<script>
  ;(function($) {
   var MERCADO_JS = {
     init: function(){
        this.mercado_countdown();
         
     }, 
   mercado_countdown: function() {
        if($(".mercado-countdown").length > 0 ) {
               $(".mercado-countdown").each( function(index, el){
                 var _this = $(this),
                 _expire = _this.data('expire');
              _this.countdown(_expire, function(event) {
                
                       $(this).html( event.strftime('<span class="time";><b>%D</b> Days</span> &nbsp; <span class="time";><b>%-H</b> Hrs</span> &nbsp; <span class="time";><b>%M</b> Mins</span> &nbsp; <span class="time";><b>%S</b> Secs</span>'));
                       
                   });
               });
        }else {
          $(this).html('The countdown is over!');
        }
     },
   
  }
   
     window.onload = function () {
        MERCADO_JS.init();
     }
     })(window.Zepto || window.jQuery, window, document);

     var today = new Date().toISOString().slice(0, 16);

      document.getElementsByName("eventDate")[0].min = today;
</script>

@endsection
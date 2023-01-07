@extends('layout')
@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f4f4f4;
            max-width: 100%;
            overflow-x: hidden;
        }

        #containerGoal{
            padding: 25px 5px;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* .form-check {
            margin: 30px;
        } */
       
        main {
            width: 90%;
            margin: auto;
            position: relative;
            padding-bottom: 1.5rem;
        }

        main h1 {
        font-size: 40px;
        font-weight: 700;
        color: #73204f;
        margin-left: 5px;
        }

        main ::-webkit-scrollbar {
        width: 15px;
        }
        main ::-webkit-scrollbar-track {
        background: lavenderblush;
        border-radius: 10px;
        }
        main ::-webkit-scrollbar-thumb {
        background: #f2a899;
        border: solid 2px lavenderblush;
        border-radius: 10px;
        }
        
        main ::-webkit-scrollbar-thumb:hover {
        background: #eba496;
        }

        /* .done {
        opacity: 0.6;
        }
        .done:hover {
        opacity: 1;
        }
        .done label {
        text-decoration: line-through;
        } */

        input {
        box-shadow: none;
        width: 85%;
        padding: 5px 18px;
        background: #fff;
        border: 2px solid #f2a899;
        font: 15px;
        border-radius: 10px;
        margin-bottom: 5px;
        outline-color: rgba(115, 32, 79, 0.4);
        }

        .addGoal {
            cursor: pointer;
            border: 0;
            border-radius: 3px;
            font-size: 20px;
            background: #e8c3d8;
            color: #73204f;
            transition: 0.3s;
        }

        .addGoal:hover {
            background-color: #b54785;
            color: #fff;
        }

        ul {
            list-style-type:none; 
            margin-left: 28px;
        }

        .goals{
            word-break: break-all; 
        }

        .goals li {
            cursor: pointer;
            transition: 0.2s;
            position: relative;
            user-select: none;
            height: auto;
        }
        
        .goals li i {
            color: #6C717B;
            font-size: 15px;
            cursor: pointer;
            padding: 0px 10px;
            justify-content: center;
            display:flex;
        }

        .goals li i:hover {
            color: black;
        }
        .carousel-inner{
            height: 100%;
        }

        #containerGoal .carousel-control-prev-icon {
            position: absolute;
            bottom: -25px;
            left: 5px;
            width: 13px;
            height: 13px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
        }
        
        #containerGoal .carousel-control-next-icon {
            position: absolute;
            bottom: -25px;
            right: 5px;
            width: 13px;
            height: 13px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23c593d8' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
        }


        
        /* notes */
        #notes {
            padding: 30px 60px ;
            background: #fff;
            border-radius: 7px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        #notes ::-webkit-scrollbar {
        width: 15px;
        }
        #notes ::-webkit-scrollbar-track {
        background: lavenderblush;
        border-radius: 10px;
        }
        #notes ::-webkit-scrollbar-thumb {
        background: #f2a899;
        border: solid 2px lavenderblush;
        border-radius: 10px;
        }
        
        #notes ::-webkit-scrollbar-thumb:hover {
        background: #eba496;
        }

        #notes .container h2 {
            float: left;
            margin-left: -10px;
            font-size: 40px;
            font-weight: 700;
            color: #73204f;
            opacity: 0.9;
        }

        #notes .container a {
            float: right;
            margin-top: 15px;
            
            color: #742c55;
        }

        #notes .container a:hover {
            color: #c376a2;
        }

        .card-title {
            word-break: break-all;
        }
        
        #table a{
            text-decoration:none; 
            color:black;
        }
        #notes .container button {
            float: right;
        background-color: #000;
        color: #fff;
        width: 80px;
        padding: 5px;
        border-radius: 2px;
        opacity: 0.9;
        }
        #notes .container button:hover {
        opacity: 0.75;
        }
        #notes .container-body {
        margin-top: 2rem;
        }
        #notes .container-body table {
        border-collapse: collapse;
        width: 100%;
        }
        #notes .container-body table td {
        text-align: left;
        padding: 8px;
        }
        #notes .container-body table tr {
        border-bottom: 1px solid #ddd;
        }
</style>
<!--FullCalendar's Stuff-->
    <!-- CSS for full calender -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<!-- JS for full calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
<!--FullCalendar's Stuff-->
{{-- sweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<div class="row">
    <div class="col-md-5">
        <div id="containerGoal" class="container-xs mt-5 mb-5" style="margin-left:90px;">
            <main>
                @if(Session::has('success'))

                <p class="alert
                {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('success') }}</p>
                
                @endif

                @if(Session::has('goal'))

                <p class="alert
                {{ Session::get('alert-class', 'alert-success') }}">{{Session::get('goal') }}</p>
                
                @endif

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        @if(count($goals))
                      <div class="carousel-item active" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                        <form action="{{route('clearJanGoal')}}"> @csrf
                            <div class="todoheader">
                              <h1>January Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                            </div>
                          </form>
                    <form action="{{route('addGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="name" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($goals))
                    @foreach ($goals as $goal) 
                        <section id="monthly-goals">
                            <div class="goals">
                                <ul id="goals">
                                    <li>
                                        <div class="row">
                                            <form action="{{route('addcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                                <input class="form-check-input " type="checkbox" onclick="this.form.submit()" {{ $goal ->done ? 'checked' : '' }}>
                                                <span class="box"></span>
                                                <input type="hidden" name="comGoalID" value="{{ $goal->id }}" readonly>
                                            </form>
                                            <div class="col-md-9">
                                                <span>{{$goal->name}}</span>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="{{route('deleteGoal',['id'=>$goal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>    
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif
                </div>
                @else
                <div class="carousel-item active" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                   
                        <div class="todoheader">
                          <h1>Januray Goal</h1>
                        </div>
                      
                <form action="{{route('addGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                    <input  id="new-goal" placeholder="Goals..." name="name" style="width: 80%;" required/>
                    <button type="submit" class="addGoal">Add</button>
                </form>
                @if(count($goals))
                @foreach ($goals as $goal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input " type="checkbox" onclick="this.form.submit()" {{ $goal ->done ? 'checked' : '' }}>
                                            <span class="box"></span>
                                            <input type="hidden" name="comGoalID" value="{{ $goal->id }}" readonly>
                                        </form>
                                        <div class="col-md-9">
                                            <span>{{$goal->name}}</span>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{route('deleteGoal',['id'=>$goal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>    
                @endforeach
                @else
                <div class="col-md-12">
                    <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                    <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                </div>
                @endif
            </div>
            @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($febgoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearFebGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>February Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addfebGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="febname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($febgoals))
                    @foreach ($febgoals as $febgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addfebcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $febgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comfebGoalID" value="{{ $febgoal->id }}" readonly>
                                        </form>
                                        <div class="col-md-9">
                                            <span>{{$febgoal->name}}</span>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{route('deletefebGoal',['id'=>$febgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach       
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif         
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                  
                        <div class="todoheader">
                          <h1>February Goal </h1>
                        </div>
                     
                    <form id="monthly-goals" action="{{route('addfebGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="febname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($febgoals))
                    @foreach ($febgoals as $febgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addfebcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $febgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comfebGoalID" value="{{ $febgoal->id }}" readonly>
                                        </form>
                                        <div class="col-md-9">
                                            <span>{{$febgoal->name}}</span>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{route('deletefebGoal',['id'=>$febgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach       
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif         
                </div>
                @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($margoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearMarGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>March Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addmarGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="marname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($margoals))
                    @foreach ($margoals as $margoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addmarcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $margoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="commarGoalID" value="{{ $margoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$margoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletemarGoal',['id'=>$margoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>

                                    </div>
                                        
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach             
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif   
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                        <div class="todoheader">
                          <h1>March Goal</h1>
                        </div>
                    <form id="monthly-goals" action="{{route('addmarGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="marname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($margoals))
                    @foreach ($margoals as $margoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addmarcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $margoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="commarGoalID" value="{{ $margoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$margoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletemarGoal',['id'=>$margoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>

                                    </div>
                                        
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach             
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif   
                </div>
                @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($aprilgoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearAprGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>April Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addaprilGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="aprilname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($aprilgoals))
                    @foreach ($aprilgoals as $aprilgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addaprilcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $aprilgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comapGoalID" value="{{ $aprilgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$aprilgoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deleteaprilGoal',['id'=>$aprilgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach       
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif         
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                        <div class="todoheader">
                          <h1>April Goal</h1>
                        </div>
                    <form id="monthly-goals" action="{{route('addaprilGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="aprilname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($aprilgoals))
                    @foreach ($aprilgoals as $aprilgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addaprilcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $aprilgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comapGoalID" value="{{ $aprilgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$aprilgoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deleteaprilGoal',['id'=>$aprilgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach       
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif         
                </div>
                @endif
           {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($maygoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearMayGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>May Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addmayGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="mayname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($maygoals))
                    @foreach ($maygoals as $maygoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addmaycomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $maygoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="commayGoalID" value="{{ $maygoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$maygoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletemayGoal',['id'=>$maygoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach  
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif

                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                   
                        <div class="todoheader">
                          <h1>May Goal </h1>
                        </div>
                  
                    <form id="monthly-goals" action="{{route('addmayGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="mayname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($maygoals))
                    @foreach ($maygoals as $maygoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addmaycomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $maygoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="commayGoalID" value="{{ $maygoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$maygoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletemayGoal',['id'=>$maygoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach  
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif

                </div>
                @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($junegoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearJuneGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>June Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addjuneGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="junename" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($junegoals))
                    @foreach ($junegoals as $junegoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addjunecomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $junegoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comjuneGoalID" value="{{ $junegoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$junegoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletejuneGoal',['id'=>$junegoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach   
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif             
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <div class="todoheader">
                        <h1>June Goals</h1>
                    </div>
                    <form id="monthly-goals" action="{{route('addjuneGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="junename" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($junegoals))
                    @foreach ($junegoals as $junegoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addjunecomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $junegoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comjuneGoalID" value="{{ $junegoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$junegoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletejuneGoal',['id'=>$junegoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach   
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif             
                </div>
                @endif

                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($julygoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearJulGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>July Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addjulyGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="julyname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($julygoals))
                    @foreach ($julygoals as $julygoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>  
                                    <div class="row">
                                        <form action="{{route('addjulycomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $julygoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comjulyGoalID" value="{{ $julygoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$julygoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deletejulyGoal',['id'=>$julygoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach  
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">                    
                    </div>
                    @endif              
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                   
                        <div class="todoheader">
                          <h1>July Goal</h1>
                        </div>
             
                    <form id="monthly-goals" action="{{route('addjulyGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="julyname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($julygoals))
                    @foreach ($julygoals as $julygoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>  
                                    <div class="row">
                                        <form action="{{route('addjulycomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $julygoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comjulyGoalID" value="{{ $julygoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$julygoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deletejulyGoal',['id'=>$julygoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach  
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">                    
                    </div>
                    @endif              
                </div>
                @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($augoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearAugGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>August Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addauGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="auname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($augoals))
                    @foreach ($augoals as $augoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                            
                                        <form action="{{route('addaucomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $augoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comauGoalID" value="{{ $augoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$augoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deleteauGoal',['id'=>$augoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach    
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif            
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <div>
                        <h1>August Goals</h1>
                    </div>
                    <form id="monthly-goals" action="{{route('addauGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="auname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($augoals))
                    @foreach ($augoals as $augoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                            
                                        <form action="{{route('addaucomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $augoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comauGoalID" value="{{ $augoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$augoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deleteauGoal',['id'=>$augoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach    
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif            
                </div>
                @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($sepgoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearSepGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>September Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addsepGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="sepname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($sepgoals))
                    @foreach ($sepgoals as $sepgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addsepcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $sepgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comsepGoalID" value="{{ $sepgoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$sepgoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deletesepGoal',['id'=>$sepgoal->id])}}"  class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach   
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <div>
                        <h1>September Goals</h1>
                    </div>
                    <form id="monthly-goals" action="{{route('addsepGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="sepname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($sepgoals))
                    @foreach ($sepgoals as $sepgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addsepcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $sepgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comsepGoalID" value="{{ $sepgoal->id }}" readonly>
                                        </form>

                                        <div class="col-md-9">
                                            <span>{{$sepgoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deletesepGoal',['id'=>$sepgoal->id])}}"  class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach   
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">
                    </div>
                    @endif
                </div>
                @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($ocgoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearOctGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>October Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addocGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="ocname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($ocgoals))
                    @foreach ($ocgoals as $ocgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addoccomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $ocgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comocGoalID" value="{{ $ocgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$ocgoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deleteocGoal',['id'=>$ocgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach     
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">                    
                    </div>
                    @endif           
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <div>
                        <h1>October Goals</h1>
                    </div>
                    <form id="monthly-goals" action="{{route('addocGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="ocname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($ocgoals))
                    @foreach ($ocgoals as $ocgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('addoccomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $ocgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comocGoalID" value="{{ $ocgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$ocgoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deleteocGoal',['id'=>$ocgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach     
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:2%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">                    
                    </div>
                    @endif           
                </div>
                @endif
                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($novgoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearNovgGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>November Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('addnovGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="novname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($novgoals))
                    @foreach ($novgoals as $novgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>                
                                    <div class="row">
                                        <form action="{{route('addnovcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $novgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comnovGoalID" value="{{ $novgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$novgoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deletenovGoal',['id'=>$novgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach         
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:20%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">                    
                    </div>
                    @endif       
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <div>
                        <h1>November Goals</h1>
                    </div>
                    <form id="monthly-goals" action="{{route('addnovGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="novname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($novgoals))
                    @foreach ($novgoals as $novgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>                
                                    <div class="row">
                                        <form action="{{route('addnovcomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $novgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comnovGoalID" value="{{ $novgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$novgoal->name}}</span>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <a href="{{route('deletenovGoal',['id'=>$novgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach         
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:20%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">                    
                    </div>
                    @endif       
                </div>
                @endif

                {{-- hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee --}}
                @if(count($decgoals))
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <form action="{{route('clearDecGoal')}}"> @csrf
                        <div class="todoheader">
                          <h1>December Goal <button type="submit" class="addGoal" id="" style="font-size: 15px; margin-left:25%;">Clear all</button></h1>
                        </div>
                      </form>
                    <form id="monthly-goals" action="{{route('adddecGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="decname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($decgoals))
                    @foreach ($decgoals as $decgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('adddeccomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $decgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comdecGoalID" value="{{ $decgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$decgoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletedecGoal',['id'=>$decgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach     
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:20%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">   
                    </div>
                    @endif           
                </div>
                @else
                <div class="carousel-item" style="overflow-x: hidden; overflow-y: auto;height:302px;">
                    <div>
                        <h1>December Goals</h1>
                    </div>
                    <form id="monthly-goals" action="{{route('adddecGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                        <input  id="new-goal" placeholder="Goals..." name="decname" style="width: 80%;" required/>
                        <button type="submit" class="addGoal">Add</button>
                    </form>
                    @if(count($decgoals))
                    @foreach ($decgoals as $decgoal) 
                    <section id="monthly-goals">
                        <div class="goals">
                            <ul id="goals">
                                <li>
                                    <div class="row">
                                        <form action="{{route('adddeccomGoal')}}" method="post" enctype="multipart/form-data"> @csrf
                                            <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $decgoal ->done ? 'checked' : '' }}>
                                            <input type="hidden" name="comdecGoalID" value="{{ $decgoal->id }}" readonly>
                                        </form>
                                        
                                        <div class="col-md-9">
                                            <span>{{$decgoal->name}}</span>
                                        </div>

                                        <div class="col-md-3">
                                            <a href="{{route('deletedecGoal',['id'=>$decgoal->id])}}" class="btn" onClick="return confirm('Are you sure you want to delete this goal?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    @endforeach     
                    @else
                    <div class="col-md-12">
                        <p style="margin-left:30%; margin-top:20%; color:rgb(154, 150, 150);">No goals in this month</p>
                        <img src="/images/Goal.png" width="200" height="200" style="margin-top:5%; margin-left:25%;" alt="Goal">   
                    </div>
                    @endif           
                </div>
                @endif
            </div>
            <a class="carousel-control" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span  class="carousel-control-prev-icon" aria-hidden="true" style="color:black"></span>
                    <span class="sr-only" >Previous</span>
                </a>
                <a class="carousel-control" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="color:black"></span>
                    <span class="sr-only">Next</span>
                </a>
          </div>

                <aside class="pointer">
                    <p></p>

                </aside>
            </main>


        </div>

        <div id="notes" class="container-xs mt-5 mb-5" style="margin-left:90px;overflow-x: hidden; overflow-y: auto;height:302px;">
            <div class="container">
                <div>
                    <h2>Notes</h2>
                    <a id="createNew" href="/notebook" style="text-decoration:none">View all</a>
                </div>
                
            </div>
            <div class="container-body">
                <table id="table">
                    <tbody>
                    @if(count($notebooks))
                    @foreach($notebooks as $notebook)
                        <tr>
                            <td class="card-title"><a href="{{route('openNote',['id'=>$notebook->id])}}">{{$notebook->title}}</a></td>
                        </tr>
                    @endforeach
                        @else 
                    <tr class="col-md-12">
                    <td class="promptText">No notebook added</td>
                    </tr>
                    @endif  
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <div class="col-md-7">
        <div class="shadow p-5 m-5 w-85" id="calendar">
        </div>
    </div>
    <!-- Start popup dialog box -->

    <div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Event</h4>

                
            </div>
            <div class="modal-body">
                <form name="save-event" method="post">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" id="title"/>
                    <span id="titleError" class="text-danger"></span> 
                    <br>
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" id="description" required></textarea>
                    <span id="titleError" class="text-danger"></span>
                    <br>
                    <label>Color</label>
                    <input type="color" name="color" class="form-control" style="width:100px;" id="color"/>
                    <span id="titleError" class="text-danger"></span>

                </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save">Save</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- End popup dialog box -->
{{-- <script src="{{asset('index.global.js')}}"></script> --}}
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.print.css" rel="stylesheet" media="print">
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js'></script>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/gcal.min.js'></script>
<script>
    
    $(document).ready(function () {
    
    
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        var events = @json($events);
        $('#calendar').fullCalendar({
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            // events: events,
            // eventSources: 
            //     { googleCalendarApiKey: 'AIzaSyCQHay821zBUOrlrhU6UeSb8T1JmVZiZcI',
            //     googleCalendarId: 'en.malaysia#holiday@group.v.calendar.google.com',
            //     className: 'fc-event-email'},
            googleCalendarApiKey: 'AIzaSyCQHay821zBUOrlrhU6UeSb8T1JmVZiZcI',
            events: events,
            eventSources: [
      {
        googleCalendarId: 'en.malaysia#holiday@group.v.calendar.google.com',
      },
      {
        googleCalendarId: 'karjun9717@gmail.com',
        className: 'fc-event-email'
      }
    ], 
            selectable:true,
            selectHelper: true,
            allDaySlot:false,
            displayEventTime: true, //remove that annoying 12a
            select: function(start, end , allDays, color) {
                $('#event-modal').modal('toggle');
                $('#save').click(function(){
                var title = $('#title').val();
                var description = $('#description').val();
                var color = $('#color').val();
                var start_date = moment(start).format('YYYY-MM-DD HH:mm');
                var end_date = moment(end).format('YYYY-MM-DD HH:mm');

                $.ajax({ //store event info to database
                    url:"{{ route('storeCalendar') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title, description, color, start_date, end_date },
                            success:function(response)
                            {
                                $('#event-modal').modal('hide');
                                $('#calendar').fullCalendar( 'renderEvent', {
                                    'title': response.title,
                                    'start': response.start_date,
                                    'backgroundColor':response.color,
                                    'end'  : response.end_date,
                                });
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Your event has been saved',
                                    showConfirmButton: false,
                                    timer: 1500
                                    });
                                    
                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                });
            });
        },
        editable:true, //make event movable
        eventDrop: function(event) {
            var id = event.id;
            var start_date = moment(event.start).format('YYYY-MM-DD HH:mm');
            var end_date = moment(event.end).format('YYYY-MM-DD HH:mm');  
            
            $.ajax({ //update event date location
                    url:"{{ route('updateCalendar', '') }}" +'/'+ id,
                    type:"PATCH",
                    dataType:'json',
                    data:{ start_date, end_date  },
                    success:function(response)
                    {
                        Swal.fire("Well Done!", "Event Updated!", "success");
                    },
                    error:function(error)
                    {
                        console.log(error)
                    },
                    });
        },
        eventClick: function(event) { // click event
            var id = event.id;
            var title = event.title;
            var des = event.description;
            Swal.fire({ //pop up SweetAlert to show description and delete button
                title: title,
                icon: 'info',
                html:'<p>'+des+'</p>',
                showCancelButton: true,
                confirmButtonText: 'DELETE',
                cancelButtonText: 'CLOSE',
                reverseButtons: true
            }).then((result)=>{ //delete function executed
                if (result.isConfirmed) {
                    $.ajax({
                    url:"{{ route('deleteCalendar', '') }}" +'/'+ id,
                    type:"DELETE",
                    dataType:'json',
                    success:function(response)
                    {
                        $('#calendar').fullCalendar('removeEvents',response);
                        Swal.fire("Well Done!", "Event Deleted!", "warning");
                    },
                    error:function(error)
                    {
                        console.log(error)
                    },
                });   
                } 
            });
            
        },
        
        });
        $("#event-modal").on("hidden.bs.modal", function () {
            $('#save').unbind();
        });

        $('.fc-event').css('font-size', '15px');
        $('.fc').css('background-color', '#FFF');
    });

    </script>
    <script>
        $(document).ready(function(){
            $('.alert-success').fadeIn().delay(2000).fadeOut();
              });
        </script>
@endsection
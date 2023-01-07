@extends('layout')
@section('content')

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;600&family=Fredoka+One&display=swap" rel="stylesheet">

<!-- font -->

<style>
body {
  margin: 0;
  min-width: 250px;
  
  /* font-family: 'Comfortaa', cursive;
  font-size: 13px; */
}

/* Include the padding and border in an element's total width and height */
* {
  box-sizing: border-box;
}

/* Style the header */
.todo {
  padding: 30px;
}

.header h1 {
  text-align: center;
  margin-bottom: 20px;
  font-family: 'Fredoka One', cursive;
}

/* Style priority title */
h3{
  text-align: center;
  color: #55555c;
  font-family: 'Comfortaa', cursive;
  font-weight: 600;
  padding: 10px;
}

/* Style the input */
.flex-container {
  display: flex;
  justify-content: center;
}
  
.flex-container > div {
  margin: 10px;
  text-align: center;
}

input[type='text'] {
  border: 1px solid #ddd; 
  transition: all ease-in 0.2s;
  font-size: 16px;
}

input:focus {
    outline: none;
    border: 1px solid #f25050;
}

/* Style the "Add" button */
.addBtn {
  margin-bottom: 5px;
  height: 35px;
  font-weight: bold; 
  cursor: pointer;
  border: 0;
  border-radius: 3px;
  font-size: 25px;
  background: #d9d9d9;
  color: #555;
  transition: 0.3s;
}

.addBtn:hover {
  /* background-color: #6664ff; */
  color: #fff;
}

.todoheader {
  display: flex;
  justify-content: center;
}

.todoheader h3, button{
  display: inline-block;
}

.todoheader h3 {
  position: absolute;
}

.clearbtn {
  font-size: 14px;
  margin-top: 15px;
  margin-left: 355px;
  height: 30px;
  font-weight: bold; 
  cursor: pointer;
  border: 0;
  border-radius: 3px;
  background: #d9d9d9;
  color: #555;
  transition: 0.3s;
}

/* all lists */
.list-group ul{
  margin: 0;
  cursor: pointer;
}

.list-group li  {
  list-style: none;
  background-color: white;
  box-shadow: 3px 10px 30px 0px rgba(218, 215, 206,0.8);
  margin:  5px 0;
  height: auto;
  width: 90%; 
}

.list-item {
  word-break: break-word; 
  margin-left: 15px;
  margin-top: 10px;
  /* width: 135px; */
}

.list-item h2 {
  text-align: left;
  font-size: 20px;
  font-weight: 700;
}

.list-item p {
  float: left;
  text-align: left;
  font-size: 15px;
  max-width: 100%;
  color: #999;
}

.list-button  {
  float: right;
  margin-right: 10px;
  margin-top: 10px;
  font-size: 18px;
  color: black;
}

.form-check-input {
    color: #AEB7C6;
    text-decoration: line-through;
  }

  input[type=checkbox]{
  font-size: 32px;
  color: black;
}

/* high priority */
.highInput{
  background-color: #eb847c;
}

.highGroup {
  background-color: #f7c2be;
}

.highGroup:hover {
  background-color: #f5d5d3;
}
 
.highLists {
  border-left: 4px solid #e45;
  border-right: 4px solid #e45;
}

#addHigh:hover {
  background-color: #de5454;
}

/* medium priority */
.mediumInput{
  background-color: #f7ca28;
}

.mediumGroup {
  background-color: #ffe791;
}

.mediumGroup:hover {
  background-color: #fcf2cc;
}

.mediumLists {
  border-left: 4px solid #f5b642;
  border-right: 4px solid #f5b642;
}

#addMedium:hover {
  background-color: #deae54;
}

/* low priority */
.lowInput{
  background-color: #90de71;
}

.lowGroup {
  background-color: #d2f7c3;
}

.lowGroup:hover {
  background-color:#e2f7da;
}

.lowLists {
  border-left: 4px solid #9ef542;
  border-right: 4px solid #9ef542;
}

#addLow:hover {
  background-color: #51c94f;
}

</style>

<title>Todo List</title>

</head>
@if (session('status'))
<div class="alert alert-success">
    <p class="msg text-center"> {{ session('status') }}</p>
</div>
@endif

@if (session('success'))
<div class="alert alert-primary">
    <p class="msg text-center"> {{ session('success') }}</p>
</div>
@endif
<div class="todo">
  <div class="header">
    <h1>My To Do List<img src="/images/Checklist.png" width="150" height="150" style="margin-top:-5px; margin-left:5px;" alt="todo"></h1>
  </div>
  
  <div class="row" style="font-family: 'Comfortaa', cursive;">
@if (count($highTasks))
    <div class="col-4" >
      <div class="highInput">
        <form action="{{route('clearAllHigh')}}">
          <div class="todoheader">
            <h3>High Priority</h3>
            <button type="submit" class="clearbtn" id="">clear all</button>
          </div>
          
        </form>
          <form action="{{route('addHighPriority')}}" method="post" enctype="multipart/form-data"> @csrf
            <div class="flex-container">
              <div>
                <input type="text" name="highTitle"  id="myInput" class="form-control"placeholder="Title">
              </div>
              <div>
                <input type="text" name="highDes"  id="myInput" class="form-control"placeholder="Description (Opt.)">
              </div>
              <div>
                <button type="submit" class="addBtn" id="addHigh">+</button>
              </div>
            </div>
          </form>
      </div>

      @foreach ($highTasks as $highTask)
      <div class="list-group highGroup" >
        <ul>
          <li class="highLists" >
            <div class="row" >
              <form action="{{route('tickHigh')}}" method="post" enctype="multipart/form-data"> @csrf
                <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $highTask ->done ? 'checked' : '' }}>
                <input type="hidden" name="highID" value="{{ $highTask->id }}" readonly>
              </form>
              <div class="col-md-9" >
                <div class="list-item" >
                  <h2>{{$highTask->title}}</h2>
                  <p>{{ $highTask->description }}</p>
                </div>
              </div>

              <div class="col-md-3">
                <div class="list-button">
                  <a href="{{route('editHighTask',['id'=>$highTask->id])}}" ><i class="fa-solid fa-pen-to-square"></i></a> &nbsp;
                  <a href="{{route('deleteHigh',['id'=>$highTask->id])}}" class="btnDel" onClick="return confirm('Are you sure you want to delete this task?')"><i class="fa-solid fa-trash-can"></i></a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      @endforeach
      


    </div>
    @else
    <div class="col-4" >
      <div class="highInput">
        <h3>High Priority</h3>
          <form action="{{route('addHighPriority')}}" method="post" enctype="multipart/form-data"> @csrf
            <div class="flex-container">
              <div>
                <input type="text" name="highTitle"  id="myInput" class="form-control"placeholder="Title">
              </div>
              <div>
                <input type="text" name="highDes"  id="myInput" class="form-control" placeholder="Description (Opt.)">
              </div>
              <div>
                <button type="submit" class="addBtn" id="addHigh">+</button>
              </div>
            </div>
          </form>
      </div>
      

      <!-- <span onclick="newElement()" class="addBtn">+</span> -->
      @if(count($highTasks))
        @foreach ($highTasks as $highTask)
        <div class="list-group highGroup" >
          <ul>
            <li class="highLists" >
              <div class="row" >
                <form action="{{route('tickHigh')}}" method="post" enctype="multipart/form-data"> @csrf
                  <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $highTask ->done ? 'checked' : '' }}>
                  <input type="hidden" name="highID" value="{{ $highTask->id }}" readonly>
                </form>
                <div class="col-md-9" >
                  <div class="list-item" >
                    <h2>{{$highTask->title}}</h2>
                    <p>{{ $highTask->description }}</p>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="list-button">
                    <a href="{{route('editHighTask',['id'=>$highTask->id])}}" ><i class="fa-solid fa-pen-to-square"></i></a> &nbsp;
                    <a href="{{route('deleteHigh',['id'=>$highTask->id])}}" class="btnDel" onClick="return confirm('Are you sure you want to delete this task?')"><i class="fa-solid fa-trash-can"></i></a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        @endforeach
      @else
        <div class="col-md-12">
          <p style="margin-left:35%; margin-top:20%; color:rgb(154, 150, 150);">No task added</p>
          <img src="/images/highP.png" width="200" height="200" style="margin-left:25%; margin-top:5%;" alt="Goal">
        </div>
      @endif

    </div>
    @endif


    @if (count($mediumTasks))
    <div class="col-4">
      
      <div class="mediumInput">
        <form action="{{route('clearAllMedium')}}">
          <div class="todoheader">
            <h3>Medium Priority</h3>
            <button type="submit" class="clearbtn" id="">clear all</button>
          </div>
          
        </form>
          <form action="{{route('addMediumPriority')}}" method="post" enctype="multipart/form-data"> @csrf
          <div class="flex-container">
            <div>
              <input type="text" name="mediumTitle"  id="myInput" class="form-control"placeholder="Title">
            </div>
            <div>
              <input type="text" name="mediumDes"  id="myInput" class="form-control"placeholder="Description (Opt.)">
            </div>
            <div>
              <button type="submit" class="addBtn" id="addMedium">+</button>
            </div>
          </div>
        </form>
      </div>
      

        @foreach ($mediumTasks as $mediumTask)
        <div class="list-group mediumGroup">
          <ul>
            <li class="mediumLists" type="checkbox">
              <div class="row">
                <form action="{{route('tickMedium')}}" method="post" enctype="multipart/form-data"> @csrf
                    <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $mediumTask ->done ? 'checked' : '' }}>
                    <input type="hidden" name="mediumID" value="{{ $mediumTask->id }}" readonly>
                </form>
                <div class="col-md-9">
                  <div class="list-item" style="overflow-x:auto;overflow-y:hidden">
                    <h2>{{$mediumTask->title}}</h2>
                    <p>{{ $mediumTask->description }}</p>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="list-button">
                    <a class="" id="" href="{{route('editMediumTask',['id'=>$mediumTask->id])}}" ><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                    <a href="{{route('deleteMedium',['id'=>$mediumTask->id])}}" class="btnDel" onClick="return confirm('Are you sure you want to delete this task?')"><i class="fa-solid fa-trash-can"></i></a>
                  </div>
                </div>

              </div>
              

              
            </li>
          </ul>
        </div>
        @endforeach
    </div>
    @else
    <div class="col-4">
      
      <div class="mediumInput">
        <h3>Medium Priority</h3>
          <form action="{{route('addMediumPriority')}}" method="post" enctype="multipart/form-data"> @csrf
          <div class="flex-container">
            <div>
              <input type="text" name="mediumTitle"  id="myInput" class="form-control"placeholder="Title">
            </div>
            <div>
              <input type="text" name="mediumDes"  id="myInput" class="form-control"placeholder="Description (Opt.)">
            </div>
            <div>
              <button type="submit" class="addBtn" id="addMedium">+</button>
            </div>
          </div>
        </form>
      </div>
      
      @if(count($mediumTasks))
        @foreach ($mediumTasks as $mediumTask)
        <div class="list-group mediumGroup">
          <ul>
            <li class="mediumLists" type="checkbox">
              <div class="row">
                <form action="{{route('tickMedium')}}" method="post" enctype="multipart/form-data"> @csrf
                    <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $mediumTask ->done ? 'checked' : '' }}>
                    <input type="hidden" name="mediumID" value="{{ $mediumTask->id }}" readonly>
                </form>
                <div class="col-md-9">
                  <div class="list-item" style="overflow-x:auto;overflow-y:hidden">
                    <h2>{{$mediumTask->title}}</h2>
                    <p>{{ $mediumTask->description }}</p>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="list-button">
                    <a class="" id="" href="{{route('editMediumTask',['id'=>$mediumTask->id])}}" ><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                    <a href="{{route('deleteMedium',['id'=>$mediumTask->id])}}" class="btnDel" onClick="return confirm('Are you sure you want to delete this task?')"><i class="fa-solid fa-trash-can"></i></a>
                  </div>
                </div>

              </div>
              

              
            </li>
          </ul>
        </div>
        @endforeach
        @else
        <div class="col-md-12">
          <p style="margin-left:35%; margin-top:20%; color:rgb(154, 150, 150);">No task added</p>
          <img src="/images/midP.png" width="200" height="200" style="margin-left:25%; margin-top:5%;" alt="Goal">
        </div>
      @endif
    </div>
    @endif

    @if (count($lowTasks))
      
   
    <div class="col-4">
      <div class="lowInput">
        <form action="{{route('clearAllLow')}}">
          <div class="todoheader">
            <h3>Low Priority</h3>
            <button type="submit" class="clearbtn" id="">clear all</button>
          </div>
          
        </form>
          <form action="{{route('addLowPriority')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="flex-container">
              <div>
                <input type="text" name="lowTitle"  id="myInput" class="form-control"placeholder="Title">
              </div>
              <div>
                <input type="text" name="lowDes"  id="myInput" class="form-control"placeholder="Description (Opt.)">
              </div>
              <div>
                <button type="submit" class="addBtn" id="addLow">+</button>
              </div>
            </div>
          </form>
      </div>
      
        
        @foreach ($lowTasks as $lowTask)
        <div class="list-group lowGroup">
          <ul>
            <li class="lowLists">
              <div class="row">
                <form action="{{route('tickLow')}}" method="post" enctype="multipart/form-data"> @csrf
                  <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $lowTask ->done ? 'checked' : '' }}>
                  <input type="hidden" name="lowID" value="{{ $lowTask->id }}" readonly>
                </form>
                <div class="col-md-9">
                  <div class="list-item">
                    <h2>{{$lowTask->title}}</h2>
                    <p>{{ $lowTask->description }}</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="list-button">
                    <a class="" id="" href="{{route('editLowTask',['id'=>$lowTask->id])}}" ><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                    <a href="{{route('deleteLow',['id'=>$lowTask->id])}}" class="btnDel" onClick="return confirm('Are you sure you want to delete this task?')"><i class="fa-solid fa-trash-can"></i></a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        @endforeach
     
      <!-- <span onclick="newElement()" class="addBtn">+</span> -->
            
    </div>
    @else
    <div class="col-4">
      <div class="lowInput">
        <h3>Low Priority</h3>
          <form action="{{route('addLowPriority')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="flex-container">
              <div>
                <input type="text" name="lowTitle"  id="myInput" class="form-control"placeholder="Title">
              </div>
              <div>
                <input type="text" name="lowDes"  id="myInput" class="form-control"placeholder="Description (Opt.)">
              </div>
              <div>
                <button type="submit" class="addBtn" id="addLow">+</button>
              </div>
            </div>
          </form>
      </div>
      
      @if(count($lowTasks))
        @foreach ($lowTasks as $lowTask)
        <div class="list-group lowGroup">
          <ul>
            <li class="lowLists">
              <div class="row">
                <form action="{{route('tickLow')}}" method="post" enctype="multipart/form-data"> @csrf
                  <input class="form-check-input" type="checkbox" onclick="this.form.submit()" {{ $lowTask ->done ? 'checked' : '' }}>
                  <input type="hidden" name="lowID" value="{{ $lowTask->id }}" readonly>
                </form>
                <div class="col-md-9">
                  <div class="list-item">
                    <h2>{{$lowTask->title}}</h2>
                    <p>{{ $lowTask->description }}</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="list-button">
                    <a class="" id="" href="{{route('editLowTask',['id'=>$lowTask->id])}}" ><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;
                    <a href="{{route('deleteLow',['id'=>$lowTask->id])}}" class="btnDel" onClick="return confirm('Are you sure you want to delete this task?')"><i class="fa-solid fa-trash-can"></i></a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        @endforeach
        @else
        <div class="col-md-12">
          <p style="margin-left:35%; margin-top:20%; color:rgb(154, 150, 150);">No task added</p>
          <img src="/images/lowP.png" width="200" height="200" style="margin-left:25%; margin-top:5%;" alt="Goal">
        </div>
      @endif
      <!-- <span onclick="newElement()" class="addBtn">+</span> -->
            
    </div>
    @endif
  </div>

</div>


<script>
  $(document).ready(function(){
      $('.alert-success').fadeIn().delay(5000).fadeOut();
        });
  </script>
  <script>
    $(document).ready(function(){
        $('.alert-primary').fadeIn().delay(5000).fadeOut();
          });
    </script>
@endsection
@extends('layout')
@section('content')

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet'>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <style>
    body {
      padding: 0;
      margin: 0;
    }

    h1 {
      padding: 0;
      margin: 0;
    }

    .title h1 {
      font-size: 28px;
    }

    .header {
      margin-bottom: 8%;
    }

    .balance-container {
      display: flex;
      flex-direction: column;
    }

    #balanceNow{
      margin-top: 40px;
      font-size: 28px;
    }

    .balance {
      letter-spacing: 1px;
      margin: 0;
      color:#1855f0;
      font-size: 38px;
      margin-bottom: 40px;

    }

    h2,
    h4 {
      margin: 0;
      font-size: 25px;
      text-transform: uppercase;
      display: inline;
    }

    .inc-exp-container {
      border: 1px solid;
      border-radius: 5px;
      padding: 15px;
      box-shadow: 5px 10px 8px #888888;
      background-color: #fff;
      width: 600px;
      display: flex;
      justify-content: space-between;
      margin: auto;
    }

    .inc-exp-container div {
      flex: 1;
    }

    .inc-exp-container > div:first-of-type {
      border-right: 1px solid ;
    }

    .money {
      font-size: 20px;
      letter-spacing: 1px;
      margin: 5px 0;
    }

    #money-plus {
      color: #66E662 ;
      font-size: 25px;
    }

    #money-minus {
      color: red;
      font-size: 25px;

    }

    button {
      border: none solid;
      border-radius: 4px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .plus {
      margin-left:10px;
      background-color: white;
      border: 2px solid #ccc;
      border-radius: 5px;
      -webkit-transition: 0.5s;
      transition: 0.5s;
    }

    .plus:hover {
      color: #66E662 ;
      border: 2px solid #66E662;
    }

    .minus {
      margin-left:10px;
      width: 24px;
      background-color: white;
      border: 2px solid #ccc;
      border-radius: 5px;
      -webkit-transition: 0.5s;
      transition: 0.5s;
    }

    .minus:hover {
      background-color: white;
      color: red ;
      border: 2px solid red;
    }

    .money-detail {
      margin-top:45px;
    }

    /* modalplus */
    #moneyPlus-modal h4 {
      color: #66E662;
    }

    /* modalMinus */
    #moneyMinus-modal h4 {
      color: red;
    }
    
    .form-group label {
      display: inline;
      float: left;
      margin: 10px;
    }

    /* history */
    h3 {
      width: 100%;
      border-bottom: 1px solid #ccc;
      padding-bottom: 10px;
      margin: 60px 0 10px;
      text-align: center;
    }

    #income-history {
      color: #66E662;
    }

    #expense-history {
      color: red;
    }

    /* list expense */
    .explist-group ul{
      margin: 0;
      cursor: pointer;
    }

    .explist-group li  {
      list-style: none;
      background-color: white;
      box-shadow: 3px 10px 30px 0px rgba(218, 215, 206,0.8);
      margin:  5px 0;
      height: auto;
      width: 90%; 
      border-left: 6px solid #e45;
    }

    .expctgr-list, .name-list h4, .name-list p {
      word-break: break-word; 
      float: left;
      text-align: left; 
      margin-top: 10px;
    }

    .expctgr-list {
      margin-left: 10px;
    }

    .expctgr-list h4{
      font-size: 15px;
      font-weight: 600;
      color: #e45;
    }

    .expctgr-list p {
      color: #b5b5b5;
      font-size: 12px;
    }

    .name-list h4{
      font-size: 24px;
    }

    .name-list p{
      font-size: 14px;
      color: #999;
    }

    /* list income*/
    .inlist-group ul{
      margin: 0;
      cursor: pointer;
    }

    .inlist-group li  {
      list-style: none;
      background-color: white;
      box-shadow: 3px 10px 30px 0px rgba(218, 215, 206,0.8);
      margin:  5px 0;
      height: auto;
      width: 90%; 
      border-left: 6px solid #66E662;
    }

    .inctgr-list, .name-list h4, .name-list p {
      word-break: break-word; 
      float: left;
      text-align: left; 
      margin-top: 10px;
    }

    .inctgr-list {
      margin-left: 10px;
    }

    .inctgr-list h4{
      font-size: 15px;
      font-weight: 600;
      color: #66E662;
    }

    .inctgr-list p {
      color: #b5b5b5;
      font-size: 12px;
    }

    .name-list {
      margin-left: -10px;
    }

    .name-list h4{
      font-size: 20px;
      margin-top: 8%;

    }

    .name-list p{
      font-size: 14px;
      color: #999;
    }

    .inmoney-amount > .inmAmount {
      font-size: 20px;
      font-weight: 500;        
      margin-top: 20%;
      margin-left: 20px;
    }

    .inmoney-amount > .inmAmount > p {
      text-align: right;
      color: #66E662;
    }

    .historyLists {
      position: relative;
      display: inline-block;
    }

    .historyLists .name-list p{
      display: none;
    }

    .historyLists:hover .name-list p{
      display: block;
    }

    .historyLists .list-button{
      display: none;
      width: 150px;
      font-size: 16px;
      text-align: left;
      border-radius: 6px;
    }

    .historyLists:hover .list-button {
      display:block;
    }

    .money-amount > .mAmount {
      font-size: 20px;
      font-weight: 500;  
      margin-top: 20%;
      margin-left: 20px;
    }
    .money-amount > .mAmount > p {
      text-align: right;
      color: #e45;
    } 

    /* list button */
    .income-list {
      position: relative;
      display: inline-block;
    }

    .income-list .list-button{
      display: none;
      width: 150px;
      font-size: 20px;
      text-align: center;
      border-radius: 6px;
    }

    .income-list:hover .list-button {
      display:block;
    }
  </style>

  <script>
    // display img
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
    }
  </script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
  function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
  }
  
  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
  }
  </script>
</head>
      <!-- Sidebar -->
      <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
        <a href="{{ route('dailyExpenses1') }}" class="w3-bar-item w3-button">January</a>
        <a href="{{ route('dailyExpenses3') }}" class="w3-bar-item w3-button">March</a>
        <a href="{{ route('dailyExpenses4') }}" class="w3-bar-item w3-button">April</a>
        <a href="{{ route('dailyExpenses5') }}" class="w3-bar-item w3-button">May</a>
        <a href="{{ route('dailyExpenses6') }}" class="w3-bar-item w3-button">June</a>
        <a href="{{ route('dailyExpenses7') }}" class="w3-bar-item w3-button">July</a>
        <a href="{{ route('dailyExpenses8') }}" class="w3-bar-item w3-button">August</a>
        <a href="{{ route('dailyExpenses9') }}" class="w3-bar-item w3-button">September</a>
        <a href="{{ route('dailyExpenses10') }}" class="w3-bar-item w3-button">October</a>
        <a href="{{ route('dailyExpenses11') }}" class="w3-bar-item w3-button">November</a>
        <a href="{{ route('dailyExpenses12') }}" class="w3-bar-item w3-button">December</a>
      </div>

<div class="">
  <div class="w3-container">
    <div class="row">
      <div class=""><button class="w3-button w3-xlarge" onclick="w3_open()">☰</button></div>
      <div class="title"><h1>Daily Expense & Income</h1>
        <p>Record your daily expenses and incomes.</p> <h2>February</h2> </div></div>
    </div>
    <img src="/images/moneyinout.png" width="300" height="300" style="position: absolute; top: 65px; right: 16px; font-size: 18px;" alt="todo">
      <img src="/images/savemoney.png" width="300" height="300" style="position: absolute; top: 205px; left: 16px; font-size: 18px;" alt="todo">
</div>


<div class="text-center" style="font-family: 'Signika'";>

  <div class="header">
    <div class="balance-container">
      <h2 id="balanceNow">Balance now</h2> 
      <h2 class="balance" >
        <?php $sumPlus= 0 ?>
        @foreach ($incomes as $income)
        <div hidden> {{ $income->amount }} </div>
          <?php $sumPlus += $income->amount ?>
        @endforeach

        <?php $sumMinus= 0 ?>
        @foreach ($expenses as $expense)
        <div hidden> {{ $expense->amount }} </div>
          <?php $sumMinus += $expense->amount ?>
        @endforeach
        
        <?php $sumsum = $sumPlus - $sumMinus ?>
        RM{{ $sumsum }}
      </h2>
    </div><br>
  

    <div class="inc-exp-container">
      <div>
        <h4>Income</h4>
        <button class="plus" data-toggle="modal" data-target="#moneyPlus-modal">+</button>
        <p>
          <?php $sumPlus= 0 ?>
          @foreach ($incomes as $income)
          <div hidden> {{ $income->amount }} </div>
            <?php $sumPlus += $income->amount ?>
          @endforeach
          <div id="money-plus" class="money">
          +RM{{ $sumPlus }}
          </div>
        </p>
      </div>

      <div>
        <h4>Expenses</h4><button class="minus" data-toggle="modal" data-target="#moneyMinus-modal">-</button>
        <p>
          <?php $sumMinus= 0 ?>
          @foreach ($expenses as $expense)
          <div hidden> {{ $expense->amount }} </div>
            <?php $sumMinus += $expense->amount ?>
          @endforeach
          <div id="money-minus" class="money">
          -RM{{ $sumMinus }}
          </div>
        </p>
      </div>

    </div>
  </div>
  <!-- modalPlus -->
  <div class="modal fade" id="moneyPlus-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">INCOME</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <form action="{{ route('addfebIncomes') }}" method="post" enctype="multipart/form-data"> @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="Inname"  class="form-control" required/>
            </div>
            
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="Indescription"  class="form-control" />
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Amount</label>
                  <input type="text" name="Inamount"  class="form-control" required/>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="Indate" class="form-control" max="2022-02-28" min="2022-02-01" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" name="Incategory" class="form-control" required/>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>File</label>
                  <input type="file" name="image" class="form-control"/> 
                </div>
              </div>
            </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-success" href="" >Save</button>
        </div>
        </div>
      </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modalPlus -->

  <!-- modalMinus -->
  <div class="modal fade" id="moneyMinus-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">EXPENSE</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <form action="{{ route('addfebExpenses') }}" method="post" enctype="multipart/form-data"> @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="Exname"  class="form-control" required/>
            </div>
            
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="Exdescription"  class="form-control" />
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Amount</label>
                  <input type="text" name="Examount"  class="form-control" step="any" required/>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="Exdate" class="form-control" max="2022-02-28" min="2022-02-01" required/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" name="Excategory" class="form-control" required/>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>File</label>
                  <input type="file" name="image" class="form-control"/> 
                </div>
              </div>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
          <button type="submit" class="btn btn-danger" href="">Save</button>
        </div>
      </form> 
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modalMinus -->
    
  <div class="row">
    <!-- income history -->
    <div class="col-md-6">
      <h3 id="income-history">Income</h3>

      @if(count($incomes))
      @foreach ($incomes as $income)
      <div class="inlist-group" >
        <ul>
          <li class="historyLists" >
            <div class="row" >
              
              <div class="col-md-3">
                <div class="inctgr-list">
                  <h4>{{$income->category}}</h4>
                  <p>{{$income->date}}</p>
                </div>
              </div>

              <div class="col-md-4" >
                <div class="name-list" >
                  <div class="row"><h4>{{$income->name}}</h4> </div>
                  
                  <div class="row"><p>{{ $income->description }}</p></div>
                  
                </div>
              </div>

              <div class="col-md-2 money-image">
                <img src="{{asset('images/') }}/{{$income->image}}" width="100" height="40" style="cursor:pointer; margin-top:9px;" alt="image" onclick="onClick(this)" class="rounded mx-auto d-block">
              </div>

              <!-- images pop -->
              <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img id="img01" style="width:50%">
                </div>
              </div>

              <div class="col-md-2 inmoney-amount">
                <div class="inmAmount">
                  <p>{{$income->amount}}</p> 
                </div>    
              </div>

              <div class="col-md-1 list-button">
                <a href="{{route('deletefebInc',['id'=>$income->id])}}" id="btn-delete" onClick="return confirm('Are you sure you want to delete this income?')"><i class="fa-solid fa-trash-can"></i></a> <br>
                <a href="{{route('editfebIncome',['id'=>$income->id])}}" id="btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>
              </div>
            </div>
          </li>
        </ul>
      </div>
      @endforeach

      @else 
        <div class="col-md-12">
          <p class="promptText">Nothing Here. Add some incomes.</p>
          <img src="/images/add inc.png" width="250" height="250"  alt="add">
        </div>
      @endif 
    </div>

    <!-- expense history -->
    <div class="col-md-6">
      <h3 id="expense-history">Expense</h3>

      @if(count($expenses))
      @foreach ($expenses as $expense)
      <div class="explist-group">
        <ul>
        <li class="historyLists">
            <div class="row" >
              <div class="col-md-3">
                <div class="expctgr-list">
                  <h4>{{$expense->category}}</h4>
                  <p>{{$expense->date}}</p>
                </div>
              </div>

            <div class="col-md-4">
              <div class="name-list">
                <div class="row"><h4>{{$expense->name}}</h4></div>

                <div class="row"><p>{{$expense->description}}</p></div>
                
              </div>
                
            </div>

            <div class="col-md-2 money-image">
              <img src="{{asset('images/') }}/{{$expense->image}}" width="100" height="40" style="cursor:pointer; margin-top:9px;" alt="" onclick="onClick(this)" class="rounded mx-auto d-block">
            </div>

              <!-- images pop -->
              <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
                <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                <div class="w3-modal-content w3-animate-zoom">
                  <img id="img01" style="width:50%">
                </div>
              </div>

              <div class="col-md-2 money-amount">
                <div class="mAmount">
                    <p>{{$expense->amount}}</p> 
                </div>    
              </div>

              <div class="col-md-1 list-button">
                <a href="{{route('deletefebExp',['id'=>$expense->id])}}" id="btn-delete" onClick="return confirm('Are you sure you want to delete this expense?')"><i class="fa-solid fa-trash-can"></i></a> <br>
                <a href="{{route('editfebExpense',['id'=>$expense->id])}}" id="btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>
              </div>
            </div>
          </li>
        </ul> 
      </div>
      @endforeach

      @else 
            <div class="col-md-12">
              <p class="promptText">Nothing Here. Add some expenses.</p>
              <img src="/images/exp add.png" width="250" height="250"  alt="add">
            </div>
      @endif 
    </div>
  </div>    
  
</div>
@endsection
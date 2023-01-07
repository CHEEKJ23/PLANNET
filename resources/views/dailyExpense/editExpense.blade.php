@extends("layout")
@section("content")

  <div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:red;">EXPENSE</h4>
     
    </div>
    <form action="{{ route('updateExpense') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($expenses as $expense)
    <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="hidden" class="form-control" name="expenseID" id="expenseID" value="{{$expense->id}}" readonly>
          <input type="text" name="Exname" class="form-control" id="Exname" value="{{$expense->name}}"/>
        </div>
        
        <div class="form-group">
          <label>Description</label>
          <input type="text" name="Exdescription"  class="form-control" id="Exdescription" value="{{$expense->description}}" />
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Amount</label>
              <input type="text" name="Examount"  class="form-control" id="Examount" value="{{$expense->amount}}"/>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Date</label>
              <input type="date" name="Exdate" class="form-control" id="Exdate" value="{{$expense->date}}"/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Category</label>
              <input type="text" name="Excategory" class="form-control" id="Excategory" value="{{$expense->category}}"/>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>File</label>
              <input type="file" name="image" class="form-control"/> 
            </div>
          </div>
        </div>
    @endforeach
    <div class="modal-footer">
        <a class="btn btn-secondary" href="/dailyExpense" id="noteDetailBackBtn">Back</a>
        <button type="submit" class="btn btn-danger" href="">Save</button>
    </div>
    </div>
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>

@endsection
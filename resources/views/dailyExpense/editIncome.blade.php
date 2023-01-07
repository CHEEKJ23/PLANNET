@extends("layout")
@section("content")

<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-8">

    <div class="modal-header">
      <h4 class="modal-title"style="color:green;">Income</h4>
     
    </div>
    <form action="{{ route('updateIncome') }}" method="post" enctype="multipart/form-data"> @csrf
    @foreach($incomes as $income)
    <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="hidden" class="form-control" name="incomeID" value="{{$income->id}}" readonly>
          <input type="text" name="Inname"  class="form-control" value="{{$income->name}}"/>
        </div>
        
        <div class="form-group">
          <label>Description</label>
          <input type="text" name="Indescription"  class="form-control" value="{{$income->description}}"/>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Amount</label>
              <input type="text" name="Inamount"  class="form-control" value="{{$income->amount}}"/>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Date</label>
              <input type="date" name="Indate" class="form-control" value="{{$income->date}}"/>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Category</label>
              <input type="text" name="Incategory" class="form-control" value="{{$income->category}}"/>
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
      <a type="button" class="btn btn-default" href="/dailyExpense" >Back</a>
      <button type="submit" class="btn btn-success" href="" >Save</button>
    </div>
    </div>
    @endforeach
  </form>

</div>
<div class="col-sm-2">&nbsp;</div>
</div>
@endsection
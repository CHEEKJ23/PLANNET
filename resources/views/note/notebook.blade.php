@extends('layout')
@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
         .modeLabel{
            padding-bottom: 10px;
            border-bottom: 1px solid #adadad;
         }
         
         .button {
            color: #717d91;
            font-size: 16px;
            padding:5px;
         }

         .button:hover {
            color: #484f5c;
         }

       
         th{
            background-color: #c8d7f7;
         }

         td{
            background-color: #e0eaff;
         }

         tr {
            cursor: pointer;
         }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Notebook</title>

</head>
<section id="notebookApp">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h1 class="modeLabel"><i class="fa-solid fa-book-bookmark"></i> Notebook</h1>
                <p>Make some Notes and insert content into them</p>
            </div>
            <div class="col-md-4  mt-5 text-center">
                <!-- Button trigger modal -->
                <button class="n-action-btn btn btn-secondary" data-toggle="modal" data-target="#notebookModal" id="addNotebookBtn">Create Notebook</button>
            </div>
            <div class="col-md-2">
                <img src="/images/Thesis.png" width="200" height="200" style="margin-top:-5px; margin-left:25px;" alt="book">
            </div>
        </div>
        
        <div class="row mt-4">
            @if(count($notebooks))
                
                <table class="table table-hover">
                    <thead>
                        <tr class="table">
                            <th scope="col">Notebook Name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach($notebooks as $notebook)
                    <tbody><a href="{{route('openNote',['id'=>$notebook->id])}}"
                            id="openNotebookBtn">
                        <tr>
                            <td>{{$notebook->title}}</td>
                            <td>{{$notebook->created_at}}</td>
                            <td><a href="{{route('openNote',['id'=>$notebook->id])}}" class="button"
                                    id="openNotebookBtn"><i class="fa-regular fa-folder-open"></i></a>
                                    <a href="{{route('editNotebook',['id'=>$notebook->id])}}" id="editNoteBtn" class="button" ><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('removeNotebook',['id'=>$notebook->id])}}" class="button" id="deleteNotebookBtn" onClick="return confirm('Are you sure you want to delete this Note?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr></a>
                    </tbody> 
                    @endforeach
                    </table>
                    
               
            @else
                <div class="col-md-12">
                    <p class="promptText">No notebook. Create some.</p>
                </div>
            @endif
        </div>

        <!-- Modal -->
        <div class="modal fade" id="notebookModal" tabindex="-1" aria-labelledby="notebookModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notebookModalLabel">Notebook</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('storeNotebook') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="notebookTitle">Name</label>
                                <input type="text" class="form-control" id="notebookTitle" name="notebookTitle" required >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
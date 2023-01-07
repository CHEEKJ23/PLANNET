@extends('layout')
@section('content')
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <style>
        .container-fluid {
            padding: 5px 40px;
        }

        h2, p {
            word-break: break-word; 
        }

        i {
            font-size:16px; 
            color: black;
        }

        i:hover {
            color: #717d91;
        }

        .card-img-top {
            margin-left: 40px;
            width: 25rem; 
            height: 20rem;
            object-fit: contain; /* contain  */
         }

    </style>
</head>
    <section id="noteDetail">
        <div class="container-fluid">
            @foreach($notes as $note)
                <div class="row">
                    <div class="col-md-8 mt-4">
                        <h2>
                        <a href="/notebook/{{$note->notebookID}}" id="noteDetailBackBtn"><i class="fa-solid fa-arrow-left"></i></a>
                        {{$note->title}} &nbsp; 
                        <a href="{{route('editNote',['id'=>$note->id])}}" data-toggle="modal" data-target="#editNoteModal" id="noteDetailEditBtn"><i class="fa-solid fa-pen-to-square"></i></a>
                    </h2>
                        
                        <hr>
                        <p class="mb-4">{!! $note->body !!}</p>
                        <hr>
                        <a class="btn btn-secondary" href="/notebook/{{$note->notebookID}}" id="noteDetailBackBtn">Back</a>
                        <!-- Button trigger modal -->
                        
                    </div>
                    <div class="col-lg-auto mt-4">
                        <img src="{{asset('images/') }}/{{$note->image}}" class="card-img-top img-fluid img-thumbnail" onerror="this.style.display = 'none'" alt="NoteCover">
                    </div>
                </div>
            @endforeach
 
            <!-- Edit Note Modal -->
            <div class="modal fade" id="editNoteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editNoteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNoteModalLabel">Edit Note</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('updateNote') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach($notes as $note)
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="notebookTitle">Title</label>
                                    <input type="text" class="form-control" id="noteTitle" name="noteTitle" value="{{$note->title}}">
                                    <input type="hidden" class="form-control" id="noteID" name="noteID" value="{{$note->id}}">
                                    <input type="hidden" class="form-control" id="notebookID" name="notebookID" value="{{$note->notebookID}}">
                                </div>
                                <div class="form-group">
                                    <label for="noteBody">Content</label>
                                    <textarea class="form-control" id="noteBody" name="noteBody" rows="4">{{$note->body}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="noteImage">Change cover</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="noteImage" name="noteImage">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" href="#">Save</button> 
                            </div>
                        @endforeach
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
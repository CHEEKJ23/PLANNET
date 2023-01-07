@extends('layout')
@section('content')
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="C:\xampp\htdocs\FYP\froala_editor_4.0.16/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" /> -->

    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' /><script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    
    <style>
        .container-fluid {
            padding: 5px 40px;
        }

        .modeLabel{
            padding-bottom: 10px;
            border-bottom: 1px solid #adadad;
         }

         .card {
            position: relative;
            /* height: 90%;  or不要 */
         }

        .button {
            position: absolute;
            top: 8px;
            right: 16px;
            cursor: pointer;
         }

         .button i {
            color: #717d91;
            font-size: 14px;
            padding:5px;
         }

         .button i:hover {
            color: #484f5c;
         }

         /* 3 dots  */
         .dropdown-content {
        display: none;
        position: absolute;
        margin-top: -53px;
        right: 16px;
        /* background-color: #f9f9f9;
        min-width: 60px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1; */
        }

        .dropdown-content a {
        color: black;
        /* padding: 12px 16px; */
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {
        background-color: #f1f1f1;
        } 

        .show {
        display: block;
        }

    </style>

    <title>Note</title>

</head>

    <section id="note">
        <div class="container-fluid">
            @foreach($notebooks as $notebook)
            <div class="row">
                <div class="col-md-8  mt-4">
                    <h1 class="modeLabel">{{$notebook->title}}</h1>
                </div>

                <div class="col-md-4 mt-5">
                    <a class="btn btn-secondary" href="/notebook" id="backNotebookBtn">Back</a>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#noteModal" id="addNoteBtn">Add Note</button>
                </div>
            </div>
             

            <!-- Modal add note -->
            <div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="noteModalLabel">Create Note</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('storeNote') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="noteTitle">Title</label>
                                    <input type="text" class="form-control" id="noteTitle" name="noteTitle" required>
                                    <input type="hidden" class="form-control" id="notebookID" name="notebookID" value="{{$notebook->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="noteImage">Image</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="noteImage" name="noteImage">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noteBody">Content</label>
                                    <textarea id="noteContent" class="form-control" name="noteBody" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" href="{{route('showNote',['id'=>$notebook->id])}}">Save</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- note content -->
            <div class="row mt-4">
                @if(count($notes))
                    @foreach($notes as $note)
                        <div class="col-md-3">
                            <div class="card">
                                
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-solid fa-book"></i>&nbsp;{{$note->title}}</h5>
                                    <p class="card-text"><small class="text-muted">Last updated {{$note->updated_at}}</small></p>
                                    <div class="button">
                                        <a href="{{route('showNoteDetail',['id'=>$note->id])}}" id="openNoteBtn" ><i class="fa-regular fa-folder-open"></i></a>
                                        <a href="{{route('removeNote',['id'=>$note->id])}}" id="deleteNoteBtn" onClick="return confirm('Are you sure you want to delete this content?')"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                        
                                </div>
                                <img src="{{asset('images/') }}/{{$note->image}}" class="card-img-bottom" onerror="this.style.display = 'none'" alt="noteCover">
                            </div>
                            
                        </div>
                        <br>
                        <br>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">
                        <p class="promptText" style="font-size:18px;">Note is Empty. Try to add some notes.</p>
                        <img src="/images/Add files.png" width="400" height="400"  alt="add">

                    </div>
                @endif
            </div>
        </div>
    </section>

    <script type="text/javascript" src="C:\xampp\htdocs\FYP\froala_editor_4.0.16/froala_editor.pkgd.min.js"></script>

    <script> 
    //initialize the editor
    // var editor = new FroalaEditor('#example');
    function showDropdown(event) {
        // event.target.nextElementSibling.classList.toggle("show");
    document.getElementById("myDropdown").classList.toggle("show");
    }

    </script>
@endsection
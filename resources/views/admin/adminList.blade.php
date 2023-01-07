@extends('layouts.admin')
@section('content')
<div class="container" style="background-color: #fff; margin-top:5%; border-radius:15px;">

    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <h2>Admin List</h2>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline my-2 my-lg-0" action="{{route('adminSearch')}}" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" style="height:40px;">
                <button class="btn btn-secondary" type="submit" style="height:40px;">Search</button>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($admins))
                        @foreach($admins as $admin)
                        <tr>
                            <th scope="row">{{$admin->id}}</th>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->created_at}}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('deleteAdmin',['id'=>$admin->id])}}" onClick="return confirm('Are you sure you want to delete this admin?')"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th scope="row">--</th>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.title="Admin | Admin List | Jom Focus"
</script>
@endsection



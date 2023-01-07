@extends('layouts.admin')
@section('content')
<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    @if (session()->has('status'))
    <div class="p-3 text-green-700 bg-green-300 rounded alert
    {{ Session::get('alert-class', 'alert-success') }}">
        {{ Session()->get('status') }}
    </div>
    @endif
  </div>
<div style="margin:5%; padding:3%; background-color: #fff; border-radius:15px;">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center mt-4">
            <h1>User Feedback</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline my-2 my-lg-0" action="{{route('searchFeedback')}}" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" style="height:40px;">
                <button class="btn btn-secondary" type="submit" style="height:40px;">Search </button>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($feedbacks))
                        @foreach($feedbacks as $feedback)
                        <tr>
                            <td scope="row" style="display:none;" class="hidden">{{$feedback->id}}</td>
                            <td>{{$feedback->name}} </td>
                            <td><a href="mailto:{{$feedback->email}}">{{$feedback->email}}</a></td>
                            <td>{{$feedback->subject}}</td>
                            <td>{{$feedback->message}}</td>
                            <td>{{$feedback->created_at}}</td>
                            <td>
                                <a class="btn btn-secondary" id="" href="{{route('feedbackID',['id'=>$feedback->id])}}" >Reply</a>
                                {{-- <a class="admin-btn" href="{{route('deleteFeedback',['id'=>$feedback->id])}}">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th scope="row" class="hidden">--</th>
                            <td>--</td>
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
@endsection
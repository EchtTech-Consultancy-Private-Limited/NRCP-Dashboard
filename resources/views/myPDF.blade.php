@extends('layouts.main') 
@section('title')
{{__('General Laboratory Edit')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12">
        <h1>{{ $title }}</h1>
            <p>{{ $date }}</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
        
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->equipment }}</td>
                    <td>{{ $user->quantity }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
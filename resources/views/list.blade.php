@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box-header">
        <h3 class="box-title">List of alerts</h3>
    </div>
    
    <table class="table table-striped task-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alerts as $alert)
            <tr class="data-row">
                <td>{{$user->name}}</td>
                <td>{{$alert->latitude}}</td>
                <td>{{$alert->longitude}}</td>
                <td>
                    <a href={{ url('resolved/'.$alert->id) }} class="btn btn-success">Resolved</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection

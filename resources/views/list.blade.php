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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alerts as $alert)
            <tr class="data-row">
                <td>{{$alert->name}}</td>
                <td>{{$alert->latitude}}</td>
                <td>{{$alert->longitude}}</td>
                <td>
                    <a href="#editContactModal" class="edit edit-contact"  data-contact="{{$contact}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box-header">
        <h3 class="box-title">Contacts</h3>
    </div>
    
    <table class="table table-striped task-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Adddress</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNewContact">Add New</button>
</div>
<!-- Modal -->
<div class="modal fade" id="addNewContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Category</h4>
      </div>
      <form action="{{route('contacts.store')}}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" class="form-control" name="address" cols="20" rows="3"></textarea>
            </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button id = "save_contact_btn" type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection

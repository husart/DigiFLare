@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box-header">
        <h3 class="box-title">Contacts ({{$contacts->count()}})</h3>
    </div>
    
    <table class="table table-striped task-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr class="data-row">
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->address}}</td>
                <td>
                    <a href="#editContactModal" class="edit edit-contact" data-toggle="modal" data-contact="{{$contact}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteContactModal" class="delete delete-contact" data-toggle="modal" data-id="{{$contact->id}}" data-target="#deleteContactModal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNewContact">Add New</button>
</div>

<!-- Create Contact Modal -->
<div id="addNewContact" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                {{csrf_field()}}
                <div class="modal-header">						
                    <h4 class="modal-title">New Contact</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input id="email" type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="required">Phone</label>
                        <input id="phone" type="text" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="required">Address</label>
                        <input id="address" type="text" class="form-control" name="address" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input id="save-contact-btn" type="button" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editContactModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                {{csrf_field()}}
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Contact</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-name" class="required">Name</label>
                        <input id="edit-name" type="text" class="form-control" name="edit-name" required>
                    </div>

                    <div class="form-group">
                        <label for="edit-email" class="required">Email</label>
                        <input id="edit-email" type="text" class="form-control" name="edit-email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-phone" class="required">Phone</label>
                        <input id="edit-phone" type="text" class="form-control" name="edit-phone" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-address" class="required">Address</label>
                        <input id="edit-address" type="text" class="form-control" name="edit-address" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input id="confirm-save-edit-contact-btn" type="button" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteContactModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                {{csrf_field()}}
                <div class="modal-header">						
                    <h4 class="modal-title">Delete Contact</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <p>Are you sure you want to delete these record?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input id="confirm-delete-contact-btn" type="button" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

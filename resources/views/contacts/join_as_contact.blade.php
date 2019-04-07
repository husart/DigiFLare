@extends('layouts.app')

@section('content')
<div id="join-container">
    <form action="{{URL::to('/join')}}" role="form" method="post">
        {{csrf_field()}}
        <div class="body">
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email">
            </div>
        </div>
        <div class="footer">
            <button id="join-as-contact" type="submit" class="btn btn-primary">Join</button>
        </div>
    </form>
</div>
@endsection

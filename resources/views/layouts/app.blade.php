<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/digiflare.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script>
        $("#save-contact-btn").click(function() {
            $.ajax({
                type: 'post',
                url: "{{ url('add_contact') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=name]').val(),
                    'email': $('input[name=email]').val(),
                    'phone': $('input[name=phone]').val(),
                    'address': $('input[name=address]').val()
                },
                success: function(data) {
                    window.location.reload();
                },
            });
        });

        $('.delete-contact').click(function(){
            var ID = $(this).data('id');
            $('#confirm-delete-contact-btn').data('id', ID); //set the data attribute on the modal button
        });
        $("#confirm-delete-contact-btn").click(function(e) {
            var ID = $(this).data("id");
            $.ajax({
                type: 'post',
                url: "{{ url('delete_contact') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': ID
                },
                success: function(data) {
                    window.location.reload();
                },
            });
        });

        $('.edit-contact').on("click", function() {
            var contactData = $(this).data("contact");
            $('#confirm-save-edit-contact-btn').data('contactData', contactData); //set the data attribute on the modal button
            $('input[name=edit-name]').val(contactData.name);
            $('input[name=edit-email]').val(contactData.email);
            $('input[name=edit-phone]').val(contactData.phone);
            $('input[name=edit-address]').val(contactData.address);
        });
        $("#confirm-save-edit-contact-btn").click(function() {
            var contactData = $(this).data("contactData");
            $.ajax({
                type: 'post',
                url: "{{ url('edit_contact') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': contactData.id,
                    'name': $('input[name=edit-name]').val(),
                    'email': $('input[name=edit-email]').val(),
                    'phone': $('input[name=edit-phone]').val(),
                    'address': $('input[name=edit-address]').val()
                },
                success: function(data) {
                    window.location.reload();
                },
            });
        });
        
    </script>
</body>
</html>

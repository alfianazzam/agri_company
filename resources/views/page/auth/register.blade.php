@extends('layouts.app')

@section('title', 'Register Page')

@section('content')

    <div class="main">
        <section class="module">
            <div class="container">
                <div class="col-sm-5">
                    <h4 class="font-alt">Register</h4>
                    <hr class="divider-w mb-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" id="name" type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="username" type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-enter Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-round btn-b">Register</button>
                    </div>
                    <a href="/login" class="btn btn-block btn-round btn-b">Login</a>
                </form>

                @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                </div>
            </div>
        </section>
    </div>

   

@endsection

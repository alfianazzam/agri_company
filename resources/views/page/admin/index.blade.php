@extends('layouts.admin')

@section('title', 'Messages Dashboard')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Messages Received</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Messages Dashboard</li>
        </ol>

        <div class="row mb-4">
            <div class="col-xl-12">
                <div class="card bg-light text-dark mb-4">
                    <div class="card-header">
                        <h5 class="m-0">Recent Messages</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="messagesTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date Received</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ Str::limit($message->message, 50) }}</td>
                                        <td>{{ $message->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@extends('layouts.admin')
@section('title','dashboard')
@section('content-header','Dashboard')
@section('content-action')
@endsection
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <h1>Messages</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewMessageModal{{ $message->id }}">View</button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editMessageModal{{ $message->id }}">Edit</button>
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- View Message Modal -->
                        <div class="modal fade" id="viewMessageModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="viewMessageModalLabel{{ $message->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewMessageModalLabel{{ $message->id }}">View Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Name:</strong> {{ $message->name }}</p>
                                        <p><strong>Email:</strong> {{ $message->email }}</p>
                                        <p><strong>Subject:</strong> {{ $message->subject }}</p>
                                        <p><strong>Message:</strong> {{ $message->message }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Message Modal -->
                        <div class="modal fade" id="editMessageModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="editMessageModalLabel{{ $message->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editMessageModalLabel{{ $message->id }}">Edit Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.messages.update', $message->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $message->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $message->email }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject" value="{{ $message->subject }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea class="form-control" id="message" name="message" required>{{ $message->message }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

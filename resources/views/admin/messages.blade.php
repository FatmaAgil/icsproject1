@extends('layouts.admin')

@section('content')
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#replyMessageModal{{ $message->id }}">Reply</button>
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

                        <!-- Reply Message Modal -->
                        <div class="modal fade" id="replyMessageModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="replyMessageModalLabel{{ $message->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="replyMessageModalLabel{{ $message->id }}">Reply Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="reply">Reply</label>
                                                <textarea class="form-control" id="reply" name="reply" rows="3" placeholder="Type your reply here..." required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send Reply</button>
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
<script>
    function viewMessage(id) {
        fetch(`/admin/messages/${id}`)
            .then(response => response.json())
            .then(message => {
                document.getElementById('viewName').textContent = message.name;
                document.getElementById('viewEmail').textContent = message.email;
                document.getElementById('viewSubject').textContent = message.subject;
                document.getElementById('viewMessage').textContent = message.message;
                $('#viewMessageModal').modal('show');
            });
    }

    function replyMessage(id) {
        document.getElementById('replyMessageId').value = id;
        $('#replyMessageModal').modal('show');
    }
    </script>
@endsection

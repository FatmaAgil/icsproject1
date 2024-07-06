@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Events</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#createEventModal">Add Event</button>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Event Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->event_date }}</td>
                    <td>
                        <button class="btn btn-warning" onclick="editEvent({{ $event->id }})">Edit</button>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Event Modal -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEventModalLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Event Date</label>
                        <input type="datetime-local" class="form-control" id="event_date" name="event_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Event Modal -->
<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editEventForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editEventId">
                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <textarea class="form-control" id="editDescription" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editEventDate">Event Date</label>
                        <input type="datetime-local" class="form-control" id="editEventDate" name="event_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function editEvent(id) {
    fetch(`/admin/events/${id}/edit`)
        .then(response => response.json())
        .then(event => {
            document.getElementById('editEventId').value = event.id;
            document.getElementById('editTitle').value = event.title;
            document.getElementById('editDescription').value = event.description;
            document.getElementById('editEventDate').value = event.event_date;
            document.getElementById('editEventForm').action = `/admin/events/${event.id}`;
            $('#editEventModal').modal('show');
        })
        .catch(error => {
            console.error('Error fetching event:', error);
        });
}
</script>
@endsection

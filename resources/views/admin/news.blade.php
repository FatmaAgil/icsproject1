@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage News</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#createNewsModal">Add News</button>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->content }}</td>
                    <td>
                        <button class="btn btn-warning" onclick="editNews({{ $newsItem->id }})">Edit</button>
                        <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" style="display:inline-block;">
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

<!-- Create News Modal -->
<div class="modal fade" id="createNewsModal" tabindex="-1" role="dialog" aria-labelledby="createNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.news.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewsModalLabel">Add News</h5>
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
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" required></textarea>
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

<!-- Edit News Modal -->
<div class="modal fade" id="editNewsModal" tabindex="-1" role="dialog" aria-labelledby="editNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editNewsForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNewsModalLabel">Edit News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editNewsId">
                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="editContent">Content</label>
                        <textarea class="form-control" id="editContent" name="content" required></textarea>
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
    function editNews(id) {
        fetch(`/admin/news/${id}/edit`)
            .then(response => response.json())
            .then(news => {
                document.getElementById('editNewsId').value = news.id;
                document.getElementById('editTitle').value = news.title;
                document.getElementById('editContent').value = news.content;
                document.getElementById('editNewsForm').action = `/admin/news/${news.id}`;
                $('#editNewsModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching news:', error);
            });
    }
</script>
@endsection

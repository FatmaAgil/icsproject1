<x-plasticUserLayout>
    <style>
        body {
            padding-top: 70px; /* Adjust this value based on the height of your navigation bar */
        }

        .container {
            padding-top: 70px; /* Adjust this value based on the height of your navigation bar */
        }

        .table thead th {
            background-color: #f8f9fa;
            color: #495057;
            text-transform: uppercase;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }

        .card-body {
            padding: 1.25rem;
        }

        .form-select {
            width: 100%;
            padding: .375rem 1.75rem .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .form-select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Connections</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>User Name</th>
                                        <th>Plastic Details</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($connections as $connection)
                                        <tr>
                                            <td>{{ $connection->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $connection->plasticForm->user->name ?? 'No User' }}</td>
                                            <td>
                                                Type: {{ $connection->plasticForm->type }}<br>
                                                Quantity: {{ $connection->plasticForm->quantity }}<br>
                                                Condition: {{ $connection->plasticForm->condition }}
                                            </td>
                                            <td>{{ $connection->status }}</td>
                                            <td>
                                                <form action="{{ route('connections.update', $connection->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <select class="form-select" name="status" onchange="this.form.submit()">
                                                        <option value="pending" {{ $connection->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="approved" {{ $connection->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                                    </select>
                                                </form>
                                                <a href="{{ route('connections.message', $connection->id) }}" class="btn btn-primary btn-sm">Message</a>
                                                <form action="{{ route('connections.destroy', $connection->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-plasticUserLayout>

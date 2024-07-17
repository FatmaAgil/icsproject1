<x-RecycleLayout>
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
                                                <button type="button" class="btn btn-info"
                                                        onclick="viewPlasticDetailsModal({{ $connection->id }})">
                                                    View
                                                </button>
                                            </td>
                                            <td>
                                                <form action="{{ route('connections.update', $connection->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <select class="form-select" name="status" data-connection-id="{{ $connection->id }}" onchange="handleStatusChange(this)">
                                                        <option value="pending" {{ $connection->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="approved" {{ $connection->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                                        <option value="rejected" {{ $connection->status == 'Rejected' ? 'selected' : '' }}>Reject</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
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
                    <!-- View Plastic Details Modal -->
                    <div class="modal fade" id="viewPlasticDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewPlasticDetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewPlasticDetailsModalLabel">View Plastic Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Date:</strong> <span id="viewDate"></span></p>
                                    <p><strong>Recycling Organization:</strong> <span id="viewOrganization"></span></p>
                                    <p><strong>Name:</strong> <span id="viewName"></span></p>
                                    <p><strong>Phone Number:</strong> <span id="viewPhoneNumber"></span></p>
                                    <p><strong>Email:</strong> <span id="viewEmail"></span></p>
                                    <p><strong>Plastic Type:</strong> <span id="viewPlasticType"></span></p>
                                    <p><strong>Quantity:</strong> <span id="viewQuantity"></span></p>
                                    <p><strong>Condition:</strong> <span id="viewCondition"></span></p>
                                    <p><strong>Collection Date:</strong> <span id="viewCollectionDate"></span></p>
                                    <p><strong>Collection Time:</strong> <span id="viewCollectionTime"></span></p>
                                    <p><strong>Instructions:</strong> <span id="viewInstructions"></span></p>
                                    <p><strong>Payment Method:</strong> <span id="viewPaymentMethod"></span></p>
                                    <p><strong>Bank Details:</strong> <span id="viewBankDetails"></span></p>
                                    <p><strong>Comments:</strong> <span id="viewComments"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End View Plastic Details Modal -->
                </div>
            </div>
        </div>
    </div>
    <script>
      function viewPlasticDetailsModal(id) {
    fetch(`/admin/connections/${id}`)
        .then(response => {
            if (!response.ok) {
                console.error('HTTP error, status = ' + response.status);
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(connection => {
            // Populate modal fields with connection data
            $('#viewDate').text(connection.created_at);
            $('#viewOrganization').text(connection.recycling_organization.name);
            $('#viewName').text(connection.plastic_form.name);
            $('#viewPhoneNumber').text(connection.plastic_form.phone_number);
            $('#viewEmail').text(connection.plastic_form.email);
            $('#viewPlasticType').text(connection.plastic_form.plastic_type);
            $('#viewQuantity').text(connection.plastic_form.quantity);
            $('#viewCondition').text(connection.plastic_form.condition);
            $('#viewCollectionDate').text(connection.plastic_form.collection_date);
            $('#viewCollectionTime').text(connection.plastic_form.collection_time);
            $('#viewInstructions').text(connection.plastic_form.instructions);
            $('#viewPaymentMethod').text(connection.plastic_form.payment_method);
            $('#viewBankDetails').text(connection.plastic_form.bank_details);
            $('#viewComments').text(connection.plastic_form.comments);

            $('#viewPlasticDetailsModal').modal('show');
        })
        .catch(error => {
            console.error('Error fetching connection data:', error);
            alert('Failed to fetch connection details');
        });
}

        function handleStatusChange(selectElement) {
            const newStatus = selectElement.value;
            const connectionId = selectElement.dataset.connectionId; // Add this attribute in your <select> tag

            fetch(`/connections/${connectionId}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message);
                // Optionally reload or update the connections table
            })
            .catch(error => {
                console.error('Error updating connection status:', error);
                alert('Failed to update connection status');
            });
        }
    </script>
</x-plasticUserLayout>

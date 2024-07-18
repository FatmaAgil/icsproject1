<x-plasticUserLayout>
    <!-- Include necessary styles -->
    <style>
        .container {
            margin-top: 100px; /* Adjust this value based on the height of your navbar */
        }
    </style>

    @section('content')
    <div class="container">
        <h1>Plastic User Connections</h1>

        @if ($connections->isEmpty())
            <p>No connections found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Recycling Organization</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($connections as $connection)
                        <tr>
                            <td>{{ $connection->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $connection->recyclingOrganization->name }}</td>
                            <td>{{ $connection->status }}</td>
                            <td>
                                <button type="button" class="btn btn-info"
                                        onclick="viewPlasticDetailsModal({{ $connection->id }})">
                                    View
                                </button>
                              <!-- ( <button type="button" class="btn btn-primary"
                                        onclick="openSendMessageModal({{ $connection->recyclingOrganization->id }})">
                                    Send Message
                                </button> )-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
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


    <!-- Send Message Modal -->
    <div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMessageModalLabel">Send Message to Recycling Organization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sendMessageForm" action="{{ route('puConnections.sendMessage') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <input type="hidden" id="recyclingOrganizationId" name="recyclingOrganizationId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="sendMessage()">Send Message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Send Message Modal -->
    @endsection

    <!-- Include necessary scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Define viewPlasticDetails function -->
    <script>
     function viewPlasticDetailsModal(id) {
    fetch(`/admin/connections/${id}`)
        .then(response => {
            if (!response.ok) {
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

        function openSendMessageModal(recyclingOrganizationId) {
            $('#recyclingOrganizationId').val(recyclingOrganizationId);
            $('#sendMessageModal').modal('show');
        }

        function sendMessage() {
            let formData = new FormData(document.getElementById('sendMessageForm'));
            fetch('{{ route('puConnections.sendMessage') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message);
                $('#sendMessageModal').modal('hide');
            })
            .catch(error => {
                console.error('Error sending message:', error);
                alert('Failed to send message');
            });
        }
    </script>
</x-plasticUserLayout>

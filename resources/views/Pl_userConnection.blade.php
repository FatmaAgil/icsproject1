<x-plasticUserLayout>
    <!-- Ensure necessary styles -->
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
                            <td>
                                <!-- View Plastic Details Button -->
                                <button type="button" class="btn btn-info view-plastic-details-btn" data-target="#viewPlasticDetailsModal{{ $connection->id }}">View Details</button>
                                {{-- ^-- Use a button instead of an anchor tag --}}
                                {{-- Add more actions as needed --}}
                            </td>
                        </tr>

                        <!-- View Plastic Details Modal -->
                        <div class="modal fade" id="viewPlasticDetailsModal{{ $connection->id }}" tabindex="-1" role="dialog" aria-labelledby="viewPlasticDetailsModalLabel{{ $connection->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewPlasticDetailsModalLabel{{ $connection->id }}">View Plastic Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Plastic Type:</strong> {{ $connection->plastic_type }}</p>
                                        <p><strong>Quantity:</strong> {{ $connection->quantity }}</p>
                                        <p><strong>Condition:</strong> {{ $connection->condition }}</p>
                                        <!-- Add more details as needed -->
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
        @endif
    </div>
    @endsection

    @section('scripts')
    <script>
        $(document).ready(function() {
            $('.view-plastic-details-btn').click(function() {
                // Get the modal ID from the data-target attribute
                var modalId = $(this).data('target');

                // Show the modal corresponding to the modalId
                $(modalId).modal('show');
            });
        });
    </script>
    @endsection
</x-plasticUserLayout>

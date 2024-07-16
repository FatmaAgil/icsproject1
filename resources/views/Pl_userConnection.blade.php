<x-plasticUserLayout>
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
                                    <a href="{{ route('puConnections.sendMessage', ['id' => $connection->recycling_organization_id]) }}" class="btn btn-primary">Send Message</a>
                                    {{-- Add more actions as needed --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection
    </x-plasticUserLayout>

<x-plasticUserLayout>
    @section('content')
    <div style="padding-top: 80px;"> <!-- Adjust the padding-top value according to your navigation bar height -->
        <h1>Community Page</h1>

        <h2>Latest News</h2>
        @foreach ($news as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->content }}</p>
                </div>
            </div>
        @endforeach
        {{ $news->links() }} {{-- Pagination links for news --}}

        <h2>Upcoming Events</h2>
        @foreach ($events as $event)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text">Event Date: {{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i:s') }}</p>
                </div>
            </div>
        @endforeach
        {{ $events->links() }} {{-- Pagination links for events --}}
    </div>
    @endsection
</x-plasticUserLayout>

<style>
    /* Example styles for making content scroll fully */
    body {
        padding-top: 60px; /* Adjust this value to match your navigation bar height */
    }
    .card {
        margin-bottom: 20px;
    }
</style>

<x-plasticUserLayout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->

    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            color: #333;
            padding-top: 0;
        }
        h1 {
            color: #fff;
            text-transform: uppercase;
        }
        h2 {
            color: #2dc997;
            display: flex;
            align-items: center;
        }
        h3 {
            color: black;
        }
        h5 {
            text-align: center;

        }


        /* Hero Section Styles */
        .hero-section {
            background: url('{{ asset('assets/img/Community.png') }}') no-repeat center center/cover;
            color: #fff;
            height: 100vh; /* Full viewport height */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7); /* Dark overlay with increased opacity */
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-title {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .hero-subtitle {
            font-size: 1.5rem;
        }

        /* Card Styles */
        .card {
            background-color: #fff; /* White card background */
            border: 1px solid #ddd; /* Light grey border */
            border-radius: 8px; /* Slightly more rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin-bottom: 20px;
        }
        .card-body {
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            align-content: center;
            justify-content: center;
        }
        .card-title {
            font-size: 1.5rem; /* Larger font for titles */
            margin-bottom: 15px;
        }
        .card-text {
            font-size: 1rem; /* Standard font size for text */
        }
        .community-section {
            overflow-x: auto; /* Enable horizontal scrolling */
            padding: 20px;
        }
        .community-container {
            display: flex; /* Display elements in a row */
            flex-wrap: nowrap; /* Prevent wrapping to next line */
        }
        .community-card {
            flex: 0 0 250px; /* Set a fixed width for each card */
            margin: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.3s; /* Add transition effect */
        }
        .community-card:hover {
            transform: scale(1.05); /* Scale up on hover */
            background-color: #2dc997;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
            cursor: pointer; /* Change cursor to pointer on hover */
        }
        .community-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #2dc997;
            border-color: #2dc997;
            color: #fff;
            font-size: 1.1rem;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #28a745;
            border-color: #28a745;
        }

        .scrollable-content {
            max-height: 400px; /* Adjust height as needed */
            overflow-y: auto;
            padding-right: 15px; /* Add some padding to avoid scrollbar overlap */
            opacity: 0.95; /* Increased opacity for scrollable content */
        }
        .mb-3 {
            margin-bottom: 20px;
        }

        /* Game Styles */
        #gameContainer {
            display: none; /* Hide game container initially */
            position: relative;
            width: 100%;
            height: 500px; /* Adjust height as needed */
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            overflow: hidden;
        }
        #plasticContainer {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .plastic {
            width: 100px; /* Adjust size as needed */
            height: 100px;
            position: absolute;
            transition: transform 0.2s;
        }
        #gameInfo {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            display: flex;
            gap: 20px;
            align-items: center;
        }
        #gameInfo h3 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Popup Styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none; /* Hidden by default */
            align-items: center;
            justify-content: center;
        }
        .popup {
            background: #333;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .popup h2 {
            margin-top: 0;
        }
        .popup button {
            margin-top: 20px;
            background-color: #00796b;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .popup button:hover {
            background-color: #28a745;
        }
    </style>

    @section('content')
    <main id="main">
        <div class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title"><i class="fas fa-leaf"></i> Welcome to the Plastic Community</h1>
                <p class="hero-subtitle">Join us in making a difference by staying informed and participating in our community events.</p>
            </div>
        </div>

        <div class="community-section">
            <h2 style="display: flex; justify-content: center; align-items: center;"><i class="fas fa-recycle"></i> OUR COMMUNITIES</h2>
            <div class="community-container">
                @foreach ($communities as $community)
                    <div class="community-card">
                        <h3>{{ $community->name }}</h3>
                        <p>{{ $community->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <h2 style="display: flex; justify-content: center; align-items: center;"><i class="fas fa-newspaper"></i> Latest News</h2>
        <div class="scrollable-content">
            @foreach ($news as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->content }}</p>
                    </div>
                </div>
            @endforeach
            {{ $news->links() }} {{-- Pagination links for news --}}
        </div>

        <h2 style="display: flex; justify-content: center; align-items: center;"><i class="fas fa-calendar-alt"></i> Upcoming Events</h2>
        <div class="scrollable-content">
            @foreach ($events as $event)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text">Event Date: {{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d H:i:s') }}</p>
                        {{ $events->links() }}
                        <button class="btn btn-primary attend-event" data-event-id="{{ $event->id }}">Attend Event and Earn Points</button>
                    </div>
                </div>
            @endforeach
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).ready(function() {
                    $('.attend-event').on('click', function() {
                        var eventId = $(this).data('event-id');
                        console.log('Event ID:', eventId); // Log the event ID

                        $.ajax({
                            url: '{{ route("events.attend") }}',
                            method: 'POST',
                            data: {
                                event_id: eventId
                            },
                            success: function(response) {
                                console.log(response); // Log the response
                                if (response.success) {
                                    alert(response.message);
                                } else {
                                    alert(response.message);
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText); // Log any errors
                                alert('An error occurred while processing your request.');
                            }
                        });
                    });
                });
            </script>

        </div>

        {{-- Button to take the quiz --}}
        <div class="text-center mt-4">
            <a href="{{ url('/quiz') }}" class="btn btn-primary"><i class="fas fa-question-circle"></i> Take the Plastic Quiz</a>

        {{-- Button to start the game --}}
        <div class="text-center mt-4">
            <button id="startGameButton" class="btn btn-primary"><i class="fas fa-play"></i> Start the Game</button>
        </div>

        {{-- Game Container --}}
        <div id="gameContainer">
            <div id="gameInfo">
                <h3><i class="fas fa-clock"></i> Time left: <span id="timer">30</span>s</h3>
                <h3><i class="fas fa-trophy"></i> Score: <span id="score">0</span></h3>
            </div>
            <div id="plasticContainer">
                <img src="{{ asset('assets/img/LDPEGame.png') }}" class="plastic" data-points="1">
                <img src="{{ asset('assets/img/GameHDPE.png') }}" class="plastic" data-points="2">
                <img src="{{ asset('assets/img/PET-bottles.png') }}" class="plastic" data-points="3">
                <img src="{{ asset('assets/img/ppGame.png') }}" class="plastic" data-points="1">
                <img src="{{ asset('assets/img/GameIcon.png') }}" class="plastic" data-points="2">
                <img src="{{ asset('assets/img/OtherImage.png') }}" class="plastic" data-points="3">
                <img src="{{ asset('assets/img/LDPEGame.png') }}" class="plastic" data-points="1">
                <img src="{{ asset('assets/img/GameHDPE.png') }}" class="plastic" data-points="2">
                <img src="{{ asset('assets/img/PET-bottles.png') }}" class="plastic" data-points="3">
                <img src="{{ asset('assets/img/ppGame.png') }}" class="plastic" data-points="1">
                <img src="{{ asset('assets/img/GameIcon.png') }}" class="plastic" data-points="2">
                <img src="{{ asset('assets/img/OtherImage.png') }}" class="plastic" data-points="3">
            </div>
        </div>

        {{-- Popup --}}
        <div id="popup" class="popup-overlay">
            <div class="popup">
                <h2>Game Over</h2>
                <p>Your final score is: <span id="finalScore"></span></p>
                <button id="closePopupButton">Close</button>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startGameButton = document.getElementById('startGameButton');
            const gameContainer = document.getElementById('gameContainer');
            const plasticContainer = document.getElementById('plasticContainer');
            const plastics = document.querySelectorAll('.plastic');
            const scoreElement = document.getElementById('score');
            const timerElement = document.getElementById('timer');
            const popup = document.getElementById('popup');
            const finalScoreElement = document.getElementById('finalScore');
            const closePopupButton = document.getElementById('closePopupButton');

            let score = 0;
            let timeLeft = 30;
            let gameInterval;

            function startGame() {
                gameContainer.style.display = 'block';
                startGameButton.style.display = 'none';
                score = 0;
                timeLeft = 30;
                scoreElement.textContent = score;
                timerElement.textContent = timeLeft;

                plastics.forEach(plastic => {
                    positionPlastic(plastic);

                    plastic.addEventListener('click', () => {
                        const points = parseInt(plastic.getAttribute('data-points'), 10);
                        score += points;
                        scoreElement.textContent = score;
                        positionPlastic(plastic);
                    });
                });

                gameInterval = setInterval(() => {
                    timeLeft--;
                    timerElement.textContent = timeLeft;

                    if (timeLeft <= 0) {
                        clearInterval(gameInterval);
                        endGame();
                    }
                }, 1000);
            }

            function endGame() {
                gameContainer.style.display = 'none';
                popup.style.display = 'flex';
                finalScoreElement.textContent = score;
            }

            function positionPlastic(plastic) {
                let overlapping;
                do {
                    overlapping = false;
                    const left = Math.random() * (plasticContainer.offsetWidth - plastic.offsetWidth);
                    const top = Math.random() * (plasticContainer.offsetHeight - plastic.offsetHeight);
                    plastic.style.left = `${left}px`;
                    plastic.style.top = `${top}px`;

                    plastics.forEach(otherPlastic => {
                        if (plastic !== otherPlastic) {
                            if (isOverlapping(plastic, otherPlastic)) {
                                overlapping = true;
                            }
                        }
                    });
                } while (overlapping);
            }

            function isOverlapping(elem1, elem2) {
                const rect1 = elem1.getBoundingClientRect();
                const rect2 = elem2.getBoundingClientRect();

                return !(rect1.right < rect2.left ||
                         rect1.left > rect2.right ||
                         rect1.bottom < rect2.top ||
                         rect1.top > rect2.bottom);
            }

            closePopupButton.addEventListener('click', () => {
                popup.style.display = 'none';
                startGameButton.style.display = 'block';
            });

            startGameButton.addEventListener('click', startGame);
        });
    </script>
    @endsection
</x-plasticUserLayout>

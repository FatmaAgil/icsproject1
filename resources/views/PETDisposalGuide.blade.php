<x-PlasticDisposalLayout>
    <main id="main">
        @section('content')
            <div class="hero-section">
                <div class="hero-overlay">
                    <div class="hero-content">
                        <h1>PET Plastic Disposal: Let's Make a Difference!</h1>
                        <p>Learn how to recycle PET plastics and contribute to a sustainable future</p>
                        <button onclick="showPopup()">Get Started</button>
                    </div>
                </div>
            </div>

            <section class="technology-section">
                @foreach ($petPlastics as $petPlastic)
                    <h3 class="card-title">{{ $petPlastic->title }}</h3>
                    <div class="technology-container">
                        <div class="PET">
                            <div class="card-body">
                                <h3>Introduction</h3>
                                <p class="card-text">{{ $petPlastic->introduction }}</p>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="environmental-impact">
                                    <h3>Environmental Impact</h3>
                                    <p>{{ $petPlastic->environmental_impact }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="brief-history">
                                    <h3>Brief History</h3>
                                    <p>{{ $petPlastic->brief_history }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="recycling-info">
                                    <h3>Recycling Information</h3>
                                    <p>{{ $petPlastic->recycling_info }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="physical-properties">
                                    <h3>Physical Properties</h3>
                                    <ul>
                                        @if(is_array($petPlastic->physical_properties))
                                            <li>Density: {{ $petPlastic->physical_properties['density'] }} g/cm³</li>
                                            <li>Melting Point: {{ $petPlastic->physical_properties['melting_point'] }} °C</li>
                                            <li>Tensile Strength: {{ $petPlastic->physical_properties['tensile_strength'] }} MPa</li>
                                        @else
                                            <li>Physical properties data not available.</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="uses">
                                    <h3>Uses</h3>
                                    <p>{{ $petPlastic->uses }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="video-links">
                        <h3>Video Links</h3>
                        <div class="list-group">
                            @foreach(explode(',', $petPlastic->video_links) as $link)
                                <a href="{{ $link }}" class="list-group-item list-group-item-action video-link" target="_blank">
                                    <i class="fab fa-youtube"></i> Watch Video
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- New Quizzes Section -->
                    <section class="quiz-section">
                        <h2>Quiz: How well do you know PET plastic recycling?</h2>
                        <form id="quizForm" action="{{ route('PETDisposalGuide.quiz') }}" method="post">
                            @csrf
                            @foreach($quizQuestions as $question)
                                <h3>{{ $question->question }}</h3>
                                <ul>
                                    @foreach($question->options as $option)
                                        <li>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}">
                                            {{ $option }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                            <button type="submit">Submit Quiz</button>
                        </form>

                        <!-- Modal -->
                        <div id="quizModal" class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Quiz Results</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="quizScore"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.getElementById('quizForm').addEventListener('submit', function(event) {
                                event.preventDefault();

                                let formData = new FormData(this);

                                fetch(this.action, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    let quizScore = document.getElementById('quizScore');

                                    quizScore.textContent = 'Your score: ' + data.quiz_score;
                                    if (data.quiz_score === 100) {
                                        quizScore.textContent += ' Congratulations! You got a perfect score!';
                                    }

                                    // Show the modal
                                    $('#quizModal').modal('show');
                                })
                                .catch(error => console.error('Error:', error));
                            });
                        </script>

                        @if(session('quiz_score'))
                            <p>You scored {{ session('quiz_score') }} out of {{ count($quizQuestions) }}!</p>
                        @endif
                    </section>
                @endforeach
            </div>
            </section>
            <section class="game-section">
                <button id="start-game">Start Game</button>
                <button id="pause-game" disabled>Pause Game</button>
                <div class="popup" id="game-popup">
                    <div class="game-container">
                        <div class="timer-container">
                            <i class="fas fa-clock" id="clock-icon"></i>
                            <p id="timer">20 seconds</p>
                            <audio id="ticking-sound" src="ticking.mp3" loop></audio>
                        </div>
                        <div class="score-container">
                            <p>Score: <span id="score">0</span></p>
                        </div>
                        <div class="plastic-container">
                            <!-- plastics will be generated here -->
                        </div>
                    </div>
                </div>
                <div class="popup" id="game-over-popup">
                    <h2>Game Over!</h2>
                    <p id="game-result"></p>
                    <button id="close-popup">Close</button>
                </div>
            </section>
        </div>
    </section>

    <script>
        const startGameButton = document.getElementById('start-game');
        const pauseGameButton = document.getElementById('pause-game');
        const gamePopup = document.getElementById('game-popup');
        const gameOverPopup = document.getElementById('game-over-popup');
        const clockIcon = document.getElementById('clock-icon');
        const timerElement = document.getElementById('timer');
        const scoreElement = document.getElementById('score');
        const plasticContainer = document.querySelector('.plastic-container');
        const tickingSound = document.getElementById('ticking-sound');
        const closePopupButton = document.getElementById('close-popup');

        let plastics = [];
        let score = 0;
        let timer = 20;
        let gameStarted = false;
        let gamePaused = false;

        startGameButton.addEventListener('click', () => {
            gameStarted = true;
            gamePopup.classList.add('show');
            startGame();
        });

        pauseGameButton.addEventListener('click', () => {
            gamePaused = !gamePaused;
            if (gamePaused) {
                pauseGameButton.textContent = 'Resume Game';
            } else {
                pauseGameButton.textContent = 'Pause Game';
            }
        });

        closePopupButton.addEventListener('click', () => {
            gameOverPopup.classList.remove('show');
        });

        function startGame() {
            // generate plastics
            for (let i = 0; i < 20; i++) {
                const plastic = document.createElement('div');
                plastic.className = 'plastic';
                plastic.innerHTML = `<img src="https://via.placeholder.com/50" alt="Plastic">`;
                plasticContainer.appendChild(plastic);
                plastics.push(plastic);
            }

            // add event listeners to plastics
            plastics.forEach((plastic) => {
                plastic.addEventListener('click', () => {
                    disposePlastic(plastic);
                });
            });

            // start timer
            tickingSound.play();
            setInterval(() => {
                if (!gamePaused) {
                    timer--;
                    timerElement.textContent = timer + ' seconds';
                    if (timer === 0) {
                        endGame();
                    }
                }
            }, 1000); // corrected interval time
        }

        function endGame() {
            // Handle end game logic, e.g., show score, clear plastics, etc.
            gameOverPopup.classList.add('show');
            tickingSound.pause(); // stop ticking sound
        }

        function disposePlastic(plastic) {
            // Logic for what happens when a plastic is disposed (clicked)
            score++;
            scoreElement.textContent = score;
            plastic.remove(); // remove the disposed plastic from DOM
        }
    </script>



        @endsection
    </main>
</x-PlasticDisposalLayout>

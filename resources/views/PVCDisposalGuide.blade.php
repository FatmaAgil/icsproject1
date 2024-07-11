<x-PlasticDisposalLayout>
    <main id="main">
        @section('content')
            <div class="hero-section"style="background-image: url('{{ asset('assets/img/ImagePvc.png') }}'); background-size: cover; height: 100vh;">
                <div class="hero-overlay">
                    <div class="hero-content">
                        <h1>PET Plastic Disposal: Let's Make a Difference!</h1>
                        <p>Learn how to recycle PET plastics and contribute to a sustainable future</p>
                        <button onclick="showPopup()">Get Started</button>
                    </div>
                </div>
            </div>

            <section class="technology-section my-4">
                @foreach ($pvcPlastics as $pvcPlastic)
                    <h3 class="card-title">{{ $pvcPlastic->title }}</h3>
                    <div class="technology-container">
                        <div class="PET">
                            <div class="card-body">
                                <h3>Introduction</h3>
                                <p class="card-text">{{ $pvcPlastic->introduction }}</p>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="environmental-impact">
                                    <h3>Environmental Impact</h3>
                                    <p>{{ $pvcPlastic->environmental_impact }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="brief-history">
                                    <h3>Brief History</h3>
                                    <p>{{ $pvcPlastic->brief_history }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="recycling-info">
                                    <h3>Recycling Information</h3>
                                    <p>{{ $pvcPlastic->recycling_info }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="PET">
                            <div class="card-body">
                                <div class="physical-properties">
                                    <h3>Physical Properties</h3>
                                    <ul>
                                        @if(is_array($pvcPlastic->physical_properties))
                                            @if(isset($pvcPlastic->physical_properties['density']))
                                                <li>Density: {{ $pvcPlastic->physical_properties['density'] }} g/cm³</li>
                                            @else
                                                <li>Density: N/A</li>
                                            @endif
                                            @if(isset($pvcPlastic->physical_properties['melting_point']))
                                                <li>Melting Point: {{ $pvcPlastic->physical_properties['melting_point'] }} °C</li>
                                            @else
                                                <li>Melting Point: N/A</li>
                                            @endif
                                            @if(isset($pvcPlastic->physical_properties['tensile_strength']))
                                                <li>Tensile Strength: {{ $pvcPlastic->physical_properties['tensile_strength'] }} MPa</li>
                                            @else
                                                <li>Tensile Strength: N/A</li>
                                            @endif
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
                                    <p>{{ $pvcPlastic->uses }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="video-links">
                        <h3>Video Links</h3>
                        <div class="list-group">
                            @foreach(explode(',', $pvcPlastic->video_links) as $link)
                                <a href="{{ $link }}" class="list-group-item list-group-item-action video-link" target="_blank">
                                    <i class="fab fa-youtube"></i> Watch Video
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- New Quizzes Section -->
                    <section class="quiz-section">
                        <h2>Quiz: How well do you know PVC plastic recycling?</h2>
                        <form id="quizForm" action="{{ route('PVCDisposalGuide.quiz') }}" method="post">
                            @csrf
                            @foreach($pvcQuestions as $question)
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
            <section class="game section">
                <div class="game-container" id="gameContainer">
                    <h2>Dispose of Plastics and Save the Earth!</h2>
                    <p>Dispose of as many plastics as you can before the timer runs out!</p>
                    <div class="plastic-container" id="plasticContainer">
                        <button id="startButton">Start Game</button>

                    </div>
                    <div class="timer-container">
                        <p>Time remaining: <span id="timer">20</span> </p>
                    </div>
                    <div class="score-container">
                        <p>Score: <span id="score">0</span></p>
                    </div>
                </div>
            </section>

            <div class="modal fade" id="gameOverModal" tabindex="-1" aria-labelledby="gameOverModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gameOverModalLabel">Game Over</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="gameOverScore">Your score: 0</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const gameContainer = document.getElementById('gameContainer');
                const plasticContainer = document.getElementById('plasticContainer');
                const timerElement = document.getElementById('timer');
                const scoreElement = document.getElementById('score');
                const startButton = document.getElementById('startButton');

                let plastics = [];
                let score = 0;
                let timer = 20;

                startButton.addEventListener('click', startGame);

                function startGame() {
                    startButton.style.display = 'none'; // Hide start button
                    gameContainer.style.display = 'block'; // Show game container
                    startTimer();
                    generatePlastics();
                    addPlasticListeners();
                }

                function startTimer() {
                    const gameTimer = setInterval(() => {
                        timer--;
                        timerElement.textContent = timer + ' seconds';
                        if (timer === 0) {
                            clearInterval(gameTimer);
                            endGame();
                        }
                    }, 1000);
                }

                function generatePlastics() {
                    for (let i = 0; i < 40; i++) {
                        const plastic = document.createElement('div');
                        plastic.className = 'plastic';
                        plastic.innerHTML = `<img src="{{ asset('assets/img/PvcImage.png') }}" alt="Plastic">`;
                        plasticContainer.appendChild(plastic);
                        plastics.push(plastic);
                    }
                }

                function addPlasticListeners() {
                    plastics.forEach((plastic) => {
                        plastic.addEventListener('click', () => {
                            disposePlastic(plastic);
                        });
                    });
                }

                function disposePlastic(plastic) {
                    plastic.remove();
                    score++;
                    scoreElement.textContent = `Score: ${score}`;
                }

                function endGame() {
                    document.getElementById('gameOverScore').textContent = `Your score: ${score}`;
                    $('#gameOverModal').modal('show');
                    gameContainer.style.display = 'none'; // Hide the game container
                }
            </script>
        @endsection
    </main>
</x-PlasticDisposalLayout>

<x-plasticUserLayout>
    <main id="main">
        <style>
            main {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                box-sizing: border-box;
                background: #2dc997; /* Green background */
                min-height: 150vh; /* Ensure it covers the full height of the viewport */
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #quiz-section {
                background: #f1f1f1;
                width: 90%;
                max-width: 600px;
                border-radius: 10px;
                padding: 30px;
                text-align: center;
            }
            .app {
                background: #fff;
            }
            .app h1 {
                font-weight: 500;
                color: #2dc997;
                border-bottom: 1px solid #333;
                padding-bottom: 30px;
                font-size: 1.5rem; /* Adjusted font size */
            }
            .quiz {
                padding: 20px 0;
            }
            .quiz h2 {
                font-size: 18px;
                color: #2dc997;
                font-weight: 500;
                margin-bottom: 20px; /* Added margin for spacing */
            }
            .btn {
                background: #fff;
                color: #222;
                font-weight: 400;
                width: 100%;
                border: 1px solid #222;
                padding: 12px; /* Increased padding for better touch target */
                margin: 10px 0;
                text-align: left;
                border-radius: 4px;
                cursor: pointer;
                transition: all 0.3s;
                font-size: 1rem; /* Adjusted font size */
            }
            .btn.correct {
                background: #2dc997; /* Green for correct */
                color: #fff;
            }
            .btn.incorrect {
                background: #e74c3c; /* Red for incorrect */
                color: #fff;
            }
            #next-btn {
                background: #2dc997;
                color: #fff;
                font-weight: 400;
                width: 150px;
                border: 0;
                padding: 12px;
                margin: 20px auto 0;
                border-radius: 6px;
                cursor: pointer;
                display: block;
                display: none;
                font-size: 1rem; /* Adjusted font size */
            }
            .congrats-popup {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #fff;
                border: 2px solid #2dc997;
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 0 20px rgba(0,0,0,0.1);
                text-align: center;
                display: none;
                animation: popup 1s ease-out forwards;
            }
            .congrats-popup h2 {
                color: #2dc997;
                font-size: 24px;
                margin-bottom: 10px; /* Added margin for spacing */
            }
            .congrats-popup p {
                margin: 20px 0;
            }
            .congrats-popup button {
                background: #2dc997;
                color: #fff;
                padding: 12px 24px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 1rem; /* Adjusted font size */
            }
            @keyframes popup {
                from { transform: translate(-50%, -50%) scale(0.5); opacity: 0; }
                to { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            }

            .back-to-guide-btn {
                background: #2dc997;
                color: #fff;
                padding: 12px 24px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin-top: 10px;
                transition: background 0.3s, color 0.3s;
                font-size: 1rem; /* Adjusted font size */
            }

            .back-to-guide-btn:hover {
                background: #1a936f; /* Darker shade of green on hover */
            }
        </style>
        <section id="quiz-section">
            <div class="app">
                <h1>Plastic Quiz</h1>
                <div class="quiz">
                    <h2 id="question">Question Goes here</h2>
                    <div id="answer-buttons">
                        <button class="btn">Answer 1</button>
                        <button class="btn">Answer 2</button>
                        <button class="btn">Answer 3</button>
                        <button class="btn">Answer 4</button>
                    </div>
                    <button id="next-btn">Next</button>
                </div>
            </div>
        </section>
        <div class="congrats-popup" id="congrats-popup">
            <h2>Congratulations!</h2>
            <p>You got a perfect score! Well done!</p>
            <button onclick="closePopup()">Close</button>
            <a href="/guide"><button class="back-to-guide-btn">Back to Guide</button></a>
        </div>
        <script>
            const questions = [
                {
                    question: 'What is the most common type of plastic?',
                    answers: [
                        { text: 'Polyethylene', correct: true },
                        { text: 'Polypropylene', correct: false },
                        { text: 'Polyvinyl Chloride', correct: false },
                        { text: 'Polystyrene', correct: false }
                    ]
                },
                {
                    question: 'Which of the following is NOT a type of plastic?',
                    answers: [
                        { text: 'Bioplastic', correct: false },
                        { text: 'Recyclable plastic', correct: false },
                        { text: 'Glass', correct: true },
                        { text: 'Compostable plastic', correct: false }
                    ]
                },
                {
                    question: 'What percentage of plastic waste ends up in oceans?',
                    answers: [
                        { text: '10%', correct: false },
                        { text: '30%', correct: true },
                        { text: '20%', correct: false },
                        { text: '80%', correct: false }
                    ]
                },
                {
                    question: 'Which country is responsible for the most plastic waste in the world?',
                    answers: [
                        { text: 'China', correct: true },
                        { text: 'United States', correct: false },
                        { text: 'India', correct: false },
                        { text: 'Indonesia', correct: false }
                    ]
                },
                {
                    question: 'Which of the following is a benefit of recycling plastic?',
                    answers: [
                        { text: 'Reduces greenhouse gas emissions', correct: true },
                        { text: 'Conserves natural resources', correct: true },
                        { text: 'Saves energy', correct: true },
                        { text: 'All of the above', correct: true }
                    ]
                },
                {
                    question: 'What is a bioplastic made from?',
                    answers: [
                        { text: 'Compost', correct: false },
                        { text: 'Recycled plastic', correct: false },
                        { text: 'Renewable biomass sources', correct: true },
                        { text: 'Fossil fuels', correct: false }
                    ]
                },
                {
                    question: 'Which company has developed a plastic alternative made from seaweed?',
                    answers: [
                        { text: 'Notpla', correct: true },
                        { text: 'Evian', correct: false },
                        { text: 'IKEA', correct: false },
                        { text: 'Patagonia', correct: false }
                    ]
                }
            ];

            const questionElement = document.getElementById("question");
            const answerButtonsElement = document.getElementById("answer-buttons");
            const nextButton = document.getElementById("next-btn");
            const congratsPopup = document.getElementById("congrats-popup");

            let currentQuestionIndex = 0;
            let score = 0;

            function startQuiz() {
                currentQuestionIndex = 0;
                score = 0;
                nextButton.innerHTML = "Next";
                nextButton.style.display = "none";
                showQuestion();
            }

            function showQuestion() {
                resetState();
                const currentQuestion = questions[currentQuestionIndex];
                questionElement.innerHTML = `${currentQuestionIndex + 1}. ${currentQuestion.question}`;

                currentQuestion.answers.forEach(answer => {
                    const button = document.createElement("button");
                    button.innerHTML = answer.text;
                    button.classList.add("btn");
                    button.addEventListener("click", () => selectAnswer(button, answer));
                    answerButtonsElement.appendChild(button);
                });
            }

            function resetState() {
                nextButton.style.display = 'none';
                while (answerButtonsElement.firstChild) {
                    answerButtonsElement.removeChild(answerButtonsElement.firstChild);
                }
            }

            function selectAnswer(button, answer) {
                const buttons = answerButtonsElement.getElementsByClassName("btn");
                if (answer.correct) {
                    button.classList.add('correct');
                    score++;
                } else {
                    button.classList.add('incorrect');
                }
                Array.from(buttons).forEach(btn => {
                    btn.disabled = true;
                    if (btn !== button && questions[currentQuestionIndex].answers.find(a => a.text === btn.innerText).correct) {
                        btn.classList.add('correct');
                    }
                });
                nextButton.style.display = 'block';
            }

            nextButton.addEventListener('click', () => {
                currentQuestionIndex++;
                if (currentQuestionIndex < questions.length) {
                    showQuestion();
                } else {
                    showScore();
                }
            });

            function showScore() {
                resetState();
                questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
                nextButton.innerHTML = 'Restart';
                nextButton.style.display = 'block';
                nextButton.addEventListener('click', startQuiz);
                const guideButton = document.createElement("button");
                guideButton.innerHTML = 'Back to Guide';
                guideButton.addEventListener('click', () => {
                    window.location.href = '/guide';
                });
                answerButtonsElement.appendChild(guideButton);
                if (score === questions.length) {
                    congratsPopup.style.display = 'block';
                }
            }

            function closePopup() {
                congratsPopup.style.display = 'none';
            }

            startQuiz();
        </script>
    </main>
</x-plasticUserLayout>

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
            { text: 'Compastable plastic', correct: false }
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
            { text: 'Reduces greenhouse gas emissions', correct: false },
            { text: 'Conserves natural resources ', correct: false },
            { text: 'Saves energy', correct: false },
            { text: 'All of the above', correct: true }
        ]
    },
    {
        question: 'What is a bioplastic made from?',
        answers: [
            { text: 'Compost', correct: false },
            { text: 'Recycled plastic', correct: false },
            { text: 'Renewable biomass sources', correct: true },
            { text: ' Fossil fuels', correct: false }
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
const answerButton = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

let currentQuestionIndex =0;
let score =0;


function startQuiz(){
    currentQuestionIndex=0
    score=0
    nextButton.innerHTML = "Next";
    showQuestion();
}

function showQuestion(){
    let currentQuestion = questionNo[currentQuestionIndex];
    let questionNo = currentQuestionIndex +1;
    questionElement.innerHTML = questionNo + "."+currentQuestion.
    question;

    currentQuestion.answers.forEach(answer => {
        const button =document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButton.appendChild(button);
    });
}
startQuiz();

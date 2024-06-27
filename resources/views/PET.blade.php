<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Plastic Disposal Guide</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
      color: #333;
      text-align: center;
    }

    p {
      line-height: 1.6;
    }

    .quiz-container {
      background-color: #f9f9f9;
      padding: 15px;
      margin-top: 20px;
      border-radius: 8px;
    }

    .quiz-question {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .quiz-options {
      margin-top: 10px;
    }

    .quiz-options label {
      display: block;
      margin-bottom: 5px;
    }

    .quiz-options input {
      margin-right: 5px;
    }

    .quiz-submit {
      margin-top: 10px;
    }

    .quiz-result {
      margin-top: 20px;
      text-align: center;
    }

    .resources {
      margin-top: 30px;
    }

    .resource-item {
      margin-bottom: 10px;
    }

    .resource-item a {
      display: block;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
    }

    .resource-item a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Interactive Plastic Disposal Guide</h1>

    <!-- Educational Content Section -->
    <section>
      <h2>Understanding Plastics</h2>
      <p>Plastics are versatile materials used in many everyday products...</p>
    </section>

    <!-- Recycling Locator -->
    <section>
      <h2>Find Recycling Centers Near You</h2>
      <!-- Integrate map or location-based search for recycling centers -->
      <p>Use our interactive map to locate recycling centers that accept plastics...</p>
    </section>

    <!-- Quiz or Assessment -->
    <section class="quiz-container">
      <h2>Test Your Knowledge</h2>
      <div class="quiz-question">
        <p>Which type of plastic is most commonly used for water bottles?</p>
      </div>
      <div class="quiz-options">
        <label><input type="radio" name="quiz-answer" value="1"> PET</label>
        <label><input type="radio" name="quiz-answer" value="2"> HDPE</label>
        <label><input type="radio" name="quiz-answer" value="3"> PVC</label>
      </div>
      <div class="quiz-submit">
        <button onclick="checkQuiz()">Submit Answer</button>
      </div>
      <div class="quiz-result" id="quizResult"></div>
    </section>

    <!-- Tips and Guides -->
    <section>
      <h2>Tips for Reducing Plastic Waste</h2>
      <ul>
        <li>Use reusable shopping bags instead of plastic bags.</li>
        <li>Avoid single-use plastic water bottles; use refillable bottles.</li>
        <li>Buy products with minimal packaging or in recyclable containers.</li>
      </ul>
    </section>

    <!-- Resources and Links -->
    <section class="resources">
      <h2>Additional Resources</h2>
      <div class="resource-item">
        <a href="#">Learn more about recycling plastics</a>
      </div>
      <div class="resource-item">
        <a href="#">Local recycling programs and initiatives</a>
      </div>
    </section>
  </div>

  <script>
    function checkQuiz() {
      const quizAnswer = document.querySelector('input[name="quiz-answer"]:checked');
      const quizResult = document.getElementById('quizResult');

      if (quizAnswer && quizAnswer.value === "1") {
        quizResult.innerHTML = "<p>Correct! PET (Polyethylene Terephthalate) is commonly used for water bottles.</p>";
      } else {
        quizResult.innerHTML = "<p>Incorrect. PET (Polyethylene Terephthalate) is commonly used for water bottles.</p>";
      }
    }
  </script>
</body>
</html>

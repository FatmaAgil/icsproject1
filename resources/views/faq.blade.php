<x-layout>

    <x-slot name="title">
        FAQ Section
    </x-slot>


</x-layout>


<div class="faq-container" style="margin-top: 100px;">
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">
            <h3>What is Recycle Connect?</h3>
            <span class="icon">+</span>
        </div>
        <div class="faq-answer">
            <p>Recycle Connect is a platform that connects plastic users with recycling organizations.</p>
        </div>
    </div>
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">
            <h3>How do I sign up?</h3>
            <span class="icon">+</span>
        </div>
        <div class="faq-answer">
            <p>You can sign up by clicking the 'Sign Up' button on the homepage and filling out the registration form.</p>
        </div>
    </div>
</div>

<style>
    .faq-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .faq-item {
        margin-bottom: 10px;
    }

    .faq-question {
        background: mediumspringgreen;
        color: #fff;
        padding: 15px;
        cursor: pointer;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-question h3 {
        margin: 0;
    }

    .faq-answer {
        display: none;
        padding: 15px;
        background: #ecf0f1;
        border-radius: 5px;
        margin-top: 0;
    }

    .icon {
        font-size: 18px;
    }

    .faq-question.active .icon {
        transform: rotate(45deg);
    }
</style>

<script>
    function toggleAnswer(element) {
        const answer = element.nextElementSibling;
        const icon = element.querySelector('.icon');

        if (answer.style.display === 'block') {
            answer.style.display = 'none';
            icon.innerText = '+';
        } else {
            answer.style.display = 'block';
            icon.innerText = '−';
        }

        element.classList.toggle('active');
    }
</script>

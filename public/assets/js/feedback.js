document.addEventListener('DOMContentLoaded', () => {
    const ratings = [
        { emoji: '😊', name: 'Give us a rating' },
        { emoji: '😠', name: 'Very Poor' },
        { emoji: '😟', name: 'Poor' },
        { emoji: '😐', name: 'Good' },
        { emoji: '😊', name: 'Very Good' },
        { emoji: '😍', name: 'Excellent' },
    ];

    const ratingInputs = document.querySelectorAll('.rating input');
    const emojiDisplay = document.querySelector('.emoji');
    const feedbackText = document.querySelector('.feedback-text');
    const ratingLabels = document.querySelectorAll('.rating label');
    const ratingsHiddenInput = document.getElementById('ratings');

    ratingInputs.forEach(input => {
        input.addEventListener('change', () => {
            const ratingValue = parseInt(input.value);

            emojiDisplay.textContent = ratings[ratingValue].emoji;
            feedbackText.textContent = ratings[ratingValue].name;

            ratingLabels.forEach(label => label.style.color = '#ccc');

            for (let i = 0; i < ratingValue; i++) {
                ratingLabels[i].style.color = '#663300';
            }

            // Update hidden input value with the selected rating
            ratingsHiddenInput.value = ratingValue;
        });
    });
});
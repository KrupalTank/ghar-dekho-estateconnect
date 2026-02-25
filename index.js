let currentIndex = 0;
const slider = document.querySelector('.slider');
const cards = document.querySelectorAll('.card');
const totalCards = cards.length;
const visibleCards = 3; // Number of cards visible at a time

// Automatically slide every 3 seconds
setInterval(() => {
    moveSlide('next');
}, 3000);

function moveSlide(direction) {
    const cardWidth = cards[0].offsetWidth + 20; // Width of a card + margin
    const visibleWidth = cardWidth * visibleCards;

    if (direction === 'next') {
        currentIndex++;
        if (currentIndex >= totalCards - visibleCards + 1) {
            currentIndex = 0; // Loop back to the start
        }
    } else if (direction === 'prev') {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = totalCards - visibleCards; // Loop to the last set of cards
        }
    }

    // Move the slider by the correct number of card widths
    slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
}


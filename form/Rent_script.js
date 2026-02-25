  
// Function to move the slide
function moveSlide(sliderId, direction) {
  const slider = document.getElementById(sliderId);
  const images = slider.querySelectorAll('img');
  const totalImages = images.length;

  // Get the current offset for the slider
  const currentOffset = parseInt(getComputedStyle(slider).transform.split(',')[4]) || 0;

  // Calculate new offset based on the direction
  const newOffset = currentOffset + (direction * 400); // 400px per image width

  // Check if the new offset exceeds the boundaries
  if (newOffset > 0) {
    // If moving right (Prev button), bring it back to the last image
    slider.style.transform = `translateX(-${(totalImages - 1) * 400}px)`;
  } else if (newOffset < -(totalImages - 1) * 400) {
    // If moving left (Next button), bring it back to the first image
    slider.style.transform = `translateX(0px)`;
  } else {
    // Move to the next/previous image
    slider.style.transform = `translateX(${newOffset}px)`;
  }
}


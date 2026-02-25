// Wait for the DOM to be loaded before attaching event listeners
document.addEventListener('DOMContentLoaded', function () {
    const signupBtn = document.getElementById('signupBtn');
    const loginBtn = document.getElementById('loginBtn');

    
    // Add event listeners for the buttons
    signupBtn.addEventListener('click', function () {
        openModal('signup');
    });
    
    loginBtn.addEventListener('click', function () {
        openModal('login');
    });

    
});

// Function to open the modal and overlay
function openModal(type) {
    const overlay = document.getElementById("overlay");
    const signupModal = document.getElementById("signupModal");
    const loginModal = document.getElementById("loginModal");
    
    // Show the overlay and the respective modal
    overlay.style.display = "block";
    if (type === 'signup') {
        loginModal.style.display = "none";
        signupModal.style.display = "block";
    } else if(type === 'login') {
        loginModal.style.display = "block";
    }
    
}

// Function to close the modal and overlay
function closeModal() {
    const overlay = document.getElementById("overlay");
    const signupModal = document.getElementById("signupModal");
    const loginModal = document.getElementById("loginModal");

    // Hide the overlay and modals
    overlay.style.display = "none";
    signupModal.style.display = "none";
    loginModal.style.display = "none";

}

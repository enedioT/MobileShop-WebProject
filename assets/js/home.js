const buttons = document.querySelectorAll('.carousel-button');

// Add event listeners to each button
buttons.forEach(button => {
  button.addEventListener('click', function() {
    buttonClicked('category.php');
  });
});

// Function to handle button click
function buttonClicked(productPage) {
  window.location.href = productPage;
}

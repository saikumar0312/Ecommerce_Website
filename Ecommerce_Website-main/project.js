//scrolling function
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    const targetSectionClass = event.target.getAttribute('href').slice(1);
    const targetSections = document.getElementsByClassName(targetSectionClass);

    if (targetSections.length > 0) { // Check if any elements were found
      const targetSection = targetSections[0];
      targetSection.scrollIntoView({ behavior: "smooth" });
    } else {
      console.warn("Target section not found:", targetSectionClass); // Handle or log the missing section
    }
  });
});
// filter product
function filterProducts(value){
  let buttons = document.querySelectorAll(".button-value");
  buttons.forEach(button => {

      if(value.toUpperCase() == button.innerText.toUpperCase()){
          button.classList.add("active-btn");
      }
      else{
          button.classList.remove("active-btn");
      }
  });
}

window.onload = () => {
  filterProducts("All")
}
//  Slider for image 
// Select all image elements within the `ul` element of the class `header-slider`
const img = document.querySelectorAll('.header-slider ul img');

// Select the previous button element with the class `control-pre`
const pre_btn = document.querySelector('.control-pre');

// Select the next button element with the class `control-next`
const next_btn = document.querySelector('.control-next');

// Initialize the current slide index (starts at 0)
let n = 0;

// Function to change the displayed slide
function changeSlide() {
  // Hide all images
  for (let i = 0; i < img.length; i++) {
    img[i].style.display = 'none';
  }

  // Show the image at the current index
  img[n].style.display = 'block';
}

// Call the changeSlide function initially to display the first slide
changeSlide();

// Add event listener for the previous button click
pre_btn.addEventListener('click', (e) => {
  e.preventDefault(); // Prevent default button behavior (like form submission)

  // Handle previous button click logic
  if (n > 0) {
    n--; // Decrement the current slide index if it's not the first slide
  } else {
    // If it's the first slide, wrap around to the last slide
    n = img.length - 1;
  }

  // Update the displayed slide based on the new index
  changeSlide();
});

// Add event listener for the next button click
next_btn.addEventListener('click', (e) => {
  e.preventDefault(); // Prevent default button behavior

  // Handle next button click logic
  if (n < img.length - 1) {
    n++; // Increment the current slide index if it's not the last slide
  } else {
    // If it's the last slide, wrap around to the first slide using modulo operator
    n = (n + 1) % img.length;
  }

  // Update the displayed slide based on the new index
  changeSlide();
});
// login

document.getElementById('user-login').addEventListener('click', function() {
        window.location.href = 'index.php'; 
    });


    

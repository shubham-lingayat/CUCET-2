let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("template-slides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "flex";
  dots[slideIndex - 1].className += " active";
  setTimeout(showSlides, 2000);
}

// let slideIndex = 0;
// showSlides();

// function showSlides() {
//   let i;
//   let slides = document.getElementsByClassName("template-slides");
//   let dots = document.getElementsByClassName("dot");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.left = "-665px";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) {
//     slideIndex = 1;
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex - 1].style.left = "0px";
//   dots[slideIndex - 1].className += " active";
//   setTimeout(showSlides, 2000);
// }

//  // Code to implement mouse dragging for horizontal scroll
const container = document.getElementById("scrollable-container");
let isMouseDown = false;
let startX, scrollLeft;

container.addEventListener("mousedown", (e) => {
  isMouseDown = true;
  container.classList.add("cursor-grabbing");
  startX = e.pageX - container.offsetLeft;
  scrollLeft = container.scrollLeft;
});

container.addEventListener("mouseleave", () => {
  isMouseDown = false;
  container.classList.remove("cursor-grabbing");
});

container.addEventListener("mouseup", () => {
  isMouseDown = false;
  container.classList.remove("cursor-grabbing");
});

container.addEventListener("mousemove", (e) => {
  if (!isMouseDown) return;
  e.preventDefault();
  const x = e.pageX - container.offsetLeft;
  const walk = (x - startX) * 1; // scroll speed
  container.scrollLeft = scrollLeft - walk;
});

// Verify OTP function
// function verifyOtp(event) {
//   event.preventDefault(); // Prevent form from submitting the traditional way
//   const otp = document.getElementById("otp").value; // Get OTP value from input field

//   const xhr = new XMLHttpRequest();
//   xhr.open("POST", "verify_otp.php", true); // Send request to verify_otp.php
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   xhr.onload = function () {
//     if (xhr.status === 200) {
//       alert(xhr.responseText); // Display server response in a popup
//     } else {
//       alert("Error: " + xhr.statusText); // Display error if request fails
//     }
//   };
//   xhr.onerror = function () {
//     alert("Request failed"); // Handle network errors
//   };
//   xhr.send("otp=" + encodeURIComponent(otp)); // Send OTP to the server
// }

function sendForm(event, action) {
  event.preventDefault(); // Prevent form from submitting the traditional way

  // Collect form data
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;

  // Create a FormData object to send via AJAX
  const formData = new FormData();
  formData.append("name", name);
  formData.append("email", email);

  // Append action to FormData
  formData.append("action", action);

  // Create an AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "generate_otp.php", true); // Replace 'process_form.php' with your PHP script
  xhr.onload = function () {
    if (xhr.status === 200) {
      alert(xhr.responseText); // Display server response in a popup
    } else {
      alert("Error: " + xhr.statusText); // Display error if request fails
    }
  };
  xhr.onerror = function () {
    alert("Request failed"); // Handle network errors
  };
  xhr.send(formData); // Send form data to the server
}

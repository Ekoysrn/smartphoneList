let slideIndex = 0;

showSlides();

function showSlides() {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  // hide all slides and remove "active" class from dots
  Array.from(slides).forEach((slide) => (slide.style.display = "none"));
  Array.from(dots).forEach((dot) => dot.classList.remove("active"));

  // increment slideIndex  and reset if it exceeds the number of slides
  slideIndex = slideIndex + 1 > slides.length ? 1 : slideIndex + 1;
  // display the current slide and add "active" class to the corresponding dot
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].classList.add("active");

  setTimeout(showSlides, 2000); //change image every 2 seconds;
}

// function logout
function btnLogOut() {
  let c = confirm("anda yakin untuk logout?");

  c == true
    ? (window.location.href = "logout.php")
    : (window.location.href = "#");
}

// get elemetn
const input = document.getElementById("input");
const div = document.querySelector(".fluidContainer");

input.addEventListener('keyup',function(){

    let xhr = new XMLHttpRequest;

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            div.innerHTML = this.responseText;
        }
    };

    xhr.open("GET",`ajax.php?keyword=${input.value}`);
    xhr.send();
})
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {

    document.getElementById("header").style.background = "#060c22";
  } else {

    document.getElementById("header").style.background = "none";
  }
}

var countDownDate = new Date("Nov 13, 2021 00:00:00").getTime();
var x = setInterval(function () {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 6))
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById('days').innerHTML = "<h2>" + days + "</h2>Days"
  document.getElementById('hours').innerHTML = "<h2>" + hours + "</h2>Hours"
  document.getElementById('minutes').innerHTML = "<h2>" + minutes + "</h2>Minutes"
  document.getElementById('seconds').innerHTML = "<h2>" + seconds + "</h2>Seconds"

  if (distance < 0) {
    clearInterval(x);
    document.getElementById('launch').innerHTML = 'EXPIRED';
  }
})

$(document).ready(function () {
  // Add minus icon for collapse element which is open by default
  $(".collapse.show").each(function () {
    $(this).prev(".card-header").addClass("highlight");
  });

  // Highlight open collapsed element 
  $(".card-header .btn").click(function () {
    $(".card-header").not($(this).parents()).removeClass("highlight");
    $(this).parents(".card-header").toggleClass("highlight");
  });
});

const qnas = document.querySelectorAll(".qna");

qnas.forEach(qna => {
  qna.addEventListener("click", () => {
    qna.classList.toggle("active");
  })
})
let title = document.getElementById("title");

title.style.color = "green";

let btn = document.getElementById("btn");

btn.addEventListener("click", function () {
  title.innerText = "Button Clicked!";
});

let input = document.getElementById("input");

input.addEventListener("input", function (e) {
  console.log("Input:", e.target.value);
});

let p = document.createElement("p");
p.innerText = "This is a new paragraph";

document.body.appendChild(p);

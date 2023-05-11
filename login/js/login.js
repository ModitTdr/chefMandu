const style1Link = document.getElementById("stylesheet");
const btn1 = document.querySelector("#reg");
const btn2 = document.querySelector("#login");

btn1.addEventListener("click", function () {
  style1Link.href = "css/register.css";
});
btn2.addEventListener("click", function () {
  style1Link.href = "css/login.css";
});

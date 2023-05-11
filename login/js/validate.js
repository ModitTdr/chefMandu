var btn = document.querySelector("#btn");
var btnReg = document.querySelector("#btnReg");
var input = document.querySelectorAll("input");

var nameVal = /^[a-zA-Z][a-zA-Z0-9_-]{2,15}$/;
var emailVal = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

if (btn) {
  btn.addEventListener("click", function () {
    //validating fullname
    if (!nameVal.test(input[0].value)) {
      validateStyle(input[0]);
    } else {
      removeValStyle(input[0], 0);
    }
  });
} else {
  btnReg.addEventListener("click", function () {
    //validating fullname
    if (!nameVal.test(input[0].value)) {
      validateStyle(input[0]);
    } else {
      removeValStyle(input[0], 0);
    }
    //validating email
    if (!emailVal.test(input[1].value)) {
      validateStyle(input[1]);
    } else {
      removeValStyle(input[1], 0);
    }
  });
}

function validateStyle(element) {
  element.setAttribute("style", "border:1px solid red;");
}
function removeValStyle(element, count) {
  element.setAttribute("style", "border: 1px solid gray;");
}

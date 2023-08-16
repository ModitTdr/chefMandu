var btn = document.querySelector("#btn");
var btnReg = document.querySelector("#btnReg");
var input = document.querySelectorAll("input");
var error = document.querySelectorAll(".error");

var nameVal = /^[a-zA-Z][a-zA-Z0-9_]{2,}$/;
var emailVal = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

if (btn) {
  btn.addEventListener("click", function (event) {
    //validating fullname
    if (!nameVal.test(input[0].value)) {
      event.preventDefault();
      validateStyle(input[0]);
      //checking if first letter is alphabet or not
      if (!isNumber(input[0].value[0])) {
        error[0].innerHTML = "Please enter username correctly";
      } else {
        error[0].innerHTML = "Username should start with alphabet";
      }
    } else {
      removeValStyle(input[0]);
      error[0].innerHTML = "";
    }
    //validating password
    if (input[1].value.length < 5) {
      event.preventDefault();
      validateStyle(input[1]);
      error[1].innerHTML = "Password should be greater than 4";
    } else {
      removeValStyle(input[1]);
      error[1].innerHTML = "";
    }
  });
} else {
  btnReg.addEventListener("click", function (event) {
    //validating fullname
    if (!nameVal.test(input[0].value)) {
      event.preventDefault();
      validateStyle(input[0]);
      //checking if first letter is alphabet or not
      if (!isNumber(input[0].value[0])) {
        error[0].innerHTML = "Please enter username correctly";
      } else {
        error[0].innerHTML = "Username should start with alphabet";
      }
    } else {
      removeValStyle(input[0]);
      error[0].innerHTML = "";
    }
    //validating email
    if (!emailVal.test(input[1].value)) {
      event.preventDefault();
      validateStyle(input[1]);
      error[1].innerHTML = "Please enter email correctly";
    } else {
      removeValStyle(input[1]);
      error[1].innerHTML = "";
    }
    if (input[2].value.length < 5) {
      event.preventDefault();
      validateStyle(input[2]);
      error[2].innerHTML = "Password should be greater than 4";
    } else {
      removeValStyle(input[2]);
      error[2].innerHTML = "";
    }

    if (input[2].value != input[3].value) {
      event.preventDefault();
      validateStyle(input[3]);
      error[3].innerHTML = "Password doesn't match";
    } else {
      removeValStyle(input[3]);
      error[3].innerHTML = "";
    }
  });
}

function validateStyle(element) {
  element.setAttribute("style", "border:1px solid red;");
}
function removeValStyle(element) {
  element.setAttribute("style", "border: 1px solid gray;");
}
function isNumber(char) {
  return /^[0-9~`!@#$%^&*()_\-+={[}\]|:;"'<,>.?/]+$/.test(char);
}

//alert
var alert = document.querySelector(".status");
setTimeout(function () {
  alert.classList.add("close");
}, 8000);

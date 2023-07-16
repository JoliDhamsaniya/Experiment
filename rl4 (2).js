const form = document.getElementById("form");
const email = document.getElementById("email");
const password = document.getElementById("password");


var ck_name1 = /^[A-Za-z0-9]{3,20}$/;
var ck_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
var ck_password1 =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;

form.addEventListener("submit", (e) => {
  let a=checkInputs();
  if (!a) {
    e.preventDefault();
  }
});
function checkInputs() {
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  let error = true;
  if (emailValue === "") {
    setErrorInput(email, "Email Can't Be Blank.");
    error = false;
  } 
  else if (!ck_email.test(emailValue)){
    setErrorInput(email, "Enter Valid Email ID.");
  }
  else {
    validateEmail(emailValue) && setSuccessInput(email);
  }

  //###################################
  if (passwordValue === "") {
    setErrorInput(password, "Password Can't Be Blank.");
    error = false;
  } 
  else if (!ck_password1.test(passwordValue)){
    setErrorInput(password, "Enter Valid Password.");
  }
  else {
    setSuccessInput(password) && validatePassword(passwordValue);
  }
  return error;

  //###################################
  
}

function setErrorInput(input, errorMessage) {
  const formControl = input.parentElement;
  const small = formControl.querySelector("small");

  small.innerText = errorMessage;
  formControl.className = "form__control error";
}

function setSuccessInput(input) {
  const formControl = input.parentElement;
  formControl.className = "form__control success";
}

function validateEmail(email) {
  let regular_expressions = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regular_expressions.test(String(email).toLocaleLowerCase());
}

function validatePassword(password) {
  let regular_expressions = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
  return regular_expressions.match(regular_expressions);
}





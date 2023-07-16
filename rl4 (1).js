const form = document.getElementById("form");
const lastname = document.getElementById("lastname");
const firstname = document.getElementById("firstname");
const email = document.getElementById("email");
const password = document.getElementById("password");
const password2 = document.getElementById("confirmPassword");

var ck_name1 = /^[A-Za-z0-9]{3,20}$/;
var ck_name2 = /^[A-Za-z0-9]{3,20}$/;
var ck_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
var ck_password1 = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
var ck_password2 = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;

form.addEventListener("submit", (e) => {
  let a=checkInputs();
  if (!a) {
    e.preventDefault();
  }
});

function checkInputs() {
  //Get the value the form field.
  const lastnameValue = lastname.value.trim(); //trim to delete blanc space.
  const firstnameValue = firstname.value.trim(); //trim to delete blanc space.
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  const password2Value = password2.value.trim();
  let error = true;

  if (lastnameValue === "") {
    setErrorInput(lastname, "Lastname Can't Be Blank.");
    error = false;
  } else if (!ck_name1.test(lastnameValue)) {
    setErrorInput(lastname, "Enter Valid Last Name.");
  } else {
    setSuccessInput(lastname);
  }

  if (firstnameValue === "") {
    setErrorInput(firstname, "Firstname Can't Be Blank.");
    error = false;
  } else if (!ck_name2.test(firstnameValue)) {
    setErrorInput(firstname, "Enter Valid First Name.");
  } else {
    setSuccessInput(firstname);
  }

  //###################################
  if (emailValue === "") {
    setErrorInput(email, "Email Can't Be Blank.");
    error = false;
  } else if (!ck_email.test(emailValue)) {
    setErrorInput(email, "Enter Valid Email ID.");
  } else {
    validateEmail(emailValue) && setSuccessInput(email);
  }

  //###################################
  if (passwordValue === "") {
    setErrorInput(password, "Password Can't Be Blank.");
    error = false;
  } else if (!ck_password1.test(passwordValue)) {
    setErrorInput(password, "Enter Valid Password.");
  } else {
    setSuccessInput(password) && validatePassword(passwordValue);
  }

  //###################################
  if (password2Value === "") {
    setErrorInput(password2, "Confirm Password Can't Be Blank.");
    error = false;
  } else if (password2Value !== passwordValue) {
    setErrorInput(password2, "Password dose not match.");
    error = false;
  } else {
    setSuccessInput(password2);
  }
  return error;
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

function validateLname(lastname) {
  let regular_expressions = /^[A-Za-z]{3,20}$/;
  return regular_expressions.test(regular_expressions);
}

function validateFname(firstname) {
  let regular_expressions = /^[A-Za-z]{3,20}$/;
  return regular_expressions.test(regular_expressions);
}

function validateEmail(email) {
  let regular_expressions =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regular_expressions.test(String(email).toLocaleLowerCase());
}

function validatePassword(password) {
  let regular_expressions = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
  return regular_expressions.match(regular_expressions);
}

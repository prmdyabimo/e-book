// pass show / hide
// from input password
const passField = document.getElementById("password");
const toggleBtn = document.getElementById("btn-eye");

toggleBtn.onclick = () => {
  if (passField.type == "password") {
    passField.type = "text";
    toggleBtn.classList.add("active");
  } else {
    passField.type = "password";
    toggleBtn.classList.remove("active");
  }
  
};

// conf pass show / hide
// from input confirm password
const passFieldConf = document.getElementById("confirm-password");
const toggleBtnConf = document.getElementById("btn-eye-conf-pass");

toggleBtnConf.onclick = () => {
  if (passFieldConf.type == "password") {
    passFieldConf.type = "text";
    toggleBtnConf.classList.add("active-conf-pass");
  } else {
    passFieldConf.type = "password";
    toggleBtnConf.classList.remove("active-conf-pass");
  }
};
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
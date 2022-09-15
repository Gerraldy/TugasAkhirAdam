const darkBtn = document.getElementById("dark-btn");
const body = document.body;
const darkTheme = localStorage.getItem("dark");

if (darkTheme) body.classList.add("dark-body");

darkBtn.onclick = e => {
  e.preventDefault();
  if (!body.classList.contains("dark-body")) {
    body.classList.add("dark-body");
    localStorage.setItem("dark", true);
  } else {
    body.classList.remove("dark-body");
    localStorage.removeItem("dark");
  }
};

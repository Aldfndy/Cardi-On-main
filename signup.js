function submitForm() {
  let form = document.querySelector('form');
  let formData = new FormData(form);

  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'signup_handler.php');

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log('Response Text:', xhr.responseText);
        console.log('Status:', xhr.status);

        let homeLink = document.getElementById("home-link");
        let loginLink = document.getElementById("login-link");
        let response = xhr.responseText.trim();
        let popupMessage = document.getElementById("popup-message");
        let popup = document.getElementById("popup");

        if (response === 'success') {
          popupMessage.textContent = 'Your account has been created.';
        } else if (response === '1062') {
          popupMessage.textContent = 'Email already exists.';
          homeLink.textContent = 'Use Another Email';
          homeLink.removeAttribute("href");
          homeLink.addEventListener("click", closePopup);
        } else if (response === '1064') {
          popupMessage.textContent = 'Please fill in all fields correctly';
          homeLink.textContent = 'OK';
          homeLink.removeAttribute("href");
          homeLink.addEventListener("click", closePopup);
          loginLink.style.display = 'none';
        }

        popup.classList.add("open-popup");
        homeLink.addEventListener("click", activateTimeout);
        loginLink.addEventListener("click", activateTimeout);
      } else {
        console.error('AJAX request failed:', xhr.status);
      }
    }
  };

  xhr.send(formData);
}

function closePopup() {
  let popup = document.getElementById("popup");
  popup.classList.remove("open-popup");
}

function activateTimeout() {
  let homeLink = document.getElementById("home-link");
  let loginLink = document.getElementById("login-link");

  homeLink.style.pointerEvents = 'none';
  loginLink.style.pointerEvents = 'none';

  setTimeout(function () {
    homeLink.textContent = 'Home';
    homeLink.setAttribute("href", "index.php");
    homeLink.style.pointerEvents = 'auto';
    loginLink.style.display = 'inline';
    loginLink.style.pointerEvents = 'auto';
  }, 1000);
}

// Add Asterisk
console.log('Loaded');
const formElement = document.querySelector("form");
var x = formElement.querySelectorAll(
    "input:not([type='submit']):not([type='checkbox']):not([type='hidden'])"
);
window.addEventListener("DOMContentLoaded", addAsterisk);

function addAsterisk(e) {
    for (i = 0; i < x.length; i++) {
        {
            if (x[i].hasAttribute("required")) {
console.log("Function Loaded");
                // x[i].previousElementSibling.insertinnerHTML("afterend",
                //     '<span style="color:red;margin-left:.2em;">*</span>');
                x[i].previousElementSibling.innerHTML +=
                    '<span style="color:red;margin-left:.2em;">*</span>';
            } else {
                try {
// console.log(x[i].previousElementSibling.innerHTML = "Changed");
                    x[i].previousElementSibling.innerHTML += "<span> (Optional)</span>";
                    console.log(x[i].previousElementSibling.innerHTML);
                } catch (error) {
                    console.error(error);
                }
            }
        }
    }
}

// Password Show/Hide
const passwordToggler = document.querySelector(".password-toggler");
if (passwordToggler) {
    const passwordInput = passwordToggler.parentNode.querySelector(
        "input[type='password']"
    );
    passwordToggler.addEventListener("click", e => {
        if (passwordInput.getAttribute("type") === "password") {
            passwordInput.setAttribute("type", "text");
            passwordToggler.classList.remove("fa-eye");
            passwordToggler.classList.add("fa-eye-slash");
            passwordToggler.setAttribute("title", "Hide Password");
        } else {
            passwordInput.setAttribute("type", "password");
            passwordToggler.classList.remove("fa-eye-slash");
            passwordToggler.classList.add("fa-eye");
            passwordToggler.setAttribute("title", "Show Password");
        }
    });
}

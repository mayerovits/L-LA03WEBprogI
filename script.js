document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const inputs = form.querySelectorAll("input, textarea");
    const emailInput = form.querySelector("input[type='email']");
  
    form.addEventListener("submit", function (event) {
      let valid = true;
      let messages = [];
  
      inputs.forEach(input => {
        const value = input.value.trim();
        const name = input.getAttribute("name");
  
        if (value.length < 10) {
          valid = false;
          messages.push(`${name} mező legalább 10 karakter legyen.`);
          input.classList.add("is-invalid");
        } else {
          input.classList.remove("is-invalid");
        }
      });
  
      // E-mail validáció
      const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
      if (!emailPattern.test(emailInput.value.trim())) {
        valid = false;
        messages.push("Az e-mail cím formátuma érvénytelen.");
        emailInput.classList.add("is-invalid");
      }
  
      if (!valid) {
        event.preventDefault(); // ne küldje el
        alert(messages.join("\n"));
      }
    });
  });
  
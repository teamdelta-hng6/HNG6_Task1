// Variables
const sendBtn = document.getElementById('signup-btn'),
      email = document.querySelector('.email'),
      password = document.querySelector('.password'),
      username = document.querySelector('.username');


// Event Listeners
eventListeners();

function eventListeners() {
 
  sendBtn.addEventListener('click' , send);
     // Validate the forms
     email.addEventListener('input', validateField);
     password.addEventListener('input', validateField);
     username.addEventListener('input', validateField);
    
}


// Validate the fields
function validateField() {

     // Validate the Length of the field
     validateLength(this);

     // Validate the email
     if(this.type === 'email') {
          validateEmail(this);
     }

}

// Validate the Length of the fields
function validateLength(field) {
     if(field.value.length > 0 ) {
          field.style.borderBottom = '2px solid rgba(10, 180, 180, 1)';
          field.classList.remove('error');
     } else {
          field.style.borderBottomColor = 'red';
          field.classList.add('error');
     }
}
// validate email (checks for @ in the value )
function validateEmail(field) {
     let emailText = field.value;
     // check if the emailText contains the @ sign
     if(emailText.indexOf('@') !== -1) {
          field.style.borderBottom = '2px solid rgba(10, 180, 180, 1)';
          field.classList.remove('error');
     } else {
          field.style.borderBottomColor = 'red';
          field.classList.add('error');
     }
}

function send() {
  
     // Both will return errors, then check if there're any errors
     let errors = document.querySelectorAll('.error');
  
     // Check that the inputs are not empty
     if(email.value !== '' && email.value !== '' && password.value !== '' ) {
          if(errors.length === 0) {
              alert('Account created successfully')
          }
     }
}

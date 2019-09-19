

function eventListener() {

  //get elements from dom and store into variables
  const login = document.querySelector('.login');
  const create = document.querySelector('.create');

  //listen to events
  login.addEventListener('click', toggle);
  create.addEventListener('click', toggle);
}


function toggle(e) {
  let target = e.target;

  //get elements from dom and store into variables
  let signup = document.querySelector('.signup');
  let signin = document.querySelector('.signin');

  if (target.classList.contains('login')) {

    signup.style.zIndex = '-1';
    signin.style.zIndex = '3';

    signup.parentElement.style.zIndex = '-1';
    signin.parentElement.style.zIndex = '3';

    signin.classList.add('animate');

    //delay for 2 seconds and remove class
    setTimeout(function () {
      signin.classList.remove('animate');
    }, 2000)

  };

  if (target.classList.contains('create')) {

    signin.style.zIndex = '-1';
    signup.style.zIndex = '3';

    signin.parentElement.style.zIndex = '-1';
    signup.parentElement.style.zIndex = '3';

    signup.classList.add('animate');

    //delay for 2 seconds and remove class
    setTimeout(function () {
      signup.classList.remove('animate');
    }, 2000);

  };

}


//call function
eventListener();
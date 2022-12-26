// Confirm alert when 'Back' button is clicked
function backAlert() {
    Swal.fire({
        icon: 'question',
        title: 'Invalid',
        text: 'Do you want to cancel?',
        showCancelButton : true,
        focusCancel : true,
        confirmButtonColor: '#FBFBFB'
        }).then(function(result) {
            if (result.isConfirmed) {
                return window.location.href = '../services-consultation.php';
            }
        })
}

// Confirm alert when 'Reset' button is clicked
function confirmReset(form) {
    Swal.fire({
        icon: 'question',
        title: 'Confirm cancel',
        text: 'Do you want to cancel?',
        showCancelButton : true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.reset();
            return Swal.close();
        }
    });
    return false;
}


// Message to show 'Success' or 'Error' message
function recordStatus(state) {
    if (state == 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Added Succesfully',
        })
    }
}

function passwordToggle() {
    var passwordInput = document.getElementById('password');
    var passwordHide = document.getElementById('password-hide');
    var passwordShow = document.getElementById('password-show');

    console.log(passwordHide)
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordHide.classList.remove('password-icon--hide')
        passwordShow.classList.add('password-icon--hide')
    } else {
        passwordInput.type = "password";
        passwordHide.classList.add('password-icon--hide')
        passwordShow.classList.remove('password-icon--hide')
    }
}

// Add Button on the navbar
const navBar = document.getElementById('nav-btn');
navBar.addEventListener ('click', () => {
    const { value: service } =  Swal.fire({
        icon: 'question',
        title: 'Select a service',
        input: 'select',
        inputOptions: {
            'deworming': 'Deworming' ,
            'consultation': 'Consultation' ,
            'childhood': 'Childhood Care' ,
            'prenatal': 'Pre-natal' ,
            'postnatal': 'Post-natal' ,
            // 'icecream': 'Ice cream'
        },
        // inputPlaceholder: 'Select a fruit',
        showCancelButton: true,
        inputValidator: (value) => {
          return new Promise((resolve) => {
            if (value === 'deworming') {
              window.location.href = '/barangay-datu-esmael-rms/dist/add/add-deworming.php';
            } else if (value === 'consultation') {
                window.location.href = '/barangay-datu-esmael-rms/dist/add/add-consultation.php';
            } else if (value === 'childhood') {
                window.location.href = '/barangay-datu-esmael-rms/dist/add/add-early_childhood.php';
            } else if (value === 'prenatal') {
                window.location.href = '/barangay-datu-esmael-rms/dist/add/add-prenatal.php';
            } else if (value === 'postnatal') {
                window.location.href = '/barangay-datu-esmael-rms/dist/add/add-postnatal.php';
            } 
          })}
    })
})

// document.getElementsByClassName('services__list__item')[0].click() //default display first item
function services(evt, servicesName) {
  var i, services__table, services__list__item;
  services__table = document.getElementsByClassName("services__table");

  for (i = 0; i < services__table.length; i++) {
    services__table[i].style.display = "none";
  }
  services__list__item = document.getElementsByClassName("services__list__item");
  for (i = 0; i < services__list__item.length; i++) {
    services__list__item[i].className = services__list__item[i].className.replace(" services__list__item--active", "");
  }
  document.getElementById(servicesName).style.display = "block";
  
  evt.currentTarget.className += " services__list__item--active";
}


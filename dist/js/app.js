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
                return window.location.href = '/barangay-datu-esmael-rms/dist/services-consultation.php';
            }
        })
}

// Confirm alert when 'Reset' button is clicked
function confirmReset(form) {
    // form.preventDefault();
    Swal.fire({
        icon: 'question',
        title: 'Confirm reset fields',
        text: 'Do you want to clear the form?',
        showCancelButton : true,
    }).then((result) => {
        if (result.isConfirmed) {
            form.reset();
            // return Swal.close();
        } else {
            return Swal.close()
        }
        // console.log(result)
    });
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

// Toggle the password icon
function passwordToggle(id, hide, show) {
    var passwordInput = document.getElementById(id);
    var passwordHide = document.getElementById(hide);
    var passwordShow = document.getElementById(show);

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

// 'Add Button' on the navbar
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

function forgotPassword() {
    const { value: contactNum } = Swal.fire({
        title: 'Input contact number',
        input: 'text',
        inputLabel: 'Your contact number',
        inputPlaceholder: 'Ex. 09788764512',
        showCancelButton: true,
      }).then(function(contactNum)  {
          if(contactNum.isConfirmed) {
              Swal.fire(`Entered contact: ` + contactNum.value).then(() =>
                window.location.href = '/barangay-datu-esmael-rms/dist/index.php?contact=' + contactNum.value
                );
          }
      })
      return false;
}

function securityQuestion() {
    Swal.fire({
        icon: 'question',
        title: 'Logout',
        text: 'Are you sure you want to logout?',
        showCancelButton: true,
    })
}

function logoutAlert() {
    Swal.fire({
        icon: 'question',
        title: 'Logout',
        text: 'Are you sure you want to logout?',
        showCancelButton: true,
    }).then(function(result) {
        if (result.isConfirmed) {
            window.location.href = '/barangay-datu-esmael-rms/dist/logout.php'
        }
    })
}

function servicesClick(servicesName) {
    document.getElementById(servicesName).click()
}

//default display first item
// document.getElementsByClassName('services__list__item')[0].click() 
function services(evt, servicesName, rows) {
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

  if (rows == 0) {
    noRecord();
  }
}

function noRecord() {
    Swal.fire({
        toast: true,
        position: 'top-right',
        icon: 'info',
        iconColor: 'white',
        title: 'No record found',
        customClass: {
            popup: 'no-record'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true, 
        })
}

// Patients table
function patient(evt, servicesName) {
    var i, patient__table, services__list__item;
    patient__table = document.getElementsByClassName("patient__table");

    for (i = 0; i < patient__table.length; i++) {
        patient__table[i].style.display = "none";
    }
    services__list__item = document.getElementsByClassName("services__list__item");
    for (i = 0; i < services__list__item.length; i++) {
        services__list__item[i].className = services__list__item[i].className.replace(" services__list__item--active", "");
    }
    document.getElementById(servicesName).style.display = "block";
    evt.currentTarget.className += " services__list__item--active";
    }
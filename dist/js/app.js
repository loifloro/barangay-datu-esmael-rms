// Confirm alert when 'Back' button is clicked
function backAlert() {
  Swal.fire({
    icon: "question",
    title: "Invalid",
    text: "Do you want to cancel?",
    showCancelButton: true,
    focusCancel: true,
    confirmButtonColor: "#FBFBFB",
  }).then(function (result) {
    if (result.isConfirmed) {
      return (window.location.href =
        "/barangay-datu-esmael-rms/dist/services-consultation.php");
    }
  });
}

// Confirm alert when 'Reset' button is clicked
function confirmReset(form) {
  // form.preventDefault();
  Swal.fire({
    icon: "question",
    title: "Confirm reset fields",
    text: "Do you want to clear the form?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      form.reset();
      // return Swal.close();
    } else {
      return Swal.close();
    }
    // console.log(result)
  });
}

// Message to show 'Success' or 'Error' message
function recordStatus(state) {
  if (state == "success") {
    Swal.fire({
      icon: "success",
      title: "Added Succesfully",
    });
  }
}

// Toggle the password icon
function passwordToggle(id, hide, show) {
  var passwordInput = document.getElementById(id);
  var passwordHide = document.getElementById(hide);
  var passwordShow = document.getElementById(show);

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordHide.classList.remove("password-icon--hide");
    passwordShow.classList.add("password-icon--hide");
  } else {
    passwordInput.type = "password";
    passwordHide.classList.add("password-icon--hide");
    passwordShow.classList.remove("password-icon--hide");
  }
}

// 'Add Button' on the navbar
const navBar = document.getElementById("nav-btn");
navBar.addEventListener("click", () => {
  const { value: service } = Swal.fire({
    icon: "question",
    title: "Select a service",
    input: "select",
    inputOptions: {
      deworming: "Deworming",
      consultation: "Consultation",
      childhood: "Childhood Care",
      prenatal: "Pre-natal",
      postnatal: "Post-natal",
      // 'icecream': 'Ice cream'
    },
    // inputPlaceholder: 'Select a fruit',
    showCancelButton: true,
    inputValidator: (value) => {
      return new Promise((resolve) => {
        if (value === "deworming") {
          window.location.href =
            "/barangay-datu-esmael-rms/dist/add/add-deworming.php";
        } else if (value === "consultation") {
          window.location.href =
            "/barangay-datu-esmael-rms/dist/add/add-consultation.php";
        } else if (value === "childhood") {
          window.location.href =
            "/barangay-datu-esmael-rms/dist/add/add-early_childhood.php";
        } else if (value === "prenatal") {
          window.location.href =
            "/barangay-datu-esmael-rms/dist/add/add-prenatal.php";
        } else if (value === "postnatal") {
          window.location.href =
            "/barangay-datu-esmael-rms/dist/add/add-postnatal.php";
        }
      });
    },
  });
});

function forgotPassword() {
  const { value: email } = Swal.fire({
    title: "Input contact number",
    input: "text",
    inputLabel: "Your contact number",
    inputPlaceholder: "Ex. 09788764512",
    showCancelButton: true,
  }).then(function (email) {
    if (email.isConfirmed) {
      Swal.fire(`Entered email address: ` + email.value).then(
        () =>
          (window.location.href =
            "/barangay-datu-esmael-rms/dist/index.php?email=" + email.value)
      );
    }
  });
  return false;
}

function logoutAlert() {
  Swal.fire({
    icon: "question",
    title: "Logout",
    text: "Are you sure you want to logout?",
    showCancelButton: true,
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location.href = "/barangay-datu-esmael-rms/dist/logout.php";
    }
  });
}

function servicesClick(servicesName) {
  document.getElementById(servicesName).click();
}

//default display first item
// document.getElementsByClassName('services__list__item')[0].click()
function services(evt, servicesName, rows, page) {
  var i, services__table, services__list__item;
  // document.getElementById("services__hr").style.display = "block";

  if (page === "backup") {
    services__table = document.getElementsByClassName("backup__table");
  } else {
    services__table = document.getElementsByClassName("services__table");
  }

  for (i = 0; i < services__table.length; i++) {
    services__table[i].style.display = "none";
  }
  services__list__item = document.getElementsByClassName(
    "services__list__item"
  );
  for (i = 0; i < services__list__item.length; i++) {
    services__list__item[i].className = services__list__item[
      i
    ].className.replace(" services__list__item--active", "");
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
    position: "top-right",
    icon: "info",
    iconColor: "white",
    title: "No record found",
    customClass: {
      popup: "no-record",
    },
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
  });
}

// Patients table
function patient(evt, servicesName) {
  var i, patient__table, services__list__item;
  patient__table = document.getElementsByClassName("patient__table");

  for (i = 0; i < patient__table.length; i++) {
    patient__table[i].style.display = "none";
  }
  services__list__item = document.getElementsByClassName(
    "services__list__item"
  );
  for (i = 0; i < services__list__item.length; i++) {
    services__list__item[i].className = services__list__item[
      i
    ].className.replace(" services__list__item--active", "");
  }
  document.getElementById(servicesName).style.display = "block";
  evt.currentTarget.className += " services__list__item--active";
}

function confirmArchive(
  service,
  id,
  patientFirstName,
  patientLastName,
  userFirstName,
  userLastName,
  userPosition
) {
  Swal.fire({
    icon: "question",
    title: "Confirm archive this record",
    text: "Do you want to archive this?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // form.submit();
      window.location.href =
        "/barangay-datu-esmael-rms/dist/includes/delete_query.php?" +
        "archive&" +
        service +
        "&id=" +
        id +
        "&patientFirstName=" +
        patientFirstName +
        "&patientLastName=" +
        patientLastName +
        "&userFirstName=" +
        userFirstName +
        "&userLastName=" +
        userLastName +
        "&userRole=" +
        userPosition;

      // return Swal.close();
    } else {
      return Swal.close();
    }
  });
}

function confirmRestore(
  service,
  id,
  patientFirstName,
  patientLastName,
  userFirstName,
  userLastName,
  userPosition
) {
  Swal.fire({
    icon: "question",
    title: "Confirm restore",
    text: "Do you want to restore this?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // form.submit();
      window.location.href =
        "/barangay-datu-esmael-rms/dist/includes/delete_query.php?" +
        "restore&" +
        service +
        "&id=" +
        id +
        "&patientFirstName=" +
        patientFirstName +
        "&patientLastName=" +
        patientLastName +
        "&userFirstName=" +
        userFirstName +
        "&userLastName=" +
        userLastName +
        "&userRole=" +
        userPosition;

      // return Swal.close();
    } else {
      return Swal.close();
    }
  });
}

function addUser() {
  Swal.fire({
    title: "Add new user",
    text: "Please fill out all input input fields",
    html: ` <input type="number" name="bhw-contact" id="bhw-contact" class="swal2-input" required placeholder='Default username'>
                        <input type="password" name="bhw-pass" id="bhw-password" maxlength="11" min="1" class="swal2-input" required placeholder='Default password'>
                        <select class="swal2-input" name="report__service" id="role" required>
                            <option selected disabled> Choose a role </option>
                            <option value="Barangay Health Worker"> Barangay Health Worker </option>
                            <option value="City Health Nurse"> City Health Nurse </option>
                        </select>
                `,
    confirmButtonText: "Add",
    showCancelButton: true,
    preConfirm: () => {
      const defaultUsername =
        Swal.getPopup().querySelector("#bhw-contact").value;
      const defaultPassword =
        Swal.getPopup().querySelector("#bhw-password").value;
      const role = Swal.getPopup().querySelector("#role").value;

      if (!defaultUsername || !defaultPassword || !role) {
        Swal.showValidationMessage(`Please complete fields`);
      } else if (password.length < 8) {
        Swal.showValidationMessage(`Password lenght is too short`);
      }
      return {
        defaultUsername: defaultUsername,
        defaultPassword: defaultPassword,
        role: role,
      };
    },
  }).then((result) => {
    window.location.href =
      "/barangay-datu-esmael-rms/dist/includes/add_query.php?save_bhw&bhw-contact=" +
      result.value.defaultUsername +
      "&bhw-pass=" +
      result.value.defaultPassword +
      "&bhw-role=" +
      result.value.role;
  });
}

function confirmDelete(service, id) {
  Swal.fire({
    icon: "question",
    title: "Confirm delete",
    text: "Do you want to permanently delete this record?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href =
        "/barangay-datu-esmael-rms/dist/includes/delete_query.php?" +
        "delete&" +
        service +
        "&id=" +
        id;
    } else {
      return Swal.close();
    }
  });
}

document.querySelector("html").classList.add("js");

var fileInput = document.querySelector(".input-file"),
  button = document.querySelector(".input-file-trigger"),
  the_return = document.querySelector(".file-return");

button.addEventListener("keydown", function (event) {
  if (event.keyCode == 13 || event.keyCode == 32) {
    fileInput.focus();
  }
});
button.addEventListener("click", function (event) {
  fileInput.focus();
  return false;
});
fileInput.addEventListener("change", function (event) {
  the_return.innerHTML = this.value;
});

function confirmDeleteUser(position, accountId) {
  Swal.fire({
    icon: "question",
    title: "Confirm delete user",
    text: "Do you want to permanently remove this account?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href =
        "/barangay-datu-esmael-rms/dist/includes/delete_query.php?" +
        "delete_bhw&" +
        "&position=" +
        position +
        "&id=" +
        accountId;
    } else {
      return Swal.close();
    }
  });
}

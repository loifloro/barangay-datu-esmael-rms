const loader = document.getElementById("loader");
var grid = document.getElementById("grid");

window.addEventListener("load", () => {
  loader.style.display = "none";
  grid.style.overflow = "auto";
  loader.style.top = window.pageYOffset + "px";
});

const body = document.body;
let lastScroll = 0;

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  loader.style.top = window.pageYOffset + "px";
  if (currentScroll <= 0) {
    body.classList.remove("scroll-up");
    return;
  }

  if (currentScroll > lastScroll && !body.classList.contains("scroll-down")) {
    body.classList.remove("scroll-up");
    body.classList.add("scroll-down");
  } else if (
    currentScroll < lastScroll &&
    body.classList.contains("scroll-down")
  ) {
    body.classList.remove("scroll-down");
    body.classList.add("scroll-up");
  }
  lastScroll = currentScroll;
});

// Date Pickers
function datePicker() {
  const datePickerFrom = document.getElementById("date__from");
  const datePickerTo = document.getElementById("date__to");

  // dashboardDatePickerFrom.addEventListener("change", () => {
  datePickerTo.removeAttribute("disabled");
  datePickerTo.setAttribute("min", datePickerFrom.value);
  // });
}

// Menu
const navMenu = document.getElementById("hamburger-menu");
const sideBar = document.getElementById("sidebar");
navMenu.addEventListener("click", () => {
  navMenu.classList.toggle("open");

  sideBar.classList.toggle("sidebar--mobile");
});

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
      return (window.location.href = "./services.php");
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

// 'Add Record/Button' on the navbar
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
      searchDestroy: "Search and destroy",
      otherService: "Other service",
      // 'icecream': 'Ice cream'
    },
    // inputPlaceholder: 'Select a fruit',
    showCancelButton: true,
    inputValidator: (value) => {
      return new Promise((resolve) => {
        if (value === "deworming") {
          window.location.href = "add-record.php?service=deworming";
        } else if (value === "consultation") {
          window.location.href = "add-record.php?service=consultation";
        } else if (value === "childhood") {
          window.location.href = "add-record.php?service=early-childhood";
        } else if (value === "prenatal") {
          window.location.href = "add-record.php?service=prenatal";
        } else if (value === "postnatal") {
          window.location.href = "add-record.php?service=postnatal";
        } else if (value === "searchDestroy") {
          window.location.href = "add-record.php?service=search-and-destroy";
        } else if (value === "otherService") {
          window.location.href = "add-record.php?service=others";
        }
      });
    },
  });
});

// 'Add Record/Button' on the profile page
function addNewRecord(
  firstname,
  lastname,
  phone,
  birthday,
  sex,
  street,
  city,
  barangay,
  username
) {
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
      searchDestroy: "Search and destroy",
      otherService: "Other service",
    },
    showCancelButton: true,
    inputValidator: (value) => {
      return new Promise((resolve) => {
        if (value === "deworming") {
          window.location.href =
            "add-record.php?service=deworming&fname=" +
            firstname +
            "&lname=" +
            lastname +
            "&phone=" +
            phone +
            "&bday=" +
            birthday +
            "&sex=" +
            sex +
            "&address=" +
            street +
            "&city=" +
            city +
            "&barangay=" +
            barangay +
            "&username=" +
            username;
        } else if (value === "consultation") {
          window.location.href =
            "add-record.php?service=consultation&fname=" +
            firstname +
            "&lname=" +
            lastname +
            "&phone=" +
            phone +
            "&bday=" +
            birthday +
            "&sex=" +
            sex +
            "&address=" +
            street +
            "&city=" +
            city +
            "&barangay=" +
            barangay +
            "&username=" +
            username;
        } else if (value === "childhood") {
          window.location.href =
            "add-record.php?service=early-childhood&fname=" +
            firstname +
            "&lname=" +
            lastname +
            "&phone=" +
            phone +
            "&bday=" +
            birthday +
            "&sex=" +
            sex +
            "&address=" +
            street +
            "&city=" +
            city +
            "&barangay=" +
            barangay +
            "&username=" +
            username;
        } else if (value === "prenatal") {
          window.location.href =
            "add-record.php?service=prenatal&fname=" +
            firstname +
            "&lname=" +
            lastname +
            "&phone=" +
            phone +
            "&bday=" +
            birthday +
            "&sex=" +
            sex +
            "&address=" +
            street +
            "&city=" +
            city +
            "&barangay=" +
            barangay +
            "&username=" +
            username;
        } else if (value === "postnatal") {
          window.location.href =
            "add-record.php?service=postnatal&fname=" +
            firstname +
            "&lname=" +
            lastname +
            "&phone=" +
            phone +
            "&bday=" +
            birthday +
            "&sex=" +
            sex +
            "&address=" +
            street +
            "&city=" +
            city +
            "&barangay=" +
            barangay +
            "&username=" +
            username;
        } else if (value === "searchDestroy") {
          window.location.href =
            "add-record.php?service=search-and-destroy&fname=" +
            firstname +
            "&lname=" +
            lastname +
            "&phone=" +
            phone +
            "&bday=" +
            birthday +
            "&sex=" +
            sex +
            "&address=" +
            street +
            "&city=" +
            city +
            "&barangay=" +
            barangay +
            "&username=" +
            username;
        } else if (value === "otherService") {
          window.location.href =
            "add-record.php?service=others&fname=" +
            firstname +
            "&lname=" +
            lastname +
            "&phone=" +
            phone +
            "&bday=" +
            birthday +
            "&sex=" +
            sex +
            "&address=" +
            street +
            "&city=" +
            city +
            "&barangay=" +
            barangay +
            "&username=" +
            username;
        }
      });
    },
  });
}

function forgotPassword() {
  const { value: email } = Swal.fire({
    title: "Input username",
    input: "text",
    inputLabel: "Your username",
    inputPlaceholder: "Ex. adminuser",
    showCancelButton: true,
  }).then(function (email) {
    if (email.isConfirmed) {
      Swal.fire(`Entered email address: ` + email.value).then(
        () => (window.location.href = "./index.php?email=" + email.value)
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
      window.location.href = "./logout.php";
    }
  });
}

function servicesClick(servicesName) {
  document.getElementById(servicesName).click();
}

// default display first item
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
// document.getElementsByClassName("services__list__item")[0].click();
function patient(evt, servicesName, total) {
  if (total == 0) {
    noRecord();
  }

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
        "./includes/delete_query.php?" +
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
        "./includes/delete_query.php?" +
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
    html: ` <input type="text" name="bhw-contact" id="bhw-contact" class="swal2-input" required placeholder='Default username'>
                        <input type="password" name="bhw-pass" id="bhw-password"  class="swal2-input" required placeholder='Default password'>
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
      } else if (defaultPassword.length < 8) {
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
      "./includes/add_query.php?save_bhw&bhw-contact=" +
      result.value.defaultUsername +
      "&bhw-pass=" +
      result.value.defaultPassword +
      "&bhw-role=" +
      result.value.role;
  });
}

function confirmDelete(
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
    title: "Confirm delete",
    text: "Do you want to permanently delete this record?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href =
        "includes/delete_query.php?" +
        "delete&" +
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
    } else {
      return Swal.close();
    }
  });
}

// For accordion
let accordion = document.getElementsByClassName("reports__card__accordion");

for (i = 0; i < accordion.length; i++) {
  let count = accordion[i];

  accordion[i].addEventListener("click", () => {
    count.classList.toggle("reports__card__accordion--expand");
    console.log("hello");
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

function confirmDeactivateStatus(position, accountId) {
  Swal.fire({
    icon: "question",
    title: "Account Deactivation",
    text: "Do you want to deactivate this account?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href =
        "includes/delete_query.php?" +
        "inactive_account&" +
        "&position=" +
        position +
        "&id=" +
        accountId;
    } else {
      return Swal.close();
    }
  });
}

function confirmActivateStatus(position, accountId) {
  Swal.fire({
    icon: "question",
    title: "Account Activation",
    text: "Do you want to activate this account?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href =
        "includes/delete_query.php?" +
        "active_account&" +
        "&position=" +
        position +
        "&id=" +
        accountId;
    } else {
      return Swal.close();
    }
  });
}

function confirmEditUser(accountId) {
  Swal.fire({
    icon: "question",
    title: "Confirm edit user",
    text: "Do you want to edit this account?",
    showCancelButton: true,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "edit-record.php?bhw&" + "id=" + accountId;
    } else {
      return Swal.close();
    }
  });
}

function patientProfileView(show) {
  const profile = document.getElementById("patient-profile__card");
  const history = document.getElementById("history");
  const profileTitle = document.getElementById("profileTitle");
  const historyTitle = document.getElementById("historyTitle");

  if (show === "profile") {
    historyTitle.classList.remove("patient-profile__title--active");
    profile.classList.remove("hidden");
    history.classList.add("hidden");
    profileTitle.classList.add("patient-profile__title--active");
  } else {
    profileTitle.classList.remove("patient-profile__title--active");
    historyTitle.classList.add("patient-profile__title--active");
    history.classList.remove("hidden");
    profile.classList.add("hidden");
  }
}

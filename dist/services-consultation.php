<?php
session_start();
if (isset($_SESSION['account_id']) && isset($_SESSION['phone_num'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css" />
    <title>Document</title>
</head>

<body class="grid">
    <!-- Sidebar -->
    <aside role="navigation" class="sidebar">
        <ul role="list" class="sidebar__list">
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Tutorial" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M21,14H20V4h1a1,1,0,0,0,0-2H3A1,1,0,0,0,3,4H4V14H3a1,1,0,0,0,0,2h8v1.15l-4.55,3A1,1,0,0,0,7,22a.94.94,0,0,0,.55-.17L11,19.55V21a1,1,0,0,0,2,0V19.55l3.45,2.28A.94.94,0,0,0,17,22a1,1,0,0,0,.55-1.83l-4.55-3V16h8a1,1,0,0,0,0-2Zm-3,0H6V4H18ZM9.61,12.26a1.73,1.73,0,0,0,1.76,0l3-1.74a1.76,1.76,0,0,0,0-3l-3-1.74a1.73,1.73,0,0,0-1.76,0,1.71,1.71,0,0,0-.87,1.52v3.48A1.71,1.71,0,0,0,9.61,12.26Zm1.13-4.58L13,9l-2.28,1.32Z" />
                    </svg>
                    <p class="sidebar__caption">Tutorial</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Backup</p>
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item sidebar__item--active">
                <a href="" class="sidebar__link">
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item">
                    <a href="" class="sidebar__link">
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top">
                <a href="" class="sidebar__link">
                    <svg alt="Settings" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.32,9.55l-1.89-.63.89-1.78A1,1,0,0,0,20.13,6L18,3.87a1,1,0,0,0-1.15-.19l-1.78.89-.63-1.89A1,1,0,0,0,13.5,2h-3a1,1,0,0,0-.95.68L8.92,4.57,7.14,3.68A1,1,0,0,0,6,3.87L3.87,6a1,1,0,0,0-.19,1.15l.89,1.78-1.89.63A1,1,0,0,0,2,10.5v3a1,1,0,0,0,.68.95l1.89.63-.89,1.78A1,1,0,0,0,3.87,18L6,20.13a1,1,0,0,0,1.15.19l1.78-.89.63,1.89a1,1,0,0,0,.95.68h3a1,1,0,0,0,.95-.68l.63-1.89,1.78.89A1,1,0,0,0,18,20.13L20.13,18a1,1,0,0,0,.19-1.15l-.89-1.78,1.89-.63A1,1,0,0,0,22,13.5v-3A1,1,0,0,0,21.32,9.55ZM20,12.78l-1.2.4A2,2,0,0,0,17.64,16l.57,1.14-1.1,1.1L16,17.64a2,2,0,0,0-2.79,1.16l-.4,1.2H11.22l-.4-1.2A2,2,0,0,0,8,17.64l-1.14.57-1.1-1.1L6.36,16A2,2,0,0,0,5.2,13.18L4,12.78V11.22l1.2-.4A2,2,0,0,0,6.36,8L5.79,6.89l1.1-1.1L8,6.36A2,2,0,0,0,10.82,5.2l.4-1.2h1.56l.4,1.2A2,2,0,0,0,16,6.36l1.14-.57,1.1,1.1L17.64,8a2,2,0,0,0,1.16,2.79l1.2.4ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                    </svg>
                    <p class="sidebar__caption">Settings</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Feedback" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M11.29,15.29a1.58,1.58,0,0,0-.12.15.76.76,0,0,0-.09.18.64.64,0,0,0-.06.18,1.36,1.36,0,0,0,0,.2.84.84,0,0,0,.08.38.9.9,0,0,0,.54.54.94.94,0,0,0,.76,0,.9.9,0,0,0,.54-.54A1,1,0,0,0,13,16a1,1,0,0,0-.29-.71A1,1,0,0,0,11.29,15.29ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20ZM12,7A3,3,0,0,0,9.4,8.5a1,1,0,1,0,1.73,1A1,1,0,0,1,12,9a1,1,0,0,1,0,2,1,1,0,0,0-1,1v1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,12,7Z" />
                    </svg>
                    <p class="sidebar__caption">Feedback</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Logout" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
                    </svg>
                    <p class="sidebar__caption">Logout</p>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Nav Bar -->
    <header class="navbar">
        <nav class="navigation">
            <h1 class="navigation__title h3">
                <!-- This would change depending on the URL or the current page  -->
                Services
            </h1>
            <form class="navigation__search">
                <input type="text" class="navigation__search__bar" placeholder="Search patient last name"/><!--  
                --><button type="submit" class="navigation__search__btn">
                    <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001"><rect width="256" height="256" fill="none"/><circle cx="115.997" cy="116" r="84"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="175.391" x2="223.991" y1="175.4" y2="224.001"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
                  </button>
            </form>

            <button class="navigation__btn btn-green">
                <p>Add New</p>
                <svg class="add-icon navigation__btn__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512"><path fill="#231f20" d="M468.3,212.7H305.2v-169c0-24.2-19.6-43.8-43.8-43.8c-24.2,0-43.8,19.6-43.8,43.8v169h-174 C19.6,212.7,0,232.3,0,256.5c0,24.2,19.6,43.8,43.8,43.8h174v168c0,24.2,19.6,43.8,43.8,43.8c24.2,0,43.8-19.6,43.8-43.8v-168h163.1 c24.2,0,43.8-19.6,43.8-43.8C512,232.3,492.5,212.7,468.3,212.7z"/></svg>
            </button>
        </nav>
    </header>

    <!-- Contents -->
    <main class="services">
        <!-- TABS event initialization-->
        <ul role="list" class="services__list">
            <li class="services__list__item services__list__item--active" onclick="services(event, 'Deworming')">
                    Deworming
            </li>
            <li class="services__list__item" onclick="services(event, 'Consultation')">
                    Consultation
            </li>
            <li class="services__list__item" onclick="services(event, 'Pre-Natal')">
                    Pre-Natal
            </li>
            <li class="services__list__item" onclick="services(event, 'Post-Natal')">
                    Post-Natal
            </li>
            <li class="services__list__item" onclick="services(event, 'Search and Destroy')">
                    Search and Destroy
            </li>
            <li class="services__list__item" onclick="services(event, 'Childhood Care')">
                    Childhood Care
            </li>
        </ul>
        <!-- end of TABS event initialization -->
        <hr>

        <!-- Start Tab for Deworming -->
        <div class="services__table" id="Deworming">
            <ul class="services__table__row services__header" role="list" >
                <li class="services__attributes__item">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p>Name</p>
                    <svg class='sort-icon' xmlns="http://www.w3.org/2000/svg"><path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z"/></svg>
                </li>
                <li class="services__attributes__item">
                    Contact Number
                    <svg class='sort-icon' xmlns="http://www.w3.org/2000/svg"><path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z"/></svg>
                </li>
                <li class="services__attributes__item">
                    Sex
                    <svg class='sort-icon' xmlns="http://www.w3.org/2000/svg"><path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z"/></svg>
                </li>
                <li class="services__attributes__item">
                    Date Availed
                    <svg class='sort-icon' xmlns="http://www.w3.org/2000/svg"><path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z"/></svg>
                </li>
                <li>

                </li>
            </ul>

            <?php 
                include 'includes/connection.php';
                $query = "SELECT * FROM deworming ORDER BY firstname";
                $query_run = mysqli_query($conn, $query);
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $patient)
                {
            ?>
            <!-- To be put in the loop -->
            <ul class="services__table__row services__info" role="list">
                
                <li class="services__name p-bold">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p><?= $patient['firstname']." " . $patient['lastname']; ?></p>
                </li>
                <li class="services__num">
                    <?= $patient['age']; ?>
                </li>
                <li class="services__sex">
                    <?= $patient['sex']; ?>
                </li>
                <li class="services__date--availed">
                    <?= $patient['deworming_date']; ?>
                </li>
                <li class="services__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
                    <a href="edit/edit-deworming.php?id=<?= $patient['deworming_id']; ?>">
                        <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg>
                    </a>
                </li>
            </ul>
            <?php
                    }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }
            ?>   
        <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add/add-deworming.php'">
            <p>Add</p> <!--Pinasok ko sa loob to-->
        </button>
        </div>
        <!-- End Tab for Deworming -->


        <!-- Start Tab for Consultation -->
        <div class="services__table" id="Consultation">
            <ul class="services__table__row services__header" role="list" >
                <li class="services__attributes__item">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p>Name</p>
                </li>
                <li class="services__attributes__item">
                    Contact Number
                </li>
                <li class="services__attributes__item">
                    Sex
                    <!-- Put SVG here -->
                </li>
                <li class="services__attributes__item">
                    Date Availed
                    <!-- Put SVG here -->
                </li>
                <li>

                </li>
            </ul>

            <!-- To be put in the loop -->
            <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM consultation ORDER BY firstname";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
            ?>
            <ul class="services__table__row services__info" role="list">
                <li class="services__name p-bold">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p><?= $patient['firstname']." " . $patient['lastname']; ?></p>
                </li>
                <li class="services__num">
                    <?= $patient['age']; ?>
                </li>
                <li class="services__sex">
                    <?= $patient['sex']; ?>
                </li>
                <li class="services__date--availed">
                    <?= $patient['consultation_date']; ?>
                </li>
                <li class="services__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
                    <a href="edit/edit-consultation.php?id=<?= $patient['consultation_id']; ?>"><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg></a>
                </li>
            </ul>
            <?php
                    }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }
            ?>
            <!-- End of Query -->
            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add/add-consultation.php'">
            <p>Add</p> <!--Pinasok ko sa loob to-->
            </button>
        </div>
        <!-- End Tab for Consultation -->


        <!-- Start Tab for Pre-Natal -->
        <div class="services__table" id="Pre-Natal">
            <ul class="services__table__row services__header" role="list" >
                <li class="services__attributes__item">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p>Name</p>
                </li>
                <li class="services__attributes__item">
                    Contact Number
                </li>
                <li class="services__attributes__item">
                    Sex
                    <!-- Put SVG here -->
                </li>
                <li class="services__attributes__item">
                    Date Availed
                    <!-- Put SVG here -->
                </li>
                <li>

                </li>
            </ul>

            <!-- To be put in the loop -->
            <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM prenatal ORDER BY firstname";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
            ?>
            <ul class="services__table__row services__info" role="list">
                <li class="services__name p-bold">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p><?= $patient['firstname']." " . $patient['lastname']; ?></p>
                </li>
                <li class="services__num">
                    <?= $patient['age']; ?>
                </li>
                <li class="services__sex">
                    <?= $patient['sex']; ?>
                </li>
                <li class="services__date--availed">
                    <?= $patient['prenatal_date']; ?>
                </li>
                <li class="services__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
                    <a href="edit/edit-prenatal.php?id=<?= $patient['prenatal_id']; ?>"><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg></a>
                </li>
            </ul>
            <?php
                    }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }
            ?>
            <!-- End of Query -->

            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add/add-prenatal.php'">
            <p>Add</p> <!--Pinasok ko sa loob to-->
        </button>
        </div>
        <!-- End Tab for Pre-Natal -->


        <!-- Start Tab for Post-Natal -->
        <div class="services__table" id="Post-Natal">
            <ul class="services__table__row services__header" role="list" >
                <li class="services__attributes__item">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p>Name</p>
                </li>
                <li class="services__attributes__item">
                    Contact Number
                </li>
                <li class="services__attributes__item">
                    Sex
                    <!-- Put SVG here -->
                </li>
                <li class="services__attributes__item">
                    Date Availed
                    <!-- Put SVG here -->
                </li>
                <li>

                </li>
            </ul>

            <!-- To be put in the loop -->
            <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM postnatal ORDER BY firstname";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
            ?>
            <ul class="services__table__row services__info" role="list">
                <li class="services__name p-bold">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p><?= $patient['firstname']." " . $patient['lastname']; ?></p>
                </li>
                <li class="services__num">
                    <?= $patient['age']; ?>
                </li>
                <li class="services__sex">
                    <?= $patient['sex']; ?>
                </li>
                <li class="services__date--availed">
                    <?= $patient['postnatal_date']; ?>
                </li>
                <li class="services__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
                    <a href="edit/edit-postnatal.php?id=<?= $patient['postnatal_id']; ?>"><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg></a>
                </li>
            </ul>
            <?php
                    }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }
            ?>
            <!-- End of Query -->
            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add/add-postnatal.php'">
            <p>Add</p> <!--Pinasok ko sa loob to-->
        </button>
        </div>
        <!-- End Tab for Post-Natal -->


        <!-- Start Tab for Search and Destroy -->
        <div class="services__table" id="Search and Destroy">
            <ul class="services__table__row services__header" role="list" >
                <li class="services__attributes__item">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p>Name of Owner</p>
                </li>
                <li class="services__attributes__item">
                    Block
                </li>
                <li class="services__attributes__item">
                    Container Num
                    <!-- Put SVG here -->
                </li>
                <li class="services__attributes__item">
                    Date Visit
                    <!-- Put SVG here -->
                </li>
                <li>

                </li>
            </ul>

            <!-- To be put in the loop -->
            <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM search_destroy ORDER BY date_visit";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
            ?>
            <ul class="services__table__row services__info" role="list">
                <li class="services__name p-bold">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p><?= $patient['owner_name']; ?></p>
                </li>
                <li class="services__num">
                    <?= $patient['block']; ?>
                </li>
                <li class="services__sex">
                    <?= $patient['container_num']; ?>
                </li>
                <li class="services__date--availed">
                    <?= $patient['date_visit']; ?>
                </li>
                <li class="services__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
                    <a href="edit/edit-search_destroy.php?id=<?= $patient['search_destroy_id']; ?>"><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg></a>
                </li>
            </ul>
            <?php
                    }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }
            ?>
            <!-- End of Query -->
            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add/add-search_destroy.php'">
            <p>Add</p> <!--Pinasok ko sa loob to-->
        </button>
        </div>
        <!-- End Tab for Search and Destroy -->
        

        <!-- Start Tab for Early Childhood -->
        <div class="services__table" id="Childhood Care">
            <ul class="services__table__row services__header" role="list" >
                <li class="services__attributes__item">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p>Child Name</p>
                </li>
                <li class="services__attributes__item">
                    Mother Name
                </li>
                <li class="services__attributes__item">
                    Phone Number
                    <!-- Put SVG here -->
                </li>
                <li class="services__attributes__item">
                    Child Bithdate
                    <!-- Put SVG here -->
                </li>
                <li>

                </li>
            </ul>

            <!-- To be put in the loop -->
            <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM early_childhood ORDER BY child_name";
                    $query_run = mysqli_query($conn, $query);
                    
                    if (mysqli_num_rows($query_run) > 0){
                        foreach ($query_run as $patient){
            ?>
            <ul class="services__table__row services__info" role="list">
                <li class="services__name p-bold">
                    <input type="checkbox" name="" id="" class="services__checkbox">
                    <p><?= $patient['child_name']; ?></p>
                </li>
                <li class="services__num">
                    <?= $patient['mother_name']; ?>
                </li>
                <li class="services__sex">
                    <?= $patient['phone_num']; ?>
                </li>
                <li class="services__date--availed">
                    <?= $patient['child_birthdate']; ?>
                </li>
                <li class="services__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
                    <a href="edit/edit-early_childhood.php?id=<?= $patient['early_childhood_id']; ?>"><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg></a>
                </li>
            </ul>
            <?php
                    }
                    }
                    else
                    {
                        echo "<h5> No Record Found </h5>";
                    }
            ?>
            <!-- End of Query -->

            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add/add-early_childhood.php'">
            <p>Add</p> <!--Pinasok ko sa loob to-->
        </button>
        </div>
        <!-- End Tab for Search and Destroy -->


    </section>
    </main>

    <!-- Scripting -->
    <script>
    document.getElementsByClassName('services__list__item')[0].click() //default display first item
    function services(evt, servicesName) {
      var i, services__table, services__list__item;
      services__table = document.getElementsByClassName("services__table");

      for (i = 0; i < services__table.length; i++) {
        services__table[i].style.display = "none";
      }
      services__list__item = document.getElementsByClassName("services__list__item");
      for (i = 0; i < services__list__item.length; i++) {
        services__list__item[i].className = services__list__item[i].className.replace(" active", "");
      }
      document.getElementById(servicesName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
    <!-- End of Scripting -->
    
</body>

</html>

<?php
}
else{
    header("Location: index.php"); /*Redirect to this page if successful*/
    exit();
}
?>
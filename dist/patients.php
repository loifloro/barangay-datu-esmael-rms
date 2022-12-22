<?php
session_start();
if (isset($_SESSION['account_id']) && isset($_SESSION['phone_num'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body class="grid">
    <!-- Sidebar -->
    <aside role="navigation" class="sidebar">
        <ul role="list" class="sidebar__list">
            <li class="sidebar__item sidebar__item--active">
                <a href="dashboard.php" class="sidebar__link">
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="sidebar__item">
                <a href="patients.php" class="sidebar__link">
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    Patient
                </a>
            </li>
            <li class="sidebar__item">
                <a href="tutorial.php" class="sidebar__link">
                    <svg alt="Tutorial" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M21,14H20V4h1a1,1,0,0,0,0-2H3A1,1,0,0,0,3,4H4V14H3a1,1,0,0,0,0,2h8v1.15l-4.55,3A1,1,0,0,0,7,22a.94.94,0,0,0,.55-.17L11,19.55V21a1,1,0,0,0,2,0V19.55l3.45,2.28A.94.94,0,0,0,17,22a1,1,0,0,0,.55-1.83l-4.55-3V16h8a1,1,0,0,0,0-2Zm-3,0H6V4H18ZM9.61,12.26a1.73,1.73,0,0,0,1.76,0l3-1.74a1.76,1.76,0,0,0,0-3l-3-1.74a1.73,1.73,0,0,0-1.76,0,1.71,1.71,0,0,0-.87,1.52v3.48A1.71,1.71,0,0,0,9.61,12.26Zm1.13-4.58L13,9l-2.28,1.32Z" />
                    </svg>
                    Tutorial
                </a>
            </li>
            <li class="sidebar__item">
                <a href="back-up.php" class="sidebar__link">
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    Backup
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item">
                <a href="services-consultation.php" class="sidebar__link">
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    Services
                </a>
            </li>
            <a href="dashboard-masterlist.php" class="sidebar__link">
                <li class="sidebar__item">
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    Masterlist
                </li>
            </a>
            <li class="sidebar__item sidebar__item--margin-top">
                <a href="user-profile.php" class="sidebar__link">
                    <svg alt="Settings" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.32,9.55l-1.89-.63.89-1.78A1,1,0,0,0,20.13,6L18,3.87a1,1,0,0,0-1.15-.19l-1.78.89-.63-1.89A1,1,0,0,0,13.5,2h-3a1,1,0,0,0-.95.68L8.92,4.57,7.14,3.68A1,1,0,0,0,6,3.87L3.87,6a1,1,0,0,0-.19,1.15l.89,1.78-1.89.63A1,1,0,0,0,2,10.5v3a1,1,0,0,0,.68.95l1.89.63-.89,1.78A1,1,0,0,0,3.87,18L6,20.13a1,1,0,0,0,1.15.19l1.78-.89.63,1.89a1,1,0,0,0,.95.68h3a1,1,0,0,0,.95-.68l.63-1.89,1.78.89A1,1,0,0,0,18,20.13L20.13,18a1,1,0,0,0,.19-1.15l-.89-1.78,1.89-.63A1,1,0,0,0,22,13.5v-3A1,1,0,0,0,21.32,9.55ZM20,12.78l-1.2.4A2,2,0,0,0,17.64,16l.57,1.14-1.1,1.1L16,17.64a2,2,0,0,0-2.79,1.16l-.4,1.2H11.22l-.4-1.2A2,2,0,0,0,8,17.64l-1.14.57-1.1-1.1L6.36,16A2,2,0,0,0,5.2,13.18L4,12.78V11.22l1.2-.4A2,2,0,0,0,6.36,8L5.79,6.89l1.1-1.1L8,6.36A2,2,0,0,0,10.82,5.2l.4-1.2h1.56l.4,1.2A2,2,0,0,0,16,6.36l1.14-.57,1.1,1.1L17.64,8a2,2,0,0,0,1.16,2.79l1.2.4ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                    </svg>
                    Settings
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Feedback" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M11.29,15.29a1.58,1.58,0,0,0-.12.15.76.76,0,0,0-.09.18.64.64,0,0,0-.06.18,1.36,1.36,0,0,0,0,.2.84.84,0,0,0,.08.38.9.9,0,0,0,.54.54.94.94,0,0,0,.76,0,.9.9,0,0,0,.54-.54A1,1,0,0,0,13,16a1,1,0,0,0-.29-.71A1,1,0,0,0,11.29,15.29ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20ZM12,7A3,3,0,0,0,9.4,8.5a1,1,0,1,0,1.73,1A1,1,0,0,1,12,9a1,1,0,0,1,0,2,1,1,0,0,0-1,1v1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,12,7Z" />
                    </svg>
                    Feedback
                </a>
            </li>
            <li class="sidebar__item">
                <a href="logout.php" class="sidebar__link">
                    <svg alt="Logout" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
                    </svg>
                    Logout
                </a>
            </li>
        </ul>
    </aside>

    <!-- Nav Bar -->
    <header class="navbar">
        <nav class="navigation">
            <h1 class="navigation__title h3">
                <!-- This would change depending on the URL or the current page  -->
                Patients
            </h1>
            <input type="text" 
                    class="navigation__search"
                    placeholder="Search patient last name"> 
            <button class="navigation__btn btn-green">
                Add New
            </button>
        </nav>
    </header>

    <!-- Contents -->
    <main class="patient">
        <section class="patient">
        <!-- COUNT PATIENT QUERY -->
        <?php
            include "includes/connection.php";
                $query = "SELECT 
                (select count(*) FROM deworming) + 
                (select count(*) FROM consultation) +
                (select count(*) FROM early_childhood) +
                (select count(*) FROM postnatal) +
                (select count(*) FROM prenatal) +
                (select count(*) FROM search_destroy) +
                (select count(*) FROM target_childcare_female) +
                (select count(*) FROM target_childcare_male) +
                (select count(*) FROM target_maternal)
                As total";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result)) {  
        ?>
            <p class="patient__total">
                Total records: <span class="patients__total--num h3"><?php echo $row['total']; ?></span>
            </p>
        <?php
            }
        ?>
        <!-- END COUNT PATIENT QUERY -->
            

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
        <div class="patient__table" id="Deworming">
            <!-- COUNT DEWORMING -->
            <?php
                include "includes/connection.php";
                    $query = "SELECT count(*) FROM deworming";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)) {  
            ?>
                <p class="patient__total">
                    Deworming Records: <span class="patients__total--num h3"><?php echo $row['count(*)']; ?></span>
                </p>
            <?php
                }
            ?>
            <!-- END COUNT DEWORMING -->
                <ul class="patient__table__row patient__attributes" role="list">
                    <li class="patient__attributes__item">
                        Name
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Date Availed
                    </li>
                    <li class="patient__attributes__item">
                        Sex
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Services Availed
                        <!-- Put SVG here -->
                    </li>
                </ul>

                <!-- To be put in the loop -->
                <!-- Start Query -->
                <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM deworming ORDER BY firstname";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
                ?>
                <ul class="patient__table__row patient__info" role="list">
                    
                    <li class="patient__name p-bold">
                    <a href="patient-profile.php?id=<?= $patient['deworming_id']?>&label=<?= $patient['label'];?>">
                        <?= $patient['firstname']." " . $patient['lastname']; ?>
                    </a>
                    </li>
                    <li class="patient__num">
                        <?= $patient['deworming_date']; ?>
                    </li>
                    <li class="patient__sex">
                        <?= $patient['sex']; ?>
                    </li>
                    <li class="patient__availed-service">
                        <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>

                        <input type="hidden" name="label_deworming" value="<?= $user['label']; ?>">
                        <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                    </li>
                    <li class="patient__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
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
                <!--End of Query -->
            </div>
        <!-- End Tab for Deworming -->

        <!-- Start Tab for Consultation -->
        <div class="patient__table" id="Consultation">
                <!-- COUNT CONSULTATION -->
                <?php
                    include "includes/connection.php";
                        $query = "SELECT count(*) FROM consultation";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)) {  
                ?>
                    <p class="patient__total">
                        Consultation Records: <span class="patients__total--num h3"><?php echo $row['count(*)']; ?></span>
                    </p>
                <?php
                    }
                ?>
                <!-- END COUNT CONSULTATION -->
                <ul class="patient__table__row patient__attributes" role="list">
                    <li class="patient__attributes__item">
                        Name
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Date Availed
                    </li>
                    <li class="patient__attributes__item">
                        Sex
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Services Availed
                        <!-- Put SVG here -->
                    </li>
                </ul>

                <!-- To be put in the loop -->
                <!-- Start Query -->
                <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM consultation ORDER BY firstname";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
                ?>
                <ul class="patient__table__row patient__info" role="list">
                    
                    <li class="patient__name p-bold">
                    <a href="patient-profile.php?id=<?= $patient['consultation_id']?>&label=<?= $patient['label'];?>">
                        <?= $patient['firstname']." " . $patient['lastname']; ?>
                    </a>
                    </li>
                    <li class="patient__num">
                        <?= $patient['consultation_date']; ?> 
                    </li>
                    <li class="patient__sex">
                        <?= $patient['sex']; ?> 
                    </li>
                    <li class="patient__availed-service">
                        <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>
                        <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                    </li>
                    <li class="patient__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
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
                <!--End of Query -->
            </div>
        <!-- End Tab for Consultation -->
        
        <!-- Start Tab for Prenatal -->
        <div class="patient__table" id="Pre-Natal">
            <!-- PRENATAL DEWORMING -->
            <?php
                include "includes/connection.php";
                    $query = "SELECT count(*) FROM prenatal";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)) {  
            ?>
                <p class="patient__total">
                    Pre-Natal Records: <span class="patients__total--num h3"><?php echo $row['count(*)']; ?></span>
                </p>
            <?php
                }
            ?>
            <!-- END PRENATAL DEWORMING -->
                <ul class="patient__table__row patient__attributes" role="list">
                    <li class="patient__attributes__item">
                        Name
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Date Availed
                    </li>
                    <li class="patient__attributes__item">
                        Sex
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Services Availed
                        <!-- Put SVG here -->
                    </li>
                </ul>

                <!-- To be put in the loop -->
                <!-- Start Query -->
                <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM prenatal ORDER BY firstname";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
                ?>
                <ul class="patient__table__row patient__info" role="list">
                    
                    <li class="patient__name p-bold">
                    <a href="patient-profile.php?id=<?= $patient['prenatal_id']?>&label=<?= $patient['label'];?>">
                        <?= $patient['firstname']." " . $patient['lastname']; ?>
                    </a>
                    </li>
                    <li class="patient__num">
                        <?= $patient['prenatal_date']; ?> <!--Date Registered-->
                    </li>
                    <li class="patient__sex">
                        <?= $patient['sex']; ?> <!--Patient Sex-->
                    </li>
                    <li class="patient__availed-service">
                        <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>
                        <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                    </li>
                    <li class="patient__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
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
                <!--End of Query -->
            </div>
        <!-- End Tab for Pre-Natal -->

        <!-- Start Tab for Post-Natal -->
        <div class="patient__table" id="Post-Natal">
            <!-- COUNT POSTNATAL -->
            <?php
                include "includes/connection.php";
                    $query = "SELECT count(*) FROM postnatal";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)) {  
            ?>
                <p class="patient__total">
                    Post-Natal Records: <span class="patients__total--num h3"><?php echo $row['count(*)']; ?></span>
                </p>
            <?php
                }
            ?>
            <!-- END COUNT POSTNATAL -->
                <ul class="patient__table__row patient__attributes" role="list">
                    <li class="patient__attributes__item">
                        Name
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Date Availed
                    </li>
                    <li class="patient__attributes__item">
                        Sex
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Services Availed
                        <!-- Put SVG here -->
                    </li>
                </ul>

                <!-- To be put in the loop -->
                <!-- Start Query -->
                <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM postnatal ORDER BY firstname";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
                ?>
                <ul class="patient__table__row patient__info" role="list">
                    
                    <li class="patient__name p-bold">
                    <a href="patient-profile.php?id=<?= $patient['postnatal_id']?>&label=<?= $patient['label'];?>"> 
                        <?= $patient['firstname']." " . $patient['lastname']; ?>
                    </a>
                    </li>
                    <li class="patient__num">
                        <?= $patient['postnatal_date']; ?> 
                    </li>
                    <li class="patient__sex">
                        <?= $patient['sex']; ?>
                    </li>
                    <li class="patient__availed-service">
                        <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>
                        <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                    </li>
                    <li class="patient__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
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
                <!--End of Query -->
            </div>
        <!-- End Tab for Post-Natal -->

        <!-- Start Tab for Search and Destroy -->
        <div class="patient__table" id="Search and Destroy">
            <!--  COUNT S/D -->
            <?php
                include "includes/connection.php";
                    $query = "SELECT count(*) FROM search_destroy";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)) {  
            ?>
                <p class="patient__total">
                    Search/Destroy Records: <span class="patients__total--num h3"><?php echo $row['count(*)']; ?></span>
                </p>
            <?php
                }
            ?>
            <!-- END COUNT S/D -->
                <ul class="patient__table__row patient__attributes" role="list">
                    <li class="patient__attributes__item">
                        Name
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Date Availed
                    </li>
                    <li class="patient__attributes__item">
                        Sex
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Services Availed
                        <!-- Put SVG here -->
                    </li>
                </ul>

                <!-- To be put in the loop -->
                <!-- Start Query -->
                <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM search_destroy ORDER BY owner_name";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
                ?>
                <ul class="patient__table__row patient__info" role="list">
                    
                    <li class="patient__name p-bold">
                    <a href="patient-profile.php?id=<?= $patient['search_destroy_id']?>&label=<?= $patient['label'];?>"> 
                        <?= $patient['owner_name']?>
                    </a>
                    </li>
                    <li class="patient__num">
                        <?= $patient['date_visit']; ?> 
                    </li>
                    <li class="patient__sex">
                        <?= $patient['block']; ?> 
                    </li>
                    <li class="patient__availed-service">
                        <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>
                        <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                    </li>
                    <li class="patient__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
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
                <!--End of Query -->
            </div>
        <!-- End Tab for Search and Destroy -->
        
        <!-- Start Tab for Early Childhood -->
        <div class="patient__table" id="Childhood Care">
            <!-- COUNT EC -->
            <?php
                include "includes/connection.php";
                    $query = "SELECT count(*) FROM early_childhood";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)) {  
            ?>
                <p class="patient__total">
                    Early Childhood Records: <span class="patients__total--num h3"><?php echo $row['count(*)']; ?></span>
                </p>
            <?php
                }
            ?>
            <!-- END COUNT EC -->
                <ul class="patient__table__row patient__attributes" role="list">
                    <li class="patient__attributes__item">
                        Name
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Date Availed
                    </li>
                    <li class="patient__attributes__item">
                        Sex
                        <!-- Put SVG here -->
                    </li>
                    <li class="patient__attributes__item">
                        Services Availed
                        <!-- Put SVG here -->
                    </li>
                </ul>

                <!-- To be put in the loop -->
                <!-- Start Query -->
                <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM early_childhood ORDER BY child_name";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
                ?>
                <ul class="patient__table__row patient__info" role="list">
                    
                    <li class="patient__name p-bold">
                    <a href="patient-profile.php?id=<?= $patient['early_childhood_id']?>&label=<?= $patient['label'];?>">
                        <?= $patient['child_name']?>
                    </a>
                    </li>
                    <li class="patient__num">
                        <?= $patient['child_birthdate']; ?> <!--Date Registered-->
                    </li>
                    <li class="patient__sex">
                        <?= $patient['sex']; ?> <!--Patient Sex-->
                    </li>
                    <li class="patient__availed-service">
                        <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>
                        <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                    </li>
                    <li class="patient__option">
                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
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
                <!--End of Query -->
            </div>
        <!-- End Tab for Early Childhood -->

        <!-- Scripting -->
    <script>
        document.getElementsByClassName('services__list__item')[0].click() //default display first item
        function services(evt, servicesName) {
        var i, patient__table, services__list__item;
        patient__table = document.getElementsByClassName("patient__table");

        for (i = 0; i < patient__table.length; i++) {
            patient__table[i].style.display = "none";
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

        </section>
    </main>
</body>
</html>

<?php
}
else{
    header("Location: index.php"); /*Redirect to this page if successful*/
    exit();
}
?>
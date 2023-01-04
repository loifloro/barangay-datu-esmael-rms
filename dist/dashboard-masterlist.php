<?php
session_start();
include 'includes/connection.php';
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>

    <title>Masterlist</title>
</head>
<body class="grid">
    <!-- Sidebar -->
    <aside role="navigation" class="sidebar">
        <ul role="list" class="sidebar__list">
            <li class="sidebar__item">
                <a href="dashboard.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="patients.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>
 
            <li class="sidebar__item">
                <a href="archive.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Archive</p>
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item">
                <a href="services-consultation.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item  sidebar__item--active">
                    <a href="dashboard-masterlist.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top">
                <a href="user-profile.php" class="sidebar__link"> <!--href link added-->
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
            <li class="sidebar__item" onclick="logoutAlert()">
                <a href="#" class="sidebar__link"> <!--href link added-->
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
            <form class="navigation__search" action="search-result.php" method="GET">
                <input type="text" name="search_input" class="navigation__search__bar" placeholder="Search patient last name"/><!--  
                --><button type="submit" name="search_btn" class="navigation__search__btn">
                    <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001"><rect width="256" height="256" fill="none"/><circle cx="115.997" cy="116" r="84"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="175.391" x2="223.991" y1="175.4" y2="224.001"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
                  </button>
            </form>

            <button id="nav-btn" class="navigation__btn btn-green">
                <p>Add Record</p>
                <svg class="add-icon navigation__btn__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512"><path fill="#231f20" d="M468.3,212.7H305.2v-169c0-24.2-19.6-43.8-43.8-43.8c-24.2,0-43.8,19.6-43.8,43.8v169h-174 C19.6,212.7,0,232.3,0,256.5c0,24.2,19.6,43.8,43.8,43.8h174v168c0,24.2,19.6,43.8,43.8,43.8c24.2,0,43.8-19.6,43.8-43.8v-168h163.1 c24.2,0,43.8-19.6,43.8-43.8C512,232.3,492.5,212.7,468.3,212.7z"/></svg>
            </button>
        </nav>
    </header> 


    <!-- Contents -->
    <main class="dashboard">

        <!-- Services -->
        <section class="services">
            <h2 class="services__title">
                Target Client List
            </h2>
            <p class="services__description">
                Community Health Center Masterlist and Database
            </p>
            
            <!-- Cards -->
            <section class="services__card-masterlist">
                <div class="services__card services__card--childhood-male" onclick="window.location.href = './masterlist/maternal-care.php'">
                    <p class="services__card-title">
                        Maternal Care
                    </p>
                    <!-- Maternal Care -->
                    <?php
                                $query = "SELECT count(*) FROM target_maternal"; //WHERE archive_label=''
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)) {  
                        ?>
                        <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                                }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--childhood-female" onclick="window.location.href = './masterlist/childhood-care-female.php'">
                    <p class="services__card-title">
                        Childhood Care (Female)
                    </p>
                    <!-- Childhood Care (Female) -->
                    <?php
                                $query = "SELECT count(*) FROM target_childcare_female"; //WHERE archive_label=''
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)) {  
                        ?>
                        <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                                }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--maternal" onclick="window.location.href = './masterlist/childhood-care-male.php'">
                    <p class="services__card-title">
                        Childhood Care (Male)
                    </p>
                   <!-- Childhood Care (Female) -->
                   <?php
                                $query = "SELECT count(*) FROM target_childcare_male"; //WHERE archive_label=''
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)) {  
                        ?>
                        <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                                }
                        ?>
                        total record
                    </p>
                </div>
            </section>
        </section>

        <!-- Daily Reports -->
        <section class="reports">
            <form action="" class="reports__form" method="GET">
                <h2 class="reports__title">
                        Reports
                </h2>
                <p class="reports__desc">
                    Overview of the total number of records on masterlist. 
                </p>

                <div class="reports__input">
                    <div class="reports__form__service">
                        <label for="report__service"> Service </label>
                        <select name="report__service" id="report__service" value>
                            <option value="Maternal Care"> Maternal Care </option>
                            <option value="Childhood Care Female"> Childhood Care Female </option>
                            <option value="Childhood Care Male"> Childhood Care Male </option>
                        </select>
                    </div>
                    <div class="reports__form__date">
                        <label for="report__date"> Date </label>
                        <!-- QUERY FOR DEFAULT DISPLAY IN DATE -->
                        <?php
                            if(isset($_GET['sort__date'])){
                                $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            }
                        ?>
                        <input type="date" name="report__date" id="report__date" required value="<?= $date; ?>">
                    </div>
                </div>


            <!-- MATERNAL CARE -->
                <div class="reports__card">
                    <div class="reports__card__item"> 

                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_maternal";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <h4 class="reports__card__title">Total No. of Patients: <?php echo $row['count(*)']; ?></h4>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NHTS'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND socio_status='NHTS'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. NHTS Patient</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NON NHTS'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND socio_status='NON NHTS'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. NON-NHTS Patient</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_maternal WHERE age<=17";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND age<=17";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. Age less than or equal 17 y/o</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_maternal WHERE age>=18";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND age>=18";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. Age greater than or equal 18 y/o</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_maternal WHERE hepatitis_status='Positive'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND hepatitis_status='Positive'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. Positive in Syphilis Screening</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_maternal WHERE syphilis_status='Positive'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND syphilis_status='Positive'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. Positive in Hepatitis B Screening</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>
                </div>


            <!-- CHILD CARE FEMALE-->
                <div class="reports__card">
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <h4 class="reports__card__title">Total No. of Female Patients: <?php echo $row['count(*)']; ?></h4>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status='NHTS'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status='NHTS'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. NHTS Patient</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status='NON NHTS'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status='NON NHTS'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. NON-NHTS Patient</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='low: < 2500gms'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_newborn='low: < 2500gms'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 0-28 days old patient status (low: < 2500gms)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='normal: >= 2500gms'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_newborn='normal: >= 2500gms'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 0-28 days old patient status (normal: >= 2500gms)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='unknown'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_newborn='unknown'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 0-28 days old patient status (unknown)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>           
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='underweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_1_3='underweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (underweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='stunted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_1_3='stunted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (stunted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='wasted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_1_3='wasted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (wasted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='obese/overweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_1_3='obese/overweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (obese/overweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='normal'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_1_3='normal'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (normal)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='underweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_6_11='underweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (underweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='stunted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_6_11='stunted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (stunted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='wasted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_6_11='wasted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (wasted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='obese/overweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_6_11='obese/overweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (obese/overweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='normal'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_6_11='normal'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (normal)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='underweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_12='underweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (underweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='stunted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_12='stunted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (stunted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='wasted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_12='wasted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (wasted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='obese/overweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_12='obese/overweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (obese/overweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='normal'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date' AND status_month_12='normal'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (normal)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>
                </div>
                


        <!-- CHILD CARE MALE-->
            <div class="reports__card">
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <h4 class="reports__card__title">Total No. of Male Patients: <?php echo $row['count(*)']; ?></h4>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status='NHTS'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status='NHTS'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. NHTS Patient</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status='NON NHTS'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status='NON NHTS'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. NON-NHTS Patient</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='low: < 2500gms'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_newborn='low: < 2500gms'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 0-28 days old patient status (low: < 2500gms)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='normal: >= 2500gms'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_newborn='normal: >= 2500gms'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 0-28 days old patient status (normal: >= 2500gms)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='unknown'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_newborn='unknown'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 0-28 days old patient status (unknown)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>           
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='underweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_1_3='underweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (underweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='stunted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_1_3='stunted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (stunted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='wasted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_1_3='wasted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (wasted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='obese/overweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_1_3='obese/overweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (obese/overweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='normal'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_1_3='normal'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 1-3 months old patient status (normal)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='underweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_6_11='underweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (underweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='stunted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_6_11='stunted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (stunted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='wasted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_6_11='wasted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (wasted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='obese/overweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_6_11='obese/overweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (obese/overweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='normal'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_6_11='normal'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 6-11 months old patient status (normal)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <hr>
                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='underweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_12='underweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (underweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='stunted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_12='stunted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (stunted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='wasted'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_12='wasted'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (wasted)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='obese/overweight'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_12='obese/overweight'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (obese/overweight)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>

                    <div class="reports__card__item"> 
                    <!-- Query Start -->
                    <?php
                        //DEFAULT DISPLAY
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='normal'";// WHERE archive_label=''
                        $result = mysqli_query($conn, $query);
                        
                        //CONDITION IF SORT BUTTON IS CLICKED
                        if(isset($_GET['sort__date'])){
                            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                            $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered='$date' AND status_month_12='normal'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_array($result)) {  
                    ?>
                        <p class="reports__card__title">Total No. 12 months old patient status (normal)</p>
                        <input type="range" name="" id=""> 
                        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                    <?php
                        }
                    ?>
                    <!-- END -->
                    </div>
                </div>

                <button type="submit" name="sort__date" class="btn-green btn-add services__btn">
                    <p>View Report</p>  
                </button>
            </form>
        </section>

        <!-- Recent Updates -->
        <section class="recent-updates">
            <h4 class="recent-updates__title">
                Recent Updates
            </h4>
            <div class="recent-updates__card">
                <div class="editor">
                    <img class="editor__img"
                         src=""
                         alt="">
                    <!-- Start Query -->
                    <?php 
                        include_once "includes/functions.php";
                        recent_update(); 
                    ?>  
                    <!-- End Query -->
                </div>
                <p class="recent-updates__btn">
                    <a href="recent-update.php" class="recent-updates__btn">View All</a>
                </p>
            </div>
        </section>
    </main>
    <script src="./js/app.js"></script>
</body>

</html>

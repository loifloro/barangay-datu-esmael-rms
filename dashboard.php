<?php
session_start();
include 'includes/connection.php';
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}
//FUNCTION TO HIDE CONTENT BASED ON USER LEVEL
include_once "includes/functions.php";
hide_content();
//END OF FUNCTION
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="./js/jquerymodal.js"></script>

    <title>Dashboard | Brgy. Datu Esmael Patient Record System</title>
</head>


<body class="grid" id="grid">

    <?php
    if (isset($_GET['success'])) {
    ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Welcome, <?php echo $_SESSION['firstname'] ?>!',
                customClass: {
                    popup: 'toast'
                },
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            })
        </script>
    <?php
    }
    ?>

    <?php
    include './includes/loader.php';
    include './includes/sidebar/dashboard.php';
    include './includes/navbar/dashboard.php'
    ?>

    <!-- Contents -->
    <main class="dashboard">

        <!-- Services -->
        <section class="services">
            <h2 class="services__title">
                Services
            </h2>
            <p class="services__description">
                6 services are currently available
            </p>

            <!-- Cards -->
            <section class="services__card-list">
                <div class="services__card services__card--consultation" onclick="window.location.href = './services.php?service=consultation'">
                    <p class="services__card-title">
                        Consultation
                    </p>
                    <p class="services-card-visits">
                        <!-- COUNT CONSULTATION -->
                        <?php
                        $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                        }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--childhood" onclick="window.location.href = './services.php?service=childhood'">
                    <p class="services__card-title">
                        Childhood Care
                    </p>
                    <p class="services-card-visits">
                        <!-- COUNT EARLY CHILDHOOD -->
                        <?php
                        $query = "SELECT count(*) FROM early_childhood WHERE archive_label=''";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                        }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--prenatal" onclick="window.location.href = './services.php?service=prenatal'">
                    <p class="services__card-title">
                        Pre-natal
                    </p>
                    <p class="services-card-visits">
                        <!-- COUNT PRENATAL -->
                        <?php
                        $query = "SELECT count(*) FROM prenatal WHERE archive_label=''";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                        }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--deworming" onclick="window.location.href = './services.php?service=deworming'">
                    <p class="services__card-title">
                        Deworming
                    </p>
                    <p class="services-card-visits">
                        <!-- COUNT DEWORMING -->
                        <?php
                        $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                        }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--searchdestroy" onclick="window.location.href = './services.php?service=search-destroy'">
                    <p class="services__card-title">
                        Search and Destroy
                    </p>
                    <p class="services__card-visits">
                        <!-- COUNT DEWORMING -->
                        <?php
                        $query = "SELECT count(*) FROM search_destroy WHERE archive_label=''";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                        }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--prenatal" onclick="window.location.href = './services.php?service=postnatal'">
                    <p class="services__card-title">
                        Post-natal
                    </p>
                    <p class="services__card-visits">
                        <!-- COUNT DEWORMING -->
                        <?php
                        $query = "SELECT count(*) FROM postnatal WHERE archive_label='';";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <span class="services__card-visits--number h1"><?php echo $row['count(*)']; ?></span>
                        <?php
                        }
                        ?>
                        total record
                    </p>
                </div>
                <div class="services__card services__card--other" onclick="window.location.href = './services.php?service=otherservices'">
                    <p class="services__card-title">
                        Other
                    </p>
                    <p class="services__card-visits">
                        <!-- COUNT DEWORMING -->
                        <?php
                        $query = "SELECT count(*) FROM other_service WHERE archive_label='';";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
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

        <?php include './includes/daily-reports/reports.php' ?>

        <!-- Recent Updates -->
        <section class="recent-updates">
            <h4 class="recent-updates__title">
                Recent Updates
            </h4>
            <div class="recent-updates__card">
                <div class="editor">
                    <img class="editor__img" src="" alt="">
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
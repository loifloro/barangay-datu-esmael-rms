<?php
session_start();
include 'includes/connection.php';
$position = $_SESSION['position'];
if (($position == 'Barangay Health Worker' || !isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
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
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="./js/jquerymodal.js"></script>


    <title>Masterlist | Brgy. Datu Esmael Patient Record System</title>
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/masterlist.php';
    include './includes/navbar/services.php'
    ?>

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
                <div class="services__card services__card--childhood-male" onclick="window.location.href = 'masterlist.php?maternal-care'">
                    <p class="services__card-title">
                        Maternal Care
                    </p>
                    <!-- Maternal Care -->
                    <?php
                    $query = "SELECT count(*) FROM target_maternal"; //WHERE archive_label=''
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
                <div class="services__card services__card--childhood-female" onclick="window.location.href = 'masterlist.php?childhood-female'">
                    <p class="services__card-title">
                        Childhood Care (Female)
                    </p>
                    <!-- Childhood Care (Female) -->
                    <?php
                    $query = "SELECT count(*) FROM target_childcare_female"; //WHERE archive_label=''
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
                <div class="services__card services__card--maternal" onclick="window.location.href = 'masterlist.php?childhood-male'">
                    <p class="services__card-title">
                        Childhood Care (Male)
                    </p>
                    <!-- Childhood Care (Female) -->
                    <?php
                    $query = "SELECT count(*) FROM target_childcare_male"; //WHERE archive_label=''
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

        <?php
        include './includes/daily-reports/masterlist-reports.php'
        ?>

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
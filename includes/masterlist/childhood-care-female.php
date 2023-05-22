<main class="masterlist">
    <h2 class="masterlist__title">
        Child Care Female
    </h2>
    <p class="masterlist__desc">
        Target Client List for Child Care Female
    </p>
    <div class="masterlist__table">
        <!-- SORT QUERY -->
        <form action="" method="POST">
            <ul class="masterlist__table__row masterlist__attributes" role="list">
                <li class="masterlist__attributes__item">
                    <!-- BUTTON FOR NAME -->
                    Name
                    <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="masterlist__attributes__item">
                    <!-- BUTTON FOR DATE -->
                    Date Availed
                    <button type="submit" name="sort_date" value="2">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="masterlist__attributes__item">
                    <!-- BUTTON FOR ADDRESS -->
                    Address
                    <button type="submit" name="sort_address" value="3">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="masterlist__attributes__item">
                    <!-- BUTTON FOR ADDRESS -->
                    Birthdate
                    <button type="submit" name="sort_bdate" value="4">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
            </ul>
        </form>

        <!-- START QUERY -->
        <?php
        //PAGINATION COUNTER
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $num_per_page = 9;
        $start_from = ($page - 1) * $num_per_page;
        // END OF PAGINATION COUNTER

        $query = "SELECT * FROM target_childcare_female LIMIT $start_from, $num_per_page"; // WHERE archive_label=''
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            if (isset($_POST['sort_name'])) {
                $sort_id = $_POST['sort_name'];
                if ($sort_id == 1) {
                    $query = "SELECT * FROM target_childcare_female ORDER BY child_firstname LIMIT $start_from, $num_per_page";
                    $query_run = mysqli_query($conn, $query);
                }
            }
            if (isset($_POST['sort_date'])) {
                $sort_id = $_POST['sort_date'];
                if ($sort_id == 2) {
                    $query = "SELECT * FROM target_childcare_female ORDER BY date_registered LIMIT $start_from, $num_per_page";
                    $query_run = mysqli_query($conn, $query);
                }
            }
            if (isset($_POST['sort_address'])) {
                $sort_id = $_POST['sort_address'];
                if ($sort_id == 3) {
                    $query = "SELECT * FROM target_childcare_female ORDER BY complete_address LIMIT $start_from, $num_per_page";
                    $query_run = mysqli_query($conn, $query);
                }
            }
            if (isset($_POST['sort_bdate'])) {
                $sort_id = $_POST['sort_bdate'];
                if ($sort_id == 3) {
                    $query = "SELECT * FROM target_childcare_female ORDER BY birthday LIMIT $start_from, $num_per_page";
                    $query_run = mysqli_query($conn, $query);
                }
            }
            foreach ($query_run as $patient) {
        ?>
                <ul class="masterlist__table__row masterlist__info" role="list">

                    <li class="masterlist__name p-bold">
                        <?= $patient['child_firstname'] . ' ' . $patient['child_lastname']; ?>
                    </li>
                    <li class="masterlist__date">
                        <?= $patient['date_registered']; ?>
                    </li>
                    <li class="masterlist__sex">
                        <?= $patient['complete_address']; ?>
                    </li>
                    <li class="masterlist__bdate">
                        <?= $patient['birthday']; ?>
                    </li>
                    <li class="masterlist__option">
                        <button type="button" name="delete_male" value="<?= $patient['target_childcare_female_id']; ?>" onclick="confirmDelete('delete_female' , '<?= $patient['target_childcare_female_id']; ?>')">
                            <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                            </svg>
                        </button>
                        <button type="button" onclick="window.location.href = `../edit/edit-child_care-female.php?id=<?= $patient['target_childcare_female_id']; ?>`">
                            <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                <defs>
                                    <clipPath id="a">
                                        <rect width="64" height="64" />
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)">
                                    <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                </g>
                            </svg>
                        </button>
                    </li>
                </ul>
            <?php
            }
            //PAGINATION
            $pr_query = "SELECT * FROM target_childcare_female";
            $pr_result = mysqli_query($conn, $pr_query);
            $total_record = mysqli_num_rows($pr_result);

            $total_page = ceil($total_record / $num_per_page);
            ?>
            <div class="pagination">
                <?php
                if ($page > 1) {
                ?>
                    <a href='childhood-care-female.php?page=<?php echo ($page - 1) ?>' class="pagination_previous">Previous</a>
                <?php
                }
                for ($i = 1; $i <= $total_page; $i++) {
                ?>
                    <a href='childhood-care-female.php?page=<?php echo $i; ?>' class="pagination_number"><?php echo $i; ?></a>
                <?php
                }
                if ($page < $total_page) {
                ?>
                    <a href='childhood-care-female.php.php?page=<?php echo ($page + 1) ?>' class="pagination_next">Next</a>
                <?php
                }
                //END OF PAGINATION
            } else {
                ?>
                <script>
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
                </script>
            <?php
            }
            ?>
            <!-- END QUERY -->



            </div>
            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=childcare-female'">
                <p>Add</p>
            </button>
    </div>
</main>
<table id="patient-profile-table" class="display" style="width:100%">
    <thead class="data-table__head">
        <tr>
            <th>Service</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php

        $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
        $query = "SELECT * FROM consultation WHERE consultation_id='$patient_id'";
        $query_run = mysqli_query($conn, $query);
        $patient = mysqli_fetch_array($query_run);
        $filtervalues = $patient['firstname'];
        $filtervalues2 = $patient['lastname'];
        $query3 = "SELECT deworming_id, firstname, lastname, deworming_date, sex, phone_num, label 
                FROM deworming WHERE CONCAT(firstname,lastname,deworming_date,sex,phone_num, label) 
                LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,deworming_date,sex,phone_num, label) LIKE '%$filtervalues2%' AND archive_label='' 
                UNION ALL
                SELECT consultation_id, firstname, lastname, consultation_date, sex, phone_number, label 
                FROM consultation WHERE CONCAT(firstname,lastname,consultation_date,sex,phone_number, label) 
                LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,consultation_date,sex,phone_number, label) LIKE '%$filtervalues2%' AND archive_label=''
                UNION ALL
                SELECT prenatal_id, firstname, lastname, prenatal_date, sex, phone_num, label 
                FROM prenatal WHERE CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label) 
                LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label) LIKE '%$filtervalues2%' AND archive_label=''
                UNION ALL
                SELECT postnatal_id, firstname, lastname, postnatal_date, sex, phone_num, label 
                FROM postnatal WHERE CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label) 
                LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label) LIKE '%$filtervalues2%' AND archive_label=''
                UNION ALL
                SELECT search_destroy_id, owner_fname, owner_lname, search_destroy_date, sex, phone_num, label 
                FROM search_destroy WHERE CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label) 
                LIKE '%$filtervalues%' AND CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label) LIKE '%$filtervalues2%' AND archive_label=''
                UNION ALL
                SELECT early_childhood_id, child_fname, child_lname, early_childhood_date, sex, phone_num, label 
                FROM early_childhood WHERE CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label) 
                LIKE '%$filtervalues%' AND CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label)  LIKE '%$filtervalues2%' AND archive_label=''
                UNION ALL
                SELECT id, firstname, lastname, service_date, sex, phone_num, label
                FROM other_service WHERE CONCAT(firstname,lastname,service_date,sex,phone_num, label) 
                LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,service_date,sex,phone_num, label)  LIKE '%$filtervalues2%' AND archive_label=''
                ";
        $query_run3 = mysqli_query($conn, $query3);
        if (mysqli_num_rows($query_run3) > 0) {
            foreach ($query_run3 as $recent3) {
        ?>
                <tr>
                    <td>
                        <!-- Query for modal link -->
                        <?php
                        if (isset($_GET['label'])) {
                            $patient_label = mysqli_real_escape_string($conn, $_GET['label']);
                            $changes_label = $recent3['label'];
                            $date = $recent3['deworming_date'];

                            //DEWORMING
                            if (($changes_label == "Deworming") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM deworming WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND deworming_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $patient_id = $patient['deworming_id'];
                                        $modalLink = "#deworming-modal" . $patient_id;
                                    }
                                    include 'includes/reports/deworming.php';
                                }
                            }

                            //C0NSULTATION
                            if (($changes_label == "Consultation") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM consultation WHERE firstname='$patient_fname' AND lastname='$patient_lname' 
                                    AND consultation_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $patient_id = $patient['consultation_id'];
                                        $modalLink = "#consultation__report" . $patient_id;
                                    }
                                }
                                include('includes/reports/consultation.php');
                            }

                            //PRENATAL
                            if (($changes_label == "Prenatal") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM prenatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND prenatal_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $patient_link = $patient['prenatal_id'];
                                        $modalLink = "#prenatal__report" . $patient_link;
                                    }
                                }
                                include('includes/reports/prenatal.php');
                            }

                            //POSTNATAL
                            if (($changes_label == "Postnatal") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM postnatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND postnatal_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $patient_link = $patient['postnatal_id'];
                                        $modalLink = "#postnatal__report" . $patient_link;
                                    }
                                }
                                include('includes/reports/postnatal.php');
                            }

                            //SEARCH AND DESTROY
                            if (($changes_label == "Search and Destroy") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM search_destroy WHERE owner_fname='$patient_fname' AND owner_lname='$patient_lname'
                                    AND search_destroy_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $patient_link = $patient['search_destroy_id'];
                                        $modalLink = "#search-and-destroy-modal" . $patient_link;
                                    }
                                }
                                include('includes/reports/search-and-destroy.php');
                            }

                            //EARLY CHILDHOOD
                            if (($changes_label == "Early Childhood") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM early_childhood WHERE child_fname='$patient_fname' AND child_lname='$patient_lname'
                                    AND early_childhood_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $patient_link = $patient['early_childhood_id'];
                                        $modalLink = "#early__childhood__report" . $patient_link;
                                    }
                                }
                                include('includes/reports/early__childhood.php');
                            }

                            //OTHER SERVICE
                            if (($changes_label == "Other Services") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $patient_fname = $_GET['fname'];
                                $patient_lname = $_GET['lname'];
                                $query = "SELECT * FROM other_service WHERE firstname='$patient_fname' AND lastname='$patient_lname' AND service_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $patient_link = $patient['id'];
                                        $modalLink = "#other_service_report" . $patient_link;
                                    }
                                }
                                include('includes/reports/other_service.php');
                            }

                            if ($recent3['label'] == "Other Services") {
                                $query = "SELECT * FROM other_service WHERE firstname='$patient_fname' AND lastname='$patient_lname' AND service_date='$date'";
                                $query_run = mysqli_query($conn, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $patient) {
                                        $label = $patient['service_name'];
                                        $new_label = $label;
                                    }
                                }
                            } else {
                                $new_label = $recent3['label'];
                            }

                        ?>
                            <a href="<?= $modalLink; ?>" rel="modal:open"><?= $new_label; ?> </a>
                        <?php
                        }
                        ?>
                        <!-- End for Modal Link -->
                    </td>
                    <td><?php
                        // CONVERT DATE TO MM-DD-YY
                        $consul_ldate = new DateTime($recent3['deworming_date']);
                        $new_consul_ldate = $consul_ldate->format("m-d-Y");
                        ?>
                        <?= $new_consul_ldate; ?>
                    </td>
                    <td>
                        <?php
                        if (isset($_GET['label'])) {
                            $patient_label = mysqli_real_escape_string($conn, $_GET['label']);
                            $changes_label = $recent3['label'];
                            $date = $recent3['deworming_date'];

                            //DEWORMING
                            if (($changes_label == "Deworming") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM deworming WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND deworming_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $deworm) {
                                        $patient_id = $deworm['deworming_id'];
                                        $link = "edit-record.php?service=deworming&id=" . $patient_id;
                                    }
                                }
                            }

                            //C0NSULTATION
                            if (($changes_label == "Consultation") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM consultation WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND consultation_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $consul) {
                                        $patient_id = $consul['consultation_id'];
                                        $link = "edit-record.php?service=consultation&id=" . $patient_id;
                                    }
                                }
                            }

                            //PRENATAL
                            if (($changes_label == "Prenatal") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM prenatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND prenatal_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $pre) {
                                        $patient_link = $pre['prenatal_id'];
                                        $link = "edit-record.php?service=prenatal&id=" . $patient_link;
                                    }
                                }
                            }

                            //POSTNATAL
                            if (($changes_label == "Postnatal") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM postnatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND postnatal_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $post) {
                                        $patient_link = $post['postnatal_id'];
                                        $link = "edit-record.php?service=postnatal&id=" . $patient_link;
                                    }
                                }
                            }

                            //SEARCH AND DESTROY
                            if (($changes_label == "Search and Destroy") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM search_destroy WHERE owner_fname='$patient_fname' AND owner_lname='$patient_lname'
                                    AND search_destroy_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $search_des) {
                                        $patient_link = $search_des['search_destroy_id'];
                                        $link = "edit-record.php?service=search-and-destroy&id=" . $patient_link;
                                    }
                                }
                            }

                            //EARLY CHILDHOOD
                            if (($changes_label == "Early Childhood") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM early_childhood WHERE child_fname='$patient_fname' AND child_lname='$patient_lname'
                                    AND early_childhood_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $early) {
                                        $patient_link = $early['early_childhood_id'];
                                        $link = "edit-record.php?service=early-childhood&id=" . $patient_link;
                                    }
                                }
                            }

                            //OTHER SERVICE
                            if (($changes_label == "Other Services") and (isset($_GET['id']))) {
                                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $patient_fname = $_GET['fname'];
                                $patient_lname = $_GET['lname'];
                                $query = "SELECT * FROM other_service WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND service_date='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $early) {
                                        $patient_link = $early['id'];
                                        $link = "edit-record.php?service=others&id=" . $patient_link;
                                    }
                                }
                            }

                        ?>
                            <a href="<?= $link; ?>">
                                <svg id="edit-profile" class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="64" height="64" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)">
                                        <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                    </g>
                                </svg>
                            </a>
                        <?php
                        }
                        ?>
                        <!-- END QUERY FOR EDIT SERVICES -->
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Service</th>
            <th>Date</th>
            <th></th>
        </tr>
    </tfoot>
</table>
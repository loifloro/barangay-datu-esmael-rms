<main class="add-child_care-female">
    <section class="form" id='add-child_care-female'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="add-child_care-female__title">
            Add Target Client list for Child Care Male
        </h2>
        <p class="add-child_care-female__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-child_care-female__form">
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-registration">Date of Registration *</label>
                <input type="date" name="child_care-female-registration" id="child_care-female-registration" required>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-birthdate">Date of Birthdate *</label>
                <input type="date" name="child_care-female-birthdate" id="child_care-female-birthdate" required>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-family-serial">Family Serial No. *</label>
                <input type="text" name="child_care-female-family-serial" id="child_care-female-family-serial" required>
            </div>
            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="se-status">SE Status *</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="se-status" id="se-status-nhts" value="NHTS" required>
                        <label for="se-status-nhts">NHTS</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="se-status" id="se-status-non_nhts" value="NON NHTS" required>
                        <label for="se-status-non_nhts">NON NHTS</label>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-female__form-item">
                <label for="child_care-female-child-name">Name of Child</label>
                <div class="three-input">
                    <div class="three-input__item">
                        <input type="text" name="child_care-female-first-name" id="child_care-female-first-name" required>
                        <label for="child_care-female-first-name">First Name *</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-female-middle-inital" id="child_care-female-middle-inital">
                        <label for="child_care-female-middle-inital">MI</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-female-last-name" id="child_care-female-last-name" required>
                        <label for="child_care-female-last-name">Last Name *</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-mother-name">Complete Name of Mother</label>
                <div class="three-input">
                    <div class="three-input__item">
                        <input type="text" name="child_care-female-mother-first-name" id="child_care-female-mother-first-name" required>
                        <label for="child_care-female-first-name">First Name *</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-female-mother-middle-inital" id="child_care-female-mother-middle-inital">
                        <label for="child_care-female-mother-middle-inital">MI</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-female-mother-last-name" id="child_care-female-last-name" required>
                        <label for="child_care-female-last-name">Last Name *</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-address">Complete Address *</label>
                <textarea name="child_care-female-address" id="child_care-female-address" cols="27" rows="5" required></textarea>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="child_care-female--cpab">Child Protected at Birth (CPAB) *</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female--cpab" id="child_care-female--cpab-tt2" value="TT2/Td2 given a month prior to delivery" required>
                        <label for="child_care-female--cpab-tt2">TT2/Td2 given a month prior to delivery</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female--cpab" id="child_care-female--cpab-tt3" value="TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery" required>
                        <label for="child_care-female--cpab-tt3">TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery</label>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr id="newborn">

            <h2 class="add-child_care-female__title">
                Newborn (0-28 days old)
            </h2>
            <p class="add-child_care-female__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-child_care-female__form-item">
                <label for="child_care-female-newborn-length">Length at Birth <br>(cm)</label>
                <input type="text" name="child_care-female-newborn-length" id="child_care-female-newborn-length">
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female--newbornweight">Weight at Birth * <br>(kg)</label>
                <input type="text" name="child_care-female-newborn-weight" id="child_care-female-newborn-weight" required>
            </div>
            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="child_care-female-newborn-weight">Status(Birth Weight) * <br>(kg)</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status-low" value="low: < 2500gms" required>
                        <label for="child_care-female-newborn-weight-status-low">L: low: < 2500gms </label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status-normal" value="normal: >= 2500gms" required>
                        <label for="child_care-female-newborn-weight-status-normal">N:normal: >= 2500gms </label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status-unknown" value="unknown" required>
                        <label for="child_care-female-newborn-weight-status-unknown">U:unknown </label>
                    </div>
                </div>
            </div>
            </div>
            <div class="add-child_care-female__form-item add-child_care-female__form-item--textarea">
                <label for="child_care-female-newborn-initiation">
                    Initiation of breastfeeding immediately after birth lasting for at least 90 minutes
                </label>
                <textarea name="child_care-female-newborn-initiation" id="child_care-female-newborn-initiation" cols="27" rows="5"></textarea>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        Immunization
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-newborn-bcg">BCG</label>
                    <input type="date" name="child_care-female-newborn-bgc" id="child_care-female-newborn-bcg">
                    <label for="child_care-female-newborn-hepa-b">Hepa B- BD</label>
                    <input type="date" name="child_care-female-newborn-hepa-b" id="child_care-female-newborn-hepa-b">
                </div>
            </div>

            <!-- Divider -->
            <hr id='1-3'>

            <h2 class="add-child_care-female__title">
                1-3 months old
            </h2>
            <p class="add-child_care-female__desc">
                Nutritional Status Assessment
            </p>


            <div class="add-child_care-female__form-item">
                <label for="child_care-female-age">Age in months</label>
                <input type="number" name="child_care-female-1mos-age" id="child_care-female-1mos-age" min="0">
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-1mos-legth">Length</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-female-1mos-length-cm" id="child_care-female-1mos-length-cm">
                        <label for="child_care-female-length-cm">cm</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-female-1mos-length-date" id="child_care-female-1mos-length-date">
                        <label for="child_care-female-1mos-length-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-1mos-weight">Weight</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-female-1mos-weight-kg" id="child_care-female-1mos-weight-kg">
                        <label for="child_care-female-weight-kg">kg</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-female-1mos-weight-date" id="child_care-female-1mos-weight-date">
                        <label for="child_care-female-weight-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="child_care-female-1mos-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-underweight" value="underweight"><!--value added-->
                        <label for="child_care-female-1mos-status-underweight">UW = underweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-stunted" value="stunted"><!--value added-->
                        <label for="child_care-female-1mos-status-stunted">S = stunted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-wasted" value="wasted"><!--value added-->
                        <label for="child_care-female-1mos-status-wasted">W = wasted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-obese" value="obese/overweight"><!--value added-->
                        <label for="child_care-female-1mos-status-obese">O = obese/overweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-normal" value="normal"><!--value added-->
                        <label for="child_care-female-1mos-status-normal">N = normal</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        Low birth weight given iron
                    </p>
                    <p class="dose-indication">
                        (Write the date)
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-low-weight-1mo">1 &frac12 mo</label>
                    <input type="date" name="child_care-female-low-weight-1mo" id="child_care-female-low-weight-1mo">
                    <label for="child_care-female-low-weight-2mos">2 &frac12 mos</label>
                    <input type="date" name="child_care-female-low-weight-2mos" id="child_care-female-low-weight-2mos">
                    <label for="child_care-female-low-weight-3mos">3 &frac12 mos</label>
                    <input type="date" name="child_care-female-low-weight-3mos" id="child_care-female-low-weight-3mos">
                </div>
            </div>
            <p class="add-child_care-female__desc add-child_care-female__desc--bold">
                Immunization
            </p>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        DPT- Hep B-Hb
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-dpt-1">First Dose Date</label>
                    <input type="date" name="child_care-female-dpt-1" id="child_care-female-dpt-1">
                    <label for="child_care-female-dpt-2">Second Dose Date</label>
                    <input type="date" name="child_care-female-dpt-2" id="child_care-female-dpt-2">
                    <label for="child_care-female-dpt-3">Third Dose Date</label>
                    <input type="date" name="child_care-female-dpt-3" id="child_care-female-dpt-3">
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        OPV
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-opv-1">First Dose Date</label>
                    <input type="date" name="child_care-female-opv-1" id="child_care-female-opv-1">
                    <label for="child_care-female-opv-2">Second Dose Date</label>
                    <input type="date" name="child_care-female-opv-2" id="child_care-female-opv-2">
                    <label for="child_care-female-opv-3">Third Dose Date</label>
                    <input type="date" name="child_care-female-opv-3" id="child_care-female-opv-3">
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        PCV
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-pcv-1">First Dose Date</label>
                    <input type="date" name="child_care-female-pcv-1" id="child_care-female-pcv-1">
                    <label for="child_care-female-pcv-2">Second Dose Date</label>
                    <input type="date" name="child_care-female-pcv-2" id="child_care-female-pcv-2">
                    <label for="child_care-female-pcv-3">Third Dose Date</label>
                    <input type="date" name="child_care-female-pcv-3" id="child_care-female-pcv-3">
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        IPV
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-ipv">3 1/2 mos</label>
                    <input type="date" name="child_care-female-ipv-1" id="child_care-female-ipv-1">
                </div>
            </div>
            <div class="add-child_care-female__form-doses add-child_care-female__form-doses--checkbox">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        Exclusive Breastfeeding*
                    </p>
                    <p class="dose-indication">
                        Place a check () During the following immunization visit of the child at 1 ½ , 2 ½ and 3 ½ months old, ask if child continues to be exclusively breastfed, Place a check () on each column
                    </p>
                </div>
                <div class="add-child_care-female__form--role-item">
                    <div class="add-child_care-female__form-item">
                        <input type="checkbox" name="child_care-female--breastfeeding1" id="child_care-female--breastfeeding-1"><!--child_care-female--breastfeeding CHANGE INTO child_care-female--breastfeeding1--><!--value added-->
                        <label class="checkbox-label" for="child_care-female--breastfeeding-1">1 ½ mos</label>
                    </div>
                    <div class="add-child_care-female__form-item">
                        <input type="checkbox" name="child_care-female--breastfeeding2" id="child_care-female--breastfeeding-2"><!--child_care-female--breastfeeding CHANGE INTO child_care-female--breastfeeding2--><!--value added-->
                        <label class="checkbox-label" for="child_care-female--breastfeeding-2">2 ½ mos</label>
                    </div>
                    <div class="add-child_care-female__form-item">
                        <input type="checkbox" name="child_care-female--breastfeeding3" id="child_care-female--breastfeeding-3"><!--child_care-female--breastfeeding CHANGE INTO child_care-female--breastfeeding3--><!--value added-->
                        <label class="checkbox-label" for="child_care-female--breastfeeding-3">3 ½ mos</label>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr id='6-11'>

            <h2 class="add-child_care-female__title">
                6-11 months old
            </h2>
            <p class="add-child_care-female__desc">
                Nutritional Status Assessment
            </p>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-age">Age in months</label>
                <input type="number" name="child_care-female-6mos-age" id="child_care-female-6mos-age" min="0">
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-6mos-legth">Length</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-female-6mos-length-cm" id="child_care-female-6mos-length-cm">
                        <label for="child_care-female-length-cm">cm</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-female-6mos-length-date" id="child_care-female-6mos-length-date">
                        <label for="child_care-female-6mos-length-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-6mos-weight">Weight</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-female-6mos-weight-kg" id="child_care-female-6mos-weight-kg">
                        <label for="child_care-female-weight-kg">kg</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-female-6mos-weight-date" id="child_care-female-6mos-weight-date">
                        <label for="child_care-female-weight-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="child_care-female-6mos-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-underweight" value="underweight"><!--value added-->
                        <label for="child_care-female-6mos-status-underweight">UW = underweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-stunted" value="stunted"><!--value added-->
                        <label for="child_care-female-6mos-status-stunted">S = stunted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-wasted" value="wasted"><!--value added-->
                        <label for="child_care-female-6mos-status-wasted">W = wasted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-obese" value="obese/overweight"><!--value added-->
                        <label for="child_care-female-6mos-status-obese">O = obese/overweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-normal" value="normal"><!--value added-->
                        <label for="child_care-female-6mos-status-normal">N = normal</label>
                    </div>
                </div>
            </div>

            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="child_care-female-6mos-breastfed">Exclusively* Breastfed up to 6 months</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-6mos-status-exclusive" id="child_care-female-6mos-status-exclusive-yes" value="Yes"><!--child_care-female-6mos-status CHANGE INTO child_care-female-6mos-status-exclusive--><!--value added-->
                        <label for="child_care-female-6mos-status-exclusive-yes">Yes</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-6mos-status-exclusive" id="child_care-female-6mos-status-exclusive-no" value="No"><!--child_care-female-6mos-status CHANGE INTO child_care-female-6mos-status-exclusive--><!--value added-->
                        <label for="child_care-female-6mos-status-exclusive-no">No</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="child_care-female-complementary-feeding">Introduction of Complementary Feeding** at 6 months old</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-complementary-feeding" id="child_care-female-complementary-feeding-1">
                        <label for="child_care-female-complementary-feeding-1">1 - with continued breastfeeding</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-complementary-feeding" id="child_care-female-complementary-feeding-2">
                        <label for="child_care-female-complementary-feeding-2">2 - no longer breastfeeding or never breastfed</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        Vitamin A
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-vit-a">Date Given</label>
                    <input type="date" name="child_care-female-vit-a" id="child_care-female-vit-a" placeholder="First Dose Date">
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        MNP
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-mnp">Date when 90 sachets given</label>
                    <input type="date" name="child_care-female-mnp" id="child_care-female-mnp" placeholder="First Dose Date">
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        MMR Dose 1 at 9th month
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-mmr">Date Given</label>
                    <input type="date" name="child_care-female-mmr" id="child_care-female-mmr" placeholder="First Dose Date">
                </div>
            </div>

            <!-- Divider -->
            <hr id="12">

            <h2 class="add-child_care-female__title">
                12 months old
            </h2>
            <p class="add-child_care-female__desc">
                Nutritional Status Assessment
            </p>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-age">Age in months</label>
                <input type="number" name="child_care-female-12mos-age" id="child_care-female-12mos-age" min="0">
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-12mos-legth">Length</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-female-12mos-length-cm" id="child_care-female-12mos-length-cm">
                        <label for="child_care-female-length-cm">cm</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-female-12mos-length-date" id="child_care-female-12mos-length-date">
                        <label for="child_care-female-12mos-length-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-12mos-weight">Weight</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-female-12mos-weight-kg" id="child_care-female-12mos-weight-kg">
                        <label for="child_care-female-weight-kg">kg</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-female-12mos-weight-date" id="child_care-female-12mos-weight-date">
                        <label for="child_care-female-weight-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                <label for="child_care-female-12mos-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-underweight" value="underweight"><!--value added-->
                        <label for="child_care-female-12mos-status-underweight">UW = underweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-stunted" value="stunted"><!--value added-->
                        <label for="child_care-female-12mos-status-stunted">S = stunted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-wasted" value="wasted"><!--value added-->
                        <label for="child_care-female-12mos-status-wasted">W = wasted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-obese" value="obese/overweight"><!--value added-->
                        <label for="child_care-female-12mos-status-obese">O = obese/overweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-normal" value="normal"><!--value added-->
                        <label for="child_care-female-12mos-status-normal">N = normal</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        MMR Dose 2 at 12th month
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-12mos-mmr">Date Given</label>
                    <input type="date" name="child_care-female-12mos-mmr" id="child_care-female-12mos-mmr" placeholder="First Dose Date">
                </div>
            </div>
            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        FIC***
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-fic">Date</label>
                    <input type="date" name="child_care-female-fic" id="child_care-female-fic" placeholder="First Dose Date">
                </div>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-female__form-doses">
                <div class="add-child_care-female__form-label">
                    <p class="dose-title">
                        CIC
                    </p>
                </div>
                <div class="add-child_care-female__form-input">
                    <label for="child_care-female-12mos-mmr">Date Given</label>
                    <input type="date" name="child_care-female-12mos-cic" id="child_care-female-cic" placeholder="First Dose Date"> <!--child_care-female-12mos-mmr CHANGE INTO child_care-female-12mos-cic-->
                </div>
            </div>
            <div class="add-child_care-female__form-item">
                <label for="child_care-female-remarks">Remarks</label>
                <textarea name="child_care-female-remarks" id="child_care-female-remarks" cols="27" rows="5"></textarea>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-female__form-btn">
                <button type="submit" class="btn-green btn-add" name="add_childcare_female" "> <!--name added-->
                        Add
                    </button>
                    <button type=" button" class="btn-red btn-cancel" onclick="confirmReset(form)"> <!--added type and onclick-->
                    Clear
                </button>
            </div>
            <!-- Query to get the user session name -->
            <?php
            include 'includes/connection.php';
            $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
            ?>

                    <input type="hidden" name="user_fname" value="<?= $user['firstname']; ?>">
                    <input type="hidden" name="user_lname" value="<?= $user['lastname']; ?>">
                    <input type="hidden" name="user_role" value="<?= $user['position']; ?>">

            <?php
                }
            }
            ?>
            <!-- END OF QUERY -->
        </form>
    </section>

    <section class="contents">
        <ul class="contents__list">
            <li class="content__item content__item--active">
                <a href="#add-child_care-female">Add Early Childhood Care and Development</a>
            </li>
            <li class="content__item content__item--active">
                <a href="#newborn">Newborn (0-28 days old) </a>
            </li>
            <li class="content__item">
                <a href="#1-3">1-3 months old</a>
            </li>
            <li class="content__item">
                <a href="#6-11">6-11 months old</a>
            </li>
            <li class="content__item">
                <a href="#12">12 months old </a>
            </li>
        </ul>
    </section>
</main>
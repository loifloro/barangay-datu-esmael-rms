<main class="add-child_care-male">
    <section class="form" id='add-child_care'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="add-child_care-male__title">
            Add Target Client list for Child Care Male
        </h2>
        <p class="add-child_care-male__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-child_care-male__form">
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-registration">Date of Registration *</label>
                <input type="date" name="child_care-male-registration" id="child_care-male-registration" required>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-birthdate">Date of Birthdate *</label>
                <input type="date" name="child_care-male-birthdate" id="child_care-male-birthdate" required>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-family-serial">Family Serial No. *</label>
                <input type="text" name="child_care-male-family-serial" id="child_care-male-family-serial" required>
            </div>
            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="se-status">SE Status *</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="se-status" id="se-status-nhts" value="NHTS" required> <!--Value added-->
                        <label for="se-status-nhts">NHTS</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="se-status" id="se-status-non_nhts" value="NON NHTS" required> <!--Value added-->
                        <label for="se-status-non_nhts">NON NHTS</label>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-male__form-item">
                <label for="child_care-male-child-name">Name of Child</label>
                <div class="three-input">
                    <div class="three-input__item">
                        <input type="text" name="child_care-male-first-name" id="child_care-male-first-name" required>
                        <label for="child_care-male-first-name">First Name *</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-male-middle-inital" id="child_care-male-middle-inital">
                        <label for="child_care-male-middle-inital">MI</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-male-last-name" id="child_care-male-last-name" required>
                        <label for="child_care-male-last-name">Last Name *</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-mother-name">Complete Name of Mother</label>
                <div class="three-input">
                    <div class="three-input__item">
                        <input type="text" name="child_care-male-mother-first-name" id="child_care-male-mother-first-name" required>
                        <label for="child_care-male-first-name">First Name *</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-male-mother-middle-inital" id="child_care-male-mother-middle-inital">
                        <label for="child_care-male-mother-middle-inital">MI</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="child_care-male-mother-last-name" id="child_care-male-last-name" required>
                        <label for="child_care-male-last-name">Last Name *</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-address">Complete Address *</label>
                <textarea name="child_care-male-address" id="child_care-male-address" cols="27" rows="5" required></textarea>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="child_care-male--cpab">Child Protected at Birth (CPAB) *</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male--cpab" id="child_care-male--cpab-tt2" value="TT2/Td2 given a month prior to delivery" required>
                        <label for="child_care-male--cpab-tt2">TT2/Td2 given a month prior to delivery</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male--cpab" id="child_care-male--cpab-tt3" value="TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery" required>
                        <!-- <label for="child_care-male--tt2">TT2/Td2 given a month prior to delivery</label> --> <!--to be remove due to repeated code-->
                        <label for="child_care-male--cpab-tt3">TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery</label>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr id='newborn'>

            <h2 class="add-child_care-male__title">
                Newborn (0-28 days old)
            </h2>
            <p class="add-child_care-male__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-child_care-male__form-item">
                <label for="child_care-male-newborn-length">Length at Birth <br>(cm)</label>
                <input type="text" name="child_care-male-newborn-length" id="child_care-male-newborn-length">
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male--newbornweight">Weight at Birth * <br>(kg)</label>
                <input type="text" name="child_care-male-newborn-weight" id="child_care-male-newborn-weight" required>
            </div>
            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="child_care-male-newborn-weight">Status(Birth Weight) *<br>(kg)</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-newborn-weight-status" id="child_care-male-newborn-weight-status-low" value="L: low: < 2500gms" required>
                        <label for="child_care-male-newborn-weight-status-low">L: low: < 2500gms </label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-newborn-weight-status" id="child_care-male-newborn-weight-status-normal" value="N:normal: >= 2500gms" required>
                        <label for="child_care-male-newborn-weight-status-normal">N:normal: >= 2500gms </label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-newborn-weight-status" id="child_care-male-newborn-weight-status-unknown" value="U:unknown" required>
                        <label for="child_care-male-newborn-weight-status-unknown">U:unknown </label>
                    </div>
                </div>
            </div>
            </div>
            <div class="add-child_care-male__form-item add-child_care-male__form-item--textarea">
                <label for="child_care-male-newborn-initiation">
                    Initiation of breastfeeding immediately after birth lasting for at least 90 minutes
                </label>
                <textarea name="child_care-male-newborn-initiation" id="child_care-male-newborn-initiation" cols="27" rows="5"></textarea>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        Immunization
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-newborn-bcg">BCG</label>
                    <input type="date" name="child_care-male-newborn-bgc" id="child_care-male-newborn-bcg">
                    <label for="child_care-male-newborn-hepa-b">Hepa B- BD</label>
                    <input type="date" name="child_care-male-newborn-hepa-b" id="child_care-male-newborn-hepa-b">
                </div>
            </div>

            <!-- Divider -->
            <hr id='1-3'>

            <h2 class="add-child_care-male__title">
                1-3 months old
            </h2>
            <p class="add-child_care-male__desc">
                Nutritional Status Assessment
            </p>


            <div class="add-child_care-male__form-item">
                <label for="child_care-male-age">Age in months</label>
                <input type="number" name="child_care-male-1mos-age" id="child_care-male-1mos-age" min="0">
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-1mos-legth">Length</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-male-1mos-length-cm" id="child_care-male-1mos-length-cm">
                        <label for="child_care-male-length-cm">cm</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-male-1mos-length-date" id="child_care-male-1mos-length-date">
                        <label for="child_care-male-1mos-length-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-1mos-weight">Weight</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-male-1mos-weight-kg" id="child_care-male-1mos-weight-kg">
                        <label for="child_care-male-weight-kg">kg</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-male-1mos-weight-date" id="child_care-male-1mos-weight-date">
                        <label for="child_care-male-weight-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="child_care-male-1mos-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-underweight" value="underweight"> <!--Value added-->
                        <label for="child_care-male-1mos-status-underweight">UW = underweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-1mos-status" id="cchild_care-male-1mos-status-stunted" value="stunted"> <!--Value added-->
                        <label for="child_care-male-1mos-status-stunted">S = stunted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-wasted" value="wasted"> <!--Value added-->
                        <label for="child_care-male-1mos-status-wasted">W = wasted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-obese" value="obese/overweight"> <!--Value added-->
                        <label for="child_care-male-1mos-status-obese">O = obese/overweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-normal" value="normal"> <!--Value added-->
                        <label for="child_care-male-1mos-status-normal">N = normal</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        Low birth weight given iron
                    </p>
                    <p class="dose-indication">
                        (Write the date)
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-low-weight-1mo">1 &frac12 mo</label>
                    <input type="date" name="child_care-male-low-weight-1mo" id="child_care-male-low-weight-1mo">
                    <label for="child_care-male-low-weight-2mos">2 &frac12 mos</label>
                    <input type="date" name="child_care-male-low-weight-2mos" id="child_care-male-low-weight-2mos">
                    <label for="child_care-male-low-weight-3mos">3 &frac12 mos</label>
                    <input type="date" name="child_care-male-low-weight-3mos" id="child_care-male-low-weight-3mos">
                </div>
            </div>
            <p class="add-child_care-male__desc add-child_care-male__desc--bold">
                Immunization
            </p>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        DPT- Hep B-Hb
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-dpt-1">First Dose Date</label>
                    <input type="date" name="child_care-male-dpt-1" id="child_care-male-dpt-1">
                    <label for="child_care-male-dpt-2">Second Dose Date</label>
                    <input type="date" name="child_care-male-dpt-2" id="child_care-male-dpt-2">
                    <label for="child_care-male-dpt-3">Third Dose Date</label>
                    <input type="date" name="child_care-male-dpt-3" id="child_care-male-dpt-3">
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        OPV
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-opv-1">First Dose Date</label>
                    <input type="date" name="child_care-male-opv-1" id="child_care-male-opv-1">
                    <label for="child_care-male-opv-2">Second Dose Date</label>
                    <input type="date" name="child_care-male-opv-2" id="child_care-male-opv-2">
                    <label for="child_care-male-opv-3">Third Dose Date</label>
                    <input type="date" name="child_care-male-opv-3" id="child_care-male-opv-3">
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        PCV
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-pcv-1">First Dose Date</label>
                    <input type="date" name="child_care-male-pcv-1" id="child_care-male-pcv-1">
                    <label for="child_care-male-pcv-2">Second Dose Date</label>
                    <input type="date" name="child_care-male-pcv-2" id="child_care-male-pcv-2">
                    <label for="child_care-male-pcv-3">Third Dose Date</label>
                    <input type="date" name="child_care-male-pcv-3" id="child_care-male-pcv-3">
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        IPV
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-ipv">3 1/2 mos</label>
                    <input type="date" name="child_care-male-ipv-1" id="child_care-male-ipv-1">
                </div>
            </div>
            <div class="add-child_care-male__form-doses add-child_care-male__form-doses--checkbox">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        Exclusive Breastfeeding*
                    </p>
                    <p class="dose-indication">
                        Place a check () During the following immunization visit of the child at 1 ½ , 2 ½ and 3 ½ months old, ask if child continues to be exclusively breastfed, Place a check () on each column
                    </p>
                </div>
                <div class="add-child_care-male__form--role-item">
                    <div class="add-child_care-male__form-item">
                        <input type="checkbox" name="child_care-male--breastfeeding1" id="child_care-male--breastfeeding-1" value="1 ½ mos"> <!--value added--> <!--child_care-male--breastfeeding CHANGE TO child_care-male--breastfeeding1-->
                        <label class="checkbox-label" for="child_care-male--breastfeeding-1">1 ½ mos</label>
                    </div>
                    <div class="add-child_care-male__form-item">
                        <input type="checkbox" name="child_care-male--breastfeeding2" id="child_care-male--breastfeeding-2" value="2 ½ mos"> <!--value added--> <!--child_care-male--breastfeeding CHANGE TO child_care-male--breastfeeding2-->
                        <label class="checkbox-label" for="child_care-male--breastfeeding-2">2 ½ mos</label>
                    </div>
                    <div class="add-child_care-male__form-item">
                        <input type="checkbox" name="child_care-male--breastfeeding3" id="child_care-male--breastfeeding-3" value="3 ½ mos"> <!--value added--> <!--child_care-male--breastfeeding CHANGE TO child_care-male--breastfeeding3-->
                        <label class="checkbox-label" for="child_care-male--breastfeeding-3">3 ½ mos</label>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr id='6-11'>

            <h2 class="add-child_care-male__title">
                6-11 months old
            </h2>
            <p class="add-child_care-male__desc">
                Nutritional Status Assessment
            </p>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-age">Age in months</label>
                <input type="number" name="child_care-male-6mos-age" id="child_care-male-6mos-age" min="0">
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-6mos-legth">Length</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-male-6mos-length-cm" id="child_care-male-6mos-length-cm">
                        <label for="child_care-male-length-cm">cm</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-male-6mos-length-date" id="child_care-male-6mos-length-date">
                        <label for="child_care-male-6mos-length-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-6mos-weight">Weight</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-male-6mos-weight-kg" id="child_care-male-6mos-weight-kg">
                        <label for="child_care-male-weight-kg">kg</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-male-6mos-weight-date" id="child_care-male-6mos-weight-date">
                        <label for="child_care-male-weight-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="child_care-male-6mos-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-underweight" value="underweight"> <!--Value added-->
                        <label for="child_care-male-6mos-status-underweight">UW = underweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-stunted" value="stunted"> <!--Value added-->
                        <label for="child_care-male-6mos-status-stunted">S = stunted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-wasted" value="wasted"> <!--Value added-->
                        <label for="child_care-male-6mos-status-wasted">W = wasted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-obese" value="obese/overweight"> <!--Value added-->
                        <label for="child_care-male-6mos-status-obese">O = obese/overweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-normal" value="normal"> <!--Value added-->
                        <label for="child_care-male-6mos-status-normal">N = normal</label>
                    </div>
                </div>
            </div>

            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="child_care-male-6mos-breastfed">Exclusively* Breastfed up to 6 months</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-6mos-status-exclusive" id="child_care-male-6mos-status-exclusive-yes" value="Yes"> <!--value added--> <!--child_care-male-6mos-status CHANGE INTO child_care-male-6mos-status-exclusive DUE TO SAME name--->
                        <label for="child_care-male-6mos-status-exclusive-yes">Yes</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-6mos-status-exclusive" id="child_care-male-6mos-status-exclusive-no" value="No"> <!--value added--> <!--child_care-male-6mos-status CHANGE INTO child_care-male-6mos-status-exclusive DUE TO SAME name--->
                        <label for="child_care-male-6mos-status-exclusive-no">No</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="child_care-male-complementary-feeding">Introduction of Complementary Feeding** at 6 months old</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-complementary-feeding" id="child_care-male-complementary-feeding-1" value="with continued breastfeeding"> <!--value added-->
                        <label for="child_care-male-complementary-feeding-1">1 - with continued breastfeeding</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-complementary-feeding" id="child_care-male-complementary-feeding-2" value="no longer breastfeeding or never breastfed"> <!--value added-->
                        <label for="child_care-male-complementary-feeding-2">2 - no longer breastfeeding or never breastfed</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        Vitamin A
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-vit-a">Date Given</label>
                    <input type="date" name="child_care-male-vit-a" id="child_care-male-vit-a" placeholder="First Dose Date">
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        MNP
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-mnp">Date when 90 sachets given</label>
                    <input type="date" name="child_care-male-mnp" id="child_care-male-mnp" placeholder="First Dose Date">
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        MMR Dose 1 at 9th month
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-mmr">Date Given</label>
                    <input type="date" name="child_care-male-mmr" id="child_care-male-mmr" placeholder="First Dose Date">
                </div>
            </div>

            <!-- Divider -->
            <hr id='12'>

            <h2 class="add-child_care-male__title">
                12 months old
            </h2>
            <p class="add-child_care-male__desc">
                Nutritional Status Assessment
            </p>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-age">Age in months</label>
                <input type="number" name="child_care-male-12mos-age" id="child_care-male-12mos-age" min="0">
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-12mos-legth">Length</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-male-12mos-length-cm" id="child_care-male-12mos-length-cm">
                        <label for="child_care-male-length-cm">cm</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-male-12mos-length-date" id="child_care-male-12mos-length-date">
                        <label for="child_care-male-12mos-length-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-12mos-weight">Weight</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="text" name="child_care-male-12mos-weight-kg" id="child_care-male-12mos-weight-kg">
                        <label for="child_care-male-weight-kg">kg</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="child_care-male-12mos-weight-date" id="child_care-male-12mos-weight-date">
                        <label for="child_care-male-weight-date">Date Taken</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                <label for="child_care-male-12mos-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-underweight" value="underweight"><!--value added-->
                        <label for="child_care-male-12mos-status-underweight">UW = underweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-stunted" value="stunted"><!--value added-->
                        <label for="child_care-male-12mos-status-stunted">S = stunted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-wasted" value="wasted"><!--value added-->
                        <label for="child_care-male-12mos-status-wasted">W = wasted</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-obese" value="obese/overweight"><!--value added-->
                        <label for="child_care-male-12mos-status-obese">O = obese/overweight</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-normal" value="normal"><!--value added-->
                        <label for="child_care-male-12mos-status-normal">N = normal</label>
                    </div>
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        MMR Dose 2 at 12th month
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-12mos-mmr">Date Given</label>
                    <input type="date" name="child_care-male-12mos-mmr" id="child_care-male-12mos-mmr" placeholder="First Dose Date">
                </div>
            </div>
            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        FIC***
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-fic">Date</label>
                    <input type="date" name="child_care-male-fic" id="child_care-male-fic" placeholder="First Dose Date">
                </div>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-male__form-doses">
                <div class="add-child_care-male__form-label">
                    <p class="dose-title">
                        CIC
                    </p>
                </div>
                <div class="add-child_care-male__form-input">
                    <label for="child_care-male-12mos-mmr">Date Given</label>
                    <input type="date" name="child_care-male-12mos-cic" id="child_care-male-cic" placeholder="First Dose Date"> <!--child_care-male-12mos-mmr CHANGE INTO child_care-male-12mos-cic-->
                </div>
            </div>
            <div class="add-child_care-male__form-item">
                <label for="child_care-male-remarks">Remarks</label>
                <textarea name="child_care-male-remarks" id="child_care-male-remarks" cols="27" rows="5"></textarea>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-child_care-male__form-btn">
                <button type="submit" class="btn-green btn-add" name="add_childcare_male" "> <!--added name-->
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
                <a href="#add-child_care">Add Early Childhood Care and Development</a>
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
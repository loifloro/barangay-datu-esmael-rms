<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
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
    <main class="add-maternal_care">
        <section class="form">
            <p class="back__btn">
                Back
            </p>
            <h2 class="add-maternal_care__title">
                Add Target Client list for Maternal Care
            </h2>
            <p class="add-maternal_care__desc">
                Fill up necessary information to complete the process
            </p>

            <form action="add_query.php" method='POST' class="add-maternal_care__form"> <!--method and action added-->

                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-registration">Date of Registration</label>
                    <input type="date" name="maternal_care-registration" id="maternal_care-registration">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-family-serial">Family Serial No.</label>
                    <input type="text" name="maternal_care-family-serial" id="maternal_care-family-serial">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-child-name">Name</label>
                    <div class="three-input">
                        <div class="three-input__item">
                            <input type="text" name="maternal_care-first-name" id="maternal_care-first-name">
                            <label for="maternal_care-first-name">First Name</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="maternal_care-middle-inital" id="maternal_care-middle-inital">
                            <label for="maternal_care-middle-inital">MI</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="maternal_care-last-name" id="maternal_care-last-name">
                            <label for="maternal_care-last-name">Last Name</label>
                        </div>
                    </div>                    
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-address">Complete Address</label>
                    <textarea name="maternal_care-address" id="maternal_care-address" cols="27" rows="5"></textarea>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                    <label for="bhw-contact">Socio Economic Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status-nhts" value="NHTS"> <!--Added value-->
                            <label for="bhw-chn">NHTS</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status-non-nhts" value="NON NHTS"> <!--Added value-->
                            <label for="bhw-bhw">NON NHTS</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-1mos-legth">Age</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-age" id="maternal_care-age">                            
                            <label for="maternal_care-age">Age</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-birthday" id="maternal_care-birthday">
                            <label for="maternal_care-birthday">Birthday</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-lmp">LMP</label>
                    <input type="date" name="maternal_care-lmp" id="maternal_care-lmp">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-gp">G-P</label>
                    <input type="number" name="maternal_care-gp" id="maternal_care-gp">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-edc">EDC</label>
                    <input type="date" name="maternal_care-edc" id="maternal_care-edc">
                </div>
                
                <!-- Divider -->
                <hr>
                
                <h2 class="add-maternal_care__title">
                    Dates of Pre-natal Check-ups
                </h2>
                <p class="add-maternal_care__desc">
                    Fill up necessary information to complete the process
                </p>

                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-1st-tri">1st Tri</label>
                    <input type="date" name="maternal_care-1st-tri" id="maternal_care-1st-tri">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-2nd-tri">2nd Tri</label>
                    <input type="date" name="maternal_care-2nd-tri" id="maternal_care-2nd-tri">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-3rd-tri">3rd Tri</label>
                    <input type="date" name="maternal_care-3rd-tri" id="maternal_care-3rd-tri">
                </div>


                <!-- Divider -->
                <hr>
                
                <h2 class="add-maternal_care__title">
                    Immunization Status
                </h2>
                <p class="add-maternal_care__desc">
                    Fill up necessary information to complete the process
                </p>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Date Tetanus diptheria (Td) or  Tetanus Toxoid (TT) given
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-td1">Td1/TT1</label>
                        <input type="text" name="maternal_care-td1" id="maternal_care-td1">
                        <label for="maternal_care-td2">Td2/TT2</label>
                        <input type="text" name="maternal_care-td2" id="maternal_care-td2">
                        <label for="maternal_care-td3">Td3/TT3</label>
                        <input type="text" name="maternal_care-td3" id="maternal_care-td3">
                        <label for="maternal_care-td4">Td4/TT4</label>
                        <input type="text" name="maternal_care-td4" id="maternal_care-td4">
                        <label for="maternal_care-td5">Td5/TT5</label>
                        <input type="text" name="maternal_care-td5" id="maternal_care-td5">
                    </div>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--checkbox">
                    <label for=""> 
                    </label>
                    <div class="add-maternal_care__form--role-item">
                        <div class="add-maternal_care__form-item">
                            <input type="checkbox" name="maternal_care-fim" id="maternal_care-fim">
                            <label for="maternal_care-fim">FIM Status</label>
                        </div>
                    </div>
                </div>

                <hr>
                
                <h2 class="add-maternal_care__title">
                    Micronutrient Supplementation 
                </h2>
                <p class="add-maternal_care__desc">
                    
                </p>

                <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                    Iron sulfate with Folic Acid
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-1">1st visit (1st tri) </label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-1-tablet" id="maternal_care-iron-1-tablet">                            
                            <label for="maternal_care-iron-1-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-1-date" id="maternal_care-iron-1-date">
                            <label for="maternal_care-iron-1-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-2">2nd visit (2nd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-2-tablet" id="maternal_care-iron-2-tablet">                            
                            <label for="maternal_care-iron-2-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-2-date" id="maternal_care-iron-2-date">
                            <label for="maternal_care-iron-2-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-3">3rd visit (3rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-3-tablet" id="maternal_care-iron-3-tablet">                            
                            <label for="maternal_care-iron-3-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-3-date" id="maternal_care-iron-3-date"> <!--maternal_care-iron-1-date change into maternal_care-iron-3-date-->
                            <label for="maternal_care-iron-3-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-4">4rd visit (4rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-4-tablet" id="maternal_care-iron-4-tablet">                            
                            <label for="maternal_care-iron-4-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-4-date" id="maternal_care-iron-4-date"> <!--maternal_care-iron-1-date change into maternal_care-iron-4-date-->
                            <label for="maternal_care-iron-4-date">Date Given</label>
                        </div>
                    </div>
                </div>
                
                <hr>    
                <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                    Calcium Carbonate
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-calcium-2">2nd visit (2nd tri) </label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-calcium-2-capsule" id="maternal_care-calcium-2-capsule">                            
                            <label for="maternal_care-calcium-2-capsule">Number of Capsules Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-calcium-2-date" id="maternal_care-calcium-2-date">
                            <label for="maternal_care-calcium-2-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-calcium-3">3rd visit (3rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-calcium-3-capsule" id="maternal_care-calcium-3-capsule">                            
                            <label for="maternal_care-calcium-3-capsule">Number of Capsule Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-calcium-3-date" id="maternal_care-calcium-3-date"> <!--maternal_care-calcium-1-date change into maternal_care-calcium-3-date-->
                            <label for="maternal_care-calcium-3-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-calcium-4">4rd visit (4rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-calcium-4-capsule" id="maternal_care-calcium-4-capsule">                            
                            <label for="maternal_care-calcium-4-capsule">Number of Capsule Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-calcium-4-date" id="maternal_care-calcium-4-date"> <!--maternal_care-calcium-1-date change into maternal_care-calcium-4-date-->
                            <label for="maternal_care-calcium-4-date">Date Given</label>
                        </div>
                    </div>
                </div>

                <hr>    
                <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                    Iodine Capsules
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iodine-1">1st visit (1st tri) </label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iodine-1-capsule" id="maternal_care-iodine-1-capsule">                            
                            <label for="maternal_care-iodine-1-capsule">Number of Capsules Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iodine-1-date" id="maternal_care-iodine-1-date">
                            <label for="maternal_care-iodine-1-date">Date Given</label>
                        </div>
                    </div>
                </div>

                <hr>    
                <h2 class="add-maternal_care__title">
                    Nutritional Assessment
                </h2>
                <p class="add-maternal_care__desc">
                    (Write the BMI for 1st Tri)
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-1st-tri-weight">Weight</label>
                    <input type="text" name="maternal_care-1st-tri-weight" id="maternal_care-1st-tri-weight">
                </div>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Deworming Tablet
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-deworming-tablet">Date Given 2nd or 3rd Tris</label>
                        <input type="date" name="maternal_care-deworming-tablet" id="maternal_care-deworming-tablet">
                    </div>
                </div>


                <hr>    
                <h2 class="add-maternal_care__title">
                    Infectious Disease Surveillance
                </h2>
                <p class="add-maternal_care__desc">
                    
                </p>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Syphilis Screening
                        </p>
                        <p class="dose-indication">
                            RPR or RDT Result
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-syphilis-screening-date">Date</label>
                        <input type="date" name="maternal_care-syphilis-screening-date" id="maternal_care-syphilis-screening-date">
                    </div>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                    <label for="maternal_care-syphilis-screening-status">Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-positive" value="Positive"> <!--Value added-->
                            <label for="maternal_care-syphilis-screening-status-positive">Positive</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-negative" value="Negative"> <!--Value added-->
                            <label for="maternal_care-syphilis-screening-status-negative">Negative</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Hepatitis B Screening
                        </p>
                        <p class="dose-indication">
                            Result of HBsAg Test
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-hepatitis-screening-date">Date</label>
                        <input type="date" name="maternal_care-hepatitis-screening-date" id="maternal_care-hepatitis-screening-date">
                    </div>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                    <label for="maternal_care-hepatitis-screening-status">Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-positive" value="Positive"> <!--Value added-->
                            <label for="maternal_care-hepatitis-screening-status-positive">Positive</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-negative" value="Negative"> <!--Value added-->
                            <label for="maternal_care-hepatitis-screening-status-negative">Negative</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            HIV Screening
                        </p>
                        <!-- <p class="dose-indication">
                            Result of HBsAg Test
                        </p> -->
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-hiv-screening-date">Date Screened</label>
                        <input type="date" name="maternal_care-hiv-screening-date" id="maternal_care-hiv-screening-date">
                    </div>
                </div>  
                
                <!-- Divider -->
                <hr>

                <div class="add-maternal_care__form-btn">
                    <button type="submit" class="btn-green btn-add" name="add_maternal_list"> <!--added name-->
                        Add
                    </button>
                    <button class="btn-red btn-cancel">
                        Clear
                    </button>
                </div>
            </form>
        </section>

        <section class="contents">
            <ul class="contents__list">
                <li class="content__item content__item--active">
                    <a href="">Add Target Client list for Maternal Care </a>
                </li>
                <li class="content__item content__item--active">
                    <a href="">Dates of Prenatal Checkup </a>
                </li>
                <li class="content__item">
                    <a href="">Immunization Status </a>
                </li>
                <li class="content__item">
                    <a href="">Micronutrient Supplementation </a>
                </li>
                <li class="content__item">
                    <a href="">Nutritional Assessment </a>
                </li>
                <li class="content__item">
                    <a href="">Infectious Disease Surveillance </a>
                </li>
            </ul>
        </section>
    </main>
</body>
</html>

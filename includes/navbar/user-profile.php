<!-- Nav Bar -->
<header class="navbar">
    <nav class="navigation">
        <div id="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <h1 class="navigation__title h3">
            <!-- This would change depending on the URL or the current page  -->
            User Profile
        </h1>
        <form class="navigation__search" action="search-result.php" method="GET">
            <input type="text" name="search_input" class="navigation__search__bar" placeholder="Search patient last name" /><!--  
                --><button type="submit" name="search_btn" class="navigation__search__btn">
                <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001">
                    <rect width="256" height="256" fill="none" />
                    <circle cx="115.997" cy="116" r="84" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                    <line x1="175.391" x2="223.991" y1="175.4" y2="224.001" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                </svg>
            </button>
        </form>

        <button id="nav-btn" class="navigation__btn btn-green">
            <p>Add Record</p>
            <svg class="add-icon navigation__btn__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512">
                <path fill="#231f20" d="M468.3,212.7H305.2v-169c0-24.2-19.6-43.8-43.8-43.8c-24.2,0-43.8,19.6-43.8,43.8v169h-174 C19.6,212.7,0,232.3,0,256.5c0,24.2,19.6,43.8,43.8,43.8h174v168c0,24.2,19.6,43.8,43.8,43.8c24.2,0,43.8-19.6,43.8-43.8v-168h163.1 c24.2,0,43.8-19.6,43.8-43.8C512,232.3,492.5,212.7,468.3,212.7z" />
            </svg>
        </button>
    </nav>
</header>
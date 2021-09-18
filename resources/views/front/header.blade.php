<header class="s-header @unless(currentRoute('/')) s-header--opaque @endunless">

    <div class="s-header__logo">
        <a class="nav-icon" href="{{ route('acceuils.index') }}"><i class="fas fa-calendar-week"></i>
            BOOKING EVENT
        </a>
    </div> <br>

    <div class="row s-header__navigation">

        <nav class="s-header__nav-wrap">

            <h3 class="s-header__nav-heading h6">Navigate to</h3>

            <ul class="s-header__nav">
                <li class="current"><a href="/" title=""> <i class="nav-icon fas fa-home"></i> Home</a></li>
                <li class="current"><a href="#" title=""> <i class="fas fa-id-card-alt"></i> Contact</a></li>
                <li class="nav-icon">
                    <a href="{{route('login')}}" title="">  <i class="fas fa-sign-in-alt"></i> Connexion</a>
                </li>
                <li class="nav-icon">
                    <a href="{{route('register')}}" title="">  <i class="fas fa-user-plus"></i> S'enregistrer</a>
                </li>

            </ul> <!-- end s-header__nav -->

            <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end s-header__nav-wrap -->

    </div> <!-- end s-header__navigation -->

    <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

    <div class="s-header__search">

        <div class="s-header__search-inner">
            <div class="row wide">

                <form role="search" method="get" class="s-header__search-form" action="#">
                    <label>
                        <span class="h-screen-reader-text">Rechercher un événement:</span>
                        <input type="search" class="s-header__search-field" placeholder="Rechercher..." value="" name="s" title="Rechercher:" autocomplete="off">
                    </label>
                    <input type="submit" class="s-header__search-submit" value="Search">
                </form>

                <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

            </div> <!-- end row -->
        </div> <!-- s-header__search-inner -->

    </div> <!-- end s-header__search wrap -->

    <a class="s-header__search-trigger" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983"><path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z"/></svg>
    </a>

</header>

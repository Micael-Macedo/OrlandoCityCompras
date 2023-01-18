<!DOCTYPE html>
<html lang="pt-br" ng-app="shop">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale=1">
    <title>Orlando City</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/raty-master/lib/jquery.raty.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.3/plyr.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleMobile.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="lib/angular-1.8.2/angular.min.js"></script>
</head>

<body>
    <header>
        <div id="menu-mobile-mask" class="visible-xs">

        </div>
        <div id="menu-mobile" class="visible-xs">
            <div id="menu-mobile-logo">
                <img src="img/orlando-logo.png" alt="">
            </div>
            <hr>
            <div class="menu-mobile-links">
                <ul>
                    <li>
                        <a href="videos">Videos</a>
                    </li>
                    <hr>
                    <li>
                        <a href="">Tickets</a>
                    </li>
                    <hr>
                    <li>
                        <a href="">News</a>
                    </li>
                    <hr>
                    <li>
                        <a href="">Schedule</a>
                    </li>
                    <hr>
                </ul>
            </div>
            <div id="close-menu-mobile">
                <button>
                    <i class="bi bi-x"></i>
                </button>
            </div>
        </div>
        <div class="teamsIcons">
            <ul>
                <li>
                    <img src="img/Time 1.png" alt="">
                </li>
                <li>
                    <img src="img/Time 2.png" alt="">
                </li>
                <li>
                    <img src="img/Time 3.png" alt="">
                </li>
                <li>
                    <img src="img/Time 4.png" alt="">
                </li>
                <li>
                    <img src="img/Time 5.png" alt="">
                </li>
                <li>
                    <img src="img/Time 6.png" alt="">
                </li>
                <li>
                    <img src="img/Time 7.png" alt="">
                </li>
                <li>
                    <img src="img/Time 8.png" alt="">
                </li>
                <li>
                    <img src="img/Time 9.png" alt="">
                </li>
                <li>
                    <img src="img/Time 10.png" alt="">
                </li>
                <li>
                    <img src="img/Time 12.png" alt="">
                </li>
                <li>
                    <img src="img/Time 13.png" alt="">
                </li>
                <li>
                    <img src="img/Time 14.png" alt="">
                </li>
                <li>
                    <img src="img/Time 15.png" alt="">
                </li>
                <li>
                    <img src="img/Time 16.png" alt="">
                </li>
                <li>
                    <img src="img/Time 17.png" alt="">
                </li>
                <li>
                    <img src="img/Time 18.png" alt="">
                </li>
                <li>
                    <img src="img/Time 19.png" alt="">
                </li>
                <li>
                    <img src="img/Time 20.png" alt="">
                </li>
                <li>
                    <img src="img/Time 21.png" alt="">
                </li>
                <li>
                    <img src="img/Time 22.png" alt="">
                </li>
            </ul>
            <div id="btn-bars">
                <i class="bi bi-list"></i>
                <div id="inputSearch">
                    <input type="text" placeholder="search...">
                </div>

                <i class="bi bi-search"></i>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="navContent">
                <a href="index" class="navbar-brand logotipo">
                    <img src="img/orlando-logo.png" alt="" srcset="">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="videos">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <div class="searchNav">
                                <input type="search" placeholder="search...">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
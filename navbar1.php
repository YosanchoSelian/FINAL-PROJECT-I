<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Kuliner Toba
    </title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fonts -->
    <link rel="stylesheet" href="font/fonts.css">
    <!-- normalize css -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>

    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container flex">
            <a href="home.php" class="site-brand">
                Kuliner<span>Toba</span>
            </a>
            <button type="button" id="navbar-show-btn" class="flex">
                <i class="fas fa-bars"></i>
            </button>
            <div id="navbar-collapse">
                <button type="button" id="navbar-close-btn" class="flex">
                    <i class="fas fa-times"></i>
                </button>
                <ul class="navbar-nav">
                    <?php
                    $navbarCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' ";
                    $navbarCategory_run = mysqli_query($con, $navbarCategory);

                    if (mysqli_num_rows($navbarCategory_run) > 0) {
                        foreach ($navbarCategory_run as $navItems) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?= $navItems['slug']; ?>"><?= $navItems['name']; ?></a>
                            </li>

                            <?php
                        }
                    }
                    ?>
                    <!-- search bar  -->
                    <div class="wrap">
                        <form action="search.php" method="GET">
                            <div class="search">
                                <input type="text" name="searchTerm" placeholder="Temukan sekarang.." />
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- search bar end  -->
                </ul>
            </div>
        </div>
    </nav>
    <script>
        let navbarDiv = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
                navbarDiv.classList.add('navbar-cng');
            } else {
                navbarDiv.classList.remove('navbar-cng');
            }
        });


        const navbarCollapseDiv = document.getElementById('navbar-collapse');
        const navbarShowBtn = document.getElementById('navbar-show-btn');
        const navbarCloseBtn = document.getElementById('navbar-close-btn');
        // show navbar
        navbarShowBtn.addEventListener('click', () => {
            navbarCollapseDiv.classList.add('navbar-collapse-rmw');
        });

        // hide side bar
        navbarCloseBtn.addEventListener('click', () => {
            navbarCollapseDiv.classList.remove('navbar-collapse-rmw');
        });

        document.addEventListener('click', (e) => {
            if (e.target.id != "navbar-collapse" && e.target.id != "navbar-show-btn" && e.target.parentElement.id != "navbar-show-btn") {
                navbarCollapseDiv.classList.remove('navbar-collapse-rmw');
            }
        });

        // stop transition and animatino during window resizing
        let resizeTimer;
        window.addEventListener('resize', () => {
            document.body.classList.add("resize-animation-stopper");
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                document.body.classList.remove("resize-animation-stopper");
            }, 400);
        });
    </script>

</body>

</html>
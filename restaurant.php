<?php
session_start();
include('admin/config/dbcon.php');
include('navbar1.php');
$perPage = 6; // Jumlah data per halaman

// Menghitung total data
$queryCount = "SELECT COUNT(*) AS total FROM posts";
$resultCount = mysqli_query($con, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalData = $rowCount['total'];
$totalPage = ceil($totalData / $perPage);

// Mengambil nomor halaman dari URL, jika tidak ada maka default ke halaman 1
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Menghitung batas awal dan akhir data
$start = ($currentPage - 1) * $perPage;

// Mengambil data sesuai dengan halaman saat ini
$queryData = "SELECT * FROM posts LIMIT $start, $perPage";
$resultData = mysqli_query($con, $queryData);
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kuliner Toba</title>
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
        /* ### Restaurant PAGE ### */
        /* Restaurant */
        #blog {
            background-color: var(--light-grey);
        }

        .blog-item {
            background-color: #fff;
            -webkit-transition: var(--trans);
            -o-transition: var(--trans);
            transition: var(--trans);
        }

        .blog-item-top {
            position: relative;
        }

        .blog-date {
            position: absolute;
            background-color: var(--dark);
            color: #fff;
            padding: 0.5rem;
            height: 38px;
            min-width: 160px;
            text-transform: uppercase;
            letter-spacing: 2px;
            bottom: -19px;
            left: 5%;
        }

        .blog-item-bottom {
            padding: 2rem 1rem;
        }

        .blog-item-bottom span {
            text-transform: uppercase;
            color: var(--dark);
            opacity: 0.7;
            letter-spacing: 2px;
            display: block;
            margin-top: 1rem;
        }

        .blog-item-bottom a {
            margin: 1rem 0;
            font-size: 1.4rem;
            display: block;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            line-height: 1.6;
            -webkit-transition: var(--trans);
            -o-transition: var(--trans);
            transition: var(--trans);
        }

        .blog-item-bottom a:hover {
            opacity: 0.8;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #fff;
            background-color: black;
            border: 1px solid black;
            padding: 8px 12px;
            margin: 0 4px;
            text-decoration: none;
            border-radius: 4px;
        }

        .pagination .active {
            background-color: #fff;
            color: black;
            border: 1px solid black;
            padding: 8px 12px;
            margin: 0 4px;
            text-decoration: none;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #000;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header class="flex">
        <div class="container">
            <div class="header-title">
                <h1>Restaurant</h1>
                <p>Restaurant yang terdapat di daerah Toba</p>
            </div>
        </div>
    </header>
    <!-- header -->

    <!-- blog section -->
    <section id="blog" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <h3 class="lg-title">restaurant</h3>
            </div>

            <div class="blog-row">
                <?php
                while ($row = mysqli_fetch_assoc($resultData)) {
                    ?>
                    <div class="blog-item my-2 shadow">
                        <div class="blog-item-top">
                            <img src="uploads/posts/<?= $row['image'] ?>" width="350px" height="350px" />
                            <span class="blog-date">
                                <?=$row['kabupaten']; ?>
                            </span>
                        </div>
                        <div class="blog-item-bottom">
                            <span>
                                <?= $row['name']; ?>
                            </span>
                            <a href="post1.php?title=<?= $row['slug']; ?>"><?= $row['name']; ?></a>
                            <p class="text">
                                <?= $row['meta_description']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- end of blog section -->


    <!-- pagination  -->
    <?php
    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPage; $i++) {
        $active = ($i == $currentPage) ? "active" : "";
        echo "<a href='restaurant.php?page=" . $i . "' class='" . $active . "'>" . $i . "</a>";
    }
    echo "</div>";
    ?>
    <!-- pagination end -->


    <!-- footer -->
    <footer class="py-4">
        <div class="footer-item">
            <a href="home.php" class="site-brand">
                Kuliner<span>Toba</span>
            </a>
            <p class="text">Kuliner Toba merupakan sebuah website sistem informasi yang mengandung berbagai lokasi yang
                terdapat pada daerah Toba,
                Samosir, dan Tapanuli Utara. Website ini bertujuan untuk membantu orang-orang untuk mengetahui
                lokasi-lokasi kuliner yang terdapat
                di berbagai lokasi dalam kawasan Toba, Samosir dan Tapanuli Utara.</p>
        </div>

        <div class="footer-item">
        </div>
    </footer>
    <!-- end of footer -->

    <!-- js -->
    <script src="js/script.js"></script>
    <script>

    </script>
</body>

</html>
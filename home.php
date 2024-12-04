<?php
session_start();
include('admin/config/dbcon.php');
include('navbar1.php');
$perPage = 9; // Jumlah data per halaman

// Menghitung total data
$queryCount = "SELECT COUNT(*) AS total FROM posts";
$resultCount = mysqli_query($con, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalData = $rowCount['total'];
$totalPage = ceil($totalData / $perPage);
$maxPage = 9;

// Mengambil nomor halaman dari URL, jika tidak ada maka default ke halaman 1
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Menghitung batas awal dan akhir data
$start = ($currentPage - 1) * $perPage;

// Mengambil data sesuai dengan halaman saat ini
$queryData = "SELECT * FROM posts LIMIT $start, $perPage";
$resultData = mysqli_query($con, $queryData);

$check_posts = mysqli_num_rows($resultData) > 0;
?>

<!DOCTYPE html>
<html>

<head>
    <style>
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
            align-items: center;
            /* Tambahkan baris ini */
            margin-top: 20px;
            margin-bottom: 20px;
            /* Tambahkan baris ini */
        }

        .pagination a,
        .pagination .check-more {
            color: #fff;
            background-color: black;
            border: 1px solid black;
            padding: 8px 12px;
            margin: 0 4px;
            text-decoration: none;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .pagination a::before,
        .pagination .check-more::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background-color: #000;
            transition: all 0.3s ease;
            z-index: -1;
        }

        .pagination a:hover::before,
        .pagination .check-more:hover::before {
            left: 0;
        }

        .check-more {
            font-weight: bold;
            text-transform: uppercase;
        }

        .check-more:hover {
            color: #000;
            background-color: #fff;
        }
    </style>
    </style>
</head>

<body>
    <!-- header -->
    <header class="flex">
        <div class="container">
            <div class="header-title">
                <h1>Rasakan Cita Rasa</h1>
                <p>Cita rasa Kuliner di Daerah Toba.</p>
            </div>
        </div>
    </header>
    <!-- header -->

    <!-- featured section -->
    <section id="featured" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <h2 class="lg-title">Restaurant</h2>
            </div>

            <div class="featured-row">
                <?php
                while ($row = mysqli_fetch_assoc($resultData)) {
                    ?>
                    <div class="featured-item my-2 shadow">
                        <img src="uploads/posts/<?= $row['image'] ?>" width="350px" height="350px" />
                        <div class="featured-item-content">
                            <span>
                                <a href="post1.php?title=<?= $row['slug']; ?>"><i class="fas fa-map-marker-alt">
                                        <?= $row['name']; ?>
                                    </i></a>
                            </span>
                            <div>
                                <p class="text">
                                    <?= $row['meta_description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        </div>
    </section>

    <!-- pagination  -->
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($i == $currentPage) {
                // echo '<span class="active">' . $i . '</span>';
            }

            if ($i >= $maxPage && $i < $totalPage) {
                break;
            }
        }
        ?>
        <a href="restaurant.php" class="check-more">Check More</a>
    </div>
    <!-- pagination end -->

    <!-- end of featured section -->
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
</body>

</html>
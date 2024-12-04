<?php
session_start();
include('admin/config/dbcon.php');
include('navbar1.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: black;
            padding: 1rem 0;
            z-index: 999;
        }

        .navbar-cng .site-brand {
            color: #fff;
        }

        #blog {
            background-color: #fff;
        }

        .blog-row .blog-item {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .pemberitahuan {
            font-size: 30px;
            text-align: center;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            color: #fff;
            background-color: black;
            border: 1px solid black;
            padding: 8px 12px;
            margin: 0 4px;
            text-decoration: none;
            border-radius: 4px;
        }

        .pagination .current-page {
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
    <section id="blog" class="py-4">
        <div class="container">
        <div class="title-wrap">
                <h3 class="lg-title">Kabupaten Tapanuli Utara</h3>
            </div>
            <div class="blog-row">
                <?php
                // Pagination konfigurasi
                $results_per_page = 6; // Jumlah hasil per halaman
                $sql = "SELECT COUNT(*) AS total FROM posts where kabupaten LIKE '%tapanuli%'";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                $total_results = $row['total'];
                $total_pages = ceil($total_results / $results_per_page); // Jumlah halaman
                
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $start_index = ($page - 1) * $results_per_page; // Indeks awal data yang akan ditampilkan
                
                $sql = "SELECT * FROM posts where kabupaten LIKE '%tapanuli%' LIMIT $start_index, $results_per_page";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="blog-item my-2 shadow">
                            <div class="blog-item-top">
                                <img src="uploads/posts/<?= $row['image'] ?>" width="350px" height="350px" />
                                <span class="blog-date">
                                    <?= $row['kabupaten']; ?>
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
                } else {
                    echo '<p class="pemberitahuan">Tidak ada konten yang ditemukan.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <div class="pagination">
        <?php
        for ($page = 1; $page <= $total_pages; $page++) {
            echo '<a href="kabupaten-toba.php?page=' . $page . '">' . $page . '</a> ';
        }
        ?>
    </div>

    <footer class="py-4">
        <div class="footer-item">
            <a href="index.html" class="site-brand">
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
</body>

</html>
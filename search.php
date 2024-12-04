<?php
session_start();
include('admin/config/dbcon.php');
include('navbar1.php');

// Fungsi untuk mendapatkan jumlah total postingan
function getTotalPosts($searchTerm)
{
    global $con;
    $query = "SELECT COUNT(*) AS total FROM posts WHERE name LIKE '%$searchTerm%' OR kabupaten LIKE '%$searchTerm%'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Fungsi untuk mendapatkan postingan dengan batasan gambar per halaman
function getPosts($start, $limit, $searchTerm)
{
    global $con;
    $query = "SELECT * FROM posts WHERE name LIKE '%$searchTerm%' OR kabupaten LIKE '%$searchTerm%' LIMIT $start, $limit";
    $result = mysqli_query($con, $query);
    return $result;
}

$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6; // Batasan gambar per halaman
$start = ($page - 1) * $limit;
$totalPosts = getTotalPosts($searchTerm);
$totalPages = ceil($totalPosts / $limit);

if (!empty($searchTerm)) {
    $searchResult = getPosts($start, $limit, $searchTerm);
}
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
            <div class="blog-row">
                <?php
                if (!empty($searchTerm) && mysqli_num_rows($searchResult) > 0) {
                    while ($row = mysqli_fetch_array($searchResult)) {
                        ?>
                        <div class="blog-item my-2 shadow">
                            <div class="blog-item-top">
                                <img src="uploads/posts/<?= $row['image'] ?>" width="350px" height="350px" />
                                <span class="blog-date">
                                    <?= date('d-M-Y', strtotime($row['created_at'])); ?>
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
            <?php
            if ($totalPages > 1) {
                ?>
                <div class="pagination">
                    <?php
                    if ($page > 1 && !empty($searchTerm)) {
                        echo '<a href="?page=' . ($page - 1) . '&searchTerm=' . $searchTerm . '">Previous</a>';
                    }
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == $page) {
                            echo '<span class="current-page">' . $i . '</span>';
                        } else {
                            echo '<a href="?page=' . $i . '&searchTerm=' . $searchTerm . '">' . $i . '</a>';
                        }
                    }
                    if ($page < $totalPages && !empty($searchTerm)) {
                        echo '<a href="?page=' . ($page + 1) . '&searchTerm=' . $searchTerm . '">Next</a>';
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
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

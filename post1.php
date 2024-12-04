<?php
session_start();
include('admin/config/dbcon.php');
include('navbar1.php');
include('add-komen.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .comment-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .comment-form h3 {
            margin-bottom: 10px;
        }

        .comment-form .form-group {
            margin-bottom: 15px;
        }

        .comment-form label {
            display: block;
            font-weight: bold;
        }

        .comment-form input[type="text"],
        .comment-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comment-form button {
            padding: 10px 20px;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment-form button:hover {
            background-color: #23527c;
        }

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

        .comment-author h4 a {
            color: black;
            padding: 5px 5px;
            border: 2px solid black;
            display: inline-block;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .comment-author h4 a:hover {
            background-color: red;
            color: white;
        }

        .pagination a {
            color: black;
            text-decoration: underline;
        }

        .pagination a:hover {
            color: #508FC7;
        }

        #gambar-full {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.7);
            align-items: center;
        }

        #gambar-full img {
            max-width: 80%;
            max-height: 80%;
            margin-top: 80px;
            margin-left: 120px;
            border: 4px solid #fff;
        }

        .gallery-item {
            width: 425px;
            height: 230px;
            margin-left: 6px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <!-- header -->

    <!-- about section -->
    <section id="about" class="py-4">
        <div class="container">
            <?php
            if (isset($_GET['title'])) {
                $slug = mysqli_real_escape_string($con, $_GET['title']);

                $posts = "SELECT * FROM posts WHERE slug='$slug' ";
                $posts_run = mysqli_query($con, $posts);

                if (mysqli_num_rows($posts_run) > 0) {
                    foreach ($posts_run as $postItems) {
                        ?>
                        <div class="title-wrap">
                            <h2 class="lg-title">
                                <?= $postItems['name']; ?>
                            </h2>
                        </div>

                        <div class="about-row">
                            <div class="about-left my-2">
                                <?php if ($postItems['image'] != null): ?>
                                    <img src="uploads/posts/<?= $postItems['image'] ?>" width="500px" height="500px" />
                                <?php endif; ?>
                            </div>
                            <div class="about-right">
                                <h2>
                                    <?= $postItems['name']; ?>
                                </h2>
                                <p class="text">
                                    Kabupaten :
                                    <?= $postItems['kabupaten']; ?>
                                </p>
                                <p class="text">
                                    Alamat :
                                    <?= $postItems['alamat']; ?>
                                </p>
                                <label class="text-dark me-2">Posted On:
                                    <?= date('d-M-Y', strtotime($postItems['created_at'])); ?>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <h3>
                            Galeri
                        </h3>
                        <hr>
                        <table>
                            <div class="gallery">
                                <tr>
                                    <?php if ($postItems['image1'] != null): ?>
                                        <td>
                                            <img src="uploads/posts/<?= $postItems['image1'] ?>" class="gallery-item"
                                                onclick="tampilkanGambarFull(this)" />
                                            <div id="gambar-full" onclick="sembunyikanGambarFull()">
                                                <img src="">
                                            </div>
                                        </td>
                                    <?php endif; ?>

                                    <?php if ($postItems['image2'] != null): ?>
                                        <td>
                                            <img src="uploads/posts/<?= $postItems['image2'] ?>" class="gallery-item" 
                                                onclick="tampilkanGambarFull(this)" />
                                            <div id="gambar-full" onclick="sembunyikanGambarFull()">
                                                <img src="">
                                            </div>
                                        </td>
                                    <?php endif; ?>

                                    <?php if ($postItems['image3'] != null): ?>
                                        <td>
                                            <img src="uploads/posts/<?= $postItems['image3'] ?>" class="gallery-item"
                                                onclick="tampilkanGambarFull(this)" />
                                            <div id="gambar-full" onclick="sembunyikanGambarFull()">
                                                <img src="">
                                            </div>
                                        </td>
                                    <?php elseif($postItems['image3'] == null): ?>
                                        <td>
                                            <h3>Tidak ada gambar</h3>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            </div>
                        </table>
                        <?php
                    }

                } else {
                    ?>
                    <h4>No Such Post Found</h4>
                    <?php
                }
            } else {
                ?>
                <h4>No Such Url Found</h4>
                <?php
            }
            ?>
            <br><br>
            <hr>
            <div class="card-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Deskripi Resto</h4>
                        <p class="text">
                            <?= $postItems['description']; ?>
                        </p>
                    </div>
                    <hr>
                    <div class="card-body">
                        <h4 align="center">Lokasi Resto</h4>
                        <?php
                        ?>
                        <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?= $postItems['latitude']; ?>,<?= $postItems['longitude'];
                          ; ?>&output=embed"></iframe>
                        <?php
                        ?>
                    </div>
                </div>
                <?php
                // Ambil data komentar dari database berdasarkan post_id
                $comments_query = "SELECT * FROM comments WHERE post_id='{$postItems['id']}'";
                $comments_result = mysqli_query($con, $comments_query);

                // Memeriksa jumlah komentar
                $total_comments = mysqli_num_rows($comments_result);
                $comments_per_page = 3;
                $total_pages = ceil($total_comments / $comments_per_page);

                // Menentukan halaman yang aktif
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($current_page - 1) * $comments_per_page;
                $end = $start + $comments_per_page;

                // Mengambil data komentar dengan batasan halaman
                $comments_query = "SELECT * FROM comments WHERE post_id='{$postItems['id']}' LIMIT $start, $comments_per_page";
                $comments_result = mysqli_query($con, $comments_query);

                ?>

                <h3>Comments</h3>
                <?php
                if (mysqli_num_rows($comments_result) > 0) {
                    while ($comment = mysqli_fetch_assoc($comments_result)) {
                        ?>
                        <div class="comment">
                            <div class="comment-author">
                                <h4>
                                    <?= $comment['name']; ?>
                                </h4>
                            </div>
                            <div class="comment-content">
                                <p>
                                    <?= $comment['comment']; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No comments yet.</p>";
                }
                ?>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $current_page) {
                            echo '<span class="current-page">' . $i . '</span>';
                        } else {
                            echo '<a href="post1.php?title=' . $slug . '&page=' . $i . '">' . $i . '</a>';
                        }
                    }
                    ?>
                </div>

                <div class="comment-form">
                    <h3>Add a Comment</h3>
                    <form action="add-komen.php?title=<?= $slug; ?>" method="POST">
                        <input type="hidden" name="post_id" value="<?= $postItems['id'] ?>">
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" required>
                        </div>

                        <div>
                            <label for="comment">Comment:</label>
                            <textarea name="comment" rows="4" required></textarea>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>


            </div>
        </div>
    </section>

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
        function tampilkanGambarFull(gambar) {
            var gambarFull = document.getElementById("gambar-full");
            var gambarFullImg = document.querySelector("#gambar-full img");
            gambarFullImg.src = gambar.src;
            gambarFull.style.display = "block";
        }

        function sembunyikanGambarFull() {
            var gambarFull = document.getElementById("gambar-full");
            gambarFull.style.display = "none";
        }
    </script>
</body>

</html>
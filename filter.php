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

        /* CSS tombol tautan */
        .btn-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-right: 20px;
            margin-top: 20px;
            width: 200px;
        }

        .btn-link:hover {
            background-color: #333;
        }

        .btn-link:active {
            background-color: #666;
        }
    </style>
</head>

<body>
    <section id="blog" class="py-4">
        <div class="container">
        <div class="title-wrap">
                <h3 class="lg-title">Filter</h3>
            </div>
            <div class="featured-row">
                <div class="baris">
                <h4>Berdasarkan Kabupaten</h4>
                    <div class="btn-link">
                        <a href="kabupaten-toba.php">Kabupaten Toba</a>
                    </div>
                    <div class="btn-link">
                        <a href="kabupaten-tapanuli.php">Kabupaten Tapanuli Utara</a>
                    </div>               
                    <div class="btn-link">
                        <a href="kabupaten-samosir.php">Kabupaten Samosir</a>
                    </div>
                </div>
                <div class="baris">
                <h4>Berdasarkan Rumah Makan</h4>
                    <div class="btn-link">
                        <a href="cafe.php">Cafe</a>
                    </div>
                    <div class="btn-link">
                        <a href="resto.php">Resto</a>
                    </div>               
                    <div class="btn-link">
                        <a href="nasional.php">Nasional</a>
                    </div>
                    <div class="btn-link">
                        <a href="khas.php">Khas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
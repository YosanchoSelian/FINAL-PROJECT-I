<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliner Toba</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!-- header section parts -->

<header>
    <div class="judul">
    <a href="index.html"><i class="fas fa-utensils"></i>Kuliner Toba</a>
    </div>

    <nav class="navbar">
        <a class="active" href="index1.php">Home</a>
        <a href="#restaurant">Popular Today</a>
        <a href="resto.php">Restaurant</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
    </div>

</header>

<!-- header section ends -->

<!-- search form -->

<form action="" id="search-form">
    <input type="search" placeholder="Search Here" name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<!-- home section starts -->

<section class="home" id="home">

    <div class="swiper mySwiper home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special place</span>
                    <h3>Angkasa</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Cumque recusandae tempora minima.</p>
                    <a href="#" class="btn">Click Here</a>
                </div>
                <div class="image">
                    <img src="images/Angkasa Caffee & Resto1.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special place</span>
                    <h3>Angkasa</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Cumque recusandae tempora minima.</p>
                    <a href="#" class="btn">Click Here</a>
                </div>
                <div class="image">
                    <img src="images/Angkasa Caffee & Resto2.jpg" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special place</span>
                    <h3>Angkasa</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Cumque recusandae tempora minima.</p>
                    <a href="#" class="btn">Click Here</a>
                </div>
                <div class="image">
                    <img src="images/Angkasa Caffee & Resto3.jpg" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section end -->

<!-- restaurant section starts -->

<section class="restaurant" id="restaurant">

    <!-- <h3 class="sub-heading">Rekommend</h3> -->
    <h1 class="heading">Rekomendasi Rumah Makan</h1>

    <div class="box-container">

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/Ambarado Café,Resto & Hotel1.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
            <span>Ambarado Cafe,Resto & Hotel</span>
            <br>
            <a href="#" class="btn">View</a>
        </div>
        
        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/Ayam Kejar Puja Sera Tarutung.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
            <span>Ayam Kejar Puja Sera Tarutung</span>
            <br>
            <a href="#" class="btn">View</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/APTAR Cafe & Resto.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
            <span>Aptar Cafe & Resto</span>
            <br>
            <a href="#" class="btn">View</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/APTAR Cafe & Resto.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
            <span>Aptar Cafe & Resto</span>
            <br>
            <a href="#" class="btn">View</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/APTAR Cafe & Resto.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
            <span>Aptar Cafe & Resto</span>
            <br>
            <a href="#" class="btn">View</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/APTAR Cafe & Resto.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
            <span>Aptar Cafe & Resto</span>
            <br>>
            <a href="#" class="btn">View</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/APTAR Cafe & Resto.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
                <span>Aptar Cafe & Resto</span>
            <br>
            <a href="#" class="btn">View</a>
        </div>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
            <img src="images/APTAR Cafe & Resto.jpg" alt="">
            <h3>Best Restaurant</h3>
            <br>
                <span>Aptar Cafe & Resto</span>
            <br>
            <a href="#" class="btn">View</a>
        </div>

    </div>
</section>
<!-- restaurant section ends -->

<!-- menu section starts -->
    
<!-- menu section ends -->

<!-- footer section starts -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Locations</h3>
            <a href="#">Home</a>
            <a href="#">Popular Today</a>
            <a href="#">Restaurant</a>
        </div>
        
        <div class="box">
            <h3>Quick links</h3>
            <a href="#">Home</a>
            <a href="#">Popular Today</a>
            <a href="#">Restaurant</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#"><i class="fas fa-phone"></i>082132432229</a>
            <a href="#"><i class="fas fa-phone"></i>087885268259</a>
            <a href="#"></a>
        </div>
    </div>

    <div class="credit"> copyright @ 2023 by <span>Kelompok 04</span></div>

</section>

<!-- footer section ends  -->

<!-- loader part
<div class="loader-container">
    <img src="images/loader-2.gif" alt="">
</div> -->































<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- custom js file -->
<script src="script.js"></script>
</body>
</html>
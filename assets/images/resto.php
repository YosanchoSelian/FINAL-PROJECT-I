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

<form action="" id="search-form">
    <input type="search" placeholder="Search Here" name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>


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

<section class="menu" id="menu">

    <h3 class="sub-heading">Our Restaurant</h3>
    <h1 class="heading">Restaurant</h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/Angkasa Caffee & Resto2.jpg" alt="">
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Delicious Food</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Dolor, asperiores ullam dolores totam</p>
                <a href="#" class="btn">View Here</a>
                <br>
                <span class="pice">Resto</span>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/Angkasa Caffee & Resto1.jpg" alt="">
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Delicious Food</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Dolor, asperiores ullam dolores totam</p>
                <a href="#" class="btn">View Here</a>
                <br>
                <span class="pice">Resto</span>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/Ayam Kejar Puja Sera Tarutung1.jpg" alt="">
                <a href="#" class="fas fa-heart"></a>
            </div>
            <div class="content">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Delicious Food</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Dolor, asperiores ullam dolores totam</p>
                <a href="#" class="btn">View Here</a>
                <br>
                <span class="pice">Resto</span>
            </div>
        </div>
    </div>

</section>
<section class="menu" id="menu">

        <h3 class="sub-heading">Our Restaurant</h3>
        <h1 class="heading">Restaurant</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/Angkasa Caffee & Resto2.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Delicious Food</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        Dolor, asperiores ullam dolores totam</p>
                    <a href="#" class="btn">View Here</a>
                    <br>
                    <span class="pice">Resto</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/Angkasa Caffee & Resto1.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Delicious Food</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        Dolor, asperiores ullam dolores totam</p>
                    <a href="#" class="btn">View Here</a>
                    <br>
                    <span class="pice">Resto</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/Ayam Kejar Puja Sera Tarutung1.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Delicious Food</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        Dolor, asperiores ullam dolores totam</p>
                    <a href="#" class="btn">View Here</a>
                    <br>
                    <span class="pice">Resto</span>
                </div>
            </div>
        </div>

    </section>

    
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- custom js file -->
<script src="script.js"></script>
    </body>
</html>
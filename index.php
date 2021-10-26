<?php
session_start();
if($_POST)
{
    
    if($_POST['checkindate'])
    {
        $_SESSION['checkindate'] = $_POST['checkindate'];
        $_SESSION['checkoutdate'] = $_POST['checkoutdate'];
        $_SESSION['adult'] = $_POST['adult'];
        $_SESSION['children'] = $_POST['children'];
         
    }
    else if(($_POST['guest_mobile']) && ($_SESSION['checkindate']))
    {
        $_SESSION['guest_name'] = htmlspecialchars($_POST['guest_name']);
        $_SESSION['guest_mobile'] = htmlspecialchars($_POST['guest_mobile']);
        $_SESSION['guest_email'] = htmlspecialchars($_POST['guest_email']);
        
            $email = "vijaypsekar91@gmail.com";
            $subject =  "Chill Breeze";
            //$headers = "From: info@chillbreeze.com \r\n";
            // $headers .= "Reply-To: ". $email . "\r\n";
            $headers = "From: Enquiry Chill Breeze <chillbreezeycd@gmail.com> \r\n";
            $headers .= "Reply-To:" . $email . "\r\n" ."X-Mailer: PHP/" . phpversion();
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
            $message = "<html><body>";
            $message .= " Guest Name : ".$_SESSION['guest_name']."<br>";
            $message .= " Checkin Date : ".$_SESSION['checkindate']."<br>";
            $message .= " Checkout Date : ".$_SESSION['checkoutdate']."<br>";
            $message .= " Adult : ".$_SESSION['adult']."<br>";
            $message .= " Children : ".$_SESSION['children']."<br>";
            $message .= " Guest Mobile : ".$_SESSION['guest_mobile']."<br>";
            $message .= " Guest Email : ".$_SESSION['guest_email']."<br>";
            $message .= "</html>";
            
            
            $sendMail = mail($email, $subject, $message, $headers);
            if($sendMail)
            {
            echo "<script>alert('Thank You For your Intrest We will connect soon!')</script>";
            }
            else
            
            {
            // echo "Mail Failed";
            }
            
            session_unset();
        
    }else{
        session_unset();
    }
    
}else
{
    session_unset();
}


?>
<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="chillBreeze/favicon.ico" type="image/x-icon" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/plugins/bootstrap.min.css" />
    <!-- swiper css -->
    <link rel="stylesheet" href="css/plugins/swiper.min.css" />
    <!-- fancybox css -->
    <link rel="stylesheet" href="css/plugins/fancybox.min.css" />
    <!-- font awesome css -->
    <link rel="stylesheet" href="css/plugins/font-awesome.min.css" />
    <!-- nice select css -->
    <link rel="stylesheet" href="css/plugins/nice-select.css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="css/plugins/datepicker.css" />
    <!-- kinsley css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- page title -->
    <title>Chill Breeze Yercaud | Great Place to stay in Yercaud</title>
</head>

<body>
    <!-- page wrapper -->
    <div class="app">
        <!-- preloader -->
        <div class="preloader-frame">
            <div class="preloader">
                <img src="chillBreeze/loader.png" alt="chillbreeze" />
                <div class="preloader-progress">
                    <div class="preloader-bar"></div>
                </div>
                <div><span class="preloader-number" data-count="101">0</span>%</div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- datepicker frame -->
        <div class="datepicker-place"></div>

        <!-- top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="left-side">
                    <!-- logo -->
                    <a href="https://www.chillbreezeyercaud.com/" class="logo-frame">
                        <img src="chillBreeze/chillbreezelogo.png" alt="chillbreeze" />
                    </a>
                    <!-- logo end -->
                </div>
                <div class="right-side">
                    <!-- menu -->
                    <div class="menu">
                        <nav>
                            <ul>
                                <li class="menu-item-has-children current-item">
                                    <a href="#home">Home</a>
                                </li>
                                <li>
                                    <a href="#about">About</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#room">Rooms</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#feedback">Feedback</a>
                                </li>
                                <li>
                                    <a href="#contact">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- menu end -->
                    <!-- action button -->
                    <a id="book-popup" class="btn"><img src="img/icons/bookmark.svg" alt="icon" />Contact US</a>
                    <!-- action button end -->
                </div>
                <!-- menu button -->
                <div class="menu-btn"><span></span></div>
                <!-- menu button end -->
            </div>
        </div>
        <!-- top bar end -->

        <!-- banner -->
        <section id="home" class="banner">
            <div class="cover-frame">
                <img src="chillBreeze/yercaud_banner.jpg" alt="banner" class="parallax" />
            </div>
            <div class="overlay"></div>

            <div class="banner-content">
                <div class="container">
                    <div class="main-title">
                        <div class="white">
                            <ul class="stars">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <!-- main-title -->
                            <h1 class="center mb-10">Welcome to Chill Breeze</h1>
                            <div class="mb-40 center" style="font-size: 25px">Yercaud</div>
                        </div>
                    </div>
                    <div class="book-form book-form-2 d-none">
                        <form method="POST">
                            <?php if(empty($_SESSION['checkindate'])){?>
                           <!-- <div class="row align-items-center">
                                <div class="col-12 col-lg-3">
                                    <div class="input-frame book-form-2">
                                        <label for="check-in">Check in</label>
                                        <input id="check-in" type="text" name="checkindate" class="datepicker-here" data-position="bottom left" placeholder="Select date" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="input-frame">
                                        <label for="check-out" class="add-icon">Check out</label>
                                        <input id="check-out" type="text" name="checkoutdate" class="datepicker-here" data-position="bottom left" placeholder="Select date" autocomplete="off" readonly="readonly" />
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="select-frame">
                                        <label for="person">Person</label>
                                        <select id="person" name="adult">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <div class="select-frame">
                                        <label for="children">Childrens</label>
                                        <select id="children" name="children">
                        <option value="1">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4" disabled>4</option>
                      </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-1 text-center">
                                    <button type="submit" class="btn">
                      <img
                        src="img/icons/search.svg"
                        class="zoom"
                        alt="icon"
                      /><span>Serch room</span>
                    </button>
                                </div>
                            </div>-->
                            <?php }else{ ?>
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-3">
                                    <div class="input-frame book-form-2">
                                        <label for="guest_name">Name</label>
                                        <input id="guest_name" type="text" name="guest_name" class="guest_name" placeholder="Enter name" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="input-frame">
                                        <label for="guest_mobile" class="">Mobile</label>
                                        <input id="guest_mobile" type="text" name="guest_mobile" class="guest_mobile" name="guest_mobile" placeholder="Enter Mobile" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="input-frame">
                                        <label for="guest_email" class="add-icon">Email</label>
                                        <input id="guest_email" type="email" name="guest_email" class="guest_email" name="guest_email" placeholder="Enter Email" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-1 text-center">
                                    <button type="submit" class="btn" value="Submit" style="width: 90px">
                      Submit
                    </button>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                    <div class="scroll-hint-frame">
                        <div class="white mb-20">Scroll down</div>
                        <a href="#triger-1" class="scroll-hint knsk-s-s"></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner end -->

        <!-- features -->
        <section id="triger-1">
            <div class="container">
                <!-- features card -->
                <div class="features-card" style="margin-top: -80px">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <img src="img/features/1.svg" alt="icon" class="mb-10" />
                                <h5>Airport transfer</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <img src="img/features/2.svg" alt="icon" class="mb-10" />
                                <h5>All inclusive</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <img src="img/features/3.svg" alt="icon" class="mb-10" />
                                <h5>Air-conditioned</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <img src="img/features/4.svg" alt="icon" class="mb-10" />
                                <h5>Under protection</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                    </div>
                </div>
                <!-- features card end -->
            </div>
        </section>
        <!-- features end -->

        <!-- about -->
        <section id="about" class="p-100-100">
            <div class="container">
                <div class="about-card">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="about-photo">
                                <img src="chillBreeze/yercaud_banner.jpg" alt="cover" />
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="about-text">
                                <div class="title-frame">
                                    <h2 class="mb-20">We have 7+ years <br />of Experience</h2>
                                    <p class="mb-30">
                                        We Chill Breeze Resort is a family-friendly accommodation in Yercaud, offering laundry service, room services and 24 hour front desk assistance. Accommodation units are equipped with flat-screen TV, sound-proofed windows and a flat-screen TV with satellite
                                        channels. The rooms offer a shower, towels and bath sheets supplied in the bathrooms.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2">
                            <div class="about-photo">
                                <img src="chillBreeze/yercaud_chillbreeze_banner.jpeg" alt="cover" />
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <div class="about-text">
                                <div class="title-frame">
                                    <h2 class="mb-20">
                                        Start your Amazing Adventure in Yercaud!
                                    </h2>
                                    <p class="mb-30">
                                        Roosted in the Shevaroy Hills in the northern piece of Tamil Nadu, Yercaud is the profoundly visited attractions among nature darlings, youngsters and families. It is famous for its awesome wonderful, verdant plant life and espresso manors. The excellent
                                        yield filled in this lovely community is espresso and a few animal varieties like cardamom and dark paper are additionally become here. It encounters salubrious environment all during that time and offers an incredible
                                        chance to the travelers to savor its striking picturesque excellence, which is astounding and astonishing.
                                    </p>
                                    <!--<a href="rooms-1.html" class="btn btn-md">Choose a room</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="transition-top p-0-100">
            <img src="img/palm.svg" class="deco-left" alt="palm" />
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="center title-frame scroll-animation mb-100">
                            <h2 class="mb-20">Chill breeze is Waiting for You!</h2>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="swiper-container about-slider scroll-animation">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreeze_hall.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreeze_hall.jpeg" alt="about" />
                                            <div class="badge">Elite Space</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreeze_climate.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreeze_climate.jpeg" alt="about" />
                                            <div class="badge">Cozzy Atmosphere</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreeze_exterior.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreeze_exterior.jpeg" alt="about" />
                                            <div class="badge">Exterior</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreeze_interior.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreeze_interior.jpeg" alt="about" />
                                            <div class="badge">Luxuray Interiors</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreeze_playarea.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreeze_playarea.jpeg" alt="about" />
                                            <div class="badge">Play Area</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreezr_luxary_bedroom.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreezr_luxary_bedroom.jpeg" alt="about" />
                                            <div class="badge">East terrace</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreezr_luxary_bedroom.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreezr_luxary_bedroom.jpeg" alt="about" />
                                            <div class="badge">East terrace</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                    <!-- gallery item end -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- gallery item -->
                                    <div class="image-frame">
                                        <a data-fancybox="gallery" href="chillBreeze/yercaud_chillbreeze_carparking.jpeg">
                                            <img src="chillBreeze/yercaud_chillbreeze_carparking.jpeg" alt="about" />
                                            <div class="badge">Car Parking</div>
                                            <span class="zoom"><i class="fas fa-search-plus"></i
                        ></span>
                                        </a>
                                    </div>
                                    <!-- gallery item end -->
                                </div>
                            </div>

                            <!-- slider navigation -->
                            <div class="slider-nav-panel">
                                <!-- pagination -->
                                <div class="about-slider-1-pagination"></div>
                                <!-- navigation -->
                                <div class="about-slider-nav">
                                    <div class="about-slider-1-prev">
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                    <div class="about-slider-1-next">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                                <!-- navigation end -->
                            </div>
                            <!-- slider navigation end -->
                        </div>
                        <!-- slider end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- gallery end -->

        <!-- counters -->
        <section class="p-0-100" style="background-color: #ecfafb">
            <img src="img/palm.svg" class="deco-right" alt="palm" />
            <div class="container">
                <!-- features card -->
                <div class="features-card counters-card scroll-animation">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <div class="counter-number mb-10" data-count="1"></div>
                                <h5>Hotels</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <div class="counter-number mb-10" data-count="20"></div>
                                <h5>Rooms</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <div class="counter-number mb-10" data-count="10"></div>
                                <h5>Spots</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                        <div class="col-6 col-lg-3">
                            <!-- icon box -->
                            <div class="icon-box">
                                <div class="counter-number mb-10" data-count="4586"></div>
                                <h5>Guests</h5>
                            </div>
                            <!-- icon box end -->
                        </div>
                    </div>
                </div>
                <!-- features card end -->
            </div>
        </section>
        <!-- counters end -->

        <!-- rooms -->
        <section id="room" class="transition-bottom" style="background-color: #ecfafb">
            <img src="img/palm.svg" class="deco-left" alt="palm" />
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="center title-frame scroll-animation mb-100">
                            <h2 class="mb-20">Our Best Rooms</h2>
                            <!--<p class="mb-30">Consectetur adipisicing elit. Nihil, illum voluptate eveniet ex fugit ea delectus, sed voluptatem. Laborum accusantium libero commodi id officiis itaque esse adipisci, necessitatibus asperiores, illo odio.</p>
              <a href="rooms-1.html" class="btn btn-md">All rooms</a>-->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="swiper-container uni-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <!-- room card -->
                                    <div class="room-card scroll-animation">
                                        <div class="cover-frame">
                                            <a href="#"><img src="chillBreeze/yercaud_chillbreeze_interior.jpeg" alt="cover" /></a>
                                        </div>
                                        <div class="description-frame">
                                            <div class="room-features">
                                                <div class="feature">
                                                    <div class="icon-frame">
                                                        <img src="img/icons/bed.svg" alt="icon" />
                                                    </div>
                                                    <span>4 Guests</span>
                                                </div>
                                                <div class="feature">
                                                    <div class="icon-frame">
                                                        <img src="img/icons/square.svg" alt="icon" />
                                                    </div>
                                                    <span>95 Ft²</span>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <h3 class="mb-20">Super deluxe cottage</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- room card end -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- room card -->
                                    <div class="room-card scroll-animation">
                                        <div class="cover-frame">
                                            <a href="#"><img src="chillBreeze/yercaud_chillbreezr_luxary_bedroom.jpeg" alt="cover" /></a>
                                            <div class="badge">Popular</div>
                                        </div>
                                        <div class="description-frame">
                                            <div class="room-features">
                                                <div class="feature">
                                                    <div class="icon-frame">
                                                        <img src="img/icons/bed.svg" alt="icon" />
                                                    </div>
                                                    <span>2 Guests</span>
                                                </div>
                                                <div class="feature">
                                                    <div class="icon-frame">
                                                        <img src="img/icons/square.svg" alt="icon" />
                                                    </div>
                                                    <span>50 Ft²</span>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <h3 class="mb-20">Double bed room cottage</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- room card end -->
                                </div>
                                <div class="swiper-slide">
                                    <!-- room card -->
                                    <div class="room-card scroll-animation">
                                        <div class="cover-frame">
                                            <a href="#"><img src="chillBreeze/yercaud_chillbreezr_bedroom.jpeg" alt="cover" /></a>
                                        </div>
                                        <div class="description-frame">
                                            <div class="room-features">
                                                <div class="feature">
                                                    <div class="icon-frame">
                                                        <img src="img/icons/bed.svg" alt="icon" />
                                                    </div>
                                                    <span>4 Guests</span>
                                                </div>
                                                <div class="feature">
                                                    <div class="icon-frame">
                                                        <img src="img/icons/square.svg" alt="icon" />
                                                    </div>
                                                    <span>95 Ft²</span>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <h3 class="mb-20">Deluxe room</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide"></div>
                                <div class="swiper-slide"></div>
                            </div>

                            <!-- slider navigation -->
                            <div class="uni-slider-nav-panel">
                                <div class="uni-slider-pagination"></div>
                                <div class="uni-nav">
                                    <div class="uni-slider-prev">
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                    <div class="uni-slider-next">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- slider navigation end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- rooms end -->

        <!-- services -->

        <!-- services end -->

        <!-- testimonials -->
        <section id="feedback" class="transition-top p-0-80" style="background-color: #ecfafb">
            <img src="img/palm.svg" class="deco-left" alt="palm" />
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="center title-frame scroll-animation mb-80">
                            <h2 class="mb-20">Feedback from our Guests</h2>
                            <!-- <p>Consectetur adipisicing elit. Nihil, illum voluptate eveniet ex fugit ea delectus, sed voluptatem. Laborum accusantium libero commodi id officiis itaque esse adipisci, necessitatibus asperiores, illo odio.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- slider -->
                        <div class="swiper-slider testimonials-slider scroll-animation">
                            <div class="swiper-wrapper">
                                
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <!--<div class="avatar-frame">
                      <img src="img/faces/2.jpg" alt="Avatar">
                    </div>-->
                                        <div class="name-and-text">
                                            <h3 class="mb-10">Muthu Bharathi</h3>
                                            <div>From India</div>
                                            <blockquote>
                                                <ul class="stars">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                Good cottages in prime location at Affordable price. If number of persons is high rate will less further. Nice staff. Food also good and cost was reasonable
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <!--<div class="avatar-frame">
                      <img src="img/faces/1.jpg" alt="Avatar">
                    </div>-->
                                        <div class="name-and-text">
                                            <h3 class="mb-10">Abilash Nair</h3>
                                            <div>From India</div>
                                            <blockquote>
                                                <ul class="stars">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li class="empty"><i class="fas fa-star"></i></li>
                                                </ul>
                                                "This is one of the best resorts in yercaud. The staff are very courteous and the rooms are clean too. Even the single room has two bathrooms. The restaurant and the room service is very good too. The food is good for the price that they charge and the
                                                service will be on time. Sometimes there might be delays if there are many guests. However, the sheets the pillows and the blankets have to be changed I guess it is being old now and over times you are able
                                                to see the brown stains on those white sheets. Except for that I love this resort will able book rooms here in the future too."
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <!--<div class="avatar-frame">
                      <img src="img/faces/3.jpg" alt="Avatar">
                    </div>-->
                                        <div class="name-and-text">
                                            <h3 class="mb-10">Rahul Sethi</h3>
                                            <div>From India</div>
                                            <blockquote>
                                                <ul class="stars">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                Amazing place to hangout with your family and friends.
                                                <br />
                                                <b>Connectivity:</b> It is perfectly placed in Yercaud with proper connectivity to market and bus stop.<br />
                                                <b>Ambience:</b> Lovely ambience with zero disturbance. Rooms were clean and tidy, felt like we are at home.<br />
                                                <b>Staff:</b> Very helpful staff and disciplined.<br /> Must recommend stay and it's within the budget. I liked the place
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonials-nav">
                                <div class="testimonials-slider-1-prev">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                                <div class="testimonials-slider-1-next">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        <!-- slider end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonials end -->

        <!-- blog -->
        <section id="contact" class="transition-top p-0-100">
            <img src="img/palm.svg" class="deco-left" alt="palm" />
            <img src="img/palm.svg" class="deco-right" alt="palm" />
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center title-frame scroll-animation mb-100">
                            <h2 class="mb-20">Contact us!</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <form class="scroll-animation">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7811.615768336046!2d78.20635738273758!3d11.778573554578536!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x66a5ce40f3440dd1!2sChill%20Breeze%20Resorts!5e0!3m2!1sen!2sin!4v1633933880246!5m2!1sen!2sin"
                                width="1250" height="600" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog end -->

        <!-- footer -->
        <footer>
            <div class="footer">
                <div class="container p-100-100">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <img class="footer-logo" src="chillBreeze/chillbreezelogo.png" alt="chillbreeze" />
                            <div class="footer-about">
                                <b>Chill Breeze Resorts,</b><br /> Opp. Bus Stand <br /> Yercaud - 636 601<br />
                                <b>Mobile:</b>9489003235 <br /><b>Tel:</b>04281 223324, 04281 223325 <br /><b>Email:</b>chillbreezeycd@gmail.com<br />
                            </div>
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <h4>Menu</h4>
                            <ul class="footer-menu">
                                <li><a href="#.">Home</a></li>
                                <li><a href="#.">About us</a></li>
                                <li><a href="#.">Rooms</a></li>
                                <li><a href="#.">Our services</a></li>
                                <li><a href="#.">Contact info</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h4>Meet ChillBreeze</h4>
                            <ul class="footer-menu">
                                <li><a href="#.">Terms and conditions</a></li>
                                <li><a href="#.">Privacy policy</a></li>
                                <li><a href="#.">Help center</a></li>
                                <li><a href="#.">Work with us</a></li>
                                <li><a href="#.">Sitemap</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <h4>Instagram</h4>
                            <div class="footer-insta">
                                <a href="#"><img src="chillBreeze/yercaud_chillbreeze_banner.jpeg" alt="Image" /></a>
                                <a href="#"><img src="chillBreeze/yercaud_chillbreezr_bedroom.jpeg" alt="Image" /></a>
                                <a href="#"><img src="chillBreeze/yercaud_chillbreeze_interior.jpeg" alt="Image" /></a>
                                <a href="#"><img src="chillBreeze/yercaud_chillbreeze_playarea.jpeg" alt="Image" /></a>
                                <a href="#"><img src="chillBreeze/yercaud_chillbreezr_bedroom.jpeg" alt="Image" /></a>
                                <a href="#"><img src="chillBreeze/yercaud_chillbreezr_luxary_bedroom.jpeg" alt="Image" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="copy-text">
                            <div>&copy; 2021 chillbreeze. All Rights Reserved.</div>
                        </div>
                        <div class="copy-menu">
                            <div>
                                Design by:
                                <a href="https://www.thecoderspace.com">thecoderspace</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->

        <!-- popup -->
        <div id="success" class="popup">
            <img src="img/features/12.svg" alt="success" class="succes-icon" />
            <h2 class="mb-20">Success</h2>
            <p>
                However, message not sent. <br />This pop-up exists for demonstration.
            </p>
        </div>
        <!-- popup end -->

        <!-- popup -->
        <div class="popup-frame">
            <div class="book-form book-popup">
                <span class="close-popup">+</span>
              
                <form>
                    <div class="row">
                    <div class="col-lg-12">
                            <div class="">
                                <label>Name</label>
                                <input type="text" placeholder="Name" autocomplete="off"  />
                            </div>
                        </div>
                          <div class="col-lg-12">
                            <div class="">
                                <label>Email</label>
                                <input type="text"  placeholder="e-mail" autocomplete="off" />
                            </div>
                        </div>
                          <div class="col-lg-12">
                            <div class="">
                                <label>Phone Number</label>
                                <input type="number"  placeholder="Phone Number" autocomplete="off"  />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-frame">
                                <label>Check in</label>
                                <input type="text" class="datepicker-here" data-position="bottom left" placeholder="Select date" autocomplete="off" readonly="readonly" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-frame">
                                <label class="add-icon">Check out</label>
                                <input type="text" class="datepicker-here" data-position="bottom left" placeholder="Select date" autocomplete="off" readonly="readonly" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="select-frame">
                                <label>Person</label>
                                <select>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4" disabled>4</option>
                  </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="select-frame">
                                <label>Childrens</label>
                                <select>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4" disabled>4</option>
                  </select>
                            </div>
                        </div>
                          
                        <div class="col-lg-12 center">
                            <button type="submit" class="btn">Contact</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- popup end -->
    </div>
    <!-- page wrapper end -->

    <!-- jquery js -->
    <script src="js/plugins/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/plugins/bootstrap.min.js"></script>
    <!-- nice select js -->
    <script src="js/plugins/jquery.nice-select.min.js"></script>
    <!-- datepicker js -->
    <script src="js/plugins/datepicker.js"></script>
    <!-- smooth scroll js -->
    <script src="js/plugins/smooth-scroll.js"></script>
    <!-- isotope js -->
    <script src="js/plugins/isotope.min.js"></script>
    <!-- fancybox js -->
    <script src="js/plugins/fancybox.min.js"></script>
    <!-- swiper js -->
    <script src="js/plugins/swiper.min.js"></script>
    <!-- sticky js -->
    <script src="js/plugins/sticky.js"></script>
    <!-- kinsley js -->
    <script src="js/main.js"></script>
    
</body>

</html>
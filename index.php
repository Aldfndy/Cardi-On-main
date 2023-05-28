<?php
session_start();
unset($_SESSION['previous_page']);
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === "logged") {

  $previousPage = isset($_SESSION['previous_page']) ? $_SESSION['previous_page'] : "homepage.php";
  header("Location: " . $previousPage);
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Welcome to Cardi-On!</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="img/cardion-red.png" type="image/png">
    <meta charset="utf-8">
  </head>

  <body>
    <nav id="navbar">
        <img src="img/cardion-red.png" id="logo">
        <a class="nav-button name">Cardi-On!</a>
        <div class="dropdown">
            <button class="dropbtn">☰</button>
            <div class="dropdown-content">
                <a href="#welcome">Home</a>
                <a href="#features">Features</a>
                <a href="#display">Product</a>
                <a href="#about">About</a>
                <a href="#social">Contact Us</a>
            </div>
        </div>
        <a class="nav-button left" href="#welcome">Home</a>
        <a class="nav-button" href="#features">Features</a>
        <a class="nav-button" href="#display">Products</a>
        <a class="nav-button" href="#about">About</a>
        <a class="nav-button right" href="#social">Contact Us</a>
    </nav>

    <section id="welcome" class="welcome-bg">
        <a class="login" href="login.php">Login</a>
        <h1 class="fade-up">Cardi-On!</h1>
        <p class="fade-up">Cardi-On! is an application that makes it easier for its users to place orders or rent sports facilities in their area of residence, such as gyms, soccer fields, tennis courts, etc. Additionally, users can also view the training schedule at the desired sports facility and hire a trainer or companion to help them to do said exercise.</p>
        <a class="getstarted fade-up" href="signup.php">Get Started</a>
        <a class="learnmore fade-up" href="#">Learn More</a>
    </section>

    <section id="features">
        <h2 class="fade-up">Features</h2>
        <p class="feature-desc fade-up"></p>
        <section class="flex">
        <section class="feature-tile fade-up">
            <div class="feature">
                <img src="img/feature-1.png">
                <h3>Extreme Sports</h3>
                <p class="feature-caption">Look for the best place to do extreme sports for those who dare.</p>
            </div>
            <div class="feature">
                <img src="img/feature-2.png">
                <h3>Private Chat</h3>
                <p class="feature-caption">Live chat with instructor and other users to get a new partner.</p>
            </div>
            <div class="feature" >
                <img src="img/feature-3.png">
                <h3>Tips & Tricks</h3>
                <p class="feature-caption">Advice about healthy living, including eating a balanced diet, healthy weight, exercise.</p>
            </div>
        </section>
        
        <section class="feature-tile fade-up">
            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=480&amp;height=540&amp;hl=en&amp;q=gym in malang&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/">format json</a></div>
            </div>
        </section>
        <section class="feature-tile fade-up">
            <div class="feature">
                <img src="img/feature-4.png">
                <h3>Sports Around You</h3>
                <p class="feature-caption">Discover many sport centers around you.</p>
            </div> 
            <div class="feature">
                <img src="img/feature-5.png">
                <h3>Activity Tracker</h3>
                <p class="feature-caption">Keep track of your daily statistics, such as activity records, the amount of calories burned, etc.</p>
            </div>
            <div class="feature">
                <img src="img/feature-4.png">
                <h3>Instructor</h3>
                <p class="feature-caption">We provide an instructor that you can hire, or if you're already expert enough, you can join us as an instructor.</p>
            </div>
        </section>
    </section>
    </section>

    <section id="display" class="display-bg">
        <h1 class="fade-up">Cardi-On! Has Something For Everyone</h1>
        <div class="flex">
            <section class="display-desc fade-up">
                <h2>Learn</h2>
                <p class="fade-up">Cardi-On makes it easy to find and book verified Instructor that help you learn a new sport.  Cardi-On connects you  with passionate Instructor in your city who are ready to share their expertise in a safe setting. Whether you're looking to try something new or develop your existing skills, a Cardi-On Instructor is the perfect match for Trainee who want to take their sport to the next level.</p>
                <img src="img/Macbook Pro.png" class="display-left" alt="macbook pro display sample">
            </section>
            <section class="display-desc fade-up">
                <h2>Play</h2>
                <p class="fade-up">Now that you've got the skills, you probably want to hit the court, course, or wherever you play, right? Cardi-on makes it easy to search sport center you looking for. Or if you already max out your skills, you can earn money by joining us as instructor</p>
                <img src="img/Boards Notifications.png" class="display-right" alt="ui sample">
            </section>
        </div>

        <section id="about">
            <h1 class="fade-up">Meet Our Team</h1>
            <p class="fade-up">Lately, many people don't exercise a lot because of many reason. Some have their exercise schedule doesn't match well their busy schedule, while some don't have a partner in exercising. It takes an innovation to overcome all of these problems. From that, Cardi-On! was born.</p>
            <div class="flex creator-div fade-up">
                <div id="aldi" class="creator">
                    <img src="img/aldi.jpg" alt="foto aldi">
                    <h3>Aldi Fandiya Akbar</h3>
                    <h4>215150200111022</h4>
                </div> 
                <div id="alfan" class="creator">
                    <img src="img/alfan.jpg" alt="foto alfan">
                    <h3>Alfansya Shandy Andrian</h3>
                    <h4>215150207111019</h4>
                </div> 
                <div id="hafizh" class="creator">
                    <img src="img/hafizh.jpg" alt="foto hafizh">
                    <h3>Hafizh Satria Buana</h3>
                    <h4>215150207111014</h4>
                </div>
                <div id="iqbal" class="creator">
                    <img src="img/iqbal.jpg"  alt="foto iqbal">
                    <h3>M Iqbal Praditya Oscar</h3>
                    <h4>215150201111015</h4>
                </div> 
            </div>
        </section>
    </section>

    <footer id="footer">
        <h2>Contact Us</h2>
        <section id="social">
            <div>
                <img src="img/footer-facebook.png" alt="facebook logo">
                <a class="profile-link" href="#">Cardi-On!</a>
            </div>
            <div>
                <img src="img/footer-twitter.png" alt="twitter logo">
                <a class="profile-link" href="#">@cardionmalang</a>
            </div>
            <div>
                <img src="img/footer-instagram.png" alt="instagram logo">
                <a class="profile-link" href="#">Cardi-On!</a>
            </div>
        </section>
        <br>
        <p class="address">Jl. Veteran Malang, Ketawanggede, Kec. Lowokwaru Kota Malang, Jawa Timur.</p>
        <p>Email: cardion@gmail.com</p>
    </footer>
    <script src="main.js"></script>
  </body>
</html>

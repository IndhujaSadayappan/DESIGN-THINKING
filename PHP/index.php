<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MC</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="navbar-container">
            <button class="toggle-btn" onclick="toggleNavbar()">
                <i class="fas fa-bars"></i>
            </button>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="meeteedyna.php">Find Mentors</a></li>
                <li><a href="event.html">Event details</a></li>
                <li><a href="about.html">About</a></li>
                <li class="right">
                    <a href="event feed.html" style="border: 2px solid white; padding: 5px;">Feedback</a>
                    <a href="bg.html" style="border: 2px solid white; padding: 5px;">Add Notes</a>
                    <a href="profile.php"><i id="iprofile" class="fa-solid fa-user"></i>Profile</a>
                    <a href="login.php">Register</a>
                 
                </li>
            </ul>
        </div>
    </header>
    <div class="container-fluid">
        <div class="background">
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
        </div>
    </div>
    <div class="body">
        
        <div class="h1">
            <div class="mc"><label>Mentor</label></div>
            <div class="mc">
                <span class="appear">connect</span>
            </div>
        </div>
        <div class="split">
            <div class="con">
                <p>What is Mentoring?</p>
                <ul>
                    <li>Trusted relationships - We train all of our mentors and equip them with training, support and accountability.</li>
                    <li>Partnership - Our mentors are walking alongside your family as a partner.</li>
                    <li>Spiritual leadership - Our mentors are prepared to be spiritual leaders for your child, helping nurture their faith and sparking spiritual growth. • Academic guidance - Mentors can help with homework, find creative ways to learn and provide encouragement for academic success.</li>
                    <li>Confidence building - For a child, having another trusted adult in their life who believes in them and challenges them to grow helps build even more confidence.</li>
                </ul>
            </div>
            <div class="slideshow">
                <div class="slideshow-wrapper">
                    <div class="slide">
                        <img class="slide-img" src="mi-1.webp" alt="Image 1">
                    </div>
                    <div class="slide">
                        <img class="slide-img" src="mi-2.webp" alt="Image 2">
                    </div>
                    <div class="slide">
                        <img class="slide-img" src="mi-3.webp" alt="Image 3">
                    </div>
                    <div class="slide">
                        <img class="slide-img" src="mi-4.webp" alt="Image 4">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="cd">
            <div class="main">
                <ul class="cards">
                    <li class="cards_item">
                        <div class="card">
                        <div class="card_image">
                            <img src="mi-1.webp" alt="image cann't be displayed">
                        </div>
                        <div class="card_content">
                            <h2 class="card_title">Mentor 1</h2>
                            <div class="card_text">
                            <p> Rating: </p>
                            <hr>
                            <p> Skills: A, B, C</p>
                            </div>
                        </div>
                        </div>
                    </li>
                    <li class="cards_item">
                        <div class="card">
                        <div class="card_image">
                            <img src="mi-1.webp" alt="image cann't be displayed">
                        </div>
                        <div class="card_content">
                            <h2 class="card_title">Mentor 2</h2>
                            <div class="card_text">
                            <p> Rating: </p>
                            <hr>
                            <p> Skills: A, B, C</p>
                            </div>
                        </div>
                        </div>
                    </li>
                    <li class="cards_item">
                        <div class="card">
                        <div class="card_image">
                            <img src="mi-1.webp" alt="image cann't be displayed">
                        </div>
                        <div class="card_content">
                            <h2 class="card_title">Mentor 3</h2>
                            <div class="card_text">
                            <p> Rating: </p>
                            <hr>
                            <p> Skills: A, B, C</p>
                            </div>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
         
        <script>
          function changeLanguage() {
            alert('Language change feature coming soon!');
          }
    
          function toggleAccessibilitySettings() {
            alert('Accessibility settings feature coming soon!');
          }
        </script>
       
    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>
</html>
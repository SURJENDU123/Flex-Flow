<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yoga Page - Flex & Flow</title>
    <link rel="stylesheet" href="Yogapage.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav>
        <div class="nav-links">
            <a href="aboutus.php">About Us</a>
            <a href="#services">Services</a>
            <a href="#pricing">Membership Plans</a>
            <a href="contact.php">Contact</a>
            <a href="Gympage.php">Gym</a>
        </div>

        <div class="search-box">
            <button class="btn-search"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" id="search-input" placeholder="Type to Search...">
        </div>
    </nav>
    
    <header>
        <h1><b>Flex & Flow</b></h1>
        <div class="social-icons">
            <a href="https://www.facebook.com/profile.php?id=61566452818898&mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.youtube.com/@TriptiSantra-z6p" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/flex_flow2024/?igsh=YzljYTk1ODg3Zg%3D%3D#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </header>
    
    <section class="hero">
        <h1>Welcome to the Ultimate Fitness Experience</h1>
    </section>

    <div class="container">
        <section class="about" id="about">
            <h2 style="color: white;">About Us</h2><br>
            <p style="color: white;">We are a state-of-the-art fitness center that provides top-notch facilities and certified trainers to help you achieve your fitness goals. Whether you're a beginner or a seasoned athlete, we have everything you need to succeed.</p>
        </section>

        <section class="services" id="services">
            <h2 style="color: white;">Our Services</h2><br>
            <div class="services-grid">
                <div class="service">
                    <h3>Personal Training</h3>
                    <p>Get one-on-one training sessions with certified trainers who will create a customized fitness plan tailored to your needs.</p>
                </div>
                <div class="service">
                    <h3>Group Classes</h3>
                    <p>Join our group fitness classes, including Yoga, Zumba, Pilates, and more, for a fun and energetic workout experience.</p>
                </div>
                <div class="service">
                    <h3>Nutrition Counseling</h3>
                    <p>Meet with our nutrition experts to develop a healthy eating plan that complements your fitness journey.</p>
                </div>
            </div>
        </section>

        <h2 style="color: white;"><center>Membership Plans</center></h2>
        <section class="pricing" id="pricing">
            <div class="flip-card1">
                <div class="flip-card-inner1">
                    <div class="flip-card-front1">
                        <img src="yoga2.jpg" alt="Avatar" style="width:260px;height:350px;border-radius: 60px;">
                    </div>
                    <div class="flip-card-back1">
                        <h3><u>Basic Plan</u></h3>
                        <p>Access to gym equipment</p>
                        <p>1 free training session</p>
                        <p class="price">1 month: INR 200</p>
                        <p class="price">6 months: INR 1000</p>
                        <p class="price">12 months: INR 2000</p>
                        <button id="button1">
                            <a href="payment.php">Get Plan</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flip-card2">
                <div class="flip-card-inner2">
                    <div class="flip-card-front2">
                        <img src="Yoga3.jpg" alt="Avatar" style="width:260px;height:350px;border-radius: 60px;">
                    </div>
                    <div class="flip-card-back2">
                        <h3><u>Standard Plan</u></h3>
                        <p>Access to gym equipment</p>
                        <p>5 training sessions</p>
                        <p>Free group classes</p>
                        <p class="price">1 month:INR 500</p>
                        <p class="price">6 months:INR 2600</p>
                        <p class="price">12 months:INR 5500</p>
                        <button id="button1">
                            <a href="payment.php">Get Plan</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flip-card3">
                <div class="flip-card-inner3">
                    <div class="flip-card-front3">
                        <img src="Yoga4.jpg" alt="Avatar" style="width:260px;height:350px;border-radius: 60px;">
                    </div>
                    <div class="flip-card-back3">
                        <h3><u>Premium Plan</u></h3>
                        <p>Access to gym equipment</p>
                        <p>Unlimited training sessions</p>
                        <p>Personalized diet plan</p>
                        <p>Access to all classes</p>
                        <p class="price">1 month:INR 1500</p>
                        <p class="price">6 months:INR 8500</p>
                        <p class="price">12 months:INR 16000</p>
                        <button id="button1">
                            <a href="payment.php">Get Plan</a>
                        </button>
                    </div>
                </div>
            </div>
    </section>
    
    <footer>
        <div class="container">
            <p>&copy; 2024 Yoga & Fitness Center. All rights reserved.</p>
        </div>
    </footer>
</body>
<script type="text/javascript">

    //js using for searching button
    document.addEventListener("DOMContentLoaded", function () {
        let searchInput = document.getElementById("search-input");
        let searchButton = document.querySelector(".btn-search");

        // Perform search when Enter key is pressed
        searchInput.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                performSearch();
            }
        });

        // Perform search when clicking the search button
        searchButton.addEventListener("click", function () {
            performSearch();
        });
    });

    function performSearch(query = null) {
        let searchInput = document.getElementById("search-input");
        let searchQuery = query || searchInput.value.trim().toLowerCase();

        if (searchQuery === "") {
            alert("Please enter a search term.");
            return;
        }

        console.log("Search Query:", searchQuery); // Debugging

        // Page redirection based on search term
        let pages = {
            "about us": "aboutus.php",
            "services": "#services",  // Assuming services is a section in index.html
            "pricing": "#pricing",  // Membership plans section
            "membership": "#pricing",
            "contact": "contact.php",
            "gym": "gympage.php",
            "home": "index.php",
            "yoga": "yogapage.php",
            "classes": "Classes.php"
        };

        for (let key in pages) {
            if (searchQuery.includes(key)) {
                console.log("Redirecting to:", pages[key]); // Debugging
                window.location.href = pages[key];
                return;
            }
        }

        alert("No results found.");
    }

</script>
</html>

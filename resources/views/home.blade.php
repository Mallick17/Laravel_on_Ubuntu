<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobha Developers</title>
    <link rel="shortcut icon" href="{{asset('images/logo.jpeg')}}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .logo img {
            max-height: 80px; /* Make the logo bigger */
            height: auto; /* Keep the aspect ratio */
            width: auto; /* Keep the aspect ratio */
        }

        nav div {
            display: flex;
            align-items: center;
        }
        nav a {
            color: black;
            text-decoration: none;
            padding: 10px 15px;
            position: relative;
            margin: 0 10px;
            text-align: center;
        }
        nav a:hover {
            color: darkblue;
        }
        nav a:after {
            content: '';
            display: block;
            height: 2px;
            background: darkblue;
            position: absolute;
            left: 0;
            right: 0;
            bottom: -5px;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        nav a:hover:after {
            transform: scaleX(1);
        }
        .hero {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* Aspect ratio 16:9 (9 / 16 * 100) */
            overflow: hidden;
            margin-top: 80px; /* Add margin to push it down after the navbar */
        }

        /* Ensure the video iframe stays full width and height */
        .hero iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            pointer-events: none;
        }
        .story-section {
            padding: 40px;
            text-align: center;
            background-color: #f9f9f9;
        }

        .story-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .story-section p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #333;
            max-width: 900px;
            margin: 0 auto;
        }
        .content {
            padding: 20px;
            text-align: center;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1s ease, transform 1s ease;
            margin-top: 0;
        }
        .content.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .image-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .project {
            text-align: center;
            max-width: 30%;
        }

        .project img {
            width: 100%;
            height: auto;
        }

        .project p {
            margin-top: 10px;
            font-size: 1rem;
            color: #333;
        }
        .image-container a {
            max-width: 30%;
        }
        .image-container img {
            width: 100%; /* Make images responsive */
            height: 90%; /* Maintain aspect ratio */
        }
        .map {
            width: 100%;
            height: 400px;
            margin: 0;
            padding: 0;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
        /* Modal styles */
        .myModal {
            display: none;
            position: fixed; /* Keep modal fixed */
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto; /* Allow scrolling inside the modal if needed */
            align-items: center; /* Center modal vertically */
            justify-content: center; /* Center modal horizontally */
        }
        .myModal-content {
            background-color: white;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
            position: relative;
        }
        .error-message {
            color: red;
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .myModal form {
            display: flex;
            flex-direction: column;
        }
        .myModal label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .myModal input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .myModal .button-container {
            display: flex;
            justify-content: center;
            gap: 10px; /* Space between buttons */
        }
        .myModal button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: darkblue;
            color: white;
            width: 100px; /* Fixed button width */
        }
        .myModal button.cancel {
            background-color: lightgray;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 40px 20px;
            font-size: 14px;
        }

        footer h3, footer h4 {
            color: #fff;
        }

        footer a {
            color: #ccc;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        footer ul li {
            margin-bottom: 5px;
        }

        footer .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
        }

        footer .footer-column {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }

        footer .footer-bottom {
            border-top: 1px solid #444;
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
        }

        footer .social-links a {
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            nav {
                display: unset;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                background-color: white;
                padding: 15px 20px;
                align-items: center;
                justify-content: space-between;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                z-index: 1000;
            }
            nav a {
                color: black;
                text-decoration: none;
                padding: -1px 26px;
            }
            footer {
                margin-top: 20px;
                background-color: #333;
                color: #fff;
                padding: 40px 20px;
                font-size: 14px;
            }
            .hero {
                position: relative;
                width: 100%;
                padding-top: 56.25%;
                overflow: hidden;
                margin-top: 113px;
            }
            footer .footer-column {
                flex: 1;
                min-width: 130px;
                margin-bottom: 0px;
            }
            .story-section {
                padding: 25px;
                text-align: justify;
                background-color: #f9f9f9;
            }
            .story-section p {
                font-size: 1.0rem;
                line-height: 1.4;
                color: #333;
                max-width: 500px;
                margin: 0 auto;
            }
        }
        @media (max-width: 480px) {
            footer {
                margin-top: 30px;
                background-color: #333;
                color: #fff;
                padding: 40px 20px;
                font-size: 14px;
            }
            .hero {
                position: relative;
                width: 100%;
                padding-top: 56.25%;
                overflow: hidden;
                margin-top: 113px;
            }
            footer .footer-column {
                flex: 1;
                min-width: 130px;
                margin-bottom: 0px;
            }
            .story-section {
                padding: 25px;
                text-align: -webkit-auto;
                background-color: #f9f9f9;
            }
            .story-section p {
                font-size: 1.0rem;
                line-height: 1.4;
                color: #333;
                max-width: 500px;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">
            <img src="{{asset('images/logo.jpeg')}}" alt="Logo">
        </div>
        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="#">About Us</a>
            <a href="#">Enquiry</a>
        </div>
    </nav>

    <div class="hero">
        <!-- <iframe src="https://www.youtube.com/embed/WaUHGrPyPAI?autoplay=1&mute=1&loop=1&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&fs=0&cc_load_policy=0&cc_lang_pref=en" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
        <iframe src="https://www.youtube.com/embed/EJSCaB8iOXQ?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&fs=0&cc_load_policy=0&cc_lang_pref=en&&showinfo=0&color=white&iv_load_policy=3&playlist=EJSCaB8iOXQ"frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>

    <div class="story-section">
        <h2>OUR STORY</h2>
        <p>At SOBHA, “passion at work” reflects our commitment to excellence and integrity in every project. Inspired by our founder, Mr. PNC Menon, we prioritize quality and craftsmanship, creating award-winning developments across India.</p>
        <p>As a reliable builder, we focus on sustainable urban living spaces that meet modern needs while embracing innovation and technology. At SOBHA, we don’t just build properties; we build trust and a better future for our communities.</p>
    </div>

    <div class="content" id="content">
    <h1>Projects You May Be Interested In!</h1>
    
    <div class="image-container">
        <!-- First Image -->
        <div class="project">
            <a href="{{ route('sobha-townpark') }}">
                <img src="{{asset('images/town.jpeg')}}" alt="Image 1">
            </a>
            <p>Sobha Townpark</p>
        </div>
        <!-- Second Image -->
        <div class="project">
            <a href="{{ route('sobha-neopolis') }}">
                <img src="https://www.sobha.com/wp-content/uploads/2024/08/infinia_mobile1.webp" alt="Image 2">
            </a>
            <p>Sobha Neopolis</p>
        </div>
        <!-- Third Image -->
        <div class="project">
            <a href="{{ route('sobha-ayana') }}">
                <img src="{{asset('images/ayana.jpeg')}}" alt="Image 3">
            </a>
            <p>Sobha Ayana</p>
        </div>
    </div>
</div>

    <!-- <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.7333644281525!2d77.64133831508061!3d12.97295679086708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae14b95e0e1e7%3A0x8c79a60774c3a3b!2sPuravankara%20Limited!5e0!3m2!1sen!2sin!4v1631552012207!5m2!1sen!2sin" loading="lazy"></iframe>
    </div> -->
     <!-- Footer Section -->
     <footer>
        <div class="footer-container">
            <!-- Logo Section -->
            <div class="footer-column">
                <h3>SOBHA</h3>
                <p>SOBHA Limited © Copyright 2024 All rights reserved</p>
            </div>

            <!-- Links Section -->
            <div class="footer-column">
                <h4>Cities</h4>
                <ul>
                    <li><a href="#">Bengaluru</a></li>
                    <li><a href="#">Chennai</a></li>
                    <li><a href="#">Coimbatore</a></li>
                    <li><a href="#">Delhi NCR</a></li>
                    <li><a href="#">Gift City Gujarat</a></li>
                    <li><a href="#">Hyderabad</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Other Locations</h4>
                <ul>
                    <li><a href="#">Kochi</a></li>
                    <li><a href="#">Kozhikode</a></li>
                    <li><a href="#">Mysuru</a></li>
                    <li><a href="#">Pune</a></li>
                    <li><a href="#">Thiruvananthapuram</a></li>
                    <li><a href="#">Thrissur</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Media Centre</a></li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Sobha Share Price</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="footer-column">
                <h4>Get in Touch</h4>
                <p>+91 80 46464500</p>
                <p>webfeedback@sobha.com</p>
                <p>CIN Details: SOBHA LIMITED L45201KA1995PLC018475</p>
            </div>

            <!-- Social Media Section -->
            <div class="footer-column">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/sobhaltd" target="_blank">
                        <img src="https://www.sobha.com/wp-content/themes/sobha/images/facebook.svg" width="23" height="23" class="img-fluid entered lazyloaded" alt="SOBHA Facebook Page" data-lazy-src="https://www.sobha.com/wp-content/themes/sobha/images/facebook.svg" data-ll-status="loaded">
                    </a>
                    <a href="https://www.youtube.com/c/Sobha" target="_blank">
                        <img src="https://www.sobha.com/wp-content/themes/sobha/images/youtube.svg" width="23" height="23" class="img-fluid entered lazyloaded" alt="SOBHA Limited Youtube Channel" data-lazy-src="https://www.sobha.com/wp-content/themes/sobha/images/youtube.svg" data-ll-status="loaded">
                    </a>
                    <a href="https://www.instagram.com/sobhaltd/" target="_blank">
                        <img src="https://www.sobha.com/wp-content/themes/sobha/images/twitter.svg" width="23" height="23" class="img-fluid entered lazyloaded" alt="SOBHA Twitter Profile" data-lazy-src="https://www.sobha.com/wp-content/themes/sobha/images/twitter.svg" data-ll-status="loaded">
                    </a>
                    <a href="https://www.instagram.com/sobhaltd/" target="_blank">
                        <img src="https://www.sobha.com/wp-content/themes/sobha/images/instagram.svg" width="23" height="23" class="img-fluid entered lazyloaded" alt="SOBHA Instagram" data-lazy-src="https://www.sobha.com/wp-content/themes/sobha/images/instagram.svg" data-ll-status="loaded">
                    </a>
                    <a href="https://www.linkedin.com/company/sobhaltd/" target="_blank">
                        <img src="https://www.sobha.com/wp-content/themes/sobha/images/linkedin.svg" width="23" height="23" class="img-fluid entered lazyloaded" alt="SOBHA LinkedIn Company Page" data-lazy-src="https://www.sobha.com/wp-content/themes/sobha/images/linkedin.svg" data-ll-status="loaded">
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <a href="#">Terms of Use</a> |
            <a href="#">Privacy Policy</a> |
            <a href="#">Disclaimer</a> |
            <a href="#">RERA Disclaimer</a> |
            <a href="#">Sitemap</a> |
            <a href="#">Blog</a>
            <a>
                Disclaimer - The content provided on this website is for information purposes only and does not constitute an offer to avail any service. The prices mentioned are subject to change without prior notice, and the availability of properties mentioned is not guaranteed.
            </a>
        </div>
    </footer>

    <!-- Modal Structure -->
    <div id="myModal" class="myModal">
        <div class="myModal-content">
            <span class="close">&times;</span>
            <h2>Contact Us</h2>
            <form id="contactForm">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">
                <span id="nameError" class="error-message"></span>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <span id="emailError" class="error-message"></span>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                <span id="phoneError" class="error-message"></span>

                <div class="button-container">
                    <button type="submit">Submit</button>
                    <button type="button" class="cancel" id="cancelBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        window.onload = function() {
            const modal = document.getElementById("myModal");
            modal.style.display = "flex";
            document.body.style.overflow = "hidden";
        };

        const closeModal = document.getElementsByClassName("close")[0];
        const cancelBtn = document.getElementById("cancelBtn");
        const modal = document.getElementById("myModal");

        closeModal.onclick = function() {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        };
        cancelBtn.onclick = function() {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        };

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
                document.body.style.overflow = "auto"; 
            }
        };

        document.getElementById("contactForm").onsubmit = function(e) {
            e.preventDefault();
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        };

        window.addEventListener('scroll', function() {
            const content = document.getElementById('content');
            const contentPosition = content.getBoundingClientRect().top;
            const screenPosition = window.innerHeight;

            if (contentPosition < screenPosition) {
                content.classList.add('visible');
            } else {
                content.classList.remove('visible');
            }
        });

        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            let st = window.pageYOffset || document.documentElement.scrollTop;
            if (st < lastScrollTop) {
                const content = document.getElementById('content');
                content.classList.remove('visible');
            }
            lastScrollTop = st <= 0 ? 0 : st;
        });

        document.getElementById('contactForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            const response = await fetch('/send-contact-details', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    phone: phone,
                }),
            });

            const data = await response.json();

            if (response.ok) {
                console.log(data.success);
            } else {
                console.log(data.error)
            }
    });

    </script>

</body>
</html>


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
            max-height: 80px;
            height: auto;
            width: auto;
        }
        nav a {
            color: black;
            text-decoration: none;
            padding: 10px 15px;
        }
        nav a:hover {
            color: darkblue;
        }
        .hero {
            position: relative;
            width: 100%;
            padding-top: 56.25%;
            overflow: hidden;
            margin-top: 80px;
        }
        .hero iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .story-section {
            padding: 40px;
            text-align: center;
            background-color: #f9f9f9;
        }
        .story-section h2 {
            font-family: -webkit-body;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .story-section p {
            font-size: 1.1rem;
            color: #333;
        }
        .gallery-container {
            position: relative;
            margin: 40px auto;
            max-width: 80%;
            overflow: hidden;
        }
        .gallery {
            display: flex;
            gap: 20px; /* Space between items */
            justify-content: center; /* Center items horizontally */
            flex-wrap: wrap; /* Allow items to wrap to the next line if necessary */
            padding: 10px;
            width: 100%; /* Ensure the gallery spans the container */
        }

    .gallery-item {
        text-align: center; /* Align text to center */
        display: flex;
        flex-direction: column;
        align-items: center; /* Center content horizontally */
        justify-content: center; /* Center content vertically */
        max-width: 20%; /* Adjust size if needed */
    }

    .gallery img {
        width: 200px; /* Adjust image width */
        height: 200px; /* Adjust image height */
        max-width: 100%; /* Ensure responsiveness */
        border-radius: 5px; /* Optional for rounded corners */
        cursor: pointer;
    }

    .gallery-caption {
        margin-top: 8px;
        font-size: 14px;
        color: #333; /* Caption text color */
        text-align: center;
    }
        .dots-container {
            text-align: center;
            margin-top: 20px;
        }
        .dot {
            display: inline-block;
            height: 15px;
            width: 15px;
            background-color: lightgray;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
        }
        .dot.active {
            background-color: darkblue;
        }
        /* Button below dots */
        .dots-container {
            text-align: center;
            margin-top: 20px;
        }

        .dots-button {
            
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: lightgray;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dots-button:hover {
            background-color: black;
            color: white;
        }

     .faq-heading {
            text-align: center;
            font-size: 2rem;
            margin-top: 20px;
            font-weight: bold;
        }
        .faqs-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }
        .faq-column {
            flex: 1;
            padding: 10px;
        }
        .faq-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
            padding: 15px;
        }
        .faq-question {
            cursor: pointer;
            font-weight: bold;
            color: #333;
            transition: color 0.3s;
            margin-bottom: 10px;
        }
        .faq-answer {
            display: none;
            padding-left: 25px;
            margin-top: 5px;
            font-size: 1rem;
            color: #555;
        }
        .plus-icon {
            margin-right: 10px;
        }
        .faq-question.active {
            color: #007BFF;
        }
        .faq-question .plus-icon {
            font-size: 1.2rem;
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
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }
        .modal img {
            max-width: 80%;
            max-height: 80%;
        }
        .modal .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }
        .modal .nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 2rem;
            cursor: pointer;
            padding: 10px;
        }
        .modal .prev {
            left: 20px;
        }
        .modal .next {
            right: 20px;
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
        .project-resources {
            text-align: center;
        }

        .resources {
            display: flex;
            justify-content: space-evenly;
            margin-top: 20px;
        }

        .resource-item {
            text-align: center;
            cursor: pointer;
        }

        .resource-item img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .resource-item p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }
        footer .social-links a {
            margin-right: 10px;
        }
        
        @media (max-width: 480px) {
            .faqs-container {
                display: inline;
                justify-content: space-between;
                gap: 10px;
                max-width: 1200px;
                margin: 20px auto;
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
            .gallery-caption {
                margin-top: 8px;
                font-size: 12px;
                color: #333;
                text-align: center;
            }
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
                padding: 10px 26px;
            }
            .gallery-caption {
                margin-top: 8px;
                font-size: 12px;
                color: #333;
                text-align: center;
            }
            .faqs-container {
                justify-content: space-between;
                gap: 10px;
                max-width: 1200px;
                margin: 20px auto;
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
            .gallery img {
                width: 100px; 
                height: 100px; 
                max-width: 100%;
                border-radius: 5px;
                cursor: pointer;
            }
            .faqs-wrapper {
                flex-direction: column;
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
        <a href="#" onclick="openMyModal()">Enquiry</a>
    </div>
</nav>

<div class="hero">
    <iframe src="https://www.youtube.com/embed/7tYW1QHb1kA?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&fs=0&cc_load_policy=0&cc_lang_pref=en&&showinfo=0&color=white&iv_load_policy=3&playlist=7tYW1QHb1kA"frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>

<div class="story-section">
    <h2>SOBHA QUEENS TOWERS - TOWNPARK</h2>
    <p>New York Themed Luxury Apartments</p>
    <p>Introducing Sobha Queens Towers, a luxurious residential project that brings the essence of New York City to Bangalore.</p>
    <p>Sobha Queens Towers offers a sophisticated and stylish lifestyle.</p>
    <p> Inspired by the architectural grandeur of New York, these apartments feature modern designs and premium amenities.</p>
    <p>Located within the prestigious Sobha Township, Sobha Queens Towers is conveniently situated near the renowned Sobha Manhattan Towers.</p>
    <p> This proximity ensures a vibrant and well-connected neighborhood. Experience the best of both worlds: the tranquility of a residential community and the excitement of urban living.</p>
</div>

<div class="project-resources">
    <h2>Project Resources</h2>
    <div class="resources">
        <div class="resource-item" onclick="openMyModal()">
            <img src="{{asset('images/broucher.jpeg')}}" alt="Brochure">
            <p>Brochure</p>
        </div>
        <div class="resource-item" onclick="openMyModal()">
            <img src="{{asset('images/master_plan.jpeg')}}" alt="Master Plan">
            <p>Master Plan</p>
        </div>
        <div class="resource-item" onclick="openMyModal()">
            <img src="{{asset('images/floor_plan.jpeg')}}" alt="Floor Plan">
            <p>Floor Plan</p>
        </div>
        <div class="resource-item" onclick="openMyModal()">
            <img src="{{asset('images/virtual.jpeg')}}" alt="Virtual Tour">
            <p>Virtual Tour</p>
        </div>
    </div>
</div>

<div class="gallery-container">
    <h1>Gallery</h1>
    <div class="gallery" id="gallery">
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2021/05/SOBHA-TownPark-Elevation.webp" alt="Day Elevation">
            <div class="gallery-caption">Building View</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2021/05/Fountain-Plaza.webp" alt="Night Elevation">
            <div class="gallery-caption">Fountain Plaza</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2021/05/SOBHA-TownPark-Fountain-Plaza.webp" alt="Walk Way">
            <div class="gallery-caption">Metropolitan Club House</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/neopolis-bedroom-2.webp" alt="Bedroom">
            <div class="gallery-caption">Bed Room</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/Neopolis-kitchen.webp" alt="Kitchen">
            <div class="gallery-caption">Kitchen</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/neopolis-gazebo.webp" alt="Gazebo">
            <div class="gallery-caption">Olympus Plaza </div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/neopolis-bedroom.webp" alt="Main Bedroom">
            <div class="gallery-caption">Kid's Bedroom</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/neopolis-bathroom.webp" alt="Main Bedroom">
            <div class="gallery-caption">Bathroom</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/neopolis-balcony-2.webp" alt="Main Bedroom">
            <div class="gallery-caption">Patio with Private Garden</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/Neopolis-family-room.webp" alt="Main Bedroom">
            <div class="gallery-caption">Living Room 1</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/Neopolis-living-room.webp" alt="Main Bedroom">
            <div class="gallery-caption">Living Room 2</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/Neopolis-tower.webp" alt="Main Bedroom">
            <div class="gallery-caption">Entrance Plaza</div>
        </div>
        <div class="gallery-item">
            <img src="https://www.sobha.com/wp-content/uploads/2023/09/neopolis-arbor.webp" alt="Main Bedroom">
            <div class="gallery-caption">BBQ & Picnic Park</div>
        </div>
    </div>
</div>
   <div class="dots-container" id="dotsContainer">
    <div class="dots-wrapper">
        <span class="dot active" data-index="0"></span>
        <span class="dot" data-index="1"></span>
        <span class="dot" data-index="2"></span>
    </div>
    <button class="dots-button" onclick="openMyModal()">For Enquiry</button>
</div>

<div class="faq-heading">Frequently Asked Questions</div>
    
    <div class="faqs-container">
        <!-- Left FAQ container -->
        <div class="faq-column">
            <div class="faq-box">
                <div class="faq-question">
                    <span class="plus-icon">+</span>
                    When is the launch of SOBHA QUEENS?
                </div>
                <div class="faq-answer">
                    Yet to be launched in the month of December.
                </div>
            </div>
            <div class="faq-box">
                <div class="faq-question">
                    <span class="plus-icon">+</span>
                    Where is SOBHA QUEENS located?
                </div>
                <div class="faq-answer">
                     SOBHA Manhattan Towers – Townpark is located near Electronic City, Hosur Rd, Bengaluru, Karnataka.                </div>
                </div>
        </div>

        <!-- Right FAQ container -->
        <div class="faq-column">
            <div class="faq-box">
                <div class="faq-question">
                    <span class="plus-icon">+</span>
                    How many apartments are there in SOBHA QUEENS Towers?
                </div>
                <div class="faq-answer">
                    SOBHA QUEENS Towers has a total of 2000+ apartments.                
                </div>
            </div>
            <div class="faq-box">
                <div class="faq-question">
                    <span class="plus-icon">+</span>
                    What is the total area size of SOBHA QUEENS Towers?
                </div>
                <div class="faq-answer">
                    The total area size of SOBHA QUEENS Towers is 33 acres.
                </div>
            </div>
        </div>
    </div>
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

            <div class="footer-column">
                <h4>Get in Touch</h4>
                <p>+91 80 46464500</p>
                <p>webfeedback@sobha.com</p>
                <p>CIN Details: SOBHA LIMITED L45201KA1995PLC018475</p>
            </div>

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
<div id="modal" class="modal">
    <span class="close" id="closeModal">&times;</span>
    <span class="nav prev" id="prevImage">&lt;</span>
    <img id="modalImage" src="" alt="Modal Image">
    <span class="nav next" id="nextImage">&gt;</span>
</div>

<!-- Modal Structure -->
<div id="myModal" class="myModal">
        <div class="myModal-content">
            <span class="close" id="close_myModal" onclick="closeMyModal()">&times;</span>
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
    const gallery = document.getElementById('gallery');
    const dots = document.querySelectorAll('.dot');
    const images = document.querySelectorAll('.gallery-item');
    const modal = document.getElementById('modal');
    const modalImage = document.getElementById('modalImage');
    const closeModal = document.getElementById('closeModal');
    const prevImage = document.getElementById('prevImage');
    const nextImage = document.getElementById('nextImage');

    let currentImageIndex = 0;
    let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;

    if (isMobile) {
        var imagesPerSlide = 4;
    }
    else{
        var imagesPerSlide = 5;
    }

    function showSlide(index) {
        const start = index * imagesPerSlide;
        const end = start + imagesPerSlide;

        images.forEach((image, i) => {
            if (i >= start && i < end) {
                image.style.display = 'block';
            } else {
                image.style.display = 'none';
            }
        });

        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
    }
    function updateModalImage(index) {
        modalImage.src = images[index].querySelector('img').src;
        currentImageIndex = index;
    }
    images.forEach((image, index) => {
        image.addEventListener('click', () => {
            modal.style.display = 'flex';
            updateModalImage(index);
        });
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    prevImage.addEventListener('click', () => {
        if (currentImageIndex > 0) {
            updateModalImage(currentImageIndex - 1);
        }
    });

    nextImage.addEventListener('click', () => {
        if (currentImageIndex < images.length - 1) {
            updateModalImage(currentImageIndex + 1);
        }
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
        });
    });

    showSlide(0);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-box');
            faqItems.forEach(function(faqItem) {
                const question = faqItem.querySelector('.faq-question');
                
                question.addEventListener('click', function() {
                    faqItem.classList.toggle('active');
                    const plusIcon = question.querySelector('.plus-icon');
                    if (faqItem.classList.contains('active')) {
                        plusIcon.textContent = '-';
                    } else {
                        plusIcon.textContent = '+';
                    }
                    const answer = faqItem.querySelector('.faq-answer');
                    answer.style.display = faqItem.classList.contains('active') ? 'block' : 'none';
                });
            });
        });

 function openMyModal() {
            const mymodal = document.getElementById("myModal");
            mymodal.style.display = "flex";
            document.body.style.overflow = "hidden";
        };

        const mycloseModal = document.getElementById("close_myModal")[0];
        const cancelBtn = document.getElementById("cancelBtn");
        const mymodal = document.getElementById("myModal");

        function closeMyModal() {
            mymodal.style.display = "none";
            document.body.style.overflow = "auto";
        };
        cancelBtn.onclick = function() {
            mymodal.style.display = "none";
            document.body.style.overflow = "auto";
        };

        window.onclick = function(event) {
            if (event.target === mymodal) {
                mymodal.style.display = "none";
                document.body.style.overflow = "auto"; 
            }
        };

        document.getElementById("contactForm").onsubmit = function(e) {
            e.preventDefault();
            mymodal.style.display = "none";
            document.body.style.overflow = "auto";
        };

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

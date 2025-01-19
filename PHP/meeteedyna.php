<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "user_details";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM applicants";
    $result = $conn->query($sql);

    $full_names = [];
    $education_levels = [];
    $field_of_studys = [];
    $institution_names = [];
    $linkedin = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $full_names[] = $row["full_name"];
            $education_levels[] = $row["expertise"];
            $field_of_studys[] = $row["email"];
            $institution_names[] = $row["organization"];
            $linkedin[] = $row["linkedin"];
        }
    } else {
        echo "No records found.";
    }
    
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html {
            height: 100%;
            scroll-behavior: smooth;
        }

        body {
            background-color: black;
            color: white;
            overflow: auto;
            margin: 0;
            margin-left: 10px;
            margin-right: 10px;
        }

        header {
            display: flex;
            justify-content: center;
            background: black;
            padding: 5px;
            position: fixed;
            margin-top: -10px;
            margin-left: -10px;
            top: 10px;
            width: 100%;
            z-index: 999;
            background: repeating-linear-gradient(to right, rgb(215, 0, 0), #ff0000, #e73c7e, #23a6d5, #23d5ab, #a960ee, #f833ff, #90e0ff);
            background-size: 400% 400%;
            animation: gradient 12s linear infinite;
        }

        @keyframes gradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .navbar-container {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-between;
        }

        #navbar {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 10px 10px 10px 10px;
            width: 100%;
        }

        #navbar li {
            padding: 0px 20px;
        }

        #navbar li a {
            text-decoration: none;
            color: white;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }

        #iprofile {
            border: 3px solid rgb(255, 255, 255);
            color: rgb(255, 255, 255);
            padding: 5px;
            font-size: 20px;
            border-radius: 50%;
            margin-right: 5px;
        }

        #navbar .right {
            margin-left: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .right a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }

        .toggle-btn {
            display: none;
            background: transparent;
            border: none;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }

        .container-fluid {
            height: auto;
            margin-top: 100px;
            margin: 0;
            padding: 0;
            width: 100%;
            background: #FFF;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-attachment: scroll;
        }

        .cube {
            position: absolute;
            top: 80vh;
            left: 45vw;
            width: 10px;
            height: 10px;
            border: solid 1px #ffffff;
            transform-origin: top left;
            transform: scale(0) rotate(0deg) translate(-50%, -50%);
            animation: cube 12s ease forwards infinite;
        }

        .cube:nth-child(2n) {
            border-color: #ffffff ;
        }

        .cube:nth-child(2) {
            animation-delay: 2s;
            left: 25vw;
            top: 40vh;
        }

        .cube:nth-child(3) {
            animation-delay: 3s;
            left: 75vw;
            top: 50vh;
        }

        .cube:nth-child(4) {
            animation-delay: 5s;
            left: 90vw;
            top: 30vh;
        }

        .cube:nth-child(5) {
            animation-delay: 6s;
            left: 10vw;
            top: 85vh;
        }

        .cube:nth-child(6) {
            animation-delay: 7s;
            left: 50vw;
            top: 10vh;
        }

        @keyframes cube {
            from {
                transform: scale(0) rotate(0deg) translate(-50%, -50%);
                opacity: 1;
            }
            to {
                transform: scale(20) rotate(960deg) translate(-50%, -50%);
                opacity: 0;
            }
        }

        .body {
            margin-top: 100px;
            padding: 10px;
            opacity: 0.9;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .search-bar {
            background-color: #4b4b4b;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            width: calc(100% - 130px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            margin-left: 10px;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }

        .filter-buttons button {
            border: none;
            border-radius: 20px;
            padding: 8px 12px;
            font-size: 14px;
            background-color: #4b4b4b;
            color: white;
            cursor: pointer;
        }

        .mentor-card {
            background-color: #4b4b4b;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-top: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
        }

        @property --angle {
            syntax: "<angle>";
            initial-value: 0deg;
            inherits: false;
        }

        .mentor-card {
            background-color: black;
            color: white;
            border-radius: 0.25rem;
            box-shadow: 0 20px 40px -14px rgba(255, 255, 255, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            width: 100%;
            border: 5px solid transparent;
            border-image: conic-gradient(from var(--angle), transparent 80%, blue);
            border-image-slice: 1;
            animation: spin 6s ease infinite 0.5s;
        }

        @keyframes spin {
            0%{--angle: 0deg;}
            100%{--angle: 360deg;}
        }

        .mentor-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .mentor-info img {
            border-radius: 50%;
            width: 60px;
            height: 60px;
        }

        .mentor-info h5 {
            margin: 0;
            font-size: 18px;
        }

        .mentor-info p {
            margin: 5px 0;
            font-size: 14px;
            color: white;
        }

        .mentor-info small {
            color: white;
            font-size: 12px;
        }

        .rating {
            font-size: 18px;
            color: #ffd700;
            text-align: right;
        }

        .expertise-tags {
            margin-top: 10px;
            gap: 5px;
            display: flex;
            flex-wrap: wrap;
        }

        .expertise-tags span {
            background-color: #4b4b4b;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .mentor-card p {
            margin: 15px 0;
        }

        .mentor-card .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .mentor-card .buttons button {
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .mentor-card .buttons .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .mentor-card .buttons .btn-secondary {
            background-color: #4b4b4b;
            color: white;
            border: 1px solid #ddd;
        }

        @media (max-width: 768px) {
            .toggle-btn {
                display: block;
            }

            #navbar {
                display: none;
                flex-direction: column;
                width: 100%;
                background: repeating-linear-gradient(to right, rgb(215, 0, 0), #ff0000, #e73c7e, #23a6d5, #23d5ab, #a960ee, #f833ff, #90e0ff);
                background-size: 400% 400%;
                animation: gradient 12s linear infinite;
                position: absolute;
                top: 60px;
                left: 0;
                border-radius: 10px;
            }

            #navbar li {
                padding: 10px;
                text-align: center;
            }

            #navbar li a {
                font-size: 18px;
            }

            #navbar.show {
                display: flex;
            }
        }
        footer {
            background-color: #000000;
            margin-top: 15px;
            border-top: 2px solid white;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            color: #ffffff;
            opacity: 0.9;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-section {
            flex: 1 1 250px;
            margin: 20px;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            font-size: 25px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #0091ff;
            text-decoration: none;
        }

        .footer-section ul li a:hover {
            text-decoration: underline;
        }

        .footer-section ul.social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 0;
            margin-left: -63%;
        }

        .footer-section ul.social-icons li {
            display: inline-block;
        }

        .footer-section ul.social-icons li a {
            font-size: 20px;
            color: #007BFF;
        }

        .footer-section ul.social-icons li a:hover {
            color: #0056b3;
        }

        form input {
            padding: 10px;
            width: 200px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        form button:hover {
            background-color: #0056b3;
        }

        footer .footer-section button {
            padding: 8px 16px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        footer .footer-section button:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .footer-container {
            flex-direction: column;
            }

            .footer-section {
            margin: 10px 0;
            }

            form input {
            width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar-container">
            <button class="toggle-btn" onclick="toggleNavbar()">
                <i class="fas fa-bars"></i>
            </button>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="menteeboard.html">Mentee</a></li>
                <li><a href="meeteedyna.php">Find Mentors</a></li>
                <li><a href="event.html">Event details</a></li>
                <li><a href="about.html">About</a></li>
                <li class="right">
                    <a href="#"><i id="iprofile" class="fa-solid fa-user"></i>Profile</a>
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
        <div class="container">
            <div class="search-bar">
                <div>
                    <input type="text" placeholder="Search by name or keyword"><br><br>
                    <button>Get matched</button>
                </div>
                <div class="filter-buttons">
                    <button>Skills</button>
                    <button>Software</button>
                    <button>Industry</button>
                    <button>Price</button>
                    <button>Sessions Blocks</button>
                    <button>Times Available</button>
                    <button>Days Available</button>
                    <button>Language</button>
                    <button>Country</button>
                    <button>City</button>
                    <button>Company</button>
                </div>
            </div>

            <!-- Explore Section -->
            <div class="filter-buttons">
                <button>Skillful Learning</button>
                <button>Robust Scheduling</button>
                <button>Improve your onboarding</button>
                <button>Enhanced Career Achievement</button>
                <button>Improve Knowledge</button>
            </div>
            <ul style="list-style-type: none; padding: 0;">
                <?php if (!empty($full_names)): ?>
                    <?php for ($i = 0; $i < count($full_names); $i++): ?>
                        <li style="margin-left: -50px; padding: 0;">
                            <div class="mentor-card">
                                <div class="mentor-info">
                                    <img src="https://via.placeholder.com/60" alt="Mentor Photo">
                                    <div>
                                        <h5><?php echo htmlspecialchars($full_names[$i]); ?></h5>
                                    </div>
                                </div>
                                <div class="expertise-tags">
                                    <span><?php echo htmlspecialchars($education_levels[$i]); ?></span>
                                    <span><?php echo htmlspecialchars($field_of_studys[$i]); ?></span>
                                    <span><?php echo htmlspecialchars($institution_names[$i]); ?></span>
                                </div>
                                <div class="buttons">
                                    <button class="btn-primary">  <a href="<?php echo htmlspecialchars($linkedin[$i]); ?>" target="_blank" class="btn-primary" style="text-decoration: none;">
                            Request a Call
                        </a></button>
                                    <button class="btn-secondary"><a href="mentorprofile.php">View Profile</a></button>
                                </div>
                            </div>
                        </li>
                    <?php endfor; ?>
                <?php else: ?>
                    <p>No mentors available at the moment.</p>
                <?php endif; ?>
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
        function toggleNavbar() {
            const navbar = document.getElementById("navbar");
            navbar.classList.toggle("show");
        }
    </script>
</body>
</html>

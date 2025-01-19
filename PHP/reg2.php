<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "workshop"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$success = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $workshop_date = $_POST['workshopDates'];
    $comments = $_POST['comments'];

   
    $check_email_query = "SELECT email FROM registrations2 WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      
        $message = "User already exists with email: $email";
    } else {
    
        $stmt->close();
        $insert_query = "INSERT INTO registrations2 (full_name, email, phone, department, workshop_date, comments) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssssss", $full_name, $email, $phone, $department, $workshop_date, $comments);

        if ($stmt->execute()) {
    
            $message = "Thank you for registering, $full_name! We will send updates to $email.";
            $success = true; 
        } else {
          
            $message = "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Networking Essentials Workshop</title>
    <script>
      
        <?php if (!empty($message)): ?>
            window.onload = function() {
                alert("<?php echo $message; ?>");
            };
        <?php endif; ?>
    </script>
    <style>
        body {
            background-color: black;
        }

        .container-fluid {
            height: auto;
            margin-top: 100px;
            margin: 0;
            padding: 0;
            width: 100%;
            background: white;
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
            border-color: #ffffff;
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

        header {
            background: linear-gradient(90deg, #10ed14, #11e7ee, #ee11e7);
            color: white;
            padding: 10px 0;
            text-align: center;
            transition: background 0.3s ease-in-out;
        }

        header h1, header p {
            margin: 5px;
        }

        header:hover {
            background: linear-gradient(90deg, #ee11e7, #11e7ee, #10ed14);
        }

        main {
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }

        h2 {
            color: #ea17ce;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        section {
            margin-bottom: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        section:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="tel"]:hover,
        select:hover,
        textarea:hover {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        input[type="submit"] {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background: #45a049;
            transform: scale(1.05);
        }

        ul li {
            margin: 5px 0;
            transition: color 0.3s, transform 0.3s;
        }

        ul li:hover {
            color: #4CAF50;
            transform: translateX(5px);
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s, text-decoration 0.3s;
        }

        a:hover {
            color: #45a049;
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 15px;
            background: #333;
            color: white;
            position: relative;
            transition: background 0.3s;
        }

        footer:hover {
            background: #444;
        }

        #message {
            margin-top: 10px;
            color: green;
        }

        .checkbox-group {
            margin: 10px 0;
        }

        .checkbox-group label {
            display: inline-block;
            margin-right: 10px;
        }
    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="background">
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
        </div>
    </div>
    <header>
        <h1>Networking Essentials Workshop</h1>
        <p>Empowering Your Future with Essential Skills</p>
        <p>Join us for an exciting opportunity to enhance your networking skills!</p>
    </header>

    <main>
        <section>
            <h2>Workshop Overview</h2>
            <p>The Networking Essentials Workshop is designed to equip participants with fundamental skills for effective networking in today's job market. Over the course of this workshop, participants will engage in interactive sessions, learn from industry experts, and build a network with fellow attendees.</p>
            <p>Whether you're a student, a recent graduate, or a seasoned professional, this workshop will provide valuable strategies to enhance your career connections and achieve your professional goals.</p>
        </section>

        <section>
            <h2>Topics Covered</h2>
            <ul>
                <li><strong>Effective Communication:</strong> Learn the fundamentals of communicating clearly and confidently.</li>
                <li><strong>Building Relationships:</strong> Discover strategies for developing meaningful professional relationships.</li>
                <li><strong>Leveraging Social Media:</strong> Understand how to use platforms like LinkedIn for professional networking.</li>
                <li><strong>Networking Etiquette:</strong> Gain insights into proper networking behaviors in various settings.</li>
                <li><strong>Follow-Up Strategies:</strong> Learn how to maintain connections after initial meetings.</li>
                <li><strong>Soft Skills Development:</strong> Enhance your interpersonal skills to connect with others more effectively.</li>
            </ul>
        </section>

        <section>
            <h2>Registration</h2>
            <form id="registrationForm" method="POST" action="">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="occupation">Department:</label>
                <input type="text" id="department" name="department" required>

                <label for="workshopDates">Preferred Workshop Dates:</label>
                <select id="workshopDates" name="workshopDates" required>
                    <option value="" disabled selected>Select a Date</option>
                    <option value="2023-10-15">October 15, 2023</option>
                    <option value="2023-10-22">October 22, 2023</option>
                    <option value="2023-10-29">October 29, 2023</option>
                </select>

                <label for="comments">Additional Comments:</label>
                <textarea id="comments" name="comments" rows="4"></textarea>


                <input type="submit" value="Register">
                <div id="message"></div>
            </form>
        </section>

        <section>
            <h2>Testimonials</h2>
            <p>"The Networking Essentials Workshop was a game-changer for me! I learned so many strategies to improve my networking skills." - <em>Sarah L.</em></p>
            <p>"I gained invaluable connections that helped me land my dream job." - <em>James M.</em></p>
            <p>"The networking opportunities were incredible. I met so many like-minded professionals!" - <em>Emily R.</em></p>
        </section>

        <section>
            <h2>Contact Information</h2>
            <p>If you have any questions regarding the workshop, feel free to reach out!</p>
            <p>Email: <a href="mailto:info@networkingessentials.com">info@networkingessentials.com</a></p>
            <p>Phone: <a href="tel:+1234567890">+1 (234) 567-890</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Networking Essentials Workshop. All rights reserved.</p>
    </footer>

</body>
</html>
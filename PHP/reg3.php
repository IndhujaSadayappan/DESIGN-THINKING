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

    $check_email_query = "SELECT email FROM registrations3 WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
  
        $message = "User already exists with email: $email";
    } else {
   
        $stmt->close();
        $insert_query = "INSERT INTO registrations3 (full_name, email, phone, department, workshop_date, comments) VALUES (?, ?, ?, ?, ?, ?)";
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
    <title>Soft Skills Workshop</title>
    <script>
       
        <?php if (!empty($message)): ?>
            window.onload = function() {
                alert("<?php echo $message; ?>");
            };
        <?php endif; ?>
    </script>
    <style>
           body{
        background-color: black;
    }
   .container-fluid{
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
    margin-top: 10px;
    padding: 10px;
    opacity: 0.9;
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
            color: #f41fec;
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
        }

        input[type="submit"] {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #45a049;
        }

        footer {
            text-align: center;
            padding: 15px;
            background: #333;
            color: white;
            position: relative;
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
        <h1>Soft Skills Workshop</h1>
        <p>Empowering Your Future with Essential Skills</p>
        <p>Join us for an exciting opportunity to enhance your soft skills!</p>
    </header>

    <main>
        <section>
            <h2>Workshop Overview</h2>
            <p>The Soft Skills Workshop is designed to equip participants with fundamental skills necessary for effective communication and interpersonal interactions in both personal and professional settings. Participants will engage in interactive sessions, learn from industry experts, and develop the essential skills needed to thrive in the workplace.</p>
            <p>Whether you're a student, a recent graduate, or a seasoned professional, this workshop will provide valuable strategies to enhance your interpersonal interactions and achieve your career goals.</p>
        </section>

        <section>
            <h2>Topics Covered</h2>
            <ul>
                <li><strong>Effective Communication:</strong> Learn to communicate clearly and confidently in various scenarios.</li>
                <li><strong>Teamwork:</strong> Understand the dynamics of working in teams and how to contribute effectively.</li>
                <li><strong>Conflict Resolution:</strong> Develop strategies for resolving disagreements and conflicts positively.</li>
                <li><strong>Emotional Intelligence:</strong> Enhance your ability to understand and manage your emotions and those of others.</li>
                <li><strong>Adaptability:</strong> Cultivate the flexibility needed to thrive in changing environments.</li>
                <li><strong>Networking Skills:</strong> Learn effective networking techniques to broaden your professional reach.</li>
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
                    <option value="2023-11-05">November 5, 2023</option>
                    <option value="2023-11-12">November 12, 2023</option>
                    <option value="2023-11-19">November 19, 2023</option>
                </select>

                <label for="comments">Additional Comments:</label>
                <textarea id="comments" name="comments" rows="4"></textarea>

                

                <input type="submit" value="Register">
                <div id="message"></div>
            </form>
        </section>

        <section>
            <h2>Testimonials</h2>
            <p>"The Soft Skills Workshop was a transformative experience! I learned practical strategies I could apply immediately." - <em>Rachel P.</em></p>
            <p>"This workshop has significantly improved my communication skills and confidence." - <em>Michael T.</em></p>
            <p>"I now feel more prepared to handle workplace challenges thanks to this workshop." - <em>Lisa A.</em></p>
        </section>

        <section>
            <h2>Contact Information</h2>
            <p>If you have any questions regarding the workshop, feel free to reach out!</p>
            <p>Email: <a href="mailto:info@softskillsworkshop.com">info@softskillsworkshop.com</a></p>
            <p>Phone: <a href="tel:+1234567890">+1 (234) 567-890</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Soft Skills Workshop. All rights reserved.</p>
    </footer>

    
</body>
</html>
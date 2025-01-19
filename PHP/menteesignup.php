<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mentee_details"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $education = $conn->real_escape_string($_POST['education']);
    $field = $conn->real_escape_string($_POST['field']);
    $institution = $conn->real_escape_string($_POST['institution']);
    $help = isset($_POST['help']) ? implode(", ", $_POST['help']) : "";
    $mentor_expertise = $conn->real_escape_string($_POST['mentor_expertise']);
    $short_bio = $conn->real_escape_string($_POST['short_bio']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $profile_pic_path = "uploads/profile_pics/" . basename($_FILES['profile_pic']['name']);
    if (!move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_pic_path)) {
        die("Failed to upload profile picture.");
    }

    $sql = "INSERT INTO mentees (full_name, email, phone, education_level, field_of_study, institution_name, help_needed, mentor_expertise, profile_pic_path, short_bio, password_hash)
            VALUES ('$full_name', '$email', '$phone', '$education', '$field', '$institution', '$help', '$mentor_expertise', '$profile_pic_path', '$short_bio', '$password_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Connect - Sign-Up Form</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(120deg, #e4f7f9, #ffffff);
    color: #333;
}

.form-container {
    max-width: 700px;
    margin: 50px auto;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.form-header {
    background: #28a745;
    color: white;
    text-align: center;
    padding: 20px;
    border-bottom: 3px solid #218838;
}

.form-header h1 {
    margin: 0;
    font-size: 1.8rem;
}

.form-header p {
    font-size: 1rem;
    margin-top: 10px;
    line-height: 1.5;
}


.form-section {
    padding: 10px 10px;
    border-bottom: 0.5px solid #e0e0e0;
}

.form-section h2 {
    font-size: 1.2rem;
    margin-bottom: 5px;
    color: #28a745;
}

label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #555;
}

input, select, textarea {
    width: 95%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 1rem;
}

textarea {
    height: 80px;
    resize: none;
}

input[type="file"] {
    padding: 5px;
    font-size: 0.9rem;
}


button {
    width: 20%;
    padding: 12px;
    font-size: 1rem;
    color: #ffffff;
    background-color: #28a745;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #218838;
}


textarea#short-bio:hover {
    border-color: #28a745;
    background-color: #f0fff0;
}




</style>
</head>
<body>
    <div class="form-container">
        <header class="form-header">
            <h1>Mentee Connect</h1>
            <p>Join our platform to learn and grow with the guidance of experienced mentors!</p>
        </header>
        <form action="menteesignup.php" method="post" enctype="multipart/form-data">
       
            <section class="form-section">
                <h2>1. Basic Information</h2>
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full_name" placeholder="Enter your full name" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </section>

            <section class="form-section">
                <h2>2. Academic Information</h2>
                <label for="education">Current Education Level:</label>
                <select id="education" name="education" required>
                    <option value="" disabled selected>Select your education level</option>
                    <option value="high-school">High School</option>
                    <option value="undergraduate">Undergraduate</option>
                    <option value="postgraduate">Postgraduate</option>
                </select>

                <label for="field">Field of Study:</label>
                <input type="text" id="field" name="field" placeholder="Enter your field of study" required>

                <label for="institution">Institution Name:</label>
                <input type="text" id="institution" name="institution" placeholder="Enter your institution name" required>
            </section>

         
            <section class="form-section">
                <h2>3. Mentoring Goals</h2>
                <label for="help">What do you need help with?:</label>
                <div>
                    <input type="radio" id="career-guidance" name="help[]" value="career-guidance">
                    <label for="career-guidance">Career Guidance</label><br>

                    <input type="radio" id="exam-preparation" name="help[]" value="exam-preparation">
                    <label for="exam-preparation">Exam Preparation</label><br>

                    <input type="radio" id="skill-development" name="help[]" value="skill-development">
                    <label for="skill-development">Skill Development</label><br>
                </div>

                <label for="mentor-expertise">Preferred Mentor Expertise:</label>
                <select id="mentor-expertise" name="mentor_expertise" required>
                    <option value="" disabled selected>Select mentor expertise</option>
                    <option value="academic-professional">Academic Professional</option>
                    <option value="industry-professional">Industry Professional</option>
                </select>
            </section>

          
            <section class="form-section">
                <h2>4. Profile Customization</h2>
                <label for="profile-pic">Profile Picture:</label>
                <input type="file" id="profile-pic" name="profile_pic" accept=".jpg, .png" required>

                <label for="short-bio">Short Bio:</label>
                <textarea id="short-bio" name="short_bio" placeholder="Write a short bio about yourself." required></textarea>
            </section>

            <section class="form-section">
                <h2>5. Login Credentials</h2>
                <label for="password">Create a Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
            </section>
            <div style="text-align: center;">
                <button type="submit">Submit</button>
          </div>
        </form>
            
          
          </div>
</body>
</html>

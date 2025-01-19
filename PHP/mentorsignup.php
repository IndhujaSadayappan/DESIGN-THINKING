<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_details";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $job_title = $conn->real_escape_string($_POST['job_title']);
    $organization = $conn->real_escape_string($_POST['organization']);
    $experience = (int) $_POST['experience'];
    $expertise = $conn->real_escape_string($_POST['expertise']);
    $linkedin = $conn->real_escape_string($_POST['linkedin']);
    $certifications = $conn->real_escape_string($_POST['certifications']);

   
    $resume_path = "C:\\xampp\\htdocs\\DT project\\DT project\\uploads\\resumes";
    $id_proof_path = "C:\\xampp\\htdocs\\DT project\\DT project\\uploads\\id_proofs";

    if (!empty($_FILES['resume']['name'])) {
        $resume_path = "uploads/resumes/" . basename($_FILES['resume']['name']);
        move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path);
    }

    if (!empty($_FILES['id_proof']['name'])) {
        $id_proof_path = "uploads/id_proofs/" . basename($_FILES['id_proof']['name']);
        move_uploaded_file($_FILES['id_proof']['tmp_name'], $id_proof_path);
    }

    $sql = "INSERT INTO applicants (full_name, email, phone, dob, gender, job_title, organization, experience, expertise, linkedin, resume_path, id_proof_path, certifications) 
            VALUES ('$full_name', '$email', '$phone', '$dob', '$gender', '$job_title', '$organization', $experience, '$expertise', '$linkedin', '$resume_path', '$id_proof_path', '$certifications')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully.";
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
    <title>Mentor Connect - Sign-Up Form</title>
   <style>
    Css

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(120deg, #f3f4f7, #d9e3f0);
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
    background: #007BFF;
    color: white;
    text-align: center;
    padding: 20px;
    border-bottom: 3px solid #0056b3;
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
    padding: 2px 30px;
    border-bottom: 1px solid #e0e0e0;
}

.form-section h2 {
    font-size: 1.2rem;
    margin-bottom: 15px;
    color: #007BFF;
}

label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #555;
}

input, select, textarea {
    width: 100%;
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
    background-color: #007BFF;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}
   </style>
</head>
<body>
    <div class="form-container">
        <header class="form-header">
            <h1>Mentor Connect</h1>
            <p>Join our platform to share your expertise and guide aspiring professionals!</p>
        </header>
        <form action="mentorsignup.php" method="post" enctype="multipart/form-data">

      
            <section class="form-section">
                <h2>1. Personal Details</h2>
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full_name" placeholder="Enter your full name" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </section>

            <section class="form-section">
                <h2>2. Professional Details</h2>
                <label for="job-title">Current Job Title:</label>
                <input type="text" id="job-title" name="job_title" placeholder="Enter your current job title" required>

                <label for="organization">Organization/Company:</label>
                <input type="text" id="organization" name="organization" placeholder="Enter your organization or company" required>

                <label for="experience">Total Work Experience (in years):</label>
                <input type="number" id="experience" name="experience" placeholder="Enter your total work experience" min="0" required>

                <label for="expertise">Areas of Expertise:</label>
                <textarea id="expertise" name="expertise" placeholder="E.g., Technology, Business, Design, Marketing" required></textarea>

                <label for="linkedin">LinkedIn Profile URL (optional):</label>
                <input type="url" id="linkedin" name="linkedin" placeholder="Enter your LinkedIn profile URL">

                <label for="resume">Upload Resume (PDF or Doc):</label>
                <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx">
            </section>

 
            <section class="form-section">
                <h2>3. Verification Details</h2>
                <label for="id-proof">Upload ID Proof:</label>
                <input type="file" id="id-proof" name="id_proof" accept=".pdf, .jpg, .png" required>

                <label for="certifications">Professional Certifications (if any):</label>
                <textarea id="certifications" name="certifications" placeholder="List your certifications (if any)"></textarea>
            </section>
            <div style="text-align:center;">
            <button type="submit">Submit</button>
          </div>
        </form></div>
      
</body>
</html>


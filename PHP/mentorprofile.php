<?php

session_start();


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

if ($result->num_rows <= 0) {
    echo "No mentors found.";
    exit();
}

$mentors = $result->fetch_all(MYSQLI_ASSOC);


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Signed-Up Mentors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            width: 90%;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: auto;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #444;
            word-wrap: break-word;
        }

        table th {
            background-color: #444;
            color: white;
        }

        table td {
            background-color: #333;
            color: white;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Signed-Up Mentors</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Profile Picture</th>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Job Title</th>
                        <th>Organization</th>
                        <th>Experience</th>
                        <th>LinkedIn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mentors as $mentor): ?>
                        <tr>
                            <td>
                                <img src="<?= htmlspecialchars($mentor['profile_pic_path'] ?? 'profile.png'); ?>" class="profile-img" alt="Profile">
                            </td>
                            <td><?= htmlspecialchars($mentor['full_name']); ?></td>
                            <td><?= htmlspecialchars(date("F j, Y", strtotime($mentor['dob']))); ?></td>
                            <td><?= htmlspecialchars($mentor['gender']); ?></td>
                            <td><?= htmlspecialchars($mentor['email']); ?></td>
                            <td><?= htmlspecialchars($mentor['phone']); ?></td>
                            <td><?= htmlspecialchars($mentor['job_title']); ?></td>
                            <td><?= htmlspecialchars($mentor['organization']); ?></td>
                            <td><?= htmlspecialchars($mentor['experience']); ?></td>
                            <td>
                                <a href="<?= htmlspecialchars($mentor['linkedin']); ?>" target="_blank">View LinkedIn</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php

$db_config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => '' 
];

function connectDatabase($host, $username, $password, $dbname) {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function fetchData() {
    global $db_config;

    $userDB = connectDatabase($db_config['host'], $db_config['username'], $db_config['password'], 'user_details');
    $menteeDB = connectDatabase($db_config['host'], $db_config['username'], $db_config['password'], 'mentee_details');
    $workshopDB = connectDatabase($db_config['host'], $db_config['username'], $db_config['password'], 'workshop');

    $data = [];

    
    $result = $userDB->query("SELECT COUNT(*) AS mentor_count FROM applicants");
    $data['mentors'] = $result->fetch_assoc()['mentor_count'];

    $result = $menteeDB->query("SELECT COUNT(*) AS mentee_count FROM mentees");
    $data['mentees'] = $result->fetch_assoc()['mentee_count'];


    $result = $workshopDB->query("SELECT COUNT(*) AS workshop1_count FROM registrations");
    $data['workshop1'] = $result->fetch_assoc()['workshop1_count'];

    $result = $workshopDB->query("SELECT COUNT(*) AS workshop2_count FROM registrations2");
    $data['workshop2'] = $result->fetch_assoc()['workshop2_count'];

    $result = $workshopDB->query("SELECT COUNT(*) AS workshop3_count FROM registrations3");
    $data['workshop3'] = $result->fetch_assoc()['workshop3_count'];

    $data['total_users'] = $data['mentors'] + $data['mentees'];

    $userDB->close();
    $menteeDB->close();
    $workshopDB->close();

    return $data;
}

header('Content-Type: application/json');
echo json_encode(fetchData());
?>

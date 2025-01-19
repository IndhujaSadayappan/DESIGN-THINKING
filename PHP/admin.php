


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard with Static Bar Chart</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
   
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: black;
    }

    .sidebar {
      background-color: #2c3e50;
      color: white;
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding-top: 20px;
    }

    .sidebar .menu-item {
      padding: 10px 20px;
      color: white;
      cursor: pointer;
    }

    .sidebar .menu-item:hover {
      background-color: #34495e;
    }

    .header {
      color: white;
      background-color: cadetblue;
      padding: 10px 20px;
      margin-left: 250px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

 
    .content {
      margin-left: 250px;
      padding: 20px;
    }

    .card {
      background-color: white;
      color: black;
      border-radius: 0.25rem;
      box-shadow: 0 20px 40px -14px rgba(255, 255, 255, 0.25);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 180px;
      margin-bottom: 20px; 
    }

    .circle-chart {
  width: 100px;
  height: 100px;
  border-radius: 70%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px auto;
  position: relative;
  background-color: white; 
  border: 10px solid blue;
  
}

.circle-chart .chart-text {
  position: absolute;
  font-size: 18px;
  font-weight: bold;
  color: black; 
}
    .bar-chart {
      background-color: white;
      width: 100%;
      height: 350px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
      border-radius: 0.25rem;
    }

    .bar-chart canvas {
      max-width: 100%;
      height: 80%;
    }
    .curved-container {
    width: 600px;
    height:220px;
    padding: 20px;
    border-radius: 15px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
    text-align: center;
    margin-bottom:10px;
}

.curved-container h2 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #333;
}

.curved-container p {
    margin-bottom: 15px;
    color: #555;
}

.curved-container ul {
    list-style: none;
    padding: 0;
    margin: 0 0 15px;
    text-align: left;
}

.curved-container ul li {
    margin: 5px 0;
    font-size: 16px;
    color: #444;
}

.actions {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.actions button {
    padding: 8px 12px;
    font-size: 14px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.actions button:hover {
    background-color: #0056b3;
}
</style>
<script>
  document.addEventListener('DOMContentLoaded', function () {
   
    fetch('fetch_dashboard_data.php')
        .then(response => response.json())
        .then(data => {
           
            document.querySelector('.curved-container strong:nth-of-type(1)').innerText = data.mentors; 
            document.querySelector('.curved-container strong:nth-of-type(2)').innerText = data.mentees; 
            document.querySelector('.curved-container strong:nth-of-type(3)').innerText = data.workshop1;
            document.querySelector('.curved-container strong:nth-of-type(4)').innerText = data.workshop2; 
            document.querySelector('.curved-container strong:nth-of-type(5)').innerText = data.workshop3; 
            document.querySelector('.circle-chart .chart-text').innerText = data.total_users;

          
            myBarChart.data.datasets[0].data = [
                data.mentors,
                data.mentees,
                data.workshop1,
                data.workshop2,
                data.workshop3,
                data.total_users
            ];
            myBarChart.update();
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});
</script>
</head>
<body>

 
  <div class="sidebar">
    <h3 class="text-center">MentorConnect</h3>
    <div class="menu-item">Dashboard</div>
    <div class="menu-item">Manage Users</div>
   
    <div class="menu-item">Requests & Approvals</div>
    <div class="menu-item">Sessions</div>

    <div class="menu-item">Feedback</div>
    <div class="menu-item">Reports</div>
    <div class="menu-item">Notifications</div>
    <div class="menu-item">Settings</div>
    <div class="menu-item">Logout</div>
</div>

 
  <div class="header">
    <h4>MENTOR CONNECT</h4>
    <div>KEC ADMIN</div>
  </div>

  
  <div class="content">
 
    <div class="row">
   
    
      <div class="col-md-6">

      <div class="curved-container">
    <h2>Welcome Back, Admin!</h2>
    <p>Here’s a quick overview of today’s activity:</p>
    <ul>
    <li>
    <span>Active Mentors: <strong>25</strong></span>
    <span style="margin-left: 200px;">Active Mentees: <strong>2</strong></span>
</li>
<li>
    <span>Pending requests: <strong>12</strong></span>
    <span style="margin-left: 200px;">Upcomming sessions: <strong>3</strong></span>
</li>  
       
    </ul>
    <div class="actions">
        <button>Approve Requests</button>
        <button>View Reports</button>
    </div>
</div>
        <div class="bar-chart">
         
          <canvas id="myBarChart"></canvas>
        </div>
      </div>

     
      <div class="col-md-6">
    
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="circle-chart">
                <div class="chart-text">25</div>
              </div>
              <div>Mentor Users</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="circle-chart">
                <div class="chart-text">35</div>
              </div>
              <div>Mentee Users</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="circle-chart">
                <div class="chart-text">15</div>
              </div>
              <div>Workshop 1</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="circle-chart">
                <div class="chart-text">10</div>
              </div>
              <div>Workshop 2</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="circle-chart">
                <div class="chart-text">30</div>
              </div>
              <div>Workshop 3</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="circle-chart">
                <div class="chart-text">115</div>
              </div>
              <div>Total Users</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
  
    const ctx = document.getElementById('myBarChart').getContext('2d');
    const myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mentors', 'Mentees', 'Workshop 1', 'Workshop 2', 'Workshop 3', 'Total Users'],
            datasets: [{
                label: 'User Count',
                data: [0, 0, 0, 0, 0, 0],  
                backgroundColor: [
                    '#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#F1C40F', '#8E44AD'
                ],
                borderColor: [
                    '#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#F1C40F', '#8E44AD'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    
    fetch('fetch_dashboard_data.php')
        .then(response => response.json())
        .then(data => {
            
            myBarChart.data.datasets[0].data = [
                data.mentors, 
                data.mentees, 
                data.workshop1, 
                data.workshop2, 
                data.workshop3, 
                data.total_users
            ];
            myBarChart.update();
        })
        .catch(error => {
            console.error('Error fetching data for bar chart:', error);
        });
});

    document.addEventListener('DOMContentLoaded', function () {

    fetch('fetch_dashboard_data.php')
        .then(response => response.json())
        .then(data => {
          
            document.querySelectorAll('.circle-chart .chart-text')[0].innerText = data.mentors;    
            document.querySelectorAll('.circle-chart .chart-text')[1].innerText = data.mentees;   
            document.querySelectorAll('.circle-chart .chart-text')[2].innerText = data.workshop1; 
            document.querySelectorAll('.circle-chart .chart-text')[3].innerText = data.workshop2; 
            document.querySelectorAll('.circle-chart .chart-text')[4].innerText = data.workshop3; 
            document.querySelectorAll('.circle-chart .chart-text')[5].innerText = data.total_users; 

            
            console.log("Data updated:", data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});

  </script>
</body>
</html>

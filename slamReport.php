<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pdetails";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM details";
$result = $conn->query($sql);
$conn->close();
?>



<html>
<head>
    <title>User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        


        .print-button{
            text-align: center;
        }
        .print-button button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
           /* margin-left: 45%; */
           
        }

        .print-button button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div id="report-container">
    <h2>User Data</h2>
    <div class="print-button">
        <button onclick="printTable()">Print Report</button>
    </div>
    <label for="year">Select Year:</label>
    <select name="year" id="year">
    <option value="2024">2024</option>;
    <option value="2023">2023</option>;
    <option value="2022">2022</option>;
    <option value="2021">2021</option>;
    <option value="2020">2020</option>;
    <option value="2019">2019</option>;
    <option value="2018">2018</option>;
    <option value="2017">2017</option>;
    <option value="2016">2016</option>;
    <option value="2015">2015</option>;
    <option value="2014">2014</option>;
    </select>
    
    <button onclick="fetchData()">Fetch Data</button>
</div>

    
<?php
  
  // Database connection parameters
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "pdetails";
  
  $conn = new mysqli($host, $username, $password, $database);
  
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  if (isset($_POST['year'])) {
      $selectedYear = $_POST['year'];
      $sql = "SELECT * FROM details WHERE year = '$selectedYear'";
      $result = $conn->query($sql);
      
    
  if ($result->num_rows > 0) {
      echo '<table>';
      echo '<tr>';
      echo '<th>ID</th>';
      echo '<th>Username</th>';
      echo '<th>MobileNo.</th>';
      echo '<th>Course</th>';
      echo '<th>Nickname</th>';
      echo '<th>ExtraHob</th>';
      echo '<th>ExamQual.</th>';
      echo '<th>YearofGrad.</th>';
      echo '<th>DateOfBirth</th>';
      echo '<th>Branch</th>';
      echo '<th>Fav</th>';
      echo '<th>Company</th>';
      echo '<th>Program</th>';
      echo '</tr>';

      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row['user_id'] . '</td>';
          echo '<td>' . $row['name'] . '</td>';
          echo '<td>' . $row['mobile'] . '</td>';
          echo '<td>' . $row['course'] . '</td>';
          echo '<td>' . $row['nickname'] . '</td>';
          echo '<td>' . $row['extra'] . '</td>';
          echo '<td>' . $row['exam'] . '</td>';
          echo '<td>' . $row['year'] . '</td>';
          echo '<td>' . $row['dob'] . '</td>';
          echo '<td>' . $row['branch'] . '</td>';
          echo '<td>' . $row['fav'] . '</td>';
          echo '<td>' . $row['company'] . '</td>';
          echo '<td>' . $row['program'] . '</td>';
          echo '</tr>';
      }
          echo '</table>';
      } else {
          echo 'No data found for the selected year.';
      }
  }
  
  $conn->close();
  ?>


<script>
      function printTable() {
          var printContents = document.getElementsByTagName("table")[0].outerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
      }

      function fetchData() {
  const selectedYear = document.getElementById('year').value;

  const url = 'slamReport.php'; 
  
  //  fetch request 
  const options = {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `year=${selectedYear}`,
  };

  // Fetch API to make the request
  fetch(url, options)
      .then((response) => response.text())
      .then((data) => {
          document.getElementById('report-container').innerHTML = data;
      })
      .catch((error) => {
          console.error('Error:', error);
      });
}

  </script>
</body>
</html>
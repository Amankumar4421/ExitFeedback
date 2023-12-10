<?php
session_start();
if (!isset($_SESSION['SESSION_ID'])) {
  header("Location: index.php");
  die();
}

$questions = array(
  "Achievement of objectives through the programme",
  "Compatibility of curriculum for National competitive exams",
  "Improvement of skills by Internships, workshops, Modular and Value added courses offered",
  "Practical exposure integrated with the curriculum",
  "Academic advising/mentoring by the faculty",
  "Ease in access of faculty out of the class",
  "Adequacy and relevance of library reading material",
  "Effectiveness in Training activities and Placement cell functions",
  "Utility of resources (Internet / Library / Labs etc.,)",
  "Measures taken to develop interest on Innovative Projects and their guidance",
  "Effectiveness of Student Counselling system in helping students to improve their quality of life (Academic, Career and Social/Emotional development)",
  "Receiving Concrete advices / guidance on further plans from Counselor",
  "Satisfaction on the practise of assigning 20 students per counselor",
  "Effectiveness of your faculty counselor",
  "Your Inclination towards recommending VFSTR to your family and friends",
  "Overall, how do you rate your experience in VFSTR?",
  "Comfort in classrooms / Labs / Seminar Halls and Canteen",
  "Canteens Maintenance : (Cleanliness and Ambience)",
  "Affordability level of Prices in Canteen",
  "Access to sports equipment and the facilities available",
  "Availability of trainers/coaches for mentoring sports activities",
  "Provision of opportunities to function in Student Bodies",
  "Execution of optional clubs and Conduction of Cultural Activities",
  "Opportunities available to the students to nurture leadership and entrepreneurial skills",
  "Opportunities provided through conduction of activities within the institute.",
  "Opportunities provided to participate in activities organised by other institutions",
  "Effectiveness of trainers in enhancing employability and life skills",
  "Enough opportunities were available in the university to serve community at large (NSS/NCC etc.)",
  "Availability of various programs to achieve an overall development.",
  "Availability of university authorities to interact with the students for their problem/ feedback/ suggestions",
  "Financial support opportunities available for the students",
  "Institutes stand on taking environment friendly measures",
  "Maintenance of Communal Harmony through un-biased nature towards any specific group",
);

include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vignan Feedback Report</title>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Bitter', serif;
      font-family: 'Lora', serif;
      box-sizing: border-box;
    }

    body {
      background-color: #f2f2f2;
    }

    .container {
      display: flex;
      justify-content: center;
    }

    .box {
      display: flex;
      justify-content: center;
      flex-direction: column;
      width: 90%;
      margin: 30px 0px;
      border-radius: 20px;
      box-shadow: 2px 5px 20px grey;
      background-color: white;
    }

    .selectbox {
      width: 100%;
      margin-top: 20px;
      display: flex;
      justify-content: center;

    }

    .select {
      flex: 1;
      display: flex;
      justify-content: center;
    }

    #select {
      width: 180px;
      height: 30px;
      font-size: 15px;
    }

    #btn {
      width: 100px;
      height: 30px;
    }

    .logoutbtn {
      width: 200px;
      height: 40px;
      padding: 10px;
      text-align: center;
    }

    .logout {
      font-size: 20px;
      text-decoration: none;
    }

    .reportbox {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;

    }

    .headtext {
      width: 100%;
      font-size: 30px;
      text-align: center;
      margin-top: 20px;
      margin-bottom: 20px;
      font-weight: bold;
      color: blue;
      background-color: white;
    }

    .table {
      display: flex;
      justify-content: center;
      margin-bottom: 100px;
    }

    table {
      border-collapse: collapse;
      width: 70%;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 4px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .overallfeedback {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="box">
      <div class="selectbox">
        <div class="select">

          <form action="report.php" method="post">
            <select name="style" id="select" class="reportstyle">
              <option value="full">QuestionWise full report</option>
              <option value="Summary">Summarise report</option>
            </select>
            <select name="passing_year" id="select" required>
              <option value="#">Select passing year</option>
              <?php
              for ($i = 2000; $i <= date("Y") + 1; $i++) {
                echo '<option value=' . $i . '>' . $i . '</option>';
              }
              ?>
            </select>

            <button type="submit" id="btn">SUBMIT</button>
          </form>
        </div>
        <div class="logoutbtn">
          <a class="logout" href='logout.php'>Logout</a>
        </div>
      </div>
      <div class="overallfeedback">

        <?php

        $sql1 = "SELECT count(id) as c FROM feedback where q16=1";
        $d1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
        $star1 = $d1['c'];

        $sql2 = "SELECT count(id) as c FROM feedback where q16=2";
        $d2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
        $star2 = $d2['c'];

        $sql3 = "SELECT count(id) as c FROM feedback where q16=3";
        $d3 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));
        $star3 = $d3['c'];

        $sql4 = "SELECT count(id) as c FROM feedback where q16=4";
        $d4 = mysqli_fetch_assoc(mysqli_query($conn, $sql4));
        $star4 = $d4['c'];

        $sql5 = "SELECT count(id) as c FROM feedback where q16=5";
        $d5 = mysqli_fetch_assoc(mysqli_query($conn, $sql5));
        $star5 = $d5['c'];

        $total = $star1 + $star2 + $star3 + $star4 + $star5;

        $per1 = number_format((($star1 / $total) * 100), 1);
        $per2 = number_format((($star2 / $total) * 100), 1);
        $per3 = number_format((($star3 / $total) * 100), 1);
        $per4 = number_format((($star4 / $total) * 100), 1);
        $per5 = number_format((($star5 / $total) * 100), 1);

        $avg = number_format((($star1 * 1 + $star2 * 2 + $star3 * 3 + $star4 * 4 + $star5 * 5) / $total), 1);


        echo '
                <div class="boxall">

                    <div id="piechartall" style="width: 800px; height: 600px;"></div>
                </div>
                <script type="text/javascript">
                    google.charts.load("current", {"packages":["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ["Category", "Percentage"],
                            ["Strongly Disagree",' . $per1 . '],
                            ["Disagree", ' . $per2 . '],
                            ["Moderate", ' . $per3 . '],
                            ["Agree", ' . $per4 . '],
                            ["Strongly Agree", ' . $per5 . ']
                        ]);

                        var options = {
                            title: "Overall Rating ' . $avg . '",
                            titleTextStyle:{
                                fontSize: 20
                            },
                            colors: ["rgb(220, 57, 18)","rgb(255, 153, 0)","rgb(51, 102, 204)","rgb(153, 0, 153)","rgb(16, 150, 24)"]
                        };

                        var chart = new google.visualization.PieChart(document.getElementById("piechartall"));

                        chart.draw(data, options);
                    }
                </script>';
        ?>

      </div>

      <?php

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $style = $_POST['style'];

        $select = $_POST['passing_year'];

        if ($style == "Summary") {

          if ($select == "#") {
            echo '<script> alert("Please select passing year"); </script>';
          } else {

            $sql = "SELECT count(id) as c FROM feedback where passing_year = " . $select . "";
            $d = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $total = $d['c'];

            echo '<div class="reportbox">';

            echo '<style>
                            .boxall{
                                display:none;
                            }
                            </style>';

            if ($total == 0) {
              echo '<div class="headtext">Record Not found for year ' . $select . '</div>';
            } else {
              echo '<div class="headtext">' . $select . ' Feedback Report</div>';
              ?>
            </div>
            <div class="table">
              <table>
                <tr>
                  <th>Question</th>
                  <th>Strongly Agree</th>
                  <th>Agree</th>
                  <th>Moderate</th>
                  <th>Disagree</th>
                  <th>Strongly Disagree</th>
                  <th>Average Rating</th>
                  <th>Grade</th>
                  <th>PieChart</th>
                </tr>

                <?php


                for ($i = 0; $i < 33; $i++) {
                  $q = "q" . $i + 1;

                  $sql1 = "SELECT count(id) as c FROM feedback where " . $q . "=1 and passing_year = " . $select . "";
                  $d1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
                  $star1 = $d1['c'];

                  $sql2 = "SELECT count(id) as c FROM feedback where " . $q . "=2 and passing_year = " . $select . "";
                  $d2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
                  $star2 = $d2['c'];

                  $sql3 = "SELECT count(id) as c FROM feedback where " . $q . "=3 and passing_year = " . $select . "";
                  $d3 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));
                  $star3 = $d3['c'];

                  $sql4 = "SELECT count(id) as c FROM feedback where " . $q . "=4 and passing_year = " . $select . "";
                  $d4 = mysqli_fetch_assoc(mysqli_query($conn, $sql4));
                  $star4 = $d4['c'];

                  $sql5 = "SELECT count(id) as c FROM feedback where " . $q . "=5 and passing_year = " . $select . "";
                  $d5 = mysqli_fetch_assoc(mysqli_query($conn, $sql5));
                  $star5 = $d5['c'];

                  $total = $star1 + $star2 + $star3 + $star4 + $star5;

                  $per1 = number_format((($star1 / $total) * 100), 1);
                  $per2 = number_format((($star2 / $total) * 100), 1);
                  $per3 = number_format((($star3 / $total) * 100), 1);
                  $per4 = number_format((($star4 / $total) * 100), 1);
                  $per5 = number_format((($star5 / $total) * 100), 1);

                  $avg = number_format(($star1 * 1 + $star2 * 2 + $star3 * 3 + $star4 * 4 + $star5 * 5) / $total, 1);
                  $grade = "";
                  $color = "";
                  if ($avg <= 2) {
                    $grade = "Bad";
                    $color = "rgb(220, 57, 18)";
                  } else if ($avg <= 3) {
                    $grade = "Good";
                    $color = "rgb(51, 102, 204)";
                  } else if ($avg <= 4) {
                    $grade = "Very Good";
                    $color = "rgb(153, 0, 153)";
                  } else if ($avg <= 5) {
                    $grade = "Excellent";
                    $color = "rgb(16, 150, 24)";
                  }



                  $que = "Q" . $i + 1;

                  echo '
                  <style>
                      .center' . $i . '{
                          position: fixed;
                          top: 50%;
                          left: 50%;
                          transform: translate(-50%,-50%);
                      }
                      .popup' . $i . '{
                          z-index: 2;
                          text-align: center;
                          opacity: 0;
                          top: -200%;
                          transform: translate(-50%,-50%) scale(0.5);
                          transition: opacity 300ms ease-in-out,
                                      top 1000ms ease-in-out,
                                      transform 1000ms ease-in-out;
                      }
                      .popup' . $i . '.active{
                          opacity: 1;
                          top: 50%;
                          transform:translate(-50%,-50%) scale(1);
                          transition: transform 300ms ease-in-out;
                      }
                      #dismiss-popup' . $i . '{
                          color: white;
                          background: black;
                          padding: 10px 20px;
                          width: 100%;
                      }
                      #dismiss-popup' . $i . ':hover{
                          color: black;
                          background: white;
                      }
                      #open-popup' . $i . '{
                          width:100%;
                          heigth:100%;
                          background-color: ' . $color . ';
                      }
                  </style>
                  <div class="popup' . $i . ' center' . $i . '">
                      <div id="piechart' . $i . '" style="width: 600px; height: 400px;"></div>
                      <button id="dismiss-popup' . $i . '">Dismiss</button>
                  </div>
                  <script type="text/javascript">
                      google.charts.load("current", {"packages":["corechart"]});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                              ["Category", "Percentage"],
                              ["Strongly Disagree",' . $per1 . '],
                              ["Disagree", ' . $per2 . '],
                              ["Moderate", ' . $per3 . '],
                              ["Agree", ' . $per4 . '],
                              ["Strongly Agree", ' . $per5 . ']
                          ]);

                          var options = {
                              title: "' . $questions[$i] . '",
                              titleTextStyle:{
                                  fontSize: 20
                              },
                              colors: ["rgb(220, 57, 18)","rgb(255, 153, 0)","rgb(51, 102, 204)","rgb(153, 0, 153)","rgb(16, 150, 24)"],
                          };

                          var chart = new google.visualization.PieChart(document.getElementById("piechart' . $i . '"));

                          chart.draw(data, options);
                      }
                  </script>
              ';

                  echo '<tr>
                      <td style="background-color: #f2f2f2">' . $que . '</td>
                      <td>' . $per5 . '</td>
                      <td>' . $per4 . '</td>
                      <td>' . $per3 . '</td>
                      <td>' . $per2 . '</td>
                      <td>' . $per1 . '</td>
                      <td>' . $avg . '</td>
                      <td>' . $grade . '</td>
                      <td><button id="open-popup' . $i . '">click</button></td>
                    </tr>
                    <script>
                    document.getElementById("open-popup' . $i . '").addEventListener("click",function(){
                        document.getElementsByClassName("popup' . $i . '")[0].classList.add("active");
                    });
                    document.getElementById("dismiss-popup' . $i . '").addEventListener("click",function(){
                        document.getElementsByClassName("popup' . $i . '")[0].classList.remove("active");
                    });
                    
                    </script>';
                }
            }
          }
        } else {



          if ($select == "#") {
            echo '<script> alert("Please select passing year"); </script>';
          } else {

            echo '<style>
                .boxall{
                    display:none;
                }
                </style>';

            $d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(id) as c FROM feedback where passing_year = " . $select . ""));
            $total = $d['c'];
            echo '<div class="reportbox">';
            if ($total == 0) {
              echo '<div class="headtext">Record Not found for year ' . $select . '</div>';
            } else {

              echo '<div class="headtext">' . $select . ' Feedback Report</div>';
              for ($i = 0; $i < 33; $i++) {

                $q = "q" . $i + 1;

                $sql1 = "SELECT count(id) as c FROM feedback where " . $q . "=1 and passing_year = " . $select . "";
                $d1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
                $star1 = $d1['c'];

                $sql2 = "SELECT count(id) as c FROM feedback where " . $q . "=2 and passing_year = " . $select . "";
                $d2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
                $star2 = $d2['c'];

                $sql3 = "SELECT count(id) as c FROM feedback where " . $q . "=3 and passing_year = " . $select . "";
                $d3 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));
                $star3 = $d3['c'];

                $sql4 = "SELECT count(id) as c FROM feedback where " . $q . "=4 and passing_year = " . $select . "";
                $d4 = mysqli_fetch_assoc(mysqli_query($conn, $sql4));
                $star4 = $d4['c'];

                $sql5 = "SELECT count(id) as c FROM feedback where " . $q . "=5 and passing_year = " . $select . "";
                $d5 = mysqli_fetch_assoc(mysqli_query($conn, $sql5));
                $star5 = $d5['c'];

                $total = $star1 + $star2 + $star3 + $star4 + $star5;

                $per1 = number_format((($star1 / $total) * 100), 1);
                $per2 = number_format((($star2 / $total) * 100), 1);
                $per3 = number_format((($star3 / $total) * 100), 1);
                $per4 = number_format((($star4 / $total) * 100), 1);
                $per5 = number_format((($star5 / $total) * 100), 1);


                echo '
                <div class="box' . $i . '">

                    <div id="piechart' . $i . '" style="width: 600px; height: 400px;"></div>
                </div>
                <script type="text/javascript">
                    google.charts.load("current", {"packages":["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ["Category", "Percentage"],
                            ["Strongly Disagree", ' . $per1 . '],
                            ["Disagree", ' . $per2 . '],
                            ["Moderate", ' . $per3 . '],
                            ["Agree", ' . $per4 . '],
                            ["Strongly Agree", ' . $per5 . ']
                        ]);

                        var options = {
                            title: "' . $questions[$i] . '",
                            titleTextStyle:{
                                fontSize: 20
                            },
                            colors: ["rgb(220, 57, 18)","rgb(255, 153, 0)","rgb(51, 102, 204)","rgb(153, 0, 153)","rgb(16, 150, 24)"]
                        };

                        var chart = new google.visualization.PieChart(document.getElementById("piechart' . $i . '"));

                        chart.draw(data, options);
                    }
                </script>';
              }


              ?>
            </div>
            <div class="table">
              <table>
                <tr>
                  <th>Question</th>
                  <th>Strongly Agree</th>
                  <th>Agree</th>
                  <th>Moderate</th>
                  <th>Disagree</th>
                  <th>Strongly Disagree</th>
                  <th>Average Rating</th>
                  <th>Grade</th>
                </tr>
                <?php


                for ($i = 0; $i < 33; $i++) {

                  $q = "q" . $i + 1;

                  $sql1 = "SELECT count(id) as c FROM feedback where " . $q . "=1 and passing_year = " . $select . "";
                  $d1 = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
                  $star1 = $d1['c'];

                  $sql2 = "SELECT count(id) as c FROM feedback where " . $q . "=2 and passing_year = " . $select . "";
                  $d2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
                  $star2 = $d2['c'];

                  $sql3 = "SELECT count(id) as c FROM feedback where " . $q . "=3 and passing_year = " . $select . "";
                  $d3 = mysqli_fetch_assoc(mysqli_query($conn, $sql3));
                  $star3 = $d3['c'];

                  $sql4 = "SELECT count(id) as c FROM feedback where " . $q . "=4 and passing_year = " . $select . "";
                  $d4 = mysqli_fetch_assoc(mysqli_query($conn, $sql4));
                  $star4 = $d4['c'];

                  $sql5 = "SELECT count(id) as c FROM feedback where " . $q . "=5 and passing_year = " . $select . "";
                  $d5 = mysqli_fetch_assoc(mysqli_query($conn, $sql5));
                  $star5 = $d5['c'];

                  $total = $star1 + $star2 + $star3 + $star4 + $star5;

                  $per1 = number_format((($star1 / $total) * 100), 1);
                  $per2 = number_format((($star2 / $total) * 100), 1);
                  $per3 = number_format((($star3 / $total) * 100), 1);
                  $per4 = number_format((($star4 / $total) * 100), 1);
                  $per5 = number_format((($star5 / $total) * 100), 1);

                  $avg = number_format(($star1 * 1 + $star2 * 2 + $star3 * 3 + $star4 * 4 + $star5 * 5) / $total, 1);
                  $grade = "";
                  if ($avg <= 2)
                    $grade = "Bad";
                  else if ($avg <= 3)
                    $grade = "Good";
                  else if ($avg <= 4)
                    $grade = "Very Good";
                  else if ($avg <= 5)
                    $grade = "Excellent";



                  $que = "Q" . $i + 1;

                  echo '<tr>
                    <td style="background-color: #f2f2f2">' . $que . '</td>
                    <td>' . $per5 . '</td>
                    <td>' . $per4 . '</td>
                    <td>' . $per3 . '</td>
                    <td>' . $per2 . '</td>
                    <td>' . $per1 . '</td>
                    <td>' . $avg . '</td>
                    <td>' . $grade . '</td>
                </tr>';
                }
            }
          }
        }
      }

      ?>
    </div>

  </div>
  </div>
  </div>

</body>

</html>
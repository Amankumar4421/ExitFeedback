<?php
session_start();
if (!isset($_SESSION['SESSION_ID'])) {
  header("Location: index.php");
  die();
} else if ($_SESSION['SESSION_ID'] == 'admin') {
  header("Location: reportinit.php");
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

$index = array(
  "spos",  "ssolving",  "slow",  "sltp",  "selectives",  "stexpectations",  "scomposition",  "lab",  "project",  "innovativeproject",  "counhelp",  "concrete",  "assign",  "facultycounselor",  "recomm",  "overallrate",  "comfort",  "canteen",  "afford",  "access",  "trainers",  "oppo",  "exe",  "nuture",  "conduction",  "otherins",  "enhance",  "community",  "overalldevelop",  "prob",  "fin",  "envi",  "unbiased"
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'config.php';

  $sql = "SELECT * FROM users WHERE id='{$_SESSION['SESSION_ID']}'";
  $query = mysqli_query($conn, $sql);

  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $id = $row['id'];


    // ACADEMICS & TRAINING
    $spos = $_POST['spos'];
    $ssolving = $_POST['ssolving'];
    $slow = $_POST['slow'];
    $sltp = $_POST['sltp'];
    $selectives = $_POST['selectives'];
    $stexpectations = $_POST['stexpectations'];
    $scomposition = $_POST['scomposition'];
    $lab = $_POST['lab'];
    $project = $_POST['project'];
    $innovativeproject = $_POST['innovativeproject'];

    // COUNSELING SYSTEM
    $counhelp = $_POST['counhelp'];
    $concrete = $_POST['concrete'];
    $assign = $_POST['assign'];
    $facultycounselor = $_POST['facultycounselor'];
    $recomm = $_POST['recomm'];
    $overallrate = $_POST['overallrate'];

    // CAMPUS ENVIRONMENT
    $comfort = $_POST['comfort'];
    $canteen = $_POST['canteen'];
    $afford = $_POST['afford'];
    $access = $_POST['access'];
    $trainers = $_POST['trainers'];
    $oppo = $_POST['oppo'];
    $exe = $_POST['exe'];
    $nuture = $_POST['nuture'];
    $conduction = $_POST['conduction'];
    $otherins = $_POST['otherins'];
    $enhance = $_POST['enhance'];
    $community = $_POST['community'];
    $overalldevelop = $_POST['overalldevelop'];
    $prob = $_POST['prob'];
    $fin = $_POST['fin'];
    $envi = $_POST['envi'];
    $unbiased = $_POST['unbiased'];

    $sql1 = "SELECT passing_year FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $passingYear = $row["passing_year"];

    $sql2 =  "SELECT * FROM feedback WHERE id='$id'";
    $query3 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($query3) > 0) {
      echo "<script>alert('Already Submitted!');</script>";
    } else {
      $sql3 = "INSERT INTO feedback VALUES('{$id}','{$passingYear}','{$spos}','{$ssolving}','{$slow}','{$sltp}','{$selectives}','{$stexpectations}','{$scomposition}','{$lab}','{$project}','{$innovativeproject}','{$counhelp}','{$concrete}','{$assign}','{$facultycounselor}','{$recomm}','{$overallrate}','{$comfort}','{$canteen}','{$afford}','{$access}','{$trainers}','{$oppo}','{$exe}','{$nuture}','{$conduction}','{$otherins}','{$enhance}','{$community}','{$overalldevelop}','{$prob}','{$fin}','{$envi}','{$unbiased}')";
      $result3 = mysqli_query($conn, $sql3);
      if ($result3) {
        echo "<script>if(confirm('Feedback Submitted Successfully!')){document.location.href='logout.php'};</script>";
      } else {
        echo "<script>alert('Please Try Again!');</script>";
      }
    }
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>vignan feedback</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Bitter', serif;
      font-family: 'Lora', serif;
    }

    body {
      background: rgba(99, 194, 110, 0.1);
    }

    .container {
      display: flex;
      justify-content: center;
    }

    .form {
      display: flexbox;
      justify-content: center;
      margin-top: 20px;
      border-radius: 20px;
      width: 75%;
      box-shadow: 0 0 20px lightblue;
      background-color: #ebf7f9;

    }

    @media (max-width:650px) {
      .form {
        width: 90%;
      }

      .rating {
        margin: 20px 100px;
      }
    }

    .head h1 {
      text-align: center;
    }

    .head p {
      margin: 15px 30px;
      text-align: justify;
    }

    .category {
      font-style: italic;
      margin-top: 30px;
      margin-left: 30px;
    }

    .q {
      margin-top: 20px;
      margin-left: 30px;
      margin-right: 30px;
      text-align: justify;
      text-align: center;
      font-weight: bold;
    }

    .rating {
      margin: 10px 100px;
      display: flex;
      flex-direction: row-reverse;
      justify-content: space-around;
    }

    .rating input {
      appearance: none;
      -webkit-appearance: none;
    }

    .rating input::before {
      content: '\f005';
      font-family: fontAwesome;
      font-size: 35px;
      opacity: 0.2;
    }


    .rating .five:hover::before,
    .rating .five:checked~input::before,
    .rating .five:checked::before {
      color: green;
      opacity: 1;
    }

    .rating .four:hover::before,
    .rating .four:checked~input::before,
    .rating .four:checked::before {
      color: #b7dd29;
      opacity: 1;
    }


    .rating .three:hover::before,
    .rating .three:checked~input::before,
    .rating .three:checked::before {
      color: gold;
      opacity: 1;
    }

    .rating .two:hover::before,
    .rating .two:checked~input::before,
    .rating .two:checked::before {
      color: #ffa534;
      opacity: 1;
    }

    .rating .one:hover::before,
    .rating .one:checked~input::before,
    .rating .one:checked::before {
      color: red;
      opacity: 1;
    }



    .text {
      margin: 0px 10%;
      display: flex;
      justify-content: space-around;
    }

    .thick {
      border: 2px solid black;
      margin: 10px 30px;
    }

    .thin {
      margin: 10px 120px;
    }

    .btn {
      display: flex;
      justify-content: center;
    }

    .submit-button {
      width: 200px;
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      background-color: #3498db;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin: 50px 0px;
    }

    .submit-button:hover {
      background-color: #2980b9;
    }

    .submit-button:focus {
      outline: none;
      box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    .submit-button:active {
      background-color: #1c6da8;
    }

    .description {
      margin: 0px 30px;
      font-weight: bold;
      text-align: center;
    }

    .head h3 {
      text-align: right;
      margin-right: 20px;
      margin-top: 10px;
    }

    .head h3 a {
      text-decoration: none;
      font-size: 20px;
    }

    #video-background {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
    }
  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@300;400;500;700&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
  <video autoplay loop muted id="video-background">
    <source src="bg-video.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <form action="feedback.php" method="post">
    <div class="container">
      <div class="form">
        <div class="head">
          <h3><a class="logout" href='logout.php'>Logout</a></h3>
          <h1>SATISFACTION SURVEY </h1>
          <p>Dear Student,</p>
          <p>We congratulate you for successfully entering into your final semester of the course work, as it is the culmination of several years of persistence, focus and hard work. It is likely one of the final interactions with you and we wanted to have honest feedback about the institute so that we can improve on the aspects which we are lagging in for the betterment of your juniors.</p>
          <p>This analysis will be monitored discretely without disclosing the individual's feedback. So, we request you to give your honest feedback by selecting appropriate option for the following points:</p>
        </div>

        <div class="description">
          1-Highly dissatisfied | 2-dissatisfied | 3-Fair | 4-Satisfied | 5-Highly Satisfied
        </div>


        <h2 class="category">ACADEMICS & TRAINING</h2>
        <hr class="thick">

        <?php

        for ($i = 0; $i < 10; $i++) {

          echo '
          <div class="q">
            ' . $questions[$i] . '
          </div>
          <div class="rating">
            <input type="radio" name="' . $index[$i] . '" class="five" id="5" value="5" required>
            <input type="radio" name="' . $index[$i] . '" class="four" id="4" value="4">
            <input type="radio" name="' . $index[$i] . '" class="three" id="3" value="3">
            <input type="radio" name="' . $index[$i] . '" class="two" id="2" value="2">
            <input type="radio" name="' . $index[$i] . '" class="one" id="1" value="1">
          </div>
          <hr class="thin">';
        }

        ?>

        <h2 class="category">COUNSELING SYSTEM</h2>
        <hr class="thick">


        <?php

        for ($i = 10; $i < 16; $i++) {

          echo '
          <div class="q">
            ' . $questions[$i] . '
          </div>
          <div class="rating">
            <input type="radio" name="' . $index[$i] . '" class="five" id="5" value="5" required>
            <input type="radio" name="' . $index[$i] . '" class="four" id="4" value="4">
            <input type="radio" name="' . $index[$i] . '" class="three" id="3" value="3">
            <input type="radio" name="' . $index[$i] . '" class="two" id="2" value="2">
            <input type="radio" name="' . $index[$i] . '" class="one" id="1" value="1">
          </div>
          <hr class="thin">';
        }

        ?>

        <h2 class="category">CAMPUS ENVIRONMENT</h2>
        <hr class="thick">

        <?php

        for ($i = 16; $i < 33; $i++) {

          echo '
          <div class="q">
            ' . $questions[$i] . '
          </div>
          <div class="rating">
            <input type="radio" name="' . $index[$i] . '" class="five" id="5" value="5" required>
            <input type="radio" name="' . $index[$i] . '" class="four" id="4" value="4">
            <input type="radio" name="' . $index[$i] . '" class="three" id="3" value="3">
            <input type="radio" name="' . $index[$i] . '" class="two" id="2" value="2">
            <input type="radio" name="' . $index[$i] . '" class="one" id="1" value="1">
          </div>
          <hr class="thin">';
        }

        ?>

        <div class="btn">
          <button type="submit" class="submit-button">SUBMIT</button>
        </div>
      </div>
    </div>
  </form>
</body>

</html>
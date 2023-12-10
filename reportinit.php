<?php
session_start();
if (!isset($_SESSION['SESSION_ID'])) {
    header("Location: index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vignan Feedback Report</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .box {
            width: 200px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }
        .box form{
            height: 100%;
            width: 100%;
        }
        .box form button{
            height: 100%;
            width: 100%;
            font-size: 30px;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            border-radius: 10px;
            border: 1px solid yellow;
            background-color: whitesmoke;
            transition: all 0.5s linear;
        }
        .box form button:hover{
            background-color: #bebebe;
        }
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }
        a{
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 20px;
            text-decoration: none;
            color: yellow;
        }
    </style>
</head>

<body>
    <video autoplay loop muted id="video-background">
        <source src="bg-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <a href="logout.php">Logout</a>
    <div class="container">
        <div class="box">
            <form action="report.php" method="get">
                <button type="submit">Feedback Report</button>
            </form>
        </div>
        <div class="box">
            <form action="slamReport.php" method="get">
                <button type="submit">SlamBook Report</button>
            </form>
        </div>
    </div>
</body>

</html>
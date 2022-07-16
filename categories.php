<?php
    session_start();
    include('connect.php');
    if(isset($_POST["ansubmit"])){
        function valid($data){
            $data = trim(stripslashes(htmlspecialchars($data)));
            return $data;
        }
        $answer = valid($_POST["answer"]);
        if($answer == NULL){
            echo "<script>window.alert('Please Enter something.');</script>";
        }
        else{
            $que = "";
            if($_POST["nul"]==0){
                if(strpos($_POST["preby"],$_SESSION["user"]) === false)
                    $que = "update quans set answer=CONCAT(answer,'<br>or<br>".$_POST["answer"]."'), answeredby=CONCAT(answeredby,', @ ".$_SESSION["user"]."') where question like '%".$_POST["question"]."%'";
                else
                    $que = "update quans set answer=CONCAT(answer,'<br>or<br>".$_POST["answer"]."'), answeredby = '".$_SESSION["user"]."' where question like '%".$_POST["question"]."%'";
            }
            else
                $que = "update quans set answer='".$_POST["answer"]."', answeredby = '".$_SESSION["user"]."' where question like '%".$_POST["question"]."%'";
            if(mysqli_query($conn,$que))
                echo "<style>#box0,.open{display: none;} #tb{display: block;}</style>";
            else
                header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Interrogate </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
        <!-- Sripts -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <style>
            textarea{
                display: none;
                width: 300px;
                height: 50px;
                background: #333;
                color: #ddd;
                padding: 10px;
                margin: 5px 0 -14px; 
            }
            .ans_sub{
                display: none;
                padding: 0 10px;
                height: 30px;
                line-height: 30px;
            }
            .pop{
                display: none;
                text-align: center;
                margin: 195.5px auto;
                font-size: 12px;
            }
        </style>
    </head>
    <body id="_3">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">i</div><div id="cir">i</div><div id="ntro">nterrogate</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li >Home</li></a>
            <a href="categories.php"><li id="home">Categories</li></a>
            <a href="contacts.php"><li>About Us</li></a>
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <a href="ask.php"><li>Ask Question</li></a>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li>Sign Up</li></a>
            <?php
                }
                else{
            ?>
            <?php if($_SESSION['Type'] != "MENTOR") {?> 
                <a href="ask.php"><li>Ask Question</li></a>
                <?php } ?>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        <!-- content -->
        <div id="content">
            <h4>
                <a id="title-head" href="categories.php">Categories</a>
            </h4>
            <div id="box0">
                <form method="GET">
                <center>
                    <?php 
                        $i = 1;
                        $q = 'select id, name, description from category';
                        $r = mysqli_query($conn,$q);
                        while($d = mysqli_fetch_assoc($r)) {
                    ?>
                    <a href="questions.php?cat_id=<?php echo $d['id'];?>">
                        <div  class="img">
                            <div id="p" title="Open"><?php echo $d['name']?></div>
                        </div>
                    </a>
                    <?php 
                    if($i%3==0)
                        echo '<br>';
                    $i++;
                    } ?>
                </center>
                </form>
                <?php if($_SESSION['Type']=="MENTOR") {?>
                <center>
                    <a class="img1" href="createdomain.php">
                        <div id="p1">Create Domain</div>
                    </a>
                </center>
                <?php }?>
            </div>
            
            
        </div><!-- content -->
        <!-- Footer -->
        <div id="footer"></div>
    </body>
</html>
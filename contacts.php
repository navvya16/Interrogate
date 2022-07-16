<?php
    session_start();
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
    </head>
    <body id="_4">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">i</div><div id="cir">i</div><div id="ntro">nterrogate</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li >Home</li></a>
            <a href="categories.php"><li >Categories</li></a>
            <a href="contacts.php"><li id="home">About Us</li></a>
            
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
        <div id="content" class="clearfix">
            
            <div id="box-1">
                <div class="heading">
                    <center>
                    <h1 class="logo"><div id="i">i</div><div id="cir">i</div><div id="ntro">nterrogate</div></h1>
                    <p id="tag-line">where questions are themselves the answers</p>
                    </center>
                </div>
            </div>
            <div id="box-2">
                <div id="text">
                    <h1>Interrogate</h1>
                    <p style="line-height: 20px;">
                    This Online Q&A platform focuses on answering the questions one might put up <br>
                    on an online platform.<br><br>
                        Done by: <br>
                            Ishwarya Rani M - 2019103527<br>
                            Navvya L - 2019103548<br>
                            Vishnupriya N - 2019103599<br>
                    </p>
                </div>
            </div>
            
        </div>
    
        <!-- Footer -->
        <div id="footer"></div>        
        
    </body>
    
</html>
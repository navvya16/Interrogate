<?php
    session_start();
    include('connect.php');
    if(!isset($_SESSION['user']))
        header("location: login.php");
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
    <body id="ask">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">i</div><div id="cir">i</div><div id="ntro">nterrogate</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            <a href="categories.php"><li id="home">Categories</li></a>
            <a href="contacts.php"><li>About Us</li></a>
            <a href="ask.php"><li>Ask Question</li></a>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
        </ul>
        
        <!-- content -->
        <div id="content">
            <h4>
                <a id="title-head" href="createdomain.php">Create Domain</a>
            </h4>
            <div id="sf">
                <center>
                    <div class="heading ask">
                        <h1 class="logo"><div id="i">i</div><div id="cir">i</div><div id="ntro">nterrogate</div></h1>
                        <p id="tag-line">where questions are themselves the answers</p>
                    </div>

                    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">

                        <input style="display:block;" name="domainname" type="text" title="Domain name" placeholder="Domain name" id="domain">
                        <input style="display:block;" name="description" type="text" title="Description" placeholder="Description" id="domain">
                        
                        <input name="submit" type="submit" class="up-in" id="ask_submit">
                    </form>
                </center>
            </div>
        </div>
                
        <?php
        
            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }
                $domainname = valid( $_POST["domainname"] );
                $description = valid( $_POST["description"]);
                $domainname = addslashes($domainname);
                $description = addslashes($description);
                $q = "INSERT INTO category values( NULL, '$domainname', '$description')";
                $result = mysqli_query($conn,$q);
                if(mysqli_error($conn))
                    echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                else{
                    header("Location:categories.php");
                }
                
                
                mysqli_close($conn);
            }
        
        ?>
        <!-- Footer -->
        <div id="footer"></div>        
        
        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>
        
    </body>
    
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>CODISTAN > Sign up</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <!-- start header div --> 
    <div id="header">
        <h3>CODISTAN > Sign up</h3>
    </div>
    <!-- end header div -->   
     
    <!-- start wrap div -->   
    <div id="wrap">
        <!-- start PHP code -->
        <?php
         error_reporting(E_ALL); ini_set('display_errors', 'On');

            $con =mysqli_connect('localhost','828110','aryamanisme','828110') or die(mysql_error()); // Connect to database server(localhost) with usernand password. 
            // Select registration database.
              mysqli_select_db($con,"828110");
            
             if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
              $email = $_GET['email']; // Set email variable
               $hash = $_GET['hash']; // Set hash variable
                $sql="select * from subscribe where Email='$email' AND Hash='$hash' AND active=0" ;
                $search = mysqli_query($con,$sql) or die(mysql_error()); 
                $Query_Count = mysqli_fetch_array($search, MYSQLI_NUM);
                $match  = $Query_Count[0];
                 
            if($match > 0){
        // We have a match, activate the account
                mysqli_query($con,"UPDATE subscribe SET Active='1' WHERE Email='".$email."' AND Hash='".$hash."' AND Active='0'") or die(mysql_error());
                echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}
            
        ?>
        <!-- stop PHP Code -->
 
         
    </div>
    <!-- end wrap div --> 
</body>
</html>
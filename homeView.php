<!-- TODO put session start -->
<!-- TODO remove code duplication -->

<!DOCTYPE html>
<html lang="en">
<head>
  
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>INFO2180 Project 2</title>
 <link rel="stylesheet" href="style.css" type="text/css">
 <script src="script.js"></script>
 <script src="https://kit.fontawesome.com/0d4c0a0b4d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    
    <div class="container">
        <img src="Antivirus.png" alt="Icon of a computer bug" width="50" height="50" />
        <h1><div id="box1" class="flex-item">BugMe Issue Tracker</div></h1>
    
    </div>
    </header>
    
    <aside>
        <?php
         require_once 'adminMenu.php';
         require_once 'userMenu.php';

        if (/*isset($_SESSION['admin'])*/ true) {
            //TODO Shows different options based on admin status 

             echo $adminMenu;
             
        } else if (/*isset($_SESSION['user'])*/ false) {
            echo  $userMenu;  
        } 
        
        ?>
    </aside>
    <main>
    <div id="dashBoard"></div>
    <?php
    

    if (/*isset($_SESSION['user']) || isset($_SESSION['admin'])*/true) {
        echo '<div class="newI">
        <h1>Issues</h1>
        <a href="newissue.php">Create New Issue </a>
        </div>';   
    
        //TODO Radio button Not done correctly
        echo '<div class="filter-group"> 
        Filter by: 
        <button type="radio" name="filter" class="button">ALL</button>
        <button type="radio" name="filter" class="button">OPEN</button>
        <button type="radio" name="filter" class="button">MY TICKETS</button>
        </div>';
            } else {
                echo '<form class="form-group" action="loginuser.php" method="post">
        
                <p>Password </p>
                <input id="passWord" type="password" name="password">
                
                <p>Email </p>
                
                <input id="email" type="email" name="emailAddress">
                <br>
                <br>
                <button type="submit" name="login-user" class="button">Submit</button>
            
            </form>';
            }
            ?>
            
        </main>
        
    <footer>
        <footer><div id="box3" class="grid-item"> </div></footer>

    <p>Copyright &copy; 2021, Group</p>
    </footer>
    
        
    
    </main>
    
</body>
</html> 
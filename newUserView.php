
<!DOCTYPE html>
<html lang="en">
<head>
  
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>INFO2180 Project 2</title>
 <link rel="stylesheet" href="style.css">
 <script src="script.js"></script>
 <script src="https://kit.fontawesome.com/0d4c0a0b4d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    
    <div class="container">
        <img src="Antivirus.png" alt="computer bug" width="50" height="50" />
        <h1><div id="box1" class="flex-item">BugMe Issue Tracker</div></h1>
    
    </div>
    </header>
    
    <aside>
    <?php
         require_once 'adminMenu.php';
         require_once 'userMenu.php';
         
        if (/*isset($_SESSION['admin'])*/ true) { // If admin show this 
            //TODO Configure if admin

            echo $adminMenu;
        } 
        else if (/*$_SESSION['user']*/ false) //if regular user
        {
            echo  $userMenu; 
        } 
        ?>     
    </aside>
            <main>
        <div id="newUserForm">
                        <h1>New User</h1>
                        <?php
                          
                            // if (isset($_SESSION['email'])){
                            // echo $_SESSION['email'];
                            // }
                        ?>
                        <form class="form-group" action="Action.php" method="post">
                        <!-- TODO Add action  -->
                            <p>Firstname</p>
                            <input id="firstN" type="text" name="firstname">
                            <br>
                            <p>Lastname</p> 
                            <input id="lastN" type="text" name="lastname">
                            <br>
                           <p>Password</p>
                            <input id="passWord" type="password" name="password">
                            <br>
                            <p>Email</p> 
                            <input id="email" type="email" name="emailAddress">
                            <br>
                            <br>
                            <button type="submit" name="add-user" class="button">Submit</button>
                        
                        </form>
                    </div>
                    <footer>
                <footer><div id="box3" class="grid-item"> </div></footer>
                <br>
                <p>Copyright &copy; Group</p>
                </footer>
            
                
            
    </main>
    
</body>
</html> 
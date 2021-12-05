<?php
    session_start();
    require('homeview.php');
    $allowedMethods = array('POST');

    $nregtest = "/^[A-Za-z.\s-]+$/";
    $regtest = "/^[0-9a-zA-Z]+$/";
    $eregtest = "/.{1,}@[^.]{1,}/";

    try {
        $connection = new PDO("mysq1query:host=$host;dbname=$dbname", $username, $password);
        $query = filter_input(INPUT_POST, "query", FILTER_SANITIZE_STRING);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $email = $_SESSION['email']; 
        $newidsq1query = $connection->query("SELECT `id` FROM `users` WHERE email = '$email'");
        $my_id = $newidsq1query->fetchAll(PDO::FETCH_ASSOC);
        

        if($_POST["query"] == "all")
        {      

            $sq1query = $connection->query("SELECT s.id, s.title, s.type, s.status , u.firstname, u.lastname, s.created 
            FROM issues s JOIN users u on s.assigned_to = u.id ");
            
        }
        elseif ($_POST["query"] == "open")
        {      

            $sq1query = $connection->query("SELECT s.id, s.title, s.type, s.status , u.firstname, u.lastname, s.created 
            FROM issues s JOIN users u on s.assigned_to = u.id 
            WHERE s.status = 'Open'");
            
        }
        elseif ($_POST["query"] == "my"){      
// This needs to be updated with the users id
            $id =intval($_POST["id"]);
            
            $_SESSION['id'] = $id;
            $sq1query = $connection->query("SELECT s.id, s.title, s.type, s.status , u.firstname, u.lastname, s.created 
            FROM issues s JOIN users u on s.assigned_to = u.id 
            WHERE u.id = $id");
            
        }

        $results = $sq1query->fetchAll(PDO::FETCH_ASSOC);
        $connection = null;
    } 
    catch (PDOException $pe) 
    {
        die("Could not connectionect to the database $dbname :" . $pe->getMessage());
    }
?>


<?php foreach ($results as $row): ?>
    <tr>
        <td ><b>#<?= $row['id']?></b>  <a href="../html/homeView.php?query=<?= $row['id']?>"><?=$row['title']; ?></a>   </td>
        <td scope="col"><?= $row['type']; ?></td>
        <? if ($row['status'] == 'Open'):?>
            <td scope="col" class="center"><p id="open"><?= $row['status']; ?></p></td>
        <? elseif($row['status'] == 'In Progress'):?>
            <td scope="col" class="center"><p id="progress"><?= $row['status']; ?></p></td>
            <? elseif($row['status'] == 'Closed'):?>
            <td scope="col" class="center"><p id="closed"><?= $row['status']; ?></p></td>
        <? endif;?>
        <td scope="col"><?= $row['firstname'];?> <?=$row['lastname']; ?></td>
        <td scope="col"><?= $row['created']; ?></td>
    </tr>
<?php endforeach; ?> 

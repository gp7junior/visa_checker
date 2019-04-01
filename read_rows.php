<?php
    include "db.php";    
    include "header.php"; 
?>

    <div class="container">
        <div class="col-sm-6">
        <h1 class="text-center">Read</h1>
        <pre>
            <?php //readRows(); 
            global $connection; // because the connection variable is somewhere else, we need to include it here as a global variable.

            $query  = "SELECT * FROM COUNTRIES";
            $result = mysqli_query($connection, $query);
        
            if(!$result){
                die('query failed' . mysqi_error());
            } 
        
            while($row = mysqli_fetch_assoc($result)){ 
                print_r($row);
            }
            
            ?>
        </pre>
        </div>
    </div>
    <?php include "footer.php"; ?>
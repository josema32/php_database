<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Record</title>
    </head>
    <body>
        <?php
            $cisserver = new mysqli('cis.luzerne.edu', 'jr0011', 'ju2k1eqR','jr0011');
            if ($cisserver->connect_error)
            {
                //A connection error has occurred.
                echo "<p>Sorry, we cannot connect to the database. Please try ";
                echo "again later.</p>";
                echo "<p>Error: " . $cisserver->connect_error . "</p>";
            }
            else 
            {
                $delete=$cisserver->query("delete from addresbook where id=". $_POST['id']). "\";";
                    
                if ($delete==false)
                {
                    echo "<p>Sorry, an error ocurred while deleting your address.</p>";
                }
                else 
                {
                    echo "<p>Your address has been deleted.</p>";
                }
                
            $cisserver->close();
            }
        ?>
        <a href="index.php">Return to address book.</a>
    </body>
</html>

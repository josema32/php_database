<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $button=$_POST['button'];
            if ($button=="Save Address")
            {
                //User Clicked to save the address.
                //Think about user input, you don't want anything that drops the table en 
                //inserting information into a database table.
                
                $id= addslashes($_POST['id']);
                $firstname=addslashes($_POST['firstname']);
                $lastname=addslashes($_POST['lastname']);
                $street=addslashes($_POST['street']);
                $city=addslashes($_POST['city']);
                $state=addslashes($_POST['state']);
                $zip=addslashes($_POST['zip']);
                $email=addslashes($_POST['email']);
                
                //In the sql statement parse single quotations for strings, not needed for int, etc.
                //sql injection attack
                
                $sql="insert into addressbook values (" .$id.", '". 
                        $firstname."', '" . $lastname."', '" . $street . 
                        "', '" . $city . "', '". $state . "', '". $zip .
                        "', '" . $email."');";
                                                                                            
                echo $sql;
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
                    $insert=$cisserver->query($sql);
                        if ($addresses==false)
                        {
                            //Query did not work.
                            echo "<p>Error performing query - Error is : " . $cisserver->error . "</p>";
                        }
                        else 
                        {
                        
                        }
                    }
            }
            else 
            {
                //User clicked cancel.
                echo"<p>The address has not been saved at your request!</p>";
            }
            
        ?>
    </body>
</html>

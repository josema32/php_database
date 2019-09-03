<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
                //Valid connection has been stablished.
                //echo "<p>Client info: " . $cisserver->client_info . "</p>";
                //echo "<p>Host info: " . $cisserver->host_info . "</p>";
                //echo "<p>Protocol version: " . $cisserver->protocol_version . "</p>";
                //echo "<p>Server info: " . $cisserver->server_info . "</p>";
                
                $sql="select lastname, firstname, id from addressbook order by lastname, firstname";
                $addresses = $cisserver->query($sql);
                if ($addresses==false)
                {
                    //Query did not work.
                    echo "<p>Error performing query - Error is : " . $cisserver->error . "</p>";
                }
                else 
                {
                    //Query was successful.
                    if ($addresses->num_rows==0)
                    {
                        echo "<p>Our addressbook contains no addreses.</p>";
                    }
                    else
                    {
                        echo "<p>Our addressbook contains " . $addresses->num_rows . " addresses.</p>";
                        echo "<table>";
                        echo "<tr><th>Last Name</th><th>First Name</th></tr>";
                        /*
                        $address=$addresses->fetch_row();
                        while ($address!=false)
                        {
                            echo "<tr>";
                            //echo "<tr><td>" . $address[0] . "</td><td>" . $address[1] . "</td>";
                            for ($fieldnum=0; $fieldnum<count($address); $fieldnum++)
                            {
                                echo "<td>" . $address[$fieldnum] . "</td>";
                            }
                            echo "</tr>";
                            $address=$addresses->fetch_row();
                        }
                        */
                        $address=$addresses->fetch_assoc();
                        while($address!=false)
                        {
                            echo "<tr>";
                            echo "<td>" . $address['lastname'] . "</td><td>" . $address['firstname'] . "</td>" .
                                    "<td><a href=\"delete.php\" id=". $address['id']. ">Delete</a></td>";
                            $address=$addresses->fetch_assoc();
                        }
                        echo "</table>";
                    }
                    $addresses->free(); //Free the result set.
                }
                $cisserver->close();//Closes the connection, always do as good developer practice.
                echo "<p><a href=\"newaddress.html\">Add a new address</a></p>";
            }
        ?>
    </body>
</html>

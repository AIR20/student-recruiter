<?php
    $username = "u3ac"; 
    $password = "4pH";   
    $host = "mysql";
    $database="u3ac";
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT CONCAT('01-', date_format(registered_at,    '%b'), '-', date_format(registered_at, '%y')) as date, COUNT(id) as users FROM     users GROUP BY month(registered_at) ORDER BY registered_at"; 
    $query = mysql_query($myquery);
    
    if ( ! $query ) {
        echo mysql_error();
        die;
    }
    
    $data = array();
    
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        $data[] = mysql_fetch_assoc($query);
    }
    
    echo json_encode($data);     
     
    mysql_close($server);
?>

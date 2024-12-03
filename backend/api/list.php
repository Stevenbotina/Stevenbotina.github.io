<?php

require ("../config/db_connection.php"); 

try {

    $sql = "SELECT id, first_name, last_name, email FROM clientes"; 
    $result = pg_query($conn, $sql);

    if (!$result) {
        throw new Exception("Error en la consulta: " . pg_last_error($conn));
    }


    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "</tr>";
    }


    pg_free_result($result);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

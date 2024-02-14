<?php
        $host = "localhost";
        $user = "root";
        $pass = "";

        $conn = new mysqli($host,$user,$pass);
        $conn->select_db('firma_kurierska2023');
        $sql = "SELECT * FROM kurier";
        $result = $conn->query($sql);

        // Display data in HTML table
        if ($result->num_rows > 2) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Imie</th><th>Nazwisko</th><th>Telefon</th><th>Godz. od.</th><th>Godz. do.</th> <th>Oddział</th></tr>";
        while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id_kr"]."</td>";
                echo "<td>".$row["imie_kr"]."</td>";
                echo "<td>".$row["nazwisko_kr"]."</td>";
                echo "<td>".$row["telefon_kr"]."</td>";
                echo "<td>".$row["godziny_od"]."</td>";
                echo "<td>".$row["godziny_do"]."</td>";
                echo "<td>".$row["id_oddzialu"]."</td>";
                echo "</tr>";
        }
                echo "</table>";
        } else {
                echo "0 results";
}

?>
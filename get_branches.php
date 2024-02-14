<?php
                $host = "localhost";
                $user = "root";
                $pass = "";

                $conn = new mysqli($host,$user,$pass);
                $conn->select_db('firma_kurierska2023');
                $sql = "SELECT * FROM oddzial_firmy";
                $result = $conn->query($sql);

                // Display data in HTML table
                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Nazwa Oddziału</th><th>Ulica</th><th>Nr Domu</th><th>Nr Lokalu</th><th>Kod Pocztowy</th><th>Miasto</th><th>Telefon</th><th>Email</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["id_oddzialu"]."</td>";
                        echo "<td>".$row["nazwa_oddzialu"]."</td>";
                        echo "<td>".$row["ulica_oddzialu"]."</td>";
                        echo "<td>".$row["nr_domu_oddzialu"]."</td>";
                        echo "<td>".$row["nr_lokalu_oddzialu"]."</td>";
                        echo "<td>".$row["kod_oddzialu"]."</td>";
                        echo "<td>".$row["miasto_oddzialu"]."</td>";
                        echo "<td>".$row["tel_oddzialu"]."</td>";
                        echo "<td>".$row["email_oddzialu"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                echo "0 results";
            }
            ?>
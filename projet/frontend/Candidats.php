<table class="content-table">
        <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>telephone</th>
                    <th>voir CV</th>
                    <th>action</th>
                </tr>
        </thead>
        <tbody>
            <?php
                session_start();
                include_once('../../database.php');



                $entreprise_id = $_SESSION['entreprise_id'];


                $sql = "SELECT clients.nom_complet, clients.telephone,clients.cv,postulations.postulation_id, clients.email, postulations.date_postulation 
                        FROM postulations 
                        INNER JOIN clients ON postulations.client_id = clients.client_id
                        WHERE postulations.entreprise_id = $entreprise_id AND postulations.acceptee=0";

                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    
                    
                    while($row = $result->fetch_assoc()) {
                        echo"<tr class='tmargin'>
                            <td>". $row["nom_complet"] ."</td>
                            <td>". $row["email"] ."</td>
                            <td>". $row["telephone"] ."</td>
                            <td><a href='../../modeles_cv_gratuit_17.jpg' target='_blank'>Voir CV</td>
                            <form action='../../auth/traitement_demande.php' method='post'>
                            <input type='hidden' name='postulation_id' value='" . $row["postulation_id"] . "'>
                            <td><button class='voscandidat' type='submit' name='accepter'>Accepter</button><button class='voscandidat' type='submit' name='refuser'>Refuser</button></td>
                            </form>
                        </tr>";
                    
                    }
                
                
                } 
            ?>

        </tbody>
</table>

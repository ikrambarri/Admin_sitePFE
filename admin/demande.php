<?php
require("../ServiceCR/connexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <!-- 
        - favicon
    -->
    <link rel="shortcut icon" href="../images/logo.png" type="image/svg+xml+png">

    <title>Admin_E-City</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/profil_admin.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../images/logo.png" class="logo" alt="TeatroStore">
                        </span>
                        <span class="title">E-City</span>
                    </a>
                </li>

                <li>
                    <a href="profil_admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="add_admin.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="title">Add Admin</span>
                    </a>
                </li>

                <li>
                    <a href="demande.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Demande</span>
                    </a>
                </li>

                <li>
                    <a href="add_service.php">
                        <span class="icon">
                            <ion-icon name="add-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Add service</span>
                    </a>
                </li>

                <li>
                    <a href="createur_Srv.php">
                        <span class="icon">
                            <ion-icon name="pricetags-outline"></ion-icon>
                        </span>
                        <span class="title">Createurs services</span>
                    </a>
                </li>


                <li>
                    <!-- <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a> -->
                </li>

                <li>
                    <a href="sign_out.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
           
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                    <?php
                        $req="SELECT COUNT(*) AS nombre_sevices FROM services";
                        $resultat=mysqli_query($con,$req);
                        while($ligne=mysqli_fetch_assoc($resultat)){ 
                      ?>
                        <div class="numbers"><?= $ligne['nombre_sevices']?></div>
                        <?php } ?>
                        <div class="cardName">Services</div>
                        
                    </div>

                    <div class="iconBx">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                        $req="SELECT COUNT(*) AS nombre_demande FROM demande";
                        $resultat=mysqli_query($con,$req);
                        while($ligne=mysqli_fetch_assoc($resultat)){ 
                      ?>
                        <div class="numbers"><?= $ligne['nombre_demande']?></div>
                        <?php } ?>
                        <div class="cardName">demande</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                        $req="SELECT COUNT(*) AS nombre_commantaire FROM commentaire";
                        $resultat=mysqli_query($con,$req);
                        while($ligne=mysqli_fetch_assoc($resultat)){ 
                      ?>
                        <div class="numbers"><?= $ligne['nombre_commantaire']?></div>
                        <?php } ?>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                        $req="SELECT COUNT(*) AS nombre_client FROM client";
                        $resultat=mysqli_query($con,$req);
                        while($ligne=mysqli_fetch_assoc($resultat)){ 
                      ?>
                        <div class="numbers"><?= $ligne['nombre_client']?></div>
                        <?php } ?>
                        <div class="cardName">Client</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Demande de creation de service</h2>
                    </div>
                    <table>
                    <thead>
                        <tr>
                            <td>Nom Service</td>
                            <td>Adresse Services</td>
                            <td>email Service</td>
                            <td>Telephone</td>
                            <td>horraire service</td>
                            <td>Nom Createur</td>
                            <td>prenom createur</td>
                            <td>email createur</td>
                            <th>Accept</th>
                            <td></td>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                       $req = "SELECT *FROM demandeCreationSRV naturel join createur_srv";
                        $res = mysqli_query($con, $req);
                        if (mysqli_num_rows($res) > 0) {
                        while ($ligne = mysqli_fetch_assoc($res)) { 
                        ?>
                            <tr>
                                <td><?= $ligne['nom_service'] ?></td>
                                <td><?= $ligne['adresse_service'] ?></td>
                                <td><?= $ligne['email_service'] ?></td>
                                <td><?= $ligne['telephone_service'] ?></td>
                                <td><?= $ligne['horaire_service'] ?></td>
                                <td><?= $ligne['nom_createur'] ?></td>
                                <td><?= $ligne['prenom_createur'] ?></td>
                                <td><?= $ligne['email_createur'] ?></td>
                                <td><a href="demande.php?accept=<?= $ligne['id'] ?>" class="material-symbols-sharp">Download</a></td>
                                <?php
                                       

                                        if (isset($_GET['accept'])) {
                                            $accept = $_GET['accept'];
                                            
                                            // Récupérer les données de la demande
                                            $req = "SELECT * FROM demandeCreationSRV WHERE id=?";
                                            $stmt = $con->prepare($req);
                                            $stmt->bind_param("i", $accept);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($ligne = $result->fetch_assoc()) {
                                                $nom_createur = $ligne['nom_createur'];
                                                $prenom_createur = $ligne['prenom_createur'];
                                                $email_createur = $ligne['email_createur'];
                                                
                                                $nom_service = $ligne['nom_service'];
                                                $adresse_service = $ligne['adresse_service'];
                                                $email_service = $ligne['email_service'];
                                                $telephone_service = $ligne['telephone_service'];
                                                $horaire_service = $ligne['horaire_service'];

                                                // Commencer une transaction
                                                mysqli_begin_transaction($con);
                                                
                                                try {
                                                    // Insérer dans utilisateur
                                                    $stmt1 = $con->prepare("INSERT INTO utilisateur (nom, prenom, email) VALUES (?, ?, ?)");
                                                    $stmt1->bind_param("sss", $nom_createur, $prenom_createur, $email_createur);
                                                    $stmt1->execute();
                                                    $id_utilisateur = $con->insert_id;
                                                    
                                                    // Insérer dans createur_srv
                                                    $stmt2 = $con->prepare("INSERT INTO createur_srv (adresse_Createur, id_Utilisateur) VALUES (?, ?)");
                                                    $stmt2->bind_param("si", $adresse_createur, $id_utilisateur);
                                                    $stmt2->execute();
                                                    $id_createur = $con->insert_id;

                                                    // Insérer dans services
                                                    $stmt3 = $con->prepare("INSERT INTO services (nom, adress, email,phone, horraire, id_CreateurSRV) VALUES (?, ?, ?, ?, ?, ?)");
                                                    $stmt3->bind_param("sssssi", $nom_service, $adresse_service, $email_service, $telephone_service, $horaire_service, $id_createur);
                                                    $stmt3->execute();
                                                    
                                                    // Valider la transaction
                                                    mysqli_commit($con);
                                                    
                                                    echo "Insertion réussie ";
                                                    $req = "DELETE FROM demandeCreationSRV WHERE id='$accept'"; 
                                                    mysqli_query($con, $req);
                                                } catch (Exception $e) {
                                                    // Annuler la transaction en cas d'erreur
                                                    mysqli_rollback($con);
                                                    echo "Échec de l'insertion : " . $e->getMessage();
                                                }
                                            }
                                        }

                                       
                                        ?>

                                    <td></td>
                                 <td><a href="demande.php?delete=<?=$ligne['id']?>" class="material-symbols-sharp">Delete </a> </td>
                                 <?php
                                    //delete
                                    if(isset($_GET['delete'])){
                                        $delete=$_GET['delete'];
                                        $req = "DELETE FROM demandeCreationSRV WHERE id='$delete'"; 
                                        mysqli_query($con, $req);
                                    }
                                ?>
                            </tr>
                        <?php
                        }
                    }
                        ?>
                    </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
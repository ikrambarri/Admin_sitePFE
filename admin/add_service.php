<?php
require("../ServiceCR/connexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 
        - favicon
    -->
    <link rel="shortcut icon" href="../images/logo.png" type="image/svg+xml+png">

    <title>Admin_E-City</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/add_admin.css">
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
                    <a href="profil_admin.php">
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
                    <a href="#">
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
                        <h2>Add Service</h2>
                    </div>
                    <table>
                    <form action="" method="POST">
                            <tr>
                                <td>Nom Service:</td>
                                <td ><input type="text" name="nom_Service"></td>
                            </tr>
                            <tr>
                                <td>Adresse Service:</td>
                                <td><input type="text" name="Adresse"></td>
                            </tr>
                            <tr>
                                <td>Email Service :</td>
                                <td><input type="text" name="email"></td>
                            </tr>
                            <tr>
                                <td>Telephone:</td>
                                <td><input type="text" name="tele"></td>
                            </tr>
                            <tr>
                                <td>horraire:</td>
                                <td><input type="text" name="horraire"></td>
                            </tr> 
                            <tr>
                                <td>ID Créateur Service:</td>
                                <td><input type="text" name="id_CreateurSRV" required></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Save" name="btn" id="bottone5"></td>
                            </tr> 
                            </form>
                    </table>
                    <?php
require("../ServiceCR/connexion.php");

if (isset($_POST["btn"])) {
    $ch = $_POST['email'];
    $phone = $_POST['tele'];
    $modele = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $modelephone = "/^(\+212|0)([5-7]\d{8})$/";

    if (preg_match($modele, $ch)) {
        if (preg_match($modelephone, $phone)) {
            $nom = mysqli_real_escape_string($con, $_POST['nom_Service']);
            $Adresse = mysqli_real_escape_string($con, $_POST['Adresse']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $tele = mysqli_real_escape_string($con, $_POST['tele']);
            $horraire = mysqli_real_escape_string($con, $_POST['horraire']);
            $id_CreateurSRV = mysqli_real_escape_string($con, $_POST['id_CreateurSRV']); // assuming this is provided in the form

            // Vérifier que la connexion à la base de données existe
            if (!$con) {
                die("La connexion a échoué: " . mysqli_connect_error());
            }

            // Démarrer une transaction
            mysqli_begin_transaction($con);

            try {
                // Requête d'insertion dans la table services
                $insert_service = "INSERT INTO services (nom, adress, email, phone, horraire, id_CreateurSRV)
                                    VALUES ('$nom', '$Adresse', '$email', '$tele', '$horraire', '$id_CreateurSRV')";

                // Exécuter la requête d'insertion
                if (mysqli_query($con, $insert_service)) {
                    // Récupérer l'ID du service inséré
                    $id_Service = $con->insert_id;

                    // Générer un pin aléatoire
                    $pin = rand(1, 100);

                    // Requête d'insertion dans la table admin (ou une autre table si besoin)
                    $insert_admin = "INSERT INTO admin (id_Utilisateur, pin)
                                    VALUES ('$id_Service', '$pin')";

                    // Exécuter la requête d'insertion dans la table admin
                    if (mysqli_query($con, $insert_admin)) {
                        // Valider la transaction
                        mysqli_commit($con);
                        echo "<script>alert('Query successfully submitted. Thank you')</script>";
                    } else {
                        // Annuler la transaction
                        mysqli_rollback($con);
                        echo "Erreur: " . $insert_admin . "<br>" . mysqli_error($con);
                    }
                } else {
                    // Annuler la transaction
                    mysqli_rollback($con);
                    echo "Erreur: " . $insert_service . "<br>" . mysqli_error($con);
                }
            } catch (mysqli_sql_exception $exception) {
                // En cas d'erreur, annuler la transaction
                mysqli_rollback($con);
                echo "Erreur: " . $exception->getMessage();
            }
        } else {
            echo "<script>alert('Error in phone format')</script>";
        }
    } else {
        echo "<script>alert('Error in email format')</script>";
    }
}
?>


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
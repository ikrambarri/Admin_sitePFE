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
                        <h2>Add Admin</h2>
                    </div>
                    <table>
                    <form action="" method="POST">
                            <tr>
                                <td>Nom Admin:</td>
                                <td ><input type="text" name="nom_Admin"></td>
                            </tr>
                            <tr>
                                <td>Prenom Admin:</td>
                                <td><input type="text" name="prenom_Admin"></td>
                            </tr>
                            <tr>
                                <td>PassWord Admin :</td>
                                <td><input type="text" name="pass_Admin"></td>
                            </tr>
                            <tr>
                                <td>Telephone:</td>
                                <td><input type="text" name="tele_Admin"></td>
                            </tr>
                            <tr>
                                <td>email:</td>
                                <td><input type="text" name="email_Admin"></td>
                            </tr> 
                            <tr>
                                <td><input type="submit" value="Save" name="btn" id="bottone5"></td>
                            </tr> 
                            </form>
                    </table>
                    <?php


                        if (isset($_POST["btn"])) {
                            $ch = $_POST['email_Admin'];
                            $phone = $_POST['tele_Admin'];
                            $modele = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
                            $modelephone = "/^(\+212|0)([5-7]\d{8})$/";

                            if (preg_match($modele, $ch)) {
                                if (preg_match($modelephone, $phone)) {
                                    $prenom = mysqli_real_escape_string($con, $_POST['prenom_Admin']);
                                    $nom = mysqli_real_escape_string($con, $_POST['nom_Admin']);
                                    $pass = mysqli_real_escape_string($con, $_POST['pass_Admin']);
                                    $email = mysqli_real_escape_string($con, $_POST['email_Admin']);
                                    $tele = mysqli_real_escape_string($con, $_POST['tele_Admin']);

                                    // Vérifier que la connexion à la base de données existe
                                    if (!$con) {
                                        die("La connexion a échoué: " . mysqli_connect_error());
                                    }

                                    // Requête d'insertion dans la table utilisateur
                                    $insert = "INSERT INTO utilisateur (nom, prenom, email, password, telephone)
                                                VALUES ('$nom', '$prenom', '$email', '$pass', '$tele')";

                                    // Exécuter la requête d'insertion
                                    if (mysqli_query($con, $insert)) {
                                        // Récupérer l'ID de l'utilisateur inséré
                                        $id_Utilisateur = $con->insert_id;

                                        // Générer un pin aléatoire
                                        $pin = rand(1, 100);

                                        // Requête d'insertion dans la table admin
                                        $insert_admin = "INSERT INTO admin (id_Utilisateur, pin)
                                                        VALUES ('$id_Utilisateur', '$pin')";

                                        // Exécuter la requête d'insertion dans la table admin
                                        if (mysqli_query($con, $insert_admin)) {
                                            echo "<script>alert('Query successfully submitted. Thank you')</script>";
                                        } else {
                                            echo "Erreur: " . $insert_admin . "<br>" . mysqli_error($con);
                                        }
                                    } else {
                                        echo "Erreur: " . $insert . "<br>" . mysqli_error($con);
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
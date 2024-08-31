<?php
require("../ServiceCR/connexion.php");



// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION["connect"]) || $_SESSION["connect"] !== true || !isset($_SESSION["id"])) {
    header("Location: login.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Récupère l'ID du client à partir de la session
$client_id = $_SESSION["id"];

// Récupère l'ID du service à partir de l'URL
if (isset($_GET['id'])) {
    $service_id = $_GET['id'];
} else {
    header('Location: 404.php'); // Redirige vers une page d'erreur si l'ID du service n'est pas fourni dans l'URL
    exit;
}
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
                    <a href="news.php">
                        <span class="icon">
                            <ion-icon name="add-circle-outline"></ion-icon>
                        </span>
                        <span class="title">News </span>
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
                        <h2>List des services</h2>
                    </div>
                    <table>
                    <thead>
                        <tr>
                            <td>Nom Service</td>
                            <td>Adresse Createur</td>
                            <td>Adresse Service</td>
                            <td>Telephone</td>
                            <td>Email</td>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php


            $req = "SELECT * FROM services NATURAL JOIN createur_srv";
            $res = mysqli_query($con, $req);
            while ($ligne = mysqli_fetch_assoc($res)) { 
            ?>
                <tr>
                    <td><?= htmlspecialchars($ligne['nom']) ?></td>
                    <td><?= htmlspecialchars($ligne['adresse_Createur']) ?></td>
                    <td><?= htmlspecialchars($ligne['adress']) ?></td>
                    <td><?= htmlspecialchars($ligne['phone']) ?></td>
                    <td><?= htmlspecialchars($ligne['email']) ?></td>
                    <td><a href="Update_service.php?id_Services=<?= urlencode($ligne['id_Services']) ?>" class="material-symbols-sharp">Edit</a></td>
                    <?php
                        // delete
                        if(isset($_GET['delete'])){
                            $delete = mysqli_real_escape_string($con, $_GET['delete']);
                            $req = "DELETE FROM services 
                                    WHERE id_Services = '$delete'";
                            mysqli_query($con, $req);
                            // Also delete from createur_srv if necessary
                            $req2 = "DELETE FROM createur_srv 
                                    WHERE id_utilisateur = (SELECT id_CreateurSRV FROM services WHERE id_Services = '$delete')";
                            mysqli_query($con, $req2);
                        }
                    ?>
                    <td><a href="profil_admin.php?delete=<?= urlencode($ligne['id_Services']) ?>" class="material-symbols-sharp">Delete</a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
</div>


                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Createur des services</h2>
                    </div>
                    <table>
                        <?php
                        $req="SELECT * FROM createur_srv NATURAL JOIN utilisateur WHERE id_Createur = id_Utilisateur";
                        $res=mysqli_query($con,$req);
                        while($ligne=mysqli_fetch_assoc($res)){ 
                        ?>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/images/<?= $ligne['image']?>" alt=""></div>
                            </td>
                            <td>
                                <h4><?= $ligne['nom']?>  <br> <span> <?= $ligne['prenom']?></span></h4>
                            </td>
                        </tr>
                        <?php    
                    }
        ?>         
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
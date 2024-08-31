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
                        <h2>Modifier Service</h2>
                    </div>
                     
                    <?php
                    if (isset($_POST['btn'])) {
                        // update 
                        $req = "UPDATE services SET
                               
                                nom = '{$_POST['nom_Service']}',
                                adress = '{$_POST['Adresse']}',
                                phone = '{$_POST['tele']}',
                                email = '{$_POST['email']}',
                                horraire = '{$_POST['horraire']}',
                                id_CreateurSRV = '{$_POST['id_CreateurSRV']}'
                                WHERE id_Services = '{$_GET['id_Services']}'"; // Correction ici : la virgule a été supprimée
                            if (mysqli_query($con, $req)) {
                                echo "<div style='color:red;font-size:20px;'>Mise à jour réussie.</div>";
                            } else {
                                echo "Erreur lors de la mise à jour : " . mysqli_error($cnx);
                            }
                    }
                    if(isset($_GET['id_Services'])){
                        $req ="SELECT * FROM services WHERE id_Services='{$_GET['id_Services']}'";
                        // echo $req;
                        $resultat=mysqli_query($con,$req);
                        $ligne=mysqli_fetch_assoc($resultat);

                                ?>    
                    <table>
                    <form action="" method="POST">
                            <tr>
                                <td>Nom Service:</td>
                                <td ><input type="text" name="nom_Service" value="<?= $ligne['nom'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Adresse Service:</td>
                                <td><input type="text" name="Adresse" value="<?= $ligne['adress'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Email Service :</td>
                                <td><input type="text" name="email" value="<?= $ligne['email'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Telephone:</td>
                                <td><input type="text" name="tele" value="<?= $ligne['phone'] ?>"></td>
                            </tr>
                            <tr>
                                <td>horraire:</td>
                                <td><input type="text" name="horraire" value="<?= $ligne['horraire'] ?>"></td>
                            </tr> 
                            <tr>
                                <td>ID Créateur Service:</td>
                                <td><input type="text" name="id_CreateurSRV" required value="<?= $ligne['id_CreateurSRV'] ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Save" name="btn" id="bottone5"></td>
                            </tr> 
                            </form>
                    </table>
                    <?php
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
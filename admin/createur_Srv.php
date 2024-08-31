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
                        <h2>List des services</h2>
                    </div>
                    <table>
                    <thead>
                        <tr>
                            <td>Nom creator</td>
                            <td>prenom</td>
                            <td>Email</td>
                            <td>password</td>
                            <td>Telephone</td>
                            <td>age</td>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php


            $req = "SELECT * FROM utilisateur NATURAL JOIN createur_srv";
            $res = mysqli_query($con, $req);
            while ($ligne = mysqli_fetch_assoc($res)) { 
            ?>
                <tr>
                    <td><?= htmlspecialchars($ligne['nom']) ?></td>
                    <td><?= htmlspecialchars($ligne['prenom']) ?></td>
                    <td><?= htmlspecialchars($ligne['email']) ?></td>
                    <td><?= htmlspecialchars($ligne['password']) ?></td>
                    <td><?= htmlspecialchars($ligne['telephone']) ?></td>
                    <td><?= htmlspecialchars($ligne['age']) ?></td>
                   
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
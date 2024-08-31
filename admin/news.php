<?php
require("../ServiceCR/connexion.php");

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $document = $_POST['document'];

    if ($action == 'edit' && isset($_POST['id_Nouvelle'])) {
        // Modification d'une nouvelle existante
        $id = $_POST['id_Nouvelle'];
        $req = $con->prepare("UPDATE `nouvelle` SET `titre` = ?, `date` = ?, `description` = ?, `document` = ? WHERE `id_Nouvelle` = ?");
        $req->bind_param("ssssi", $titre, $date, $description, $document, $id);
        if ($req->execute()) {
            header("Location: news.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . $req->error;
        }
    } elseif ($action == 'add') {
        // Ajout d'une nouvelle
        $req = $con->prepare("INSERT INTO `nouvelle` (`titre`, `date`, `description`, `document`) VALUES (?, ?, ?, ?)");
        $req->bind_param("ssss", $titre, $date, $description, $document);
        if ($req->execute()) {
            header("Location: news.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout : " . $req->error;
        }
    }
} elseif ($action == 'delete' && isset($_GET['id_Nouvelle'])) {
    // Suppression d'une nouvelle
    $id = $_GET['id_Nouvelle'];
    $req = $con->prepare("DELETE FROM `nouvelle` WHERE `id_Nouvelle` = ?");
    $req->bind_param("i", $id);
    if ($req->execute()) {
        header("Location: news.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . $req->error;
    }
} elseif ($action == 'edit' && isset($_GET['id_Nouvelle'])) {
    // Récupération des données pour l'édition
    $id = $_GET['id_Nouvelle'];
    $req = $con->prepare("SELECT * FROM `nouvelle` WHERE `id_Nouvelle` = ?");
    $req->bind_param("i", $id);
    $req->execute();
    $result = $req->get_result();
    $news = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/svg+xml+png">
    <title>Admin_E-City</title>
    <link rel="stylesheet" href="css/profil_admin.css">
</head>

<body>
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
                    <a href="sign_out.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="cardBox">
                <div class="card">
                    <div>
                        <?php
                        $req = "SELECT COUNT(*) AS nombre_sevices FROM services";
                        $resultat = mysqli_query($con, $req);
                        while ($ligne = mysqli_fetch_assoc($resultat)) { 
                        ?>
                        <div class="numbers"><?= $ligne['nombre_sevices'] ?></div>
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
                        $req = "SELECT COUNT(*) AS nombre_demande FROM demande";
                        $resultat = mysqli_query($con, $req);
                        while ($ligne = mysqli_fetch_assoc($resultat)) { 
                        ?>
                        <div class="numbers"><?= $ligne['nombre_demande'] ?></div>
                        <?php } ?>
                        <div class="cardName">Demande</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                        $req = "SELECT COUNT(*) AS nombre_commantaire FROM commentaire";
                        $resultat = mysqli_query($con, $req);
                        while ($ligne = mysqli_fetch_assoc($resultat)) { 
                        ?>
                        <div class="numbers"><?= $ligne['nombre_commantaire'] ?></div>
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
                        $req = "SELECT COUNT(*) AS nombre_client FROM client";
                        $resultat = mysqli_query($con, $req);
                        while ($ligne = mysqli_fetch_assoc($resultat)) { 
                        ?>
                        <div class="numbers"><?= $ligne['nombre_client'] ?></div>
                        <?php } ?>
                        <div class="cardName">Client</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Manage News</h2>
                        <a href="news.php?action=add" class="btn">Add News</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Document</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $req = "SELECT * FROM `nouvelle`";
                            $res = mysqli_query($con, $req);
                            if ($res && mysqli_num_rows($res) > 0) {
                                while ($ligne = mysqli_fetch_assoc($res)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($ligne['titre']) . "</td>";
                                    echo "<td>" . htmlspecialchars($ligne['date']) . "</td>";
                                    echo "<td>" . htmlspecialchars(substr($ligne['description'], 0, 50)) . "...</td>";
                                    echo "<td>" . htmlspecialchars($ligne['document']) . "</td>";
                                    echo "<td><a href='news.php?action=edit&id_Nouvelle=" . $ligne['id_Nouvelle'] . "' class='edit'>Edit</a></td>";
                                    echo "<td><a href='news.php?action=delete&id_Nouvelle=" . $ligne['id_Nouvelle'] . "' class='delete'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No news found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($action == 'add' || ($action == 'edit' && isset($news))) : ?>
                <div class="cardHeader">
                    <h2><?= $action == 'edit' ? 'Edit News' : 'Add News' ?></h2>
                </div>
                <form action="news.php?action=<?= $action ?>" method="POST">
                    <input type="text" name="titre" value="<?= $action == 'edit' ? htmlspecialchars($news['titre']) : '' ?>" placeholder="Title" required>
                    <input type="date" name="date" value="<?= $action == 'edit' ? htmlspecialchars($news['date']) : '' ?>" placeholder="Date" required>
                    <textarea name="description" placeholder="Description" required><?= $action == 'edit' ? htmlspecialchars($news['description']) : '' ?></textarea>
                    <input type="text" name="document" value="<?= $action == 'edit' ? htmlspecialchars($news['document']) : '' ?>" placeholder="Document" required>
                    <!-- Add a hidden input to carry the news ID for editing -->
                    <?php if ($action == 'edit' && isset($news)) : ?>
                    <input type="hidden" name="id_Nouvelle" value="<?= $news['id_Nouvelle'] ?>">
                    <?php endif; ?>
                    <!-- Add a name attribute to the submit button -->
                    <button type="submit" name="<?= $action == 'edit' ? 'update' : 'add' ?>"><?= $action == 'edit' ? 'Update News' : 'Add News' ?></button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

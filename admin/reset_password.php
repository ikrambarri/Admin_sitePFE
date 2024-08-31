<?php 
require("../ServiceCR/connexion.php");

$req = mysqli_query($con, "SELECT * FROM Admin NATURAL JOIN Utilisateur ");

if (!$req) {
    die("Query failed: " . mysqli_error($con));
}

while($row = mysqli_fetch_array($req)) {
    $code = $row['password'];
    $pin=$row['pin'];
}

$code_pin_actual = $_POST['pin'];
if($code_pin_actual != $pin) {
    header("location:login.php?errore=incorrect code pin!");
    exit(); // Assurez-vous de sortir après la redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CHANGER PASSWORD</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center">
    <form class="mt-5 p-5 shadow rounded" action="changer.php" method="post">
        <?php if(isset($_GET['error'])) { ?>
        <div class="alert alert-danger">
            <?php echo $_GET['error']; ?>
        </div>
        <?php } ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirmer</label>
            <input type="password" name="cpass" class="form-control" id="exampleInputPassword1">
        </div>
        <button class="btn btn-info">Submit</button>
    </form>
</div>

</body>
</html>

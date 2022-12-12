<?php
session_start();
// connection à la base de donné
include('connect.php');

$request = $mysqli -> query("SELECT * FROM utilisateurs");

$request_fetch_all = $request -> fetch_all();

var_dump($request_fetch_all);
//echo "ok";
//$_SESSION['login'] = $user[1];
if(isset($_POST['log_envoi'])){
    
    //si les champs sont remplis
    if($_POST['login']){
        
        $login = $_POST['login'];

        $sql = "UPDATE utilisateurs 
        SET login = '$login'
        WHERE id = ".$_SESSION['id']."";
        $request2 = $mysqli -> query($sql);

    }
    else{echo "veuillez remplir tous les champs";}
}

//appuyé sur le bouton submit
if(isset($_POST['envoi'])){
    
    //si les champs sont remplis
    if($_POST['password'] && $_POST['confirmpassword']){
        
        $pass = $_POST['password'];
        $confirmpass = $_POST['confirmpassword'];

        //si les passwords son identique 
        if ($pass == $confirmpass){

            $password = $_POST['password'];

            $sql = "UPDATE utilisateurs 
            SET password = '$password'
            WHERE id = ".$_SESSION['id']."";
            $request2 = $mysqli -> query($sql);
            
        }
        else{echo "les mots de passes ne sont pas identique";}
    }
    //else{echo "veuillez remplir tous les champs";}
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/inscription.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php include('header.php') ?>
    <main>

        <div>
            <h1>Profil</h1>
            <?php echo "Your login : ".$_SESSION['login']; ?>
            <form action="" method="post">
                <label for="login">Login change</label>
                <Input type="text" name="login">
                <input type="submit" name="log_envoi">

                <label for="password">Password change</label>
                <Input type="text" name="password">

                <label for="confirmpassword">password Confirmation</label>
                <Input type="text" name="confirmpassword">

                <input type="submit" name="envoi">
            </form>
        </div>

    </main>
    <?php include('footer.php') ?>
</body>

</html>
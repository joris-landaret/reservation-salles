<?php
$erreur = "";
// connection à la base de donné
include('connect.php');

$request = $mysqli -> query("SELECT * FROM utilisateurs");

$request_fetch_all = $request -> fetch_all();

var_dump($request_fetch_all);

//appuyé sur le bouton submit
if(isset($_POST['envoi'])){
    
    //si les champs sont remplis
    if($_POST['login'] && $_POST['password'] && $_POST['confirmpassword']){
        
        $login = $_POST['login'];
        $pass = $_POST['password'];
        $confirmpass = $_POST['confirmpassword'];

        //si les passwords son identique 
        if ($pass == $confirmpass){
            

            //si login n'est pas le même
            $log_ok = false;
                //
            foreach($request_fetch_all as $user){
                if($login == $user [1]){
                    $log_ok = false;
                    //break;
                }
                else{$log_ok = true;}
            }
            
            if($log_ok == true){

                $sql = "INSERT INTO `utilisateurs` (`login`,`password`) 
                VALUE ('$login','$pass')";
                $request2 = $mysqli -> query($sql);
                //echo "ok";
                header("location:connexion.php");

            }
            else{$erreur = '<p style = "color:red; font-weight:bold ">Le nom du login est déja utilisé</p>';}
            
        }
        else{$erreur = '<p style = "color:red; font-weight:bold ">les mots de passes ne sont pas identique</p>';}
    }
    else{$erreur = '<p style = "color:red; font-weight:bold ">veuillez remplir tous les champs</p>';}
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/inscription.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php include('header.php') ?>
    <main>

        <div>
            <h1>Inscrit toi !!!</h1>
            <br>
            <?= $erreur ?>
            <form action="" method="post">
                <label for="login">Login</label>
                <Input type="text" name="login">

                <label for="password">Password</label>
                <Input type="text" name="password">

                <label for="confirmpassword">Confirmation de password</label>
                <Input type="text" name="confirmpassword">

                <input type="submit" name="envoi">
            </form>
        </div>

    </main>
    <?php include('footer.php') ?>
</body>

</html>
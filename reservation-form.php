<?php
session_start();
$erreur = "";
// connection à la base de donné
include('connect.php');

$request = $mysqli -> query("SELECT * FROM utilisateurs");

$request_fetch_all = $request -> fetch_all();

var_dump($request_fetch_all);

//appuyé sur le bouton submit
if(isset($_POST['envoi'])){
    
    //si les champs sont remplis
    if($_POST['titre'] && $_POST['debut'] && $_POST['fin'] && $_POST['fin']){
        
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

                $sql = "INSERT INTO `reservation` (`login`,`password`) 
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
    <title>Formulaire de réservation</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reservation-form.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php include('header.php') ?>
    <main>

        <div>
            <h1>Formulaire de réservation</h1>
            <p><br>Utilisateur : <?php echo $_SESSION['login'];?></p>
            <p><br>Titre :</p>
            <p><?php ?></p>
            <?= $erreur ?>
            <form action="" method="post">
                <label for="debut">Heure de début</label>
                <select name="debut">
                    <option value="8h00">8h00</option>
                    <option value="9h00">9h00</option>
                    <option value="10h00">10h00</option>
                    <option value="11h00">11h00</option>
                    <option value="12h00">12h00</option>
                    <option value="13h00">13h00</option>
                    <option value="14h00">14h00</option>
                    <option value="15h00">15h00</option>
                    <option value="16h00">16h00</option>
                    <option value="17h00">17h00</option>
                    <option value="18h00">18h00</option>
                </select>        

                <label for="fin">Heure de fin</label>
                <select name="fin">
                    <option value="9h00">9h00</option>
                    <option value="10h00">10h00</option>
                    <option value="11h00">11h00</option>
                    <option value="12h00">12h00</option>
                    <option value="13h00">13h00</option>
                    <option value="14h00">14h00</option>
                    <option value="15h00">15h00</option>
                    <option value="16h00">16h00</option>
                    <option value="17h00">17h00</option>
                    <option value="18h00">18h00</option>
                    <option value="19h00">19h00</option>
                </select> 

                <label for="date">Date</label>
                <Input type="date" name="date">

                <input type="submit" name="envoi" value="Envoi de la réservation">
            </form>
        </div>

    </main>
    <?php include('footer.php') ?>
</body>

</html>
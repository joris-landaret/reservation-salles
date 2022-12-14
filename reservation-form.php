<?php
session_start();
$erreur = "";
// connection à la base de donné
include('connect.php');

$request = $mysqli -> query("SELECT * FROM reservations");

$request_fetch_all = $request -> fetch_all();

var_dump($request_fetch_all);

//appuyé sur le bouton submit
if(isset($_POST['envoi'])){
    
    //si les champs sont remplis
    if($_POST['titre'] && $_POST['debut'] && $_POST['fin'] && $_POST['date'] && $_POST['description']){
        
        $titre = htmlspecialchars($_POST['titre'],ENT_QUOTES);
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        $date = $_POST['date'];
        $description = htmlspecialchars($_POST['description'],ENT_QUOTES);

        //si les heures sont différentes 
        if ($debut < $fin){

             $request1 = $mysqli -> query("SELECT * FROM reservations 
                                            WHERE debut 
                                            BETWEEN $date' '.$debut AND $date' '.$fin");

            // //si la date et heure ne sont pas les mêmes que dans la bdd
            // $debut_ok = false;
            //     //
            // foreach($request_fetch_all as $reservation){
            //     if($date.' '.$debut == $reservation [3]){
            //         $debut_ok = false;
            //         //break;
            //     }
            //     else{$debut_ok = true;}
            // }
            
            // if($debut_ok == true){

                $sql = "INSERT INTO `reservations` (`titre`,`description`,`debut`,`fin`,`id_utilisateur`) 
                VALUE ('$titre','$description','$date' '.$debut','$date' '.$fin',".$_SESSION['id'].")";
                $request2 = $mysqli -> query($sql);
                echo "ok";
            // }
            // else{$erreur = '<p style = "color:red; font-weight:bold ">L heure de réservation est déja utilisé</p>';}   
        }
        else{$erreur = '<p style = "color:red; font-weight:bold ">les heures de début et de fin sont dentiques</p>';}
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
            <?= $erreur ?>
            <form action="" method="post">
                <label for="titre">Titre :</label>
                <input type="text" name="titre">

                <label for="debut">Heure de début</label>
                <select name="debut">
                    <option value="08:00">8h00</option>
                    <option value="09:00">9h00</option>
                    <option value="10:00">10h00</option>
                    <option value="11:00">11h00</option>
                    <option value="12:00">12h00</option>
                    <option value="13:00">13h00</option>
                    <option value="14:00">14h00</option>
                    <option value="15:00">15h00</option>
                    <option value="16:00">16h00</option>
                    <option value="17:00">17h00</option>
                    <option value="18:00">18h00</option>
                </select>        

                <label for="fin">Heure de fin</label>
                <select name="fin">
                    <option value="09:00">09h00</option>
                    <option value="10:00">10h00</option>
                    <option value="11:00">11h00</option>
                    <option value="12:00">12h00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14h00</option>
                    <option value="15:00">15h00</option>
                    <option value="16:00">16h00</option>
                    <option value="17:00">17h00</option>
                    <option value="18:00">18h00</option>
                    <option value="19:00">19h00</option>
                </select> 

                <label for="date">Date</label>
                <Input type="date" name="date">

                <label for="description">Description :</label>
                <Input type="text" name="description">

                <input type="submit" name="envoi" value="Envoi de la réservation">
            </form>
        </div>

    </main>
    <?php include('footer.php') ?>
</body>

</html>
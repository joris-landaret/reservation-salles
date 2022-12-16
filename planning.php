<?php
session_start();
// connection à la base de donné
include('connect.php');

$request = $mysqli -> query("SELECT * FROM reservations");

$request_fetch_assoc = $request -> fetch_all(MYSQLI_ASSOC);
// $i=0;
// while($request_fetch_assoc[$i]){
// var_dump($request_fetch_assoc[$i]);
// ;$i++;}

//$request_fetch_all = $request -> fetch_array();

//echo ".$request_fetch_all[0]."

// function table(int $col, int $row, int $week){
//     for ($i=0; $i < $row; $i++) { 
//         for ($j=0; $j < $col; $j++) { 
//             $date = new DateTime("last sunday 7am $week week", new DateTimeZone("europe/paris"));
            
//             //$array[$i][];

//         }
//     }
// }

                    
//boucle dans une boucle

// while($request_fetch_all = $request -> fetch_assoc()){

//     $titre = $request_fetch_all['titre'];
//     $debut = $request_fetch_all['debut'];
//     $fin = $request_fetch_all['fin'];
//     $datetime_debut = new DateTime($debut);
//     $datetime_fin = new DateTime($fin);
//     //$forma = format('d F Y à H:i');

//     echo $datetime_debut->format('d F Y');

//     // if($){
        
//     // }

//     echo "<tr>
//             <td>$debut</td>
//             <td>$fin</td>
//             <td>$titre</td>
//             <td>".$datetime_debut->format('d F Y')."</td>
//             <td>".$datetime_fin->format('d F Y')."</td>
//             <td></td>
//             </tr>";
// }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/livre-or.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php include('header.php') ?>
    <main>

        <div>
            <h1>Planning</h1>
            
            <form action="" method="post">

                <table border="10" cellspacing="5" cellpadding="5" bgcolor=""> 
                  
                    <tr>
                        <th></th>
                        <th>Dimanche</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                    </tr>

                        

                        <?php for ($i=0; $i < 11; $i++): ?>
                        <?php   $days = ['dimanche','lundi','mardi','mercredi','jeudi','vendredi'];
                                $hours = ['8h','9h','10h','11h','12h','13h','14h','15h','16h','17h','18h'];?>

                                <tr>
                                    <td><?=$hours[$i]?></td>
                                
                            <?php for ($j=0; $j < 6; $j++) : ?>

                                <?php foreach($request_fetch_assoc as $reservation) : ?>
                                    <?php //var_dump($reservation['debut']);

                                        $debut = $reservation['debut'];
                                        //$fin = $reservation['fin'];
                                        $datetime_debut = new DateTime($debut);
                                        //$datetime_fin = new DateTime($fin);
                                        
                                        //var_dump($datetime_debut->format('N G\h'));

                                        $date_debut = $datetime_debut->format('N G\h');

                                        $titre = $reservation['titre'];
                                        //var_dump($titre);
                                    ?>
                        
                                    <?php $date = $j.' '.$hours[$i];
                                        //var_dump($date);
                                        //var_dump($titre);
                                    if ($date_debut == $date) : ?>
                                        <td bgcolor="red"><?=$titre?></td>
                                    <?php else: ?>
                                        <td bgcolor="yellowgreen">libre</td>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                            <?php endfor; ?>
                            </tr>
                        <?php endfor; ?>
                    
                    
                </table>
            </form>
        </div>

    </main>
    <?php include('footer.php') ?>
</body>

</html>

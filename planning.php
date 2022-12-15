<?php
session_start();
// connection à la base de donné
include('connect.php');

$request = $mysqli -> query("SELECT * FROM reservations");

$request_fetch_assoc = $request -> fetch_assoc();

//$request_fetch_all = $request -> fetch_array();

var_dump($request_fetch_assoc);
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
//     $datetime_fin = new DateTime($debut);
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

                <table border cellspacing="5" cellpadding="5" bgcolor="cyan"> 
                  
                    <?php
                    $days = ['lundi','mardi','mercredi','jeudi','vendredi'];
                    $hours = ['7h','8h','9h','10h','11h','12h','13h','14h','15h','16h','17h','18h'];

                    for ($i=0; $i < 12; $i++): ?>
                        <tr>
                            <td><?=$hours[$i]?></td>
                        <?php for ($j=0; $j < 5; $j++) : ?>
                            <td><?=$days[$j].' '.$hours[$i]?></td>
                        
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


<?php 

// for ($i=0; $i < 13; $i++) { 
    
//     <tr>
//         for ($j=0; $j < 8; $j++) { 
//            <td>test</td>
//         }
//         <td>test</td>
//     </tr>

// }

?>
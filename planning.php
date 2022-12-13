<?php
session_start();
// connection à la base de donné
include('connect.php');

$request = $mysqli -> query("SELECT * FROM reservations");

//$request_fetch_all = $request -> fetch_all();

//$request_fetch_all = $request -> fetch_array();

//var_dump($request_fetch_all);
//echo ".$request_fetch_all[0]."

// while($request_fetch_all = $request -> fetch_all()){
//     echo "<tr>
//             <td>".$request_fetch_all['titre']."</td> 
//           </tr>";
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
                    <tr> 
                        <th></th>
                        <th>lundi 19</th>
                        <th>mardi 20</th> 
                        <th>mercredi 21</th>
                        <th>jeudi 22</th>
                        <th>vendredi 23</th>
                    </tr>
                    <tr>
                        <td>8h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                    <tr>
                        <td>9h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>12h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>14h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>15h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>16h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>17h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>18h</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    
                    //boucle dans une boucle

                    while($request_fetch_all = $request -> fetch_array()){

                        $titre = $request_fetch_all['titre'];
                        $debut = $request_fetch_all['debut'];
                        $fin = $request_fetch_all['fin'];

                        if($){
                            
                        }

                        // echo "<tr>
                        //         <td>".$request_fetch_all['titre']."</td>
                        //         <td></td>
                        //         <td></td>
                        //         <td></td>
                        //         <td></td>
                        //         <td></td>
                        //       </tr>";
                    }
                    
                    ?>
                    
                    
                </table>
            </form>
        </div>

    </main>
    <?php include('footer.php') ?>
</body>

</html>
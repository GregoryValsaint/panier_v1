<?php
/*
//Ce programme affiche Bonjour
    echo 'Bonjour';

//déclarer les variables de travail 

$a = 1;
$b = 5; 

// calculer la somme 
 $s = $a + $b;

 echo '<p>La somme de '.$a.' et '.$b.' est : '.$s.'</p>';

 echo "<p>La somme de $a et $b est $s</p>"; // cette forme est plus lente à exécuter par le compilateur

 // débug

 var_dump($s);



 // tableau

 $users = array('marc', 'aline', 'sadeq');
 //var_dump($users);
 echo '<pre>';
 print_r($users);
 echo '</pre>';

 // afficher le tableau user ligne par ligne
 for ($i = 0;$i < 3; $i++) { 
    echo $users[$i]."\n";
 } 


//tableau à 2 dimensions

$users = array(
    array('sadeq', 'sadeq@mail.fr'),
    array('aline', 'aline@mail.fr'),
    array('marc', 'marc@mail.fr'),
);

debug($users);
*/

//Outil des données à partir d'un request 
//(data provenant d'une url web)
//index.php?nom=sadeq&email=sadeq@mail.fr(C'est un url avec des données)

debug($_GET); //$_GET : tableausystème à portée globale
// qui contient les données envoyées par la méthode get
// d'un formulaire ou url

//Afficher les données GET
//1. insérer l'utilisateur dans un tableau
session_start();

$_SESSION['users'][] = array(
    'nom' => $_GET['nom'],
    'email' => $_GET['email'],
);


debug($_SESSION['users']);
// Boîte à outils programmeur
function debug($var){
    //affiche $var
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}


?>
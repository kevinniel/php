<?php

session_start();

#tableau dans tableau
$ages = [
	16,
	18
];

$tab = Array(
	1,
	2,
	3,
	4,
	5,
	6,
	$ages
);

##################################################################
# 1. Affichage simple tableaux
##################################################################

# Affiche le tableau "$tab" entièrement
// var_dump($tab);

# Affiche la valeur du tableau "$tab" a l'index "6"
// var_dump($tab[6]);

# Affiche la valeur du sous tableau de "$tab" a l'index "0" du sous tableau
# disponible dans "$tab" a l'index "6"
// var_dump($tab[6][0]);


##################################################################
# 2. Parcourir le tableau
##################################################################

# Afficher chaque valeur en fonction de l'index (la clé)
# méthode noob
// for ($i=0;$i<count($tab);$i++) {
// 	var_dump($tab[$i]);
// 	echo("<br>");
// }

# méthode kévin
// foreach($tab as $item) {
// 	var_dump($item);
// 	echo("<br>");
// }

##################################################################
# 3. Fonctions :D
##################################################################

# Créer une fonction qui affiche un tableau
# passé en paramètre de manière réccursive
function afficheTableau($tableau) {
	foreach($tableau as $item) {
		if(gettype($item) == "array") {
			afficheTableau($item);
		} else {
			var_dump($item);
			echo("<br>");
		}
	}
}

// afficheTableau($tab);

# affiche le type de "$tab"
// echo('le type de $tab est : ' . gettype($tab));

# Créer une fonction qui prend un age en paramètre et qui
# RETOURNE "vrai" si la personne est "majeure" ou "mineure"

function isGrownUp($age) {
	if ($age >= 18) {
		# Si une fonction rencontre un "return", elle s'arrête !
		return True;
	}
	return False;
}

// $age = isGrownUp(16);

// var_dump($age);

##################################################################
# 3. Concaténation
##################################################################

// $age = 18;

// # NE JAMAIS FAIRE CA !!!!
// echo "j'ai $age ans.";
// echo "<br>";
// var_dump("j'ai $age ans.");
// echo "<br>";
// echo 'j\'ai $age ans.';


// # concaténation d'un requete SQL (exemple)
// $table = "user";

// # je veux obtenir : "SELECT * FROM user;"
// $sql = "SELECT * FROM " . $table . "_user;";
// echo $sql;

##################################################################
# 4. SESSIONS
##################################################################

// ne pas oublier le : session_start();

// $_SESSION['age'] = 18;
// echo "session age défini";

var_dump($_SESSION);










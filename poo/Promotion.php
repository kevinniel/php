<?php

include('./Student.php');

Class Promotion
{
    /**
     * Students array
     *
     * @var array
     */
    public $students;

    /**
     * Constructeur
     *
     * @param array $students
     */
    public function __construct(
        array $students
    ) {
        $this->students = $students;
    }

    /**
     * Return the number of students
     *
     * @return int
     */
    public function countStudent(): int
    {
        return count($this->students);
    }

    /**
     * Method counting the number of women in the 
     * student array
     *
     * @return integer
     */
    public function countWomen(): int
    {
        $cpt = 0;
        foreach ($this->students as $student) {
            if (!$student->isMale()) {
                $cpt++;
            }
        }
        return $cpt;
    }

    // nombre d'hommes
    // pourcentage hommes
    // pourcentage femmes
    // nombre d'étudiant pour chaque spécialité
    // pourcentage de chaque spécialité
    // moyenne de la classe
    // plus mauvais élève
    // meilleur élève
    // moyenne d'age
    // age minimum
    // age maximum
    // classer les élèves par ordre alphabétique
    // nombre d'élèves ayant un nom OU un prénom contenant la lettre "a"
    // nombre d'élèves ayant uniquement le prénom contenant la lettre "u"
    // nombre d'élèves nés avant 1999
    // nombre d'élèves nés après 2001

}

$students = [
    new Student("kevin", "niel", "22/01/2003", "H", "DEV", [0, 10, 1, 0]),
    new Student("enzo", "daboss", "22/01/1995", "H", "DEV", [0, 8, 1, 0]),
    new Student("quentin", "dafirst", "22/01/2000", "H", "DEV", [5, 0, 1, 0]),
    new Student("eric", "estmalade", "22/01/1984", "H", "DEV", [0, 18, 1, 4]),
    new Student("Charles", "estenretard", "22/01/2010", "F", "OPS", [0, 3, 1, 0]),
];

$p = new Promotion($students);



echo("<pre>");
echo("<code>");
var_dump($p->countWomen());
echo("</code>");
echo("</pre>");
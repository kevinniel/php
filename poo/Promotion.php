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
     * Define the number of students in the promotion
     *
     * @var int
     */
    public $countStudent;

    /**
     * Define the number of men in the promotion
     *
     * @var int
     */
    public $countMen;

    /**
     * Define the number of women in the promotion
     *
     * @var int
     */
    public $countWomen;

    /**
     * Define the number of men in the promotion
     *
     * @var int
     */
    public $countDev;

    /**
     * Define the number of women in the promotion
     *
     * @var int
     */
    public $countOps;

    /**
     * Constructeur
     *
     * @param array $students
     */
    public function __construct(
        array $students
    ) {
        $this->students = $students;
        $this->countStudent = $this->countStudent();
        $this->countMen = $this->countMen();
        $this->countWomen = $this->countWomen();
        $this->countDev = $this->countDev();
        $this->countOps = $this->countOps();
    }

    /**
     * Method which return the percentage of men in the promotion
     *
     * @return Float
     */
    public function percentageMen(): Float
    {
        return $this->countMen / $this->countStudent * 100;
    }

    /**
     * Method which return the percentage of women in the promotion
     *
     * @return Float
     */
    public function percentageWomen(): Float
    {
        return $this->countWomen / $this->countStudent * 100;
    }

    /**
     * Method which return the percentage of OPS in the promotion
     *
     * @return Float
     */
    public function percentageOps(): Float
    {
        return $this->countOps / $this->countStudent * 100;
    }

    /**
     * Method which return the percentage of DEV in the promotion
     *
     * @return Float
     */
    public function percentageDev(): Float
    {
        return $this->countDev / $this->countStudent * 100;
    }

    /**
     * Method which calculate the promotion average
     *
     * @return Float
     */
    public function promotionAverage(): Float
    {
        $total = 0;
        foreach ($this->students as $student) {
            $total += $student->marksAverage;
        }
        return $total / $this->countStudent;
    }

    /**
     * Method which returns the best student depending on his marks average
     *
     * @return Student
     */
    public function bestStudent() : Student
    {
        return $this->wbStudent();
    }
    
    /**
     * Method which returns the worst student depending on his marks average
     *
     * @return Student
     */
    public function worstStudent() : Student
    {
        return $this->wbStudent('w');
    }

    // @TODO
    // moyenne d'age
    // age minimum
    // age maximum
    // classer les élèves par ordre alphabétique
    // nombre d'élèves ayant un nom OU un prénom contenant la lettre "a"
    // nombre d'élèves ayant uniquement le prénom contenant la lettre "u"
    // nombre d'élèves nés avant 1999
    // nombre d'élèves nés après 2001
    // ajouter un étudiant dans la promotion
    // modifier un étudiant dans la promotion
    // supprimer un étudiant dans la promotion

    /**
     * Method which return the number of student by sex
     *
     * @param string $genre
     * @return integer
     */
    private function countGenre(string $genre = 'H'): int
    {
        $cpt = 0;
        foreach ($this->students as $student) {
            if ($genre == 'H') {
                if ($student->isMale()) {
                    $cpt++;
                }
            }
            if ($genre == 'F') {
                if (!$student->isMale()) {
                    $cpt++;
                }
            }
        }
        return $cpt;
    }

    /**
     * Method which return the number of student by sex
     *
     * @param string $genre
     * @return integer
     */
    private function countSpeciality(string $speciality = 'DEV'): int
    {
        $cpt = 0;
        foreach ($this->students as $student) {
            if ($speciality == 'DEV') {
                if ($student->isDev()) {
                    $cpt++;
                }
            }
            if ($speciality == 'OPS') {
                if (!$student->isDev()) {
                    $cpt++;
                }
            }
        }
        return $cpt;
    }

    /**
     * Method counting the number of DEV in the 
     * student array
     *
     * @return integer
     */
    private function countDev(): int
    {
        return $this->countSpeciality();
    }

    /**
     * Method counting the number of OPS in the 
     * student array
     *
     * @return integer
     */
    private function countOps(): int
    {
        return $this->countSpeciality('OPS');
    }

    /**
     * Return the number of students
     *
     * @return int
     */
    private function countStudent(): int
    {
        return count($this->students);
    }

    /**
     * Method counting the number of women in the 
     * student array
     *
     * @return integer
     */
    private function countWomen(): int
    {
        return $this->countGenre('F');
    }

    /**
     * Method counting the number of men in the 
     * student array
     *
     * @return integer
     */
    private function countMen(): int
    {
        return $this->countGenre();
    }

    /**
     * Method which returns whether the student is the best
     * or the worst, depending on his marks average
     *
     * @param string $wb
     * @return Student
     */
    private function wbStudent($wb = 'b'): Student
    {
        $idx = null;
        // j'utilise une condition ternaire pour déterminé la valeur à donner à $avg.
        $avg = $wb == 'b' ? 0 : 20;

        foreach ($this->students as $key => $value) {
            if ($wb == 'b') {
                if ($value->marksAverage > $avg) {
                    $avg = $value->marksAverage;
                    $idx = $key;
                }
            } elseif ($wb == 'w') {
                if ($value->marksAverage < $avg) {
                    $avg = $value->marksAverage;
                    $idx = $key;
                }
            }
        }
        return $this->students[$idx];
    }
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
var_dump($p->worstStudent());
var_dump($p->bestStudent());
echo("</code>");
echo("</pre>");
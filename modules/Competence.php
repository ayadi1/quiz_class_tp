<?php

declare(strict_types=1);


class Competence
{

    /** @var int */
    private int $id;

    /** @var String */
    private String $libCompetence;

    /** @var int */
    private int $idModule;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return [object Object]
     */
    public function save()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function update()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        // TODO implement here
        return false;
    }

    /**
     * @return array
     */
    public static function all(): array
    {
        // TODO implement here
        return [];
    }

    /**
     * @param int $id 
     * @return Competence|bool
     */
    public static function findById(int $id)
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function module()
    {
        // TODO implement here
        return null;
    }
    public static function returnerExamens(PDO $conn, int $idCompetence)
    {
        try {
            $query = "SELECT * FROM `EXAMEN` 
            WHERE  `idCompetence` = ?";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $idCompetence,  
            ]);


            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Examen');
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }
    public  function returner_Examens(PDO $conn)
    {
        try {
            $query = "SELECT * FROM `EXAMEN` 
            WHERE  `idCompetence` = ?";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $this->id,

            ]);


            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Module');
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }

    /**
     * Get the value of libCompetence
     */ 
    public function getLIB_COMP()
    {
        return $this->libCompetence;
    }

    /**
     * Set the value of libCompetence
     *
     * @return  self
     */ 
    public function setLIB_COMP($libCompetence)
    {
        $this->libCompetence = $libCompetence;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($idC)
    {
        $this->id = $idC;

        return $this;
    }
}

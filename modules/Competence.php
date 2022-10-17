<?php

declare(strict_types=1);


class Competence
{

    /** @var int */
    private int $id;

    /** @var String */
    private string $lib;

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
     * @return
     */
    public function save()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return
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
     * @return
     */
    public function module()
    {
        // TODO implement here
        return null;
    }

    public function returnerExamens(PDO $conn): bool|array
    {
        try {
            $query = "SELECT * FROM `examen` WHERE  `idCompetence` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([$this->id]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Examen');
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Get the value of libCompetence
     */
    public function getLib()
    {
        return $this->lib;
    }

    /**
     * Set the value of libCompetence
     *
     * @return  self
     */
    public function setLib($lib)
    {
        $this->lib = $lib;

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

    /**
     * @return
     */
    public function initialisation($conn)
    {
        try{
            $sql = "SELECT * FROM competence WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->id]);
            $competence=$stmt->fetchObject('Competence');
            $this->id = $competence->id;
            $this->idModule = $competence->idModule;
            $this->lib = $competence->lib;
        }catch (\Throwable $th){
            return false;
        }
    }

}

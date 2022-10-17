<?php

declare(strict_types=1);


class Module
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $lib;
    
    /** @var int */
    private string $idFiliere;
    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

//    public static function retournerModules(bool|PDO $conn, int $idFiliere): bool|array
//    {
//        try{
//            $sql = "SELECT * FROM module WHERE idFiliere = :idFiliere";
//            $stmt = $conn->prepare($sql);
//            $stmt->bindParam(':idFiliere', $idFiliere);
//            $stmt->execute();
//            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Module');
//        }catch (\Throwable $th){
//            return false;
//        }
//    }

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
     * @return Collection
     */
    public function all()
    {
        // TODO implement here
        return null;
    }

    /**
     * @param  $id 
     * @return
     */
    public function findById($id)
    {
        // TODO implement here
        return null;
    }

    /**
     * @return array
     */
    public function formateurs(): array
    {
        // TODO implement here
        return [];
    }

//    public static function retournerCompetences(PDO $conn,  int $idModule): bool|array
//    {
//        try {
//            $query = "SELECT * FROM `competence` WHERE `idModule` = ? ";
//            $pdoS = $conn->prepare($query);
//            $pdoS->execute([$idModule]);
//            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Competence');
//        } catch (\Throwable $th) {
//            return false;
//        }
//    }

    public function retournerCompetences(PDO $conn): bool|array
    {
        try {
            $query = "SELECT * FROM `competence` WHERE `idModule` = ? ";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([$this->id]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Competence');
        } catch (\Throwable $th) {
            return false;
        }
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idFiliere
     */ 
    public function getIdFiliere()
    {
        return $this->idFiliere;
    }

    /**
     * Set the value of idFiliere
     *
     * @return  self
     */ 
    public function setIdFiliere($idFiliere)
    {
        $this->idFiliere = $idFiliere;

        return $this;
    }

    /**
     * Get the value of lable
     */ 
    public function getLib()
    {
        return $this->lib;
    }

    /**
     * Set the value of lable
     *
     * @return  self
     */ 
    public function setLib($lib)
    {
        $this->lib = $lib;

        return $this;
    }

    public function initialisation(bool|PDO $conn)
    {
        try {
            $query = "SELECT * FROM `module` WHERE `id` = ? ";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([$this->id]);
            $module = $pdoS->fetchObject('Module');
            $this->id = $module->id;
            $this->lib = $module->lib;
            $this->idFiliere = $module->idFiliere;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
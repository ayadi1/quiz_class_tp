<?php

declare(strict_types=1);


class Filiere
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $lib;

    /** @var array */
    private array $listFormateurs;

    /** @var array */
    private array $listGroups;

    /** @var array */
    private array $listModules;
    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return array
     */
    public function groups_(): array
    {
        // TODO implement here
        return [];
    }

    /**
     * 
     */
    public function save()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function update()
    {
        // TODO implement here
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
     * @param  $id
     */
    public static function findById($id)
    {
        // TODO implement here
    }

    /**
     * @return array
     */
    public function groups(): array
    {
        // TODO implement here
        return [];
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
     * Get the value of LIB_Filiere
     */ 
    public function getLib()
    {
        return $this->lib;
    }

    /**
     * Set the value of LIB_Filiere
     *
     * @return  self
     */ 
    public function setLib($lib)
    {
        $this->lib = $lib;

        return $this;
    }

    public function getModule($idModule)
    {
        $module = new Module();
        $module->setId($idModule);
        return $module;
    }

    public function retournerModules(PDO $conn): array | bool
    {
        try{
            $query = "SELECT * FROM `module` WHERE `idFiliere` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([$this->id]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Module');
        }catch (\Throwable $th){
            return false;
        }
    }

    /**
     * @return
     */
    public function initialisation($conn)
    {
        try{
            $sql = "SELECT * FROM filiere WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->id]);
            $filiere=$stmt->fetchObject('Filiere');
            $this->id = $filiere->id;
            $this->lib = $filiere->lib;
        }catch (\Throwable $th){
            return false;
        }
    }
}

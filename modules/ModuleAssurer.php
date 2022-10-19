<?php

declare(strict_types=1);


class ModuleAssurer
{

    /** @var int */
    private int $idModule;

    /** @var int */
    private int $idGroup;

    /** @var int */
    private int $idFormateur;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
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
     * 
     */
    public function delete()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public static function all()
    {
        // TODO implement here
    }

    /**
     * @return [object Object]
     */
    public function module()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function group()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function formateur()
    {
        // TODO implement here
        return null;
    }

    public static function retournerModules(PDO $conn, int $idFiliere, int $idFormateur)
    {
        try {
            $query = "SELECT * 
            from module md 
            WHERE md.idFiliere = ?
            AND	md.id in (SELECT ms.idModule 
                          from module_assurer ms 
                          WHERE ms.idFormateur = ?)";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $idFiliere,
                $idFormateur,
            ]);


            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Module');
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }

    /**
     * Get the value of idModule
     */ 
    public function getIdModule()
    {
        return $this->idModule;
    }

    /**
     * Set the value of idModule
     *
     * @return  self
     */ 
    public function setIdModule($idModule)
    {
        $this->idModule = $idModule;

        return $this;
    }

    /**
     * Get the value of idGroup
     */ 
    public function getIdGroup()
    {
        return $this->idGroup;
    }

    /**
     * Set the value of idGroup
     *
     * @return  self
     */ 
    public function setIdGroup($idGroup)
    {
        $this->idGroup = $idGroup;

        return $this;
    }

    /**
     * Get the value of idFormateur
     */ 
    public function getIdFormateur()
    {
        return $this->idFormateur;
    }

    /**
     * Set the value of idFormateur
     *
     * @return  self
     */ 
    public function setIdFormateur($idFormateur)
    {
        $this->idFormateur = $idFormateur;

        return $this;
    }
}

<?php

declare(strict_types=1);


class Module
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $libModule;
    
    /** @var int */
    private string $idFiliere;
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
     * @return Collection
     */
    public function all()
    {
        // TODO implement here
        return null;
    }

    /**
     * @param  $id 
     * @return [object Object]
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
    public static function retournerCompetences(PDO $conn,  int $idModule): bool|array
    {
        try {
            $query = "SELECT * FROM `COMPETENCE` 
            WHERE `idModule` = ? ";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $idModule,

            ]);


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
    public function getLibModule()
    {
        return $this->libModule;
    }

    /**
     * Set the value of lable
     *
     * @return  self
     */ 
    public function setLibModule($libModule)
    {
        $this->libModule = $libModule;

        return $this;
    }
}


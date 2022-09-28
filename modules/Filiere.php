<?php

declare(strict_types=1);


class Filiere
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $LIB_Filiere;

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
    public function getLIB_Filiere()
    {
        return $this->LIB_Filiere;
    }

    /**
     * Set the value of LIB_Filiere
     *
     * @return  self
     */ 
    public function setLIB_Filiere($LIB_Filiere)
    {
        $this->LIB_Filiere = $LIB_Filiere;

        return $this;
    }
}

<?php

declare(strict_types=1);


class Reponse
{

    private int $id;

    /**  */
    private $lib;

    /**
     * Default constructor
     */
    public function __construct()
    {
    }

    /**
     * 
     */
    public function modifier($conn)
    {
        $query = "UPDATE reponse SET lib = ? WHERE (id = ?);";
        $pdoS = $conn->prepare($query);
        return $pdoS->execute([
            $this->lib,
            $this->id
        ]);
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
     * 
     */
    public static function findById($conn, $id): Reponse
    {
        $query = "SELECT * FROM reponse WHERE id = ?";
        $pdoS = $conn->prepare($query);
        $pdoS->execute([
            $id
        ]);
        return $pdoS->fetchObject('Reponse');
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
     * Get the value of lib
     */ 
    public function getLib()
    {
        return $this->lib;
    }

    /**
     * Set the value of lib
     *
     * @return  self
     */ 
    public function setLib($lib)
    {
        $this->lib = $lib;

        return $this;
    }

    public function save($conn)
    {
        $query = "INSERT INTO reponse (lib) VALUES (?)";
        $pdoS = $conn->prepare($query);
        return $pdoS->execute([
            $this->lib
        ]);
    }

}

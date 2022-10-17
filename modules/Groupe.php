<?php

declare(strict_types=1);


class Groupe
{
    /** @var int */
    private int $id;

    /** @var string */
    private string $lib;

    /** @var int */
    private int $idFiliere;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLib(): string
    {
        return $this->lib;
    }

    /**
     * @param string $lib
     */
    public function setLib(string $lib): void
    {
        $this->lib = $lib;
    }

    /**
     * @return int
     */
    public function getIdFiliere(): int
    {
        return $this->idFiliere;
    }

    /**
     * @param int $idFiliere
     */
    public function setIdFiliere(int $idFiliere): void
    {
        $this->idFiliere = $idFiliere;
    }

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
    public function add()
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
     * @return
     */
    public static function all()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return
     */
    public function initialisation($conn)
    {
        try {
            $sql = "SELECT * FROM groupe WHERE id = ?";
            $pdoS = $conn->prepare($sql);
            $pdoS->execute([$this->id]);
            $groupe = $pdoS->fetchObject('Groupe');
            $this->id = $groupe->id;
            $this->idFiliere = $groupe->idFiliere;
            $this->lib = $groupe->lib;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * @return
     */
    public function filiere()
    {
        // TODO implement here
        return null;
    }

    public function getFiliere(): Filiere
    {
        $filiere = new Filiere();
        $filiere->setId($this->idFiliere);
        return $filiere;
    }


}

<?php

declare(strict_types=1);


class Stagiaire
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $nom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /**
     * Default constructor
     */
    public function __construct(int $id, string $nom, string $email, string $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
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
     * @return [object Object]
     */
    public static function findById(int $id)
    {
        // TODO implement here

        return $id;
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
    public function filiere()
    {
        // TODO implement here
        return null;
    }

    // login

    public static function login(PDO $conn, string $email, string $password): Stagiaire|bool
    {
        try {
            $query = "SELECT * FROM `stagiaire` WHERE `email` = ? ";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([$email]);
            if ($pdoS->rowCount() > 0) {
                $staigaire_row = $pdoS->fetch();
                if ($staigaire_row->password === $password) {
                    return new self(
                        $staigaire_row->id,
                        $staigaire_row->nom,
                        $staigaire_row->email,
                        $staigaire_row->password
                    );
                }
            }

            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

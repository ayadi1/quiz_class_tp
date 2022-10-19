<?php

declare(strict_types=1);

require_once "Reponse.php";


class Question
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $lib;

    // /** @var int */
    private ?int $idReponse;

    // /** @var int */
    private int $idCompetence;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    public function update()
    {
        return null;
    }

    /**
     * @return bool
     */
    public function supprimer(PDO $conn): bool
    {
        try {
            $query = "DELETE FROM `question` WHERE `id` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $this->id
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }






    /**
     * @return array
     */
    public static function all(): array
    {
        // TODO implement here
        return [];
    }

    public static function findById($conn, $id)
    {
        $query = "SELECT * FROM question WHERE id = ?";
        $pdoS = $conn->prepare($query);
        $pdoS->execute([
            $id
        ]);
        return $pdoS->fetchObject('Question');
    }

    public function reponsePossible()
    {
        return null;
    }

    public function reponseCorrect()
    {

    }

    public function modifierReponseCorrect($conn, $idReponseCorrecte)
    {
        $query = "UPDATE question SET idReponse = ? WHERE id = ?";
        $pdoS = $conn->prepare($query);
        return $pdoS->execute([
            $idReponseCorrecte,
            $this->id
        ]);
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
        $this->id = (int)$id;

        return $this;
    }

    public static function retournerQuestion(PDO $conn, int $idCompetence)
    {
        try {
            $query = "SELECT * FROM `question` WHERE `idCompetence` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $idCompetence
            ]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Question');
        } catch (\Throwable $th) {
            return false;
        }
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
        $query = "INSERT INTO question (`idCompetence`, `lib`) VALUES (?, ?)";
        $pdoS = $conn->prepare($query);
        return $pdoS->execute([
            $this->idCompetence,
            $this->lib
        ]);
    }


    /**
     * Get the value of idReponseCorrecte
     */
    public function getReponses($conn)
    {
        $query = "SELECT id, lib FROM reponse WHERE id in (
            SELECT idReponse FROM avoir_reponse WHERE idQuestion = ?
        ) ";
        $pdoS = $conn->prepare($query);
        $pdoS->execute([
            $this->id
        ]);
        return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Reponse');
    }

    /**
     * Get the value of idReponseCorrecte
     */
    public function getIdReponse()
    {
        return $this->idReponse;
    }

    /**
     * Set the value of idReponseCorrecte
     *
     * @return  self
     */
    public function setIdReponse($idReponse)
    {
        $this->idReponse = $idReponse;

        return $this;
    }

    /**
     * Set the value of idCompetence
     *
     
     * @return  self
     */
    public function setIdCompetence($idCompetence)
    {
        $this->idCompetence = (int)$idCompetence;

        return $this;
    }
    public function modifier(PDO $conn)
    {
        $query = "UPDATE `question` SET `lib`=? WHERE  `id` = ?";
        $pdoS = $conn->prepare($query);
        return $pdoS->execute([
            $this->lib,
            $this->id
        ]);
    }
}
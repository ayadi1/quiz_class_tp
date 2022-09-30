<?php

declare(strict_types=1);


class Examen
{

    /** @var int */
    private int $id;

    /** @var int */
    private int $idCompetence;

    /** @var string */
    private string $label;

    /** @var date */
    private  $dateCreation;

    /** @var date */
    private  $datePassation;
    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return Examen
     */
    public function save(PDO $conn)
    {
        try {
            $query = "UPDATE `EXAMEN` 
                        SET `label`=?,
                        `datePassation`=? 
                        WHERE `id` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $this->label,
                $this->datePassation,
                $this->id,
            ]);
            return $this;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * @return self
     */
    public function update(PDO $conn , string $label, $datePassation)
    {
        try {
            $this->setLabel($label);
            $this->setDatePassation($datePassation);
            return $this->save($conn);
        } catch (\Throwable $th) {
            //throw $th;
        }
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
     * @return Examen|bool
     */
    public static function findByCode()
    {
        // TODO implement here
        return null;
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
     * Get the value of idCompetence
     */
    public function getIdCompetence()
    {
        return $this->idCompetence;
    }

    /**
     * Set the value of idCompetence
     *
     * @return  self
     */
    public function setIdCompetence($idCompetence)
    {
        $this->idCompetence = $idCompetence;

        return $this;
    }

    /**
     * Get the value of label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of datePassation
     */
    public function getDatePassation()
    {
        return $this->datePassation;
    }

    /**
     * Set the value of datePassation
     *
     * @return  self
     */
    public function setDatePassation($datePassation)
    {
        $this->datePassation = $datePassation;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
}

<?php

declare(strict_types=1);


class Evaluation
{

    /** @var int */
    private int $id;

    /** @var Date */
    private Date $date;

    /** @var int */
    private int $score;

    /** @var int */
    private int $idExamen;

    /** @var int */
    private int $idStagiaire;

    /** @var array */
    private array $questions;

    /** @var array */
    private array $reponses;

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
     * @return Date
     */
    public function getDate(): Date
    {
        return $this->date;
    }

    /**
     * @param Date $date
     */
    public function setDate(Date $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getIdExamen(): int
    {
        return $this->idExamen;
    }

    /**
     * @param int $idExamen
     */
    public function setIdExamen(int $idExamen): void
    {
        $this->idExamen = $idExamen;
    }

    /**
     * @return int
     */
    public function getIdStagiaire(): int
    {
        return $this->idStagiaire;
    }

    /**
     * @param int $idStagiaire
     */
    public function setIdStagiaire(int $idStagiaire): void
    {
        $this->idStagiaire = $idStagiaire;
    }

    /**
     * @return array
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    /**
     * @param array $questions
     */
    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
    }

    /**
     * @return array
     */
    public function getReponses(): array
    {
        return $this->reponses;
    }

    /**
     * @param array $reponses
     */
    public function setReponses(array $reponses): void
    {
        $this->reponses = $reponses;
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
     * @return array
     */
    public static function all(): array
    {
        // TODO implement here
        return [];
    }

    /**
     * @param  $id 
     * @return
     */
    public static function findById( $id)
    {
        // TODO implement here
        return null;
    }

    /**
     * @return
     */
    public function examen()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return Staigaire
     */
    public function staigaire(): Staigaire|null
    {
        // TODO implement here
        return null;
    }

}

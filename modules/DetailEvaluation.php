<?php

declare(strict_types=1);


class DetailEvaluation
{

    /** @var int */
    private int $id_staiaire;

    /** @var int */
    private int $id_Evaluation;

    /** @var int */
    private int $id_reponse;

    /** @var int */
    private int $id_question;

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
    public function save(): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function update(): [object Object]
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
     * @return Staigaire
     */
    public function staigaire(): Staigaire
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function evaluation(): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function reponse(): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @return Quesion
     */
    public function question(): Quesion
    {
        // TODO implement here
        return null;
    }

    /**
     * @param int $id_staigair 
     * @param int $id_evaluation 
     * @param int $id_question 
     * @return DetailEvaluation|boll
     */
    public function find(int $id_staigair, int $id_evaluation, int $id_question): DetailEvaluation|boll
    {
        // TODO implement here
        return null;
    }

}

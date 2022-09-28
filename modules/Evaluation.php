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
    private int $id_examen;

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
     * @param  $id 
     * @return [object Object]
     */
    public static function findById( $id): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function examen(): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @return Staigaire
     */
    public function staigaire(): Staigaire
    {
        // TODO implement here
        return null;
    }

}

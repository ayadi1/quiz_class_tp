<?php

declare(strict_types=1);


class Competence
{

    /** @var int */
    private int $id;

    /** @var String */
    private String $Lib_comp;

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
     * @param int $id 
     * @return Competence|bool
     */
    public static function findById(int $id): Competence|bool
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function module(): [object Object]
    {
        // TODO implement here
        return null;
    }

}

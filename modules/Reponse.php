<?php

declare(strict_types=1);


class Reponse
{

    private  $id;

    /** @var text */
    private text $reponse;

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
     * @return Question|bool
     */
    public static function findById( $id): Question|bool
    {
        // TODO implement here
        return null;
    }

}

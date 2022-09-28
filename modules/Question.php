<?php

declare(strict_types=1);


class Question
{

    /** @var int */
    private int $id;

    /** @var Test */
    private Test $question;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * 
     */
    public function Operation1()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function Operation2()
    {
        // TODO implement here
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

    /**
     * @return Collection<Reponse>
     */
    public function reponsePossible(): Collection<Reponse>
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function reponseCorrect(): [object Object]
    {
        // TODO implement here
        return null;
    }

}

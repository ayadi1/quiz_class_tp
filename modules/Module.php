<?php

declare(strict_types=1);


class Module
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $nom_mod;

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
     * @return Collection
     */
    public function all(): Collection
    {
        // TODO implement here
        return null;
    }

    /**
     * @param  $id 
     * @return [object Object]
     */
    public function findById( $id): [object Object]
    {
        // TODO implement here
        return null;
    }

    /**
     * @return array
     */
    public function formateurs(): array
    {
        // TODO implement here
        return [];
    }

}

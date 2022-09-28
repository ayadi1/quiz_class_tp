<?php

declare(strict_types=1);


class User
{

    /** @var string */
    private string $nom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param  $password string 
     * @param  $string email 
     * @return bool
     */
    public function Login( $password string,  $string email): bool
    {
        // TODO implement here
        return false;
    }

}

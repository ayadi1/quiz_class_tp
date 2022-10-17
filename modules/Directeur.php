<?php

declare(strict_types=1);


class Directeur
{

    /** @var int id*/   
    private int $id;

    /** @var string */
    private string $nom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    
    public function __construct(int $id, string $nom, string $email, string $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
    }

    
    /**
     * @return [object Object]
     */
    public function save()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
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
     * @return [object Object]
     */
    public static function findById(int $id)
    {
        // TODO implement here
        return $id;
    }
	/**
	 * 
	 * @return int
	 */
	function getId(): int {
		return $this->id;
	}
	/**
	 * 
	 * @param int $id 
	 * @return Directeur
	 */
	function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getNom(): string {
		return $this->nom;
	}
	/**
	 * 
	 * @param string $nom 
	 * @return Directeur
	 */
	function setNom(string $nom): self {
		$this->nom = $nom;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getEmail(): string {
		return $this->email;
	}
	/**
	 * 
	 * @param string $email 
	 * @return Directeur
	 */
	function setEmail(string $email): self {
		$this->email = $email;
		return $this;
	}
	/**
	 * 
	 * @return string
	 */
	function getPassword(): string {
		return $this->password;
	}
	/**<<
	 * 
	 * @param string $password 
	 * @return Directeur
	 */
	function setPassword(string $password): self {
		$this->password = $password;
		return $this;
	}
    // login

    public static function login(PDO $conn, string $email, string $password): Directeur | bool
    {

        try {
          
            // code
        } catch (\Throwable $th) {
            return false;
        }
    }
}


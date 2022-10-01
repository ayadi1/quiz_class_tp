<?php

declare(strict_types=1);


class Formateur
{

    /** @var int id*/   
    private int $id;

    /** @var string */
    private string $nom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /** @var array */
    private array $listFilieres;
    /**
     * Default constructor
     */
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
    public function getNom()
    {
        return $this->nom;
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
    public static function findByid(int $id)
    {
        // TODO implement here
        return $id;
    }

    /**
     * @return batata
     */
    public function modules(): array
    {
        // TODO implement here
        return [];
    }

    // login

    public static function login(PDO $conn, string $email, string $password): Formateur | bool
    {

        try {
            $query = "SELECT * FROM `FORMATEUR` WHERE `email` = ? ";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $email
            ]);


            if ($pdoS->rowCount() > 0) {
                $formateur_row = $pdoS->fetch();

                if ($formateur_row->password == $password) {
                    return new self(
                        $formateur_row->id,
                        $formateur_row->nom,
                        $formateur_row->email,
                        $formateur_row->password
                    );
                }
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function retournerFilieres(PDO $conn)
    {
        try {
            $query = "SELECT * from FILIERE fl 
            where fl.id in ( SELECT ff.idFiliere 
                            FROM FORMATEUR_FILIERE ff
                            WHERE ff.idFormateur = ?
            )";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $this->id
            ]);

            
            return $pdoS->fetchAll(PDO::FETCH_CLASS,'Filiere');
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    

    /**
     * Get the value of listFilieres
     */ 
    public function getListFilieres()
    {
        return $this->listFilieres;
    }

    /**
     * Set the value of listFilieres
     *
     * @return  self
     */ 
    public function setListFilieres($listFilieres)
    {
        $this->listFilieres = $listFilieres;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

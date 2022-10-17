<?php

declare(strict_types=1);


class Stagiaire
{

    /** @var int */
    private int $id;

    /** @var string */
    private string $nom;

    /** @var string */
    private string $prenom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /** @var int */
    private int $idGroupe;

//    /** @var Groupe */
//    private Groupe $groupe;

//    /** @var Filiere */
//    private Filiere $filiere;

    /**
     * Default constructor
     */
    public function __construct(int $id, string $nom, string $prenom, string $email, string $password, int $idGroupe)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->idGroupe = $idGroupe;

//        $this->groupe=new Groupe();
//        $this->groupe->setId($idGroupe);

//        $this->filiere=new Filiere();
//        $this->filiere->setId($this->groupe->getIdFiliere());
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
     * @param int $id
     * @return
     */
    public static function findById(int $id)
    {
        // TODO implement here

        return $id;
    }

    /**
     * @return
     */
    public function group()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return
     */
    public function filiere()
    {
        // TODO implement here
        return null;
    }

    // login

    public static function login(PDO $conn, string $email, string $password): Stagiaire|bool
    {
        try {
            $query = "SELECT * FROM `stagiaire` WHERE `email` = ? ";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([$email]);
            if ($pdoS->rowCount() > 0) {
                $staigaire_row = $pdoS->fetch();
                if ($staigaire_row->password === $password) {
                    return new self(
                        $staigaire_row->id,
                        $staigaire_row->nom,
                        $staigaire_row->prenom,
                        $staigaire_row->email,
                        $staigaire_row->password,
                        $staigaire_row->idGroupe
                    );
                }
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }

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
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return Groupe
     */
    public function getGroupe(): Groupe
    {
        $groupe = new Groupe();
        $groupe->setId($this->idGroupe);
        return $groupe;
    }
//
//    /**
//     * @param Groupe $groupe
//     */
//    public function setGroupe(Groupe $groupe): void
//    {
//        $this->groupe = $groupe;
//    }

    /**
     * @return Filiere
     */
    public function getFiliere(): Filiere
    {
//        $this->filiere=new Filiere();
//         $this->filiere=new Filiere();
//        return $this->filiere;
        return (new Filiere())->setId($this->groupe->getIdFiliere());
    }
//
//    /**
//     * @param Filiere $filiere
//     */
//    public function setFiliere(Filiere $filiere): void
//    {
//        $this->filiere = $filiere;
//    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getIdGroupe(): int
    {
        return $this->idGroupe;
    }

    /**
     * @param int $idGroupe
     */
    public function setIdGroupe(int $idGroupe): void
    {
        $this->idGroupe = $idGroupe;
    }

//    public function retournerModules(PDO $conn): bool|array
//    {
//        try {
//            $query = "SELECT * from module m
//                        where m.id in (select ma.idModule from module_assurer ma
//                                        join stagiaire s on s.idGroupe = ma.idGroupe
//                                        where s.id = ?)";
//            $pdoS = $conn->prepare($query);
//            $pdoS->execute([$this->id]);
//            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Module');
//        } catch (\Throwable $th) {
//            return false;
//        }
//    }
}

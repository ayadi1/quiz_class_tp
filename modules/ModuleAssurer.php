<?php

declare(strict_types=1);


class ModuleAssurer
{

    /** @var int */
    private int $id_module;

    /** @var int */
    private int $id_group;

    /** @var int */
    private int $id_formateur;

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
    public function save()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function update()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function delete()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public static function all()
    {
        // TODO implement here
    }

    /**
     * @return [object Object]
     */
    public function module()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function group()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
     */
    public function formateur()
    {
        // TODO implement here
        return null;
    }

    public static function retournerModules(PDO $conn, int $idFiliere, int $idFormateur)
    {
        try {
            $query = "SELECT * 
            from MODULE md 
            WHERE md.idFiliere = ?
            AND	md.id in (SELECT ms.idModule 
                          from ModuleAssurer ms 
                          WHERE ms.idFormateur = ?)";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $idFormateur,
                $idFormateur,
            ]);


            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'Module');
        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }
}

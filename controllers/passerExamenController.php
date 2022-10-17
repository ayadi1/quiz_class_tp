<?php

/**
 * Created by ERMIX
 * User: redae
 * Date: 15-10-2022
 * Time: 14:42
 **/

class passerExamenController
{
    private PDO $conn;
    private $stagiaire;

    public function __construct()
    {

        $connection = new Connection();
        $this->conn = $connection->connect();
        $this->stagiaire = unserialize($_SESSION['user'], ["allowed_classes" => true]);
    }

    /**
     * @param Stagiaire $stagiaire
     * @return
     */
    public function retournerModules(Stagiaire $stagiaire)
    {
        $groupe = $stagiaire->getGroupe();
        $groupe->initialisation($this->conn);
        $filiere = $groupe->getFiliere();
        return $filiere->retournerModules($this->conn);
    }

    private function retournerCompetences(Module $module): bool|array
    {
        return $module->retournerCompetences($this->conn);
    }

    private function retournerExamens(Competence $competence): bool|array
    {
        return $competence->returnerExamens($this->conn);
    }

    public function versPasserExamen($idModule = null, $idCompetence = null): void
    {
        $_SESSION['modulesList'] = [];
        $_SESSION['competencesList'] = [];
        $_SESSION['examensList'] = [];

        $_SESSION['module'] = null;
        $_SESSION['competence'] = null;
        $_SESSION['examen'] = null;

//        $_SESSION['modulesList'] = serialize($this->retournerModules($this->stagiaire));
        $modules = $this->retournerModules($this->stagiaire);

        if (isset($idModule, $idCompetence)) {
            $_SESSION['module'] = $idModule;
            $_SESSION['competence'] = $idCompetence;
            $competence = new Competence();
            $competence->setId((int)$idCompetence);
//            $_SESSION['examensList'] = serialize($this->retournerExamens($competence));
            $examens = $this->retournerExamens($competence);

        }

        if (isset($idModule)) {
            $_SESSION['module'] = $idModule;
            $module = new Module();
            $module->setId((int)$idModule);
//            $_SESSION['competencesList'] = serialize($this->retournerCompetences($module));
            $competences = $this->retournerCompetences($module);
        }

//        header('location: ../views/passerExamen.php');
        require_once '../views/passerExamen.php';
    }

}
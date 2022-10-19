<?php

class ModileExample
{
    public function get_(PDO $conn)
    {
        try {
            $query = "";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([

            ]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, 'some class');
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }
}
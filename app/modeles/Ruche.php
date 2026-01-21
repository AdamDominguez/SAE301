<?php

class Ruche
{
    private $data;

    /*******************************************************
    En développement PHP, une méthode __construct permet d'initialiser les bases d'un fichier, ici on récupère le contenu du fichier
    json puis on le décode avec json_decode
    Entrée : data_ruche.json
    Retour : $data
     *******************************************************/
    public function __construct()
    {
        $jsonContent = file_get_contents(__DIR__ . '/../../data/data_ruche.json');
        $this->data = json_decode($jsonContent, true);
    }

    /*******************************************************
    Permet de récupérer les données d'une ruche par rapport à l'id
    Entrée :
    Retour : $data
     *******************************************************/
    public function getRuches()
    {
        return $this->data;
    }

    /*******************************************************
    Permet de récupérer les données d'une ruche par rapport à l'id
    Entrée : $id
    Retour : $data[id]]
     *******************************************************/
    public function getRuche($id)
    {
        return $this->data[$id];
    }

    /*******************************************************
    Permet de récupérer un tableau contenant les données de dernière date par rapport à un id de ruche
    Entrée : $id
    Retour : $dataList[0]
     *******************************************************/
    public function getLatestData($id)
    {
        // condition pour vérifier qu'on ai bien un id renseigné avec $data & qu'il nest pas vide
        if (isset($this->data[$id]) && !empty($this->data[$id]['data'])) {
            // attribution d'une var $dataList qui contient nos données par rapport à un id
            $dataList = $this->data[$id]['data'];
            // utilisation d'usort pour comparer nos deux dates
            usort($dataList, function ($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });
            return $dataList[0];
        } else {
            return false;
        }
    }

    /*******************************************************
    * Permet de récupérer le minimum d'une donnée & le maximum
    * Entrée : $id, $field
    * Retour :
     * 'min' => min($values)
     * 'max' => max($values)
     *******************************************************/
    public function getMinMax($id, $field)
    {
        // condition pour vérifier qu'on ai bien un id renseigné avec $data & qu'il nest pas vide
        if (isset($this->data[$id]) && !empty($this->data[$id]['data'])) {
            // utilisation d'array_column pour renvoyé les valeurs en une seule colonne sinon erreur Array to string conversion
            $values = array_column($this->data[$id]['data'], $field);
            // renvoie un tableau contenant nos valeurs
            return [
                'min' => min($values),
                'max' => max($values)
            ];
        } else {
            return false;
        }
    }
}

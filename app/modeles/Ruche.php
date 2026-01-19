<?php

class Ruche
{
    private $data;

    public function __construct()
    {
        $jsonContent = file_get_contents(__DIR__ . '/../../data/data_ruche.json');
        $this->data = json_decode($jsonContent, true);
    }

    public function getRuches()
    {
        return $this->data;
    }

    public function getRuche($id)
    {
        return isset($this->data[$id]) ? $this->data[$id] : null;
    }

    public function getLatestData($id)
    {
        if (isset($this->data[$id]) && !empty($this->data[$id]['data'])) {
            $dataList = $this->data[$id]['data'];
            // Sort by date descending to get the latest
            usort($dataList, function ($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });
            return $dataList[0];
        }
        return null;
    }

    public function getMinMax($id, $field)
    {
        if (isset($this->data[$id]) && !empty($this->data[$id]['data'])) {
            $values = array_column($this->data[$id]['data'], $field);
            return [
                'min' => min($values),
                'max' => max($values)
            ];
        }
        return ['min' => 0, 'max' => 0];
    }
}

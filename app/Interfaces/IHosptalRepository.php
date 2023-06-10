<?php

namespace App\Interfaces;


interface IHosptalRepository
{
    public function getAllHospital();
    public function create($data);
    public function getById(int $id);

    public function delete(int $id);
    public function update($data , $id);


}

?>

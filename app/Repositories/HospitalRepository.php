<?php

namespace App\Repositories;
use App\Interfaces\IHosptalRepository;
use App\Models\Hospital;

class   HospitalRepository implements IHosptalRepository
{
    public function  getAllHospital()
    {
        return Hospital::all();
    }
    public function create($data)
    {
        return Hospital::create([
            'admin_id'=> $data['admin_id'],
            "name" => $data['name'],
            'region'=> $data['region'],
            'district' => $data['district'],
            'street'  => $data['street'],
            'image'  => $data['image']
        ]);
    }
    public function getById(int $id)
    {
        return Hospital::find($id);
    }

    public function update( $data ,  $id)
    {
        $hospital = Hospital::find($id);
        $hospital->update($data);
    }
    public function delete(int $id)
    {
        Hospital::find($id)->delete();
    }


}

?>

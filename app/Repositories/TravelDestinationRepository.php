<?php
namespace App\Repositories;

use App\Models\TravelDestination;
use Illuminate\Support\Facades\Crypt;

class TravelDestinationRepository{
    
    public function all(){
        return TravelDestination::all();
    }

    public function find($id){
        // $id = Crypt::decrypt($id);
        return TravelDestination::find($id);
    }

    public function create($data){
        return TravelDestination::create($data);
    }

    public function update($id, $data){
        // $id = Crypt::decrypt($id);
        $travelDestination = TravelDestination::find($id);
        $travelDestination->update($data);
        return $travelDestination;
    }

    public function delete($id){
        // $id = Crypt::decrypt($id);
        $travelDestination = TravelDestination::find($id);
        $travelDestination->delete();
        return $travelDestination;
    }
}
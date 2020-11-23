<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Types;
use App\Description;
use App\Stats;
use App\Weaknesses;
use App\Evolutions;
use App\Images;

class Pokedex extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
                
        return [
                       
            'No'=>$this->id,

            'Name'=> Pokedex::select('nom_pok')
                            ->where('id', $this->id)
                            ->get(), 
            
            'Types'=> Types::select('type1', 'type2')
                            ->where('id_pok', $this->id)
                            ->get(),

            'Images'=> Images::select('Images')
                            ->where('id', $this->id)
                            ->get(),

            'Description'=> Description::select('description')
                            ->where('id', $this->id)
                            ->get(),
                            
            'Stats'=> Stats::select('hp','attack','defense','sp_attack','sp_defense','speed')
            ->where('id', $this->id)
            ->get(),
            
            'Weaknesses'=> Weaknesses::select('bug','dark','dragon','electric','fairy','fight','fire','flying',
            'ghost','grass','ground','ice', 'normal','poison','psychic','rock','steel','water')
            ->where('id', $this->id)
            ->get(),  

            'Evolutions'=> Evolutions::select('id_pok_base','id_pok_evol', 'lvl_evol_pok')
            ->where('id_pok_base', $this->id)
            ->get(),

        ];

    }
}

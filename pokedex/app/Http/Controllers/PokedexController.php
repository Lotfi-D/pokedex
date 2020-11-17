<?php

namespace App\Http\Controllers;

use App\Pokedex;
use App\Description;
use App\Types;
use App\Stats;
use App\Images;
use App\Weaknesses;
use Illuminate\Http\Request;
use App\Http\Resources\Pokedex as ResourcesPokedex;


class PokedexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pokemons= Pokedex::select('id','nom_pok' ,'image', 'type1', 'type2')->get();
        
        return $pokemons->toJson(JSON_PRETTY_PRINT);
                
   
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokedex  $pokedex
     * @return \Illuminate\Http\Response
     */
    public function show( Pokedex $pokedex)
    {
       
         
                        
        return new ResourcesPokedex($pokedex);
        

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokedex  $pokedex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokedex $pokedex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokedex  $pokedex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokedex $pokedex)
    {
        //
    }
}

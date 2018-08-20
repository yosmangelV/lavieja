<?php

namespace App\Http\Controllers\Vieja;

use App\Models\Game\Vieja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    
    public function index(Request $reques){

    	$game=Vieja::orderBy('id', 'des')->first();

    	if(!$game){
    		$game=Vieja::create([
    			'c1'=>null,
    			'c2'=>null,
    			'c3'=>null,
    			'c4'=>null,
    			'c5'=>null,
    			'c6'=>null,
    			'c7'=>null,
    			'c8'=>null,
    			'c9'=>null,
    			'status'=>1,
    			'turn'=>rand(1,2)==1?'X':'O',
    			'win'=>null,
    			'move'=>9
    		]);
    	}else{
            if(!( is_null($game->win) ) || ($game->move==0)){
                $game=Vieja::create([
                    'c1'=>null,
                    'c2'=>null,
                    'c3'=>null,
                    'c4'=>null,
                    'c5'=>null,
                    'c6'=>null,
                    'c7'=>null,
                    'c8'=>null,
                    'c9'=>null,
                    'status'=>1,
                    'turn'=>rand(1,2)==1?'X':'O',
                    'win'=>null,
                    'move'=>9
                ]);
            }
        }

    	return view('game.vieja', compact('game'));
    }

    public function checkBox(Request $request){

    	$turno=$request->get('turno');
    	$celda=$request->get('celda');
    	$win=false;

    	$game=Vieja::orderBy('id', 'des')->first();

    	if(!empty($game[$celda]))
    		return response()->json(['status'=>'success','cod'=>'033','message'=>'Casilla ya ocupada.']);


    	$game[$celda]=$turno;
    	$game->turn=$turno=='X'?'O':'X';
        $game->move=$game->move-1;

    	if($game->c1 ==$turno && $game->c2 ==$turno && $game->c3 ==$turno){
    		$win=true;
    	}

    	if($game->c4 ==$turno && $game->c5 ==$turno && $game->c6 ==$turno){
    		$win=true;
    	}

    	if($game->c7 ==$turno && $game->c8 ==$turno && $game->c9 ==$turno){
    		$win=true;
    	}

    	if($game->c1 ==$turno && $game->c4 ==$turno && $game->c7 ==$turno){
    		$win=true;
    	}

    	if($game->c2 ==$turno && $game->c5 ==$turno && $game->c8 ==$turno){
    		$win=true;
    	}

    	if($game->c3 ==$turno && $game->c6 ==$turno && $game->c9 ==$turno){
    		$win=true;
    	}

    	if($game->c1 ==$turno && $game->c5 ==$turno && $game->c9 ==$turno){
    		$win=true;
    	}

    	if($game->c3 ==$turno && $game->c5 ==$turno && $game->c7 ==$turno){
    		$win=true;
    	}

        if($win){
            $game->win=$turno;
            $game->save();
            return response()->json(['status'=>'success','cod'=>'111','message'=>$turno.' Ganó la partida.']);
        }

    	$game->save();
        
        if($game->move==0)
            return response()->json(['status'=>'success','cod'=>'222','message'=>'Partida empatada.']);

        return response()->json(['status'=>'success','cod'=>'000','turno'=>$game->turn]);

    }

    public function reload(Request $request){


        $game=Vieja::create([
            'c1'=>null,
            'c2'=>null,
            'c3'=>null,
            'c4'=>null,
            'c5'=>null,
            'c6'=>null,
            'c7'=>null,
            'c8'=>null,
            'c9'=>null,
            'status'=>1,
            'turn'=>rand(1,2)==1?'X':'O',
            'win'=>null,
            'move'=>9
        ]);
      

        return response()->json(['status'=>'success','game'=>$game]);
    }
}

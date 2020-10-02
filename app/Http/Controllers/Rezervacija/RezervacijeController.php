<?php

namespace App\Http\Controllers\Rezervacija;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Rezervacija;
use App\Ucionica;
use App\Zgrada;
use App\User;
use Gate;

class RezervacijeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $rezervacije=Rezervacija::all();
        return view('rezervacija.rezervacijaindx')->with('rezervacije',$rezervacije);
    }
    public function create(){
        $ucionica=Ucionica::all();
        return view('/rezervacija/rezervacijadodaj')->with([
            'ucionice'=>$ucionica
        ]);
    }
    public function store(Request $request){
                $id=Auth::user()->id;
        $this->validate($request,array(
            'datum' => ['required',],
            'pocetak'=>['required','date_format:H:i'],
            'kraj'=>['required','date_format:H:i'],
            'ucionica_id'=>['required',],
        ));
              if(Rezervacija::where('user_id','=',$id)
              ->where('datum','=',date('Y-m-d ', strtotime($request->get('datum'))))
              ->where('pocetak','<=',$request->get('pocetak'))
              ->where('kraj','>=',$request->get('pocetak'))
              ->where('ucionica_id','=',$request->get('ucionica_id'))->exists()){
                return redirect()->route('vasarez')->with('error','Rezervacija nije spremljena provjerite imate li dvije iste rezervacije');
              }elseif(Rezervacija::where('datum','=',date('Y-m-d ', strtotime($request->get('datum'))))
              ->where('pocetak','<=',$request->get('pocetak'))
              ->where('kraj','>=',$request->get('pocetak'))
              ->where('ucionica_id','=',$request->get('ucionica_id'))->exists())
              {
                return redirect()->route('vasarez')->with('error','Rezervacija nije spremljena provjerite je li učionica vec rezervirana u to vrijeme');
              }elseif(Rezervacija::where('user_id','=',$id)
              ->where('datum','=',date('Y-m-d ', strtotime($request->get('datum'))))
              ->where('pocetak','<=',$request->get('pocetak'))
              ->where('kraj','>=',$request->get('pocetak'))->exists())
              {
                return redirect()->route('vasarez')->with('error','Rezervacija nije spremljena provjerite jeste li već rezervirali nešto u to vrijeme');
              }else{
                $rezervacija=new Rezervacija([
                'user_id'=>$id,
                'datum'=>date('Y-m-d ', strtotime($request->get('datum'))),
                'pocetak'=>$request->get('pocetak'),
                'kraj'=>$request->get('kraj'),
                'ucionica_id'=>$request->get('ucionica_id'),
            ]);
        $rezervacija->save();
        return redirect()->route('vasarez')->with('success', 'Rezervacija je spremljena');}

    }
    public function editvasa(Rezervacija $rezervacija)
    {
      if(Gate::denies('manage-users')){
        return redirect()->route('rezervacija.rezervacija.index')->with('error', 'Vi ne možete rezervirati');
    }
            $id=Auth::user()->id;
            $ucionice=Ucionica::all();
            $rezervacije=Rezervacija::where('user_id','=',$id)->get();
            return view('/rezervacija/rezervacijaeditvasa')->with([
                'ucionica'=>$ucionice,
                'rezervacije'=>$rezervacije
            ]);
        

    }
    public function destroy(Rezervacija $rezervacija)
    {
        if(Gate::denies('manage-users')){
            return redirect(route('rezervacija.rezervacija.index'));
        }
        $rezervacija->ucionica()->dissociate();
        $rezervacija->user()->dissociate();
        $rezervacija->delete();

        return redirect()->route('vasarez')->with('success', 'rezervacija izbrisana');
    }
    public function edit(Rezervacija $rezervacija)
    {
        if(Gate::denies('manage-users')){
            return redirect(route('vasarez'));
        }
        $id=Auth::user()->id;
        $ucionice=Ucionica::all();
        $rezervacije=Rezervacija::where('user_id','=',$id)->get();
        return view('/rezervacija/rezervacijaedit')->with([
            'rezervacija'=>$rezervacija,
            'ucionice'=>$ucionice

        ]);

    }
    public function update(Request $request,Rezervacija $rezervacija)
    {
        $id=Auth::user()->id;
        
        $this->validate($request,array(
            'datum' => ['required',],
            'pocetak'=>['required','date_format:H:i'],
            'kraj'=>['required','date_format:H:i'],
        ));
        $rezid=Rezervacija::where('user_id','=',$id)
        ->where('datum','=',date('Y-m-d ', strtotime($request->get('datum'))))
        ->where('pocetak','=',$request->get('pocetak'))
        ->where('kraj','=',$request->get('pocetak'))
        ->where('ucionica_id','=',$request->get('ucionica_id'))->get('id');
       

        if(Rezervacija::where('user_id','=',$id)
        ->where('datum','=',date('Y-m-d ', strtotime($request->get('datum'))))
        ->where('pocetak','<=',$request->get('pocetak'))
        ->where('kraj','>=',$request->get('pocetak'))
        ->where('ucionica_id','=',$request->get('ucionica_id'))->exists()){
          return redirect()->route('vasarez')->with('error','Rezervacija nije spremljena provjerite imate li dvije iste rezervacije');
        }elseif(Rezervacija::where('datum','=',date('Y-m-d ', strtotime($request->get('datum'))))
        ->where('pocetak','<=',$request->get('pocetak'))
        ->where('kraj','>=',$request->get('pocetak'))
        ->where('ucionica_id','=',$request->get('ucionica_id'))->exists())
        {
          return redirect()->route('vasarez')->with('error','Rezervacija nije spremljena provjerite je li učionica već rezervirana u to vrijeme');
        }elseif(Rezervacija::where('user_id','=',$id)
        ->where('datum','=',date('Y-m-d ', strtotime($request->get('datum'))))
        ->where('pocetak','<=',$request->get('pocetak'))
        ->where('kraj','>=',$request->get('pocetak'))->exists())
        {
          return redirect()->route('vasarez')->with('error','Rezervacija nije spremljena provjerite jeste li već rezervirali nešto u to vrijeme');
        }else{
          $rezervacija->user_id=$request->user_id;
          $rezervacija->datum=date('Y-m-d ', strtotime($request->datum));
          $rezervacija->pocetak=$request->pocetak;
          $rezervacija->kraj=$request->kraj;
          $rezervacija->ucionica_id=$request->user_id;
    
            $rezervacija->save();
            return redirect()->route('vasarez')->with('success', 'rezervacija je azurirana');}


    }
}

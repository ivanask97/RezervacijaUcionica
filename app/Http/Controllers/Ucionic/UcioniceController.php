<?php

namespace App\Http\Controllers\Ucionic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use App\Ucionica;
use App\Zgrada;
use Gate;

class UcioniceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $ucionice=Ucionica::all();
        return view('ucionica.ucionicaindx')->with('ucionice',$ucionice);
    }
    public function edit(Ucionica $ucionica)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('ucionic')); 
        }
        $zgrade=Zgrada::all();
        return view('/ucionica/ucionicaedit')->with([
            'ucionica'=>$ucionica,
            'zgrade'=>$zgrade

        ]); 

    }
        public function create(){
               if(Gate::denies('edit-users')){
                return redirect()->route('home')->with('error', 'Niste ovlašteni za gledanje dodavanje učionica');
            }
            $zgrade=Zgrada::all();
            return view('/ucionica/ucionicadodaj')->with([
                'zgrade'=>$zgrade
            ]);
        }
        public function store(Request $request){
            $this->validate($request,array(
                'vrsta' => ['required', 'string', 'max:255',],
                'broj'=>['required',],
                'zgrada_id'=>['required',],
            ));

            if(Ucionica::where('broj','=',$request->get('broj'))
                        ->where('zgrada_id','=',$request->get('zgrada_id'))->exists()){
                    return redirect()->route('ucionica.ucionica.index')->with('error','Učionica nije spremljena provjerite da li imate dvije iste učionice');
                }else{                
                    $ucionica=new Ucionica([
                    'broj'=>$request->get('broj'),
                    'vrsta'=>$request->get('vrsta'),
                    'zgrada_id'=>$request->get('zgrada_id'),
                    'job_title'=>$request->get('job_title')
                ]);
            $ucionica->save();
            return redirect()->route('ucionica.ucionica.index')->with('success', 'Učionica spremljena');}

        }
        public function update(Request $request,Ucionica $ucionica)
        {
            $this->validate($request,array(
                'vrsta' => [ 'string', 'max:255',],
            ));
            //$ucionica=Ucionica::find($id);
            //$ucionica->zgrada()->associate($request->zgrada);
            $ucionica->vrsta=$request->vrsta;
            $ucionica->save();
    
            return redirect()->route('ucionica.ucionica.index')->with('success', 'ucionica azurirana');
        }
        public function destroy(Ucionica $ucionica)
        {
            if(Gate::denies('delete-users')){
                return redirect(route('ucionica.ucionica.index'));
            }
            $ucionica->zgrada()->dissociate();
            $ucionica->delete();
    
            return redirect()->route('ucionica.ucionica.index')->with('success', 'ucionica izbrisana');
        }
    
}  

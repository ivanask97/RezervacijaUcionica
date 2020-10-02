@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodaj novu rezervaciju</div>
                    <div class="card-body">
<form method="post" action="{{route('rezervacija.rezervacija.store')}}">
<div class="form-group row">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" id="datum" name="datum" class="form-control @error('datum') is-invalid @enderror" placeholder="datum rezervacije" />
    @error('datum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
   </div>
   </div>
   <div class="form-group row">
   <div class="form-group">
    <input type="text" id="pocetak" name="pocetak" class="form-control @error('pocetak') is-invalid @enderror" placeholder="vrijeme-početak" />
  
    @error('pocetak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
   </div>
    
   </div>
   <div class="form-group row">
   <div class="form-group">
    <input type="text" id="kraj" name="kraj" class="form-control @error('kraj') is-invalid @enderror" placeholder="vrijeme-kraj" />
  
    @error('kraj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
   </div>
    
   </div>
   @csrf
                        
                        <div class="form-group row">
                        <label for="ucionice" class="col-md-2 col-form-label text-md-right">Ucionice</label>
                        <div class="col-md-6">
                        <select name="ucionica_id" id="ucionica" class="form-control select2-multiple ">
                        <option value=""></option>
                                @foreach($ucionice as $ucionica)
                                    <option value="{{$ucionica->id}}">
                                         broj:{{$ucionica->broj}}, zgrada:{{$ucionica->zgrada->mjesto}}
                                                 </option>
                                            @endforeach
                                    </select>
                                    
                        </div>
                        </div>

   <button type="submit" class="btn btn-primary">
                        Dodaj rezervaciju
                        </button>
                        <a href="{{route('home')}}">
                        <button type="button" class="btn btn-primary">
                        Natrag
                        </button>
                        </a>
  </form>
 </div>
</div>

@endsection
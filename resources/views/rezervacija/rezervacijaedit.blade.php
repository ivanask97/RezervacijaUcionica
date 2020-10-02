@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Uredite svoju rezervaciju {{$rezervacija->user->name}},datum:{{$rezervacija->datum}}
                vrijeme:{{$rezervacija->pocetak}}-{{$rezervacija->kraj}}</div>
                    <div class="card-body">
                    <form action="{{route('rezervacija.rezervacija.update',$rezervacija)}}" method="POST">
<div class="form-group row">
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
                        {{method_field('PUT')}}
                        <button type="submit" class="btn btn-primary">
                        Update
                        </button>
                        <a href="{{route('vasarez')}}">
                        <button type="button" class="btn btn-primary">
                        Natrag
                        </button>
                        </a>
  </form>
 </div>
</div>

@endsection
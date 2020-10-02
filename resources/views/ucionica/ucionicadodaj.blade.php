@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodaj novu učionicu</div>
                    <div class="card-body">
<form method="post" action="{{route('ucionica.ucionica.store')}}">
<div class="form-group row">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" id="broj" name="broj" class="form-control @error('broj') is-invalid @enderror" placeholder="unesite broj ucionice" />
    @error('broj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
   </div>
   </div>
   <div class="form-group row">
   <div class="form-group">
    <input type="text" id="vrsta" name="vrsta" class="form-control @error('vrsta') is-invalid @enderror" placeholder="unesite vrstu ucionice" />
  
    @error('vrsta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
   </div>
    
   </div>
   @csrf
                        
                        <div class="form-group row">
                        <label for="zgrade" class="col-md-2 col-form-label text-md-right">Zgrade</label>
                        <div class="col-md-6">
                        <select name="zgrada_id" id="zgrada" class="form-control select2-multiple ">
                        <option value=""></option>
                                @foreach($zgrade as $zgrada)
                                    <option value="{{$zgrada->id}}">
                                         {{$zgrada->mjesto}} 
                                                 </option>
                                            @endforeach
                                    </select>
                                    
                        </div>
                        </div>

   <button type="submit" class="btn btn-primary">
                        dodaj ucionicu
                        </button>
                        <a href="{{route('ucionic')}}">
                        <button type="button" class="btn btn-primary">
                        Natrag
                        </button>
                        </a>
  </form>
 </div>
</div>

@endsection

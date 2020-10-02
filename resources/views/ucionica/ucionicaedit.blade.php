@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Uredi učionicu {{$ucionica->broj}}</div>
                    <div class="card-body">
                        <form action="{{route('ucionica.ucionica.update',$ucionica)}}" method="POST">

                        <div class="form-group row">
                            <label for="vrsta" class="col-md-2 col-form-label text-md-right">Vrsta učionice</label>

                            <div class="col-md-6">
                                <input id="vrsta" type="text" class="form-control @error('vrsta') is-invalid @enderror" name="vrsta" value="{{ $ucionica->vrsta }}" required autofocus>

                                @error('vrsta')
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
                      <a href="{{route('ucionic')}}">
                        <button type="button" class="btn btn-primary">
                        Natrag
                        </button>
                        </a>
                        </form>    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

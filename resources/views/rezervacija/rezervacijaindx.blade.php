@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Rezervacije
                <a href="{{route('home')}}">
                <button type="button" class="btn btn-primary float-right">
                        Natrag
                        </button>
                </a>
                </div>
                @if(count($rezervacije)>0)
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Profesor</th>
                                    <th scope="col">Datum rezervacije</th>
                                    <th scope="col">Početak rezervacije</th>
                                    <th scope="col">Završetak rezervacije</th>
                                    <th scope="col">Broj učionice</th>
                                    <th scope="col">Zgrada</th>
                                </tr>
                            </thead> 
                            <tbody>
                            @foreach($rezervacije as $rezervacija)
                            <tr>
                                
                                <td>{{$rezervacija->user->name}}</td>
                                <td>{{$rezervacija->datum}}</td>
                                <td>{{$rezervacija->pocetak}}</td>
                                <td>{{$rezervacija->kraj}}</td>
                                <td>{{$rezervacija->ucionica->broj}}</td>
                                <td>{{$rezervacija->ucionica->zgrada->mjesto}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                @else
                <div class="card-body"><strong>Nema rezervacija za prikazati</strong></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
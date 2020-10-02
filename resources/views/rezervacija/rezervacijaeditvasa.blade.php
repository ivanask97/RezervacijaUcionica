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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Vaše rezervacije
                <a href="{{route('home')}}">
                <button type="button" class="btn btn-primary float-right">
                        Natrag
                        </button>
                </a>
                @can('manage-users')
                <a href="{{route('rezervacija.rezervacija.create')}}">
                <button type="button" class="btn btn-danger float-right">
                        Dodaj rezervaciju
                        </button>
                </a>
                @endcan
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
                                    <th scope="col">Uredi</th>
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
                                <td>
                                @can('manage-users')
                                    <a href="{{route('rezervacija.rezervacija.edit',$rezervacija->id)}}"><button type="button" class="btn btn-primary float-left">Uredi</button></a>
                                @endcan 
                                @can('manage-users')
                                    <form action="{{route('rezervacija.rezervacija.destroy',$rezervacija)}}" method="POST" class="float-left">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-warning">Ukloni</button>
                                    </form>
                                @endcan 
                                </td>
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
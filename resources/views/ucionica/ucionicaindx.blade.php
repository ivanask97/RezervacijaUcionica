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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Učionice
                <a href="{{route('home')}}">
                <button type="button" class="btn btn-primary float-right">
                        Natrag
                        </button>
                </a>
                @can('edit-users')
                <a href="{{route('ucionica.ucionica.create')}}">
                <button type="button" class="btn btn-danger float-right">
                        Dodaj učionicu
                        </button>
                </a>
                @endcan
                </div>
                @if(count($ucionice)>0)
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Broj učionice</th>
                                    <th scope="col">Vrsta učionice</th>
                                    <th scope="col">Zgrada</th>
                                    <th scope="col">Uredi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ucionice as $ucionica)
                            <tr>
                                
                                <td>{{$ucionica->broj}}</td>
                                <td>{{$ucionica->vrsta}}</td>
                                <td>{{$ucionica->zgrada->mjesto}}</td>
                                <td>
                                @can('edit-users')
                                    <a href="{{route('ucionica.ucionica.edit',$ucionica->id)}}"><button type="button" class="btn btn-primary float-left">Uredi</button></a>
                                @endcan 
                                @can('delete-users')
                                    <form action="{{route('ucionica.ucionica.destroy',$ucionica)}}" method="POST" class="float-left">
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
                <div class="card-body"><strong>Nema učionica za prikazati</strong></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
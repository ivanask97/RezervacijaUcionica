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
                <div class="card-header">Profesori
                <a href="{{route('home')}}">
                <button type="button" class="btn btn-primary float-right">
                        Natrag
                        </button>
                </a>
                </div>
                @if(count($users)>0)
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Ime</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td> {{$user->email}}</td>
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
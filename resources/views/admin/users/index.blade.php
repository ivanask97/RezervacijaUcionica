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
                <div class="card-header">Korisnici
                <a href="{{route('home')}}">
                <button type="button" class="btn btn-primary float-right">
                        Natrag
                        </button>
                </a>
                @can('edit-users')
                <a href="{{route('admin.users.create')}}">
                <button type="button" class="btn btn-danger float-right">
                        Dodaj korisnika
                        </button>
                </a>
                @endcan
                </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Ime</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Dodjeljene uloge</th>
                                    <th scope="col">Uredi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>
                                @can('edit-users')
                                    <a href="{{route('admin.users.edit',$user->id)}}"><button type="button" class="btn btn-primary float-left">Uredi</button></a>
                                @endcan  
                                @can('delete-users')
                                    <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="float-left">
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
            </div>
        </div>
    </div>
</div>
@endsection
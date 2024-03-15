@extends('layouts.app')
@section('title', 'Users Page - PetsApp')

@section('content')


<header class="nav level-2">
    <a href="{{route('dashboard')}}">
        <img src="{{asset('images/ico-back.svg')}}" alt="Back">
    </a>
    <img src="{{asset('images/logo.png')}}" alt="Logo">
    <a href=""> 
        
    </a>
    <a href="" class="mburguer">
        <img src="{{ asset('images/mburguer.svg')}}" alt="">
    </a>
        
</header>
<section class="dashboard">
    <h1>MODULE USERS</h1>
    <a href="{{url('users/create')}}"  class="add">
        <img src="{{ asset('images/ico-add.svg')}}" width="30px" alt="">
        Add Users
    </a>
 
</section>
<table>
    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><img src="{{asset('images/'. $user->photo)}}" alt=""></td>
                        <td>
                            <span>{{ $user->fullname}}</span>
                            <span>{{ $user->role}}</span>
                        </td> 
                        <td>
                            <a href= "{{url('users/. $user->id')}}" class="show">
                                <img src="{{asset('images/ico-view.svg')}}" alt="Show">
                            </a>
                            <a href= "{{url('users/edit/ . $user->id')}}" class="edit">
                                <img src="{{asset('images/ico-edit.svg')}}" alt="Edit">
                            </a>
                            <a href="javascript:;" class="delete" data-id="{{$user->id}}">
                                <img src="{{asset('images/ico-delete.svg')}}" alt="Delete">
                            </a>
                        </td>
                    </tr>
                        
                    @endforeach

    
                    
            

        
        
        
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"> {{$users->links('layouts.paginator')}} </td>
        </tr>
    </tfoot>
</table>
</main>



    
@endsection
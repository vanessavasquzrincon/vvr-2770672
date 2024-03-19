@extends('layouts.app')
@section('title', 'Adoption Page - PetsApp')

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
<section class="module">
    <h1>Module Adoptions</h1>
    <table>
        <tbody class='adoptions'>
        @foreach ($adops as $adop)
            <tr>
                <td>
                    <img src="{{ asset('images/'.$adop->user->photo) }}" alt="User">
                    <img src="{{ asset('images/'.$adop->pet->photo) }}" alt="User">
                </td>
                <td>
                    <span>{{ $adop->user->fullname }}</span>
                    <span>{{ $adop->pet->name }}</span>
                    <span>{{ $adop->created_at->diffforhumans() }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    {{ $adops->links('layouts.paginator') }}
                </td>
            </tr>
        </tfoot>
    </table>
</section>
@endsection
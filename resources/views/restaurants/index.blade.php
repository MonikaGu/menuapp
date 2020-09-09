@extends('layouts.app')
@section('content')

<div class="card-body">
    <label>Pasirinkite patiekalą restoranų filtravimui:</label>
    <form class="form-inline" action="{{ route('restaurant.index') }}" method="GET">
        {{-- @csrf --}}
        <select name="menu_id" id="" class="form-control">
            <option value="" selected>Visi</option>
            @foreach ($menus as $menu)
            <option value="{{ $menu->id }}" 
                @if($menu->id == app('request')->input('menu_id')) 
                    selected="selected" 
                @endif>{{ $menu->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filtruoti</button>
    </form>
</div>

<div class="card-body">
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Žmonių kiekis telpantis restorane</th>
            <th>Darbuotojų kiekis</th>
            <th>Dienos patiekalas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->title }}</td>
            <td>{{ $restaurant->customers }}</td>
            <td>{{ $restaurant->employees }}</td>  
            <td>@if ($restaurant->menu_id !== NULL)
                {{$restaurant->menu->title}}
                @else
                {{"-"}}
            @endif</td>          
            <td>
                <form action={{ route('restaurant.destroy', $restaurant->id)  . 
                    ( app('request')->input('menu_id') !== '' 
                        ? '?menu_id=' . app('request')->input('menu_id') 
                        : '' ) 
                    }} method="POST">
                    <a class="btn btn-success" href={{ route('restaurant.edit', $restaurant->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('restaurant.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection

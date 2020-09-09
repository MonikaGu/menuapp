@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime patiekalo informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('menu.update', $menu->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="title" class="form-control" value="{{ $menu->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Kaina eur</label>
                            <input type="decimal" name="price" class="form-control" value="{{ $menu->price }}">
                        </div>
                        <div class="form-group">
                            <label for="">Porcijos svoris g</label>
                            <input type="number" name="weight" class="form-control" value="{{ $menu->weight }}">
                        </div>
                        <div class="form-group">
                            <label for="">Mėsos kiekis porcijoje g</label>
                            <input type="number" name="meat" class="form-control" value="{{ $menu->meat }}">
                        </div>
                        <div class="form-group">
                            <label for="">Aprašas</label>
                            <textarea type="text" id="mce" name="about" rows=10 cols=100 class="form-control">{{ $menu->about }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

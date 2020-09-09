@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujas dienos patiekalas:</div>
               <div class="card-body">
                   <form action="{{ route('menu.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Pavadinimas: </label>
                           <input type="text" name="title" class="form-control">
                       </div>
                       <div class="form-group">
                            <label>Kaina eur: </label>
                            <input type="decimal" name="price" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>Porcijos svoris g: </label>
                           <input type="number" name="weight" class="form-control"> 
                       </div>
                       <div class="form-group">
                            <label>Mėsos kiekis porcijoje g: </label>
                            <input type="number" name="meat" class="form-control"> 
                        </div>
                       <div class="form-group">
                           <label>Aprašymas: </label>
                           <textarea id="mce" name="about" rows=10 cols=100 class="form-control"></textarea>
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

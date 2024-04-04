@extends('adminlte::page')

@section('title','Producto')

@section('content_header')
<h1>Producto</h1>
@endsection

@php
use App\Models\Category;
use App\Models\Product;
use App\Enums\Status;
$categories=Category::all();
$products=Product::all();
@endphp

@section('content')
<div class="navbar justify-content-end">
    <button class="btn btn-success" onclick="prod" data-bs-toggle="modal" data-bs-target="#product">
        <i class="fa fa-plus"></i>
        Nuevo Producto
    </button>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Lista Productos</h5>
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="text-center">
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td align="center">
                        <span class="badge {{($product->status==Status::ENABLE ? "text-bg-success" : "text-bg-danger")}}">
                            {{($product->status==Status::ENABLE ? 'Activo' : 'Inactivo')}}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="navbar justify-content-end">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#category" >
        <i class="fa fa-plus"></i>
        Nueva Categoria
    </button>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Lista Categorias</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <form class="d-inline" method="post" action="{{route('admin.category.delete',$category->id)}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                        <button class="btn btn-primary" onclick="updateCategory({{$category->id}},'{{$category->name}}')" data-bs-toggle="modal" data-bs-target="#category-update">Editar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<x-modal id="category" title="Categoria">
    <form method="post" action="{{route('admin.category.create')}}">
        <div class="input-group">
            <span class="input-group-text">Nombre</span>
            <input type="text" name="name" class="form-control">
            @csrf
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Guardar</button>
        </div>
    </form>
</x-modal>
<x-modal id="category-update" title="Actualizar Categoria">
    <form id="form-update-category" method="post" action="">
        <div class="input-group">
            <span class="input-group-text">Nombre</span>
            <input type="text" name="name" id="category-name" class="form-control">
            @csrf
            @method('PUT')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Guardar</button>
        </div>
    </form>
</x-modal>

<x-modal id="product" title="Producto">
    <form method="post" action="{{route('admin.product.create')}}">
        @csrf
        <div class="input-group">
            <span class="input-group-text">Nombre</span>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-text">Precio</span>
            <input type="number" step=".01" name="price" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-text">Categoria</span>
            <select class="form-select" name="category">
                <option selected value="">Ninguno</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="status" value="0">
            <label class="form-check-label">Estado</label>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Guardar</button>
        </div>
    </form>
</x-modal>


@error('category-name')
<x-toast title="Error" id="errorName" colorscheme="text-bg-danger">
    {{$message}}
</x-toast>
@enderror
@error('name')
<x-toast title="Error" id="errorName" colorscheme="text-bg-danger">
    {{$message}}
</x-toast>
@enderror
@error('price')
<x-toast title="Error" id="errorPrice" colorscheme="text-bg-danger">
    {{$message}}
</x-toast>
@enderror
@error('category')
<x-toast title="Error" id="errorCategory" colorscheme="text-bg-danger">
    {{$message}}
</x-toast>
@enderror
@error('status')
<x-toast title="Error" id="errorCategory" colorscheme="text-bg-danger">
    {{$message}}
</x-toast>
@enderror



@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
function updateCategory(id,name){
    form=document.getElementById('form-update-category');
    form.action='{{route('admin.category.update','')}}'+'/'+id;
    inp=document.getElementById('category-name');
    console.log(name);
    inp.value=name;
}
</script>
@endsection


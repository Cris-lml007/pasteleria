@extends('adminlte::page')

@section('title','Principal')

@section('content_header')
<h1>Dashboard</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-content">
        <div class="container ">
            <div class="row justify-content-between">
                <div class="card m-3 col bg-success">
                    <div class="card-content">
                        <h1 class="d-inline">
                            <i class="fa fa-wallet"></i>
                        </h1>
                        <h3 class="d-inline">Total: </h3>
                    </div>
                </div>

                <div class="card m-3 col bg-primary">
                    <div class="card-content">
                        <h1 class="d-inline">
                            <i class="fa fa-cookie"></i>
                        </h1>
                        <h3 class="d-inline">Cantidad: </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
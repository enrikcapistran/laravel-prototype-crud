@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? "{{ __('Mostrar') Cliente" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Clientes</span>
                        </div>
                        <div class="text-right">
                            <a class="btn btn-warning" href="{{ route('clientes.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Credito:</strong>
                            {{ number_format($cliente->credito, 2) }}
                        </div>
                        <div class="form-group">
                            <strong>Deuda:</strong>
                            {{ number_format($cliente->deuda, 2) }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cliente->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Vigencia:</strong>
                            {{ $cliente->vigencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

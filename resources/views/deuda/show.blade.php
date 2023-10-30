@extends('layouts.app')

@section('template_title')
    {{ $deuda->name ?? "{{ __('Show') Deuda" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Deuda</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('deudas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Deuda:</strong>
                            {{ $deuda->deuda }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $deuda->cliente_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

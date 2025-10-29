@extends('app')

@section('title', __('Product - Show'))

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Show product') }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">{{ __('ID') }}</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Code') }}</th>
                            <td>{{ $product->codigo }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Description') }}</th>
                            <td>{{ $product->descricao }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Created At') }}</th>
                            <td>{{ $product->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Updated At') }}</th>
                            <td>{{ $product->updated_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

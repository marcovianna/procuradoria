@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                Processos
                            </div>

                            <div class="col-md-9">
                                @include('home.partials.search-form')
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('home.partials.search-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.template')

@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            @foreach ($data as $item)
            <div class="col-12 col-md-4">
                <div class="card card-statistic {{ $item['bgColor'] }}">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column {{ $item['bgColor'] }}">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>{{ $item['name'] }}</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p>Total: {{ $item['totalQuantity'] }} </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            
            @endforeach
            
            
           
        </div>

    </section>
</div>
@endsection
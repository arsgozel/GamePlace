@extends('Manager.layouts.app')
@section('title')
    @lang('app.dashboard')
@endsection
@section('content')
    <div class="row g-3 mb-4">
        @foreach($modals as $modal)
            <div class="col-6 col-md-4 col-lg-4 col-xl-4">
                <a href="{{ route('manager.' . $modal['name'] . '.index') }}" class="text-decoration-none text-dark">
                    <div class="border bg-light rounded p-3">
                        <div class="fs-5">
                            @lang('app.' . $modal['name'])
                        </div>
                        <div class="fs-3 fw-semibold text-end">
                            <i class="bi bi-box-arrow-in-up-right fs-5"></i> {{ $modal['total'] }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
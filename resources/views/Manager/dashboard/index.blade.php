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
            <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('manager.comments.index', ['status' => 0]) }}" class="d-flex justify-content-between align-items-center text-decoration-none card-header">
                        <div>Tassyklanylmadyk - @lang('app.comments')</div>
                    </a>
                    <div class="card-body small p-1">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-sm mb-0">
                                <tbody>
                                @forelse($not_approved as $obj)
                                    <tr>
                                        <td width="40%">
                                            <span><img src="{{ $obj->app->getImage() }}" alt="{{ $obj->app->image }}" class="img-fluid rounded-5" style="max-height:2rem;"></span>
                                            {{ $obj->app->getName()}}
                                        </td>
                                        <td width="40%">
                                            <i class="bi bi-chat-dots-fill text-secondary"></i> {{$obj->comment}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="table-warning">
                                        <td>Not found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
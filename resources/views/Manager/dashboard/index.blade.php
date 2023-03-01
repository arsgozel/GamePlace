@extends('Manager.layouts.app')
@section('title')
    @lang('app.dashboard')
@endsection
@section('content')
    <div class="row g-3 mb-4">
        @foreach($modals as $modal)
            <div class="col-6 col-md-4 col-lg-3 col-xl-3">
                <a href="{{ route('manager.' . $modal['name'] . '.index') }}" class="text-decoration-none text-dark">
                    <div class="border rounded-5 p-4" style="background-color: #7AA1EB">
                        <div class="fs-5 text-white">
                           Total @lang('app.' . $modal['name'])
                        </div>
                        <div class="fs-3 fw-semibold text-white">
                            <i class="bi bi-box-arrow-in-up-right fs-5"></i> {{ $modal['total'] }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
            <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('manager.apps.index' )}}" class="d-flex justify-content-between align-items-center text-decoration-none card-header text-light" style="background-color: #7AA1EB">
                        <div>@lang('app.has_add') - @lang('app.apps')</div>
                    </a>
                    <div class="card-body small p-1">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-sm mb-0">
                                <tbody>
                                @forelse($has_add as $obj)
                                    <tr>
                                        <td width="80%">
                                            <span><img src="{{ $obj->getImage() }}" alt="{{ $obj->image }}" class="img-fluid rounded-5" style="max-height:2rem;"></span>
                                            <span class="fw-normal">{{ $obj->getName()}}</span>/
                                            @for($i = 0; $i < $obj->rating; ++$i)
                                                <i class="bi-star-fill text-warning small"></i>
                                            @endfor
                                        </td>
                                        <td width="20%">
                                            <span class="badge text-bg-{{ $obj->statusColor() }}">{{$obj->status()}}</span>
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
            <div class="col-lg-4">
                    <div class="card">
                        <a href="{{ route('manager.apps.index' )}}" class="d-flex justify-content-between align-items-center text-decoration-none card-header text-light" style="background-color: #7AA1EB">
                            <div>@lang('app.offline') - @lang('app.apps')</div>
                        </a>
                        <div class="card-body small p-1">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-sm mb-0">
                                    <tbody>
                                    @forelse($offline as $obj)
                                        <tr>
                                            <td width="80%">
                                                <span><img src="{{ $obj->getImage() }}" alt="{{ $obj->image }}" class="img-fluid rounded-5" style="max-height:2rem;"></span>
                                                <span class="fw-normal">{{ $obj->getName()}}</span>/
                                                @for($i = 0; $i < $obj->rating; ++$i)
                                                    <i class="bi-star-fill text-warning small"></i>
                                                @endfor
                                            </td>
                                            <td width="20%">
                                                <span class="badge text-bg-{{ $obj->app_statusColor() }}">{{$obj->app_status()}}</span>
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

            <div class="col-lg-4">
                <div class="card">
                    <a href="{{ route('manager.apps.index' )}}" class="d-flex justify-content-between align-items-center text-decoration-none card-header text-light" style="background-color: #7AA1EB">
                        <div>@lang('app.online') - @lang('app.apps')</div>
                    </a>
                    <div class="card-body small p-1">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-sm mb-0">
                                <tbody>
                                @forelse($online as $obj)
                                    <tr>
                                        <td width="80%">
                                            <span><img src="{{ $obj->getImage() }}" alt="{{ $obj->image }}" class="img-fluid rounded-5" style="max-height:2rem;"></span>
                                            <span class="fw-normal">{{ $obj->getName()}}</span>/
                                            @for($i = 0; $i < $obj->rating; ++$i)
                                                <i class="bi-star-fill text-warning small"></i>
                                            @endfor
                                        </td>
                                        <td width="20%">
                                            <span class="badge text-bg-{{ $obj->app_statusColor() }}">{{$obj->app_status()}}</span>
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
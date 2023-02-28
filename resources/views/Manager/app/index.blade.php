@extends('Manager.layouts.app')
@section('title')
    @lang('app.apps')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            @lang('app.apps')
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col" width="50%">Rating</th>
                <th scope="col">Name</th>
                <th scope="col" width="10%"> Types</th>
                <th scope="col" width="10%"> Devices</th>
                <th scope="col" width="10%">Ads</th>
                <th scope="col">Status</th>
                <th scope="col">Version</th>
                <th scope="col">Downloads</th>
                <th scope="col" width="10%">Size</th>
                <th scope="col" width="10%">Created at</th>
                <th scope="col" width="10%">Updated at</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody>
            @forelse($objs as $obj)
                <tr>
                    <td>
                        {{ $obj->id }}
                        <div class="fs-6 fw-semibold text-center mb-3">
                            <a href="{{ route('manager.apps.show', $obj->slug) }}" class="link-secondary">
                                <i class="bi-arrow-right-circle"></i>
                            </a>
                        </div>
                    </td>
                    <td>
                        <img src="{{ $obj->getImage() }}" alt="{{ $obj->image }}" class="img-fluid rounded-5"
                             style="max-height:4rem;">
                    </td>
                    <td>
                        <span class="small">{{$obj->rating}}</span>
                        @for($i = 0; $i < $obj->rating; ++$i)
                            <i class="bi-star-fill text-warning small"></i>
                        @endfor
                    <td>
                        <div class="mb-1">
                            {{ $obj->name}}
                        </div>
                    </td>
                    <td>
                        <i class="bi bi-bookmarks-fill text-danger"></i>
                        @foreach($obj->types as $type)
                            <div>{{ $type->getName() }}</div>
                        @endforeach
                    </td>
                    <td>
                        <i class="bi bi-phone-fill text-danger"></i>
                        @foreach($obj->devices as $device)
                            <div>{{ $device->getName() }}</div>
                        @endforeach
                    </td>
                    <td><span class="badge text-bg-{{ $obj->statusColor() }}">{{$obj->status()}}</span></td>
                    <td><span class="badge text-bg-{{ $obj->app_statusColor() }}">{{$obj->app_status()}}</span></td>
                    <td>{{$obj->version}}</td>
                    <td><i class="bi bi-cloud-arrow-down-fill text-primary"></i>{{$obj->downloads}}</td>
                    <td>{{$obj->size}}</td>
                    <td>{{$obj->created_at->format('y.m.d')}}</td>
                    <td>{{$obj->updated_at->format('y.m.d')}}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">
                        @lang('app.appNotFound')!
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        {{ $objs->links() }}
    </div>
@endsection

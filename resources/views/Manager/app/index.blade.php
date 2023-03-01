@extends('Manager.layouts.app')
@section('title')
    @lang('app.apps')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            <a href="{{ route('manager.apps.index') }}" class="link-dark"> @lang('app.apps')</a>
        </div>
        <div>
            @include('manager.app.filter')
        </div>
        <div>
            <a href="{{ route('manager.apps.create') }}" class="btn btn-danger btn-sm">
                <i class="bi-plus-lg"></i> @lang('app.add')
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col" width="20%">Rating</th>
                <th scope="col">Name</th>
                <th scope="col" width="10%"> Types</th>
                <th scope="col" width="10%"> Devices</th>
                <th scope="col" width="10%">Ads</th>
                <th scope="col">Status</th>
                <th scope="col">Version</th>
                <th scope="col">Downloads</th>
                <th scope="col" width="10%">Size</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
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
                    <td>{{$obj->created_at->format('d.m.y')}}</td>
                    <td>{{$obj->updated_at->format('d.m.y')}}</td>
                    <td>
                        <a href="{{ route('manager.apps.edit', $obj->id) }}" class="btn btn-success btn-sm my-1">
                            <i class="bi-pencil"></i>
                        </a>

                        <button type="button" class="btn btn-secondary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#delete{{ $obj->id }}">
                            <i class="bi-trash"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $obj->id }}" tabindex="-1" aria-labelledby="delete{{ $obj->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('manager.apps.destroy', $obj->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            @honeypot
                                            <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">@lang('app.close')</button>
                                            <button type="submit" class="btn btn-secondary btn-sm"><i class="bi-trash"></i> @lang('app.delete')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
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

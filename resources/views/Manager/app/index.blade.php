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
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col" width="15%">Rating</th>
                <th scope="col">Name</th>
                <th scope="col">Ads</th>
                <th scope="col">Version</th>
                <th scope="col">Downloads</th>
                <th scope="col" width="10%">Size</th>
                <th scope="col" width="10%"><i class="bi bi-bookmarks-fill"></i> Types</th>
                <th scope="col" width="10%"><i class="bi bi-phone-fill"></i> Devices</th>
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
                        <span>{{$obj->rating}}</span>
                        @for($i = 0; $i < $obj->rating; ++$i)
                            <i class="bi-star-fill text-warning"></i>
                        @endfor
                    <td>
                        <div class="mb-1">
                            {{ $obj->name}}
                        </div>
                    </td>
                    <td><span class="badge text-bg-{{ $obj->status() }}">{{$obj->has_add}}</span></td>
                    <td>{{$obj->version}}</td>
                    <td><i class="bi bi-cloud-arrow-down-fill text-primary"></i>{{$obj->downloads}}</td>
                    <td><i class="bi bi-arrows-move text-warning"></i>{{$obj->size}}</td>
                    <td>
                        @foreach($obj->types as $type)
                            <div>{{ $type->getName() }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($obj->devices as $device)
                            <div>{{ $device->getName() }}</div>
                        @endforeach
                    </td>
                    <td>{{$obj->created_at}}</td>
                    <td>{{$obj->updated_at}}</td>

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

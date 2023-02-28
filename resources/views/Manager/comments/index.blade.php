@extends('Manager.layouts.app')
@section('title')
    @lang('app.comments')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            @lang('app.comments')
        </div>
        <div>
            @include('manager.comments.filter')
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" width="20%">App</th>
                <th scope="col">Client</th>
                <th scope="col" width="10%">Approval</th>
                <th scope="col">Message</th>
                <th scope="col">Commented at</th>
                <th scope="col" class="text-center"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td class="fs-6">
                        <a href="{{route('manager.comments.index')}}" class="text-decoration-none link-dark">
                            <span><img src="{{ $obj->app->getImage() }}" alt="{{ $obj->app->image }}" class="img-fluid rounded-5" style="max-height:4rem;"></span>
                            {{ $obj->app->getName()}}
                        </a>
                    </td>
                    <td class="fs-6">
                        <a href="{{route('manager.comments.index')}}" class="text-decoration-none link-dark">
                            {{ $obj->client->name}}
                            <div><a href="mailto{{ $obj->client->email }}" class="text-decoration-none link-danger">
                                    {{ $obj->client->email }}
                                </a></div>
                        </a>
                    </td>
                    <td>
                        <div class="fs-6 mb-1 text-center">
                            <span class="badge text-bg-{{ $obj->statusColor() }}">{{$obj->status()}}</span>
                        </div>
                    </td>
                    <td>
                        @if($obj->comment)
                            <div class='small'>
                                <i class="bi bi-chat-dots-fill text-secondary"></i> {{ $obj->comment }}
                            </div>
                        @endif
                    </td>
                    <td>{{ $obj->commented_at }}</td>
                    <td>
                        <a href="{{ route('manager.comments.edit', $obj->id) }}" class="btn btn-success btn-sm my-1">
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
                                        <form action="{{ route('manager.comments.destroy', $obj->id) }}" method="post">
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
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
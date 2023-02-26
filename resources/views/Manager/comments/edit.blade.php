@extends('Manager.layouts.app')
@section('title')
    @lang('app.comments')
@endsection
@section('content')
    <div class="h4 mb-3">
        <a href="{{ route('manager.comments.index') }}" class="text-decoration-none">
            @lang('app.comments')
        </a>
        <i class="bi-chevron-right small"></i>
        @lang('app.edit')
    </div>

    <form action="{{ route('manager.comments.update', $obj->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @honeypot
        <div class="mb-3">
            <label for="is_approved" class="form-label fw-semibold">
                @lang('app.is_approved')
            </label>
            <div class="form-check @error('is_approved') is-invalid @enderror">
                <input class="form-check-input" type="radio" name="is_approved" id="is_approved"
                       value="1" {{ $obj->is_approved == 1 ? 'checked':'' }}>
                <label class="form-check-label" for="is_approved">
                    <i class="bi bi-check-circle-fill text-success"></i>
                </label>
            </div>
            <div class="form-check @error('is_approved') is-invalid @enderror">
                <input class="form-check-input" type="radio" name="is_approved" id="is_approved"
                       value="0" {{ $obj->is_approved == 0 ? 'checked':'' }}>
                <label class="form-check-label" for="is_approved">
                    <i class="bi bi-x-circle-fill text-danger"></i>
                </label>
            </div>
            @error('app_name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger">
            @lang('app.is_approved')
        </button>
    </form>
@endsection
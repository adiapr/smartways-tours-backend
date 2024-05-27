@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/tom-select/dist/css/tom-select.bootstrap5.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/upload-init.js') }}"></script>
@endpush

<input type="file"
    name="cover"
    class="dropify"
    data-max-file-size="1M"
    style="border: dahed 2px gray"
    data-default-file="{{ $method == 'put' ? $data->cover_url : asset('img/thumbnail/default.jpg') }}">
@error('cover')
    <div class="invalid-feedback d-block">
        {{ $message }}
    </div>
@enderror
<x-admin-layout>
    <x-page-title 
        title="Create Tours"
        sub="Tours"
    />
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">
                Create Tours
            </h1>
        </div>
        <div class="card-body">
            <x-form.text 
                name="title"
                label="Title"
                required
                placeholder="Input tour title..."
            />
            <x-form.textarea 
                name="description"
                label="Description"
                placeholder="Input tours descriptions..."
                required
                editor="1"
            />
            <div class="row">
                <div class="col-md-6">
                    <x-form.textarea 
                        name="destination"
                        label="Destinasi yang dikunjungi"
                        placeholder="Destinasi yang dikunjungi..."
                        required
                        editor="1"
                    />      
                </div>
            </div>
            {{-- <textarea name="body" class="form-control @error('body') is-invalid @enderror ckeditor5" rows="10"></textarea> --}}
        </div>
    </div>
    {{-- @include('plugin.ckeditor5') --}}
</x-admin-layout>
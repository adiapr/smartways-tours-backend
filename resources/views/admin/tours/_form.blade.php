<x-admin-layout>
    <x-page-title 
        title="Create Tours"
        sub="Tours"
    />
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">
                Buat Wisata
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                @if (@$method == 'put')
                    @method('PUT')
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <x-form.file 
                            :data="@$item"
                            :method="$method"
                        />
                    </div>
                    <div class="col-md-9">
                        <x-form.text 
                            name="name"
                            label="Nama Lokasi"
                            :value="$item->name"
                            required
                            placeholder="Input tour title..."
                        />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="type" class="fw-semibold">Jenis Paket Wisata </label>
                                    <select name="type"  id=""  class="form-control mt-1 @error('type') border-danger @enderror" required>
                                        <option value="">- Pilih -</option>
                                        <option value="Domestik" {{ old('type', @$item->type) == 'Domestik' ? 'selected' : '' }}>
                                            Domestik
                                        </option>
                                        <option value="Internasional" {{ old('type', @$item->type) == 'Internasional' ? 'selected' : '' }}>
                                            Internasional
                                        </option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="location" class="fw-semibold">Lokasi </label>
                                    <select name="location_id"  id=""  class="form-control mt-1 @error('location') border-danger @enderror" required>
                                        <option value="">- Pilih Lokasi -</option>
                                        @foreach ($location as $data)
                                            <option value="{{ $data->id }}" {{ old('location', @$item->location) ==  $data->location ? 'selected' : '' }}>
                                                {{ $data->location }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-form.textarea 
                    name="description"
                    label="Deskripsi singkat"
                    placeholder="Input tours descriptions..."
                    required
                    :value="@$item->description"
                    editor="1"
                />
                <x-form.textarea 
                    name="destination"
                    label="Destinasi yang dikunjungi"
                    placeholder="Destinasi yang dikunjungi..."
                    required
                    editor="2"
                    :value="@$item->destination"
                /> 
                <div class="row">
                    <div class="col-md-6">
                        <x-form.textarea 
                            name="packet"
                            label="Paket Termasuk"
                            placeholder="Paket Termasuk..."
                            required
                            editor="3"
                            :value="@$item->packet"
                        /> 
                    </div>
                    <div class="col-md-6">
                        <x-form.textarea 
                            name="no_packet"
                            label="Paket belum termasuk"
                            placeholder="Paket Termasuk..."
                            required
                            editor="4"
                            :value="@$item->no_packet"
                        /> 
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Data</button>
            </form>
        </div>
    </div>

    @include('plugin.ckeditor5-classic')
</x-admin-layout>
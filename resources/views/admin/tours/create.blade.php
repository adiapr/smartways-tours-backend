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
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <x-form.file 
                            :data="@$calendar"
                            :method="'Put'"
                        />
                    </div>
                    <div class="col-md-9">
                        <x-form.text 
                            name="title"
                            label="Nama Lokasi"
                            required
                            placeholder="Input tour title..."
                        />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="level" class="fw-semibold">Jenis Paket Wisata </label>
                                    <select name="type"  id=""  class="form-control mt-1 @error('level') border-danger @enderror" required>
                                        <option value="">- Pilih -</option>
                                        <option value="Domestik" {{ old('level', @$item->type) == 'Domestik' ? 'selected' : '' }}>
                                            Domestik
                                        </option>
                                        <option value="Internasional" {{ old('level', @$item->type) == 'Internasional' ? 'selected' : '' }}>
                                            Internasional
                                        </option>
                                    </select>
                                    @error('level')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="location" class="fw-semibold">Lokasi </label>
                                    <select name="location"  id=""  class="form-control mt-1 @error('location') border-danger @enderror" required>
                                        <option value="">- Pilih Lokasi -</option>
                                        <option value="Jawa Timur" {{ old('location', @$item->location) == 'Jawa Timur' ? 'selected' : '' }}>
                                            Jawa Timur
                                        </option>
                                        <option value="Bali" {{ old('location', @$item->location) == 'Bali' ? 'selected' : '' }}>
                                            Bali
                                        </option>
                                        <option value="Lombok" {{ old('location', @$item->location) == 'Lombok' ? 'selected' : '' }}>
                                            Lombok
                                        </option>
                                        <option value="Belitung" {{ old('location', @$item->location) == 'Belitung' ? 'selected' : '' }}>
                                            Belitung
                                        </option>
                                        <option value="Jepang" {{ old('location', @$item->location) == 'Jepang' ? 'selected' : '' }}>
                                            Jepang
                                        </option>
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
                    editor="1"
                />
                <x-form.textarea 
                            name="destination"
                            label="Destinasi yang dikunjungi"
                            placeholder="Destinasi yang dikunjungi..."
                            required
                            editor="2"
                        /> 
                <div class="row">
                    <div class="col-md-6">
                        <x-form.textarea 
                            name="packet"
                            label="Paket Termasuk"
                            placeholder="Paket Termasuk..."
                            required
                            editor="3"
                        /> 
                    </div>
                    <div class="col-md-6">
                        <x-form.textarea 
                            name="no_packet"
                            label="Paket belum termasuk"
                            placeholder="Paket Termasuk..."
                            required
                            editor="4"
                        /> 
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Data</button>
            </form>
        </div>
    </div>

    @include('plugin.ckeditor5-classic')
</x-admin-layout>
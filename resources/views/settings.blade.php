@extends('layouts.main')
@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-tile mb-0">Website Settings</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Logo</h5>
                            </div>
                            <div class="card-body">
                                <div class="bg-label-primary text-center mb-3 pt-2 rounded-3">
                                    <img class="img-fluid" src="{{ $web->logo }}"
                                        alt="Boy card image" width="150" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-tile mb-0">Favicon</h5>
                            </div>
                            <div class="card-body">
                                <div class="bg-label-primary text-center mb-3 pt-2 rounded-3">
                                    <img class="img-fluid" src="{{ $web->icon_web }}"
                                        alt="Boy card image" width="150" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="file" class="form-control" name="logo">
                        <label for="ecommerce-product-name">Logo</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="file" class="form-control" name="icon_web">
                        <label for="ecommerce-product-name">Favicon</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="text" class="form-control" value="{{ $web->judul }}" name="judul"
                            aria-label="Product title" />
                        <label for="ecommerce-product-name">Brand</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="number" class="form-control" value="{{ $contact->no_whatsapp }}" name="wa"
                            aria-label="Product title" />
                        <label for="ecommerce-product-name">Whatsapp</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="number" class="form-control" value="{{ $contact->id_livechat }}" name="livechat"
                            aria-label="Product title" />
                        <label for="ecommerce-product-name">Livechat</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="text" class="form-control" value="{{ $web->title }}" name="title"
                            aria-label="Product title" />
                        <label>Title</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="deskripsi" rows="3" class="form-control">{{ $web->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keywords</label>
                        <textarea name="keyword" rows="3" class="form-control">{{ $web->keyword }}</textarea>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="number" class="form-control" value="{{ $web->min_depo }}" name="min_depo"
                            aria-label="Product title" />
                        <label for="ecommerce-product-name">Min Deposit</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <input type="number" class="form-control" value="{{ $web->min_wd }}" name="min_wd"
                            aria-label="Product title" />
                        <label>Min Withdrawal</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-3">
                        <select name="warna" class="form-control select2" required>
                            <option value="abu-hitam" {{ $web->warna == 'abu-hitam'  ? 'selected' : ''}}> abu-hitam </option>
                            <option value="biru-kuning" {{ $web->warna == 'biru-kuning'  ? 'selected' : ''}}> biru-kuning </option>
                            <option value="biru-oren" {{ $web->warna == 'biru-oren'  ? 'selected' : ''}}> biru-oren </option>
                            <option value="biru-putih" {{ $web->warna == 'biru-putih'  ? 'selected' : ''}}> biru-putih </option>
                            <option value="merah-kuning" {{ $web->warna == 'merah-kuning'  ? 'selected' : ''}}> merah-kuning </option>
                            <option value="ungu-hitam" {{ $web->warna == 'ungu-hitam'  ? 'selected' : ''}}> ungu-hitam </option>
                        </select>
                        <label>Themes</label>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </form>
                <!-- Comment -->
            </div>
        </div>
    </div>
</div>
@endsection

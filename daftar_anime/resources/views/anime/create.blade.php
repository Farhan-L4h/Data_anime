<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data ANIMEK</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUDUL</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan JUDUL ANIMEK">{{ old('nama') }}
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SINOPSIS</label>
                                <textarea class="form-control @error('sinopsis') is-invalid @enderror" name="sinopsis" rows="5" placeholder="Masukkan SINOSIS CERITA">{{ old('sinopsis') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('sinopsis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">GENRE</label>
                                <input type="text" class="form-control @error('Genre') is-invalid @enderror" name="Genre" rows="5" placeholder="Masukkan GENRE ANIMEK">{{ old('Genre') }}
                            
                                <!-- error message untuk content -->
                                @error('Genre')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL RILIS</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" rows="5" placeholder="Masukkan TANGGAl RILIS">{{ old('tanggal') }}
                            
                                <!-- error message untuk content -->
                                @error('tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH VIEWS</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" rows="5" placeholder="Masukkan JUMLAH VIEWS">{{ old('jumlah') }}
                            
                                <!-- error message untuk content -->
                                @error('jumlah')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">RATING</label>
                                <input type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" rows="5" placeholder="Masukkan RATING ANIMEK">{{ old('rating') }}
                            
                                <!-- error message untuk content -->
                                @error('rating')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'kategori');
</script>
</body>
</html>
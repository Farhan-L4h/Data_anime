<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data List ANIMEK</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        
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

                            <div class="col-md-6 mb-3 w-50">
                                <h5>Genre:</h5>
                                <select name="genre_id" id="genre_id" aria-label="Default select example">
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{$kategori->genre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!--<div class="mb-3">
                                <label for="course" class="form-label">Genre</label>
                                <select class="form-control" name="genre" id="genre" required>
                                    <option hidden>PILIH GENRE</option>
                                    <option value='ISEKAI'>ISEKAI</option>
                                    <option value='SOUNEN'>SOUNEN</option>
                                    <option value='ROMANCE'>ROMANCE</option>

                                </select>
                            </div> -->
                            
                            
                            <!--<div class="form-group">
                                <label class="font-weight-bold">GENRE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="genre" value="{{ old('genre') }}" placeholder="Masukkan Jenis Genre Animek">{{ old('genre') }}
                            
                                 
                                @error('genre')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --> 

                            <div class="form-group">
                                <label class="font-weight-bold">Total Episode</label>
                                <input type="number" class="form-control @error('total') is-invalid @enderror" name="total" rows="5" value="" placeholder="Masukkan Total Episode">
                            
                                <!-- error message untuk content -->
                                @error('total')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Rilis</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" rows="5"  placeholder="Masukkan Tanggal Rilis">{{ old('tanggal') }}
                            
                                <!-- error message untuk content -->
                                @error('tanggal')
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
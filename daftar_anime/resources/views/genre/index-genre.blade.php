<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data GENRE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
     * {
         margin:0; 
         padding:0;
     }
 
    nav {
        margin:auto;
        text-align: center;
        width: 100%;
        font-family: arial;
    } 
    
    nav ul {
        background:#37988e;
        padding: 0 20px;
        list-style: none;
        position: relative;
        display: inline-table;
        width: 100%;
     }

    nav ul li{
        float:left;
    }

    nav ul li:hover{
        background:#d68d9a;
    }

    nav ul li:hover a{
     	color:#000;
    }

    nav ul li a{
     	display: block;
     	padding: 25px;
     	color: #fff;
     	text-decoration: none;
    }
    h3{
        
        margin: 20px;
        align: right;
        text: bold;
        color: white;
        font-family:arial;
        position: right;
    }
    </style>


</head>
<body style="background: lightgray">
     <!-- Navbar --> 
     <nav>
        <ul>
            <li><a href="{{ route('kategori.index') }}">KATEGORI</a></li>
            <li><a href="{{ route('anime.index') }}">ANIME</a></li>
            <h3>AKULAH FARHAN</h3>

        </ul>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4" style='color: black;'><b>LIST GENRE ANIMEK</b></h3>
                    <h5 class="text-center"><a href="#">www.akulah_Farhan.com</a></h5>         
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('genre.create') }}" class="btn btn-md btn-primary mb-3">TAMBAH DATA</a>

                        
                        
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        
                        <table class="table table-bordered">
                            <thead>
                              <tr class='text-center'>
                                <th scope="col">NO</th>
                                <th scope="col">GENRE</th>
                                <th scope="col">TOMBOL</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($genres as $genre)
                                <tr>
                                    
                                    <td>{{ $genre->id}}</td>
                                    <td>{{ $genre->genre }}</td>
                                    <td class="text-right">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('genre.destroy', $genre->id) }}" method="POST">
                                        <a href="{{ route('genre.show', $genre->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-sm btn-primary" style="margin: 20px;">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Anime Belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>
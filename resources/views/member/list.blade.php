<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Halaman Admin</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Daftar Member</h1>
        <table class="table table-responsive table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Ktp</th>
                    <th scope="col">foto</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $m)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->no_hp }}</td>
                        <td>{{ $m->tanggal_lahir }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->jenis_kelamin }}</td>
                        <td>{{ $m->no_ktp }}</td>
                        <td><img src="{{ asset('storage/' . $m->foto) }} " alt="" width="50"></td>
                        <td>
                            <button class="btn btn-success"><a href="{{ $m->id }}/edit">
                                    <i class="fa fa-edit text-white"></i> </a></button>
                            <i>
                                <form action="{{ $m->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <a href="#" class=""></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </i>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>

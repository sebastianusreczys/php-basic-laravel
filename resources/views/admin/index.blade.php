<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Halaman Admin</title>
</head>

<body>
    <div class="container mt-5">
        <table class="table table-responsive table-striped table-hover table-bordered">
            <h1>Daftar Data Member</h1>
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
                @foreach ($members as $m)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->no_hp }}</td>
                        <td>t{{ $m->tanggal_lahir }}ir</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->jenis_kelamin }}</td>
                        <td>{{ $m->no_ktp }}</td>
                        <td>{{ $m->foto }}</td>
                        <td>
                            <a href="{{ $m->id }}/edit"><span
                                    class="badge rounded-pill bg-success">Edit</span></a>
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

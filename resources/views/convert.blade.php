<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Convert File Excel Ke TXT</h2> <br>
    <form method="POST" action="/convert" enctype="multipart/form-data" >
        @csrf
        File Upload <input type="file" name="file"><br>
        <button type="submit">Upload</button>
    </form>

    @if(count($errors) > 0)
    <font color="red">Hanya Bisa Upload File Excel </font><br>
    @endif
    
    @if ($message = Session::get('info'))
    {{$message}}
    @endif
    {{-- <ul>
    @foreach ($data as $item)
    <li>{{$item->ntpn}};{{$item->kode_akun}};{{$item->nilai_rupiah}}</li>    
    @endforeach
    </ul> --}}
</body>
</html>
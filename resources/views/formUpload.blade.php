<form action="{{route('form') }}" method="post" enctype="multipart/form-data">
    <h1>Form upload file PHP</h1>
    @csrf
    <p>Tên file: </p>
    <input type="file" name="photo">
    @if(isset($error))
        <p>{{$error}}</p>
    @endif
    @if(isset($array['fileName']))
    <p>Tên file: {{ $array['fileName'] }}</p>
    <p>Loại file: {{ $array['fileExtension'] }}</p>
    @endif
    <button type="submit">Upload file</button>
</form>
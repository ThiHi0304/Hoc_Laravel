<h2>Demo code</h2>
@if (session('mess'))
    <div class="alert alert-success">
        {{session('mess')}}
    </div>

@endif
<form action="" method="post">
    <input type="text" name="username" placeholder="Name.." value="{{old('username')}}">
    <button type="submit">Submit</button>
    @csrf
</form>
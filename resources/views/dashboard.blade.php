<h1>Selamat Datang, {{ Auth::user()->namaLengkap }}</h1>
<p>Role Anda: {{ Auth::user()->role }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
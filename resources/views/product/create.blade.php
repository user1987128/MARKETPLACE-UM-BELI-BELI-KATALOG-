<h1>Tambah Produk</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    Nama: <input type="text" name="name"><br>
    Harga: <input type="number" name="price"><br>
    Stok: <input type="number" name="stock"><br>
    <button type="submit">Simpan</button>
</form>

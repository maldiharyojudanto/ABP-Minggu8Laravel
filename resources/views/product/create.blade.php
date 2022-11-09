<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <form action="/product/store" method="post">
        @csrf
        <label for="">Nama Produk</label>
        <input type="text" name="nama_produk" required>

        <label for="">Stok Produk</label>
        <input type="text" name="stok" required>

        <button type="submit">Submit</button>

    </form>
</body>
</html>
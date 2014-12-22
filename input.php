<html>
<head>
<title>Belajar PHP</title>
</head>
 
<body>
<h1>Form Input Data</h1>
 
<form name="input_data" action="lempar.php" method="post">
<table border="0" cellpadding="5" cellspacing="0">
    <tbody>
        <tr>
            <td>Id Barang</td>
            <td>:</td>
            <td><input type="text" name="id_barang" maxlength="20" required="required" /></td>
        </tr>
        <tr>
            <td>Id Tipe Baju</td>
            <td>:</td>
            <td><input type="text" name="id_tipebaju" maxlength="100" required="required" /></td>
        </tr>
        <tr>
            <td>Id Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="id_jeniskelamin" required="required" /></td>
        </tr>
        <tr>
            <td>Id Ukuran baju</td>
            <td>:</td>
            <td><input type="text" name="id_ukuranbaju" required="required" /></td>
        </tr>
        <tr>
            <td>Id Warna Kulit</td>
            <td>:</td>
            <td><input type="text" name="id_warnakulit" maxlength="14" required="required" /></td>
        </tr>
        <tr>
            <td>Id Besar Perut</td>
            <td>:</td>
            <td><input type="text" name="id_besarperut" maxlength="14" required="required" /></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td>:</td>
            <td><input type="text" name="nama_produk" maxlength="50" required="required" /></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="text" name="harga" maxlength="14" required="required" /></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><input type="file" name="foto" maxlength="14" required="required" /></td>
        </tr>
        <tr>
            <td align="right" colspan="3"><input type="submit" name="submit" value="Simpan" /></td>
        </tr>
    </tbody>
</table>
</form>
<br>Id Barang : 1. Pakaian 2. Celana 3. Aksesoris</br>
<br>id Tipe Baju : 1. Formal 2. Casual</br>
<br>id Jenis Kelamin : 1. Man 2.Woman </br>
<br>id Ukuran baju : 1. S 2.M 3.L 4.XL 5.XXL</br>
<br>id warna kulit :1.putih 2.hitam 3.sawo matang 4.All</br>
<br>id besar perut : 1.regular_fit 2.slim_fit

</body>
</html>
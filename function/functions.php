<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "chevalier"); 

    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    // tambah data
    function tambah($data) {
        global $koneksi;
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $nilai = htmlspecialchars($data["nilai"]);

        // query insert data
        $query = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$kelas', '$nilai')";
        mysqli_query($koneksi, $query);           
        
        return mysqli_affected_rows($koneksi);
    }

    // tambah data biaya
    function tambahBiaya($dataBiaya) {
        global $koneksi;
        $nim2 = htmlspecialchars($dataBiaya["nim"]);
        $nama2 = htmlspecialchars($dataBiaya["nama"]);
        $bpp = htmlspecialchars($dataBiaya["bpp"]);
        $asuransi = htmlspecialchars($dataBiaya["asuransi"]);

        // query insert data
        $query = "INSERT INTO biaya VALUES ('', '$nim2', '$nama2', '$bpp', '$asuransi')";
        mysqli_query($koneksi, $query);           
        
        return mysqli_affected_rows($koneksi);
    }

    // registrasi
    function registrasi($data) {
        global $koneksi;

        $username = strtolower(stripslashes( $data["username"] ) );
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password_confirm = mysqli_real_escape_string($koneksi, $data["password-confirm"]);

        // cek username sudah ada atau belum
        $hasil = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
        if ( mysqli_fetch_assoc($hasil) ) {
            echo "
            <script>
                alert('username telah terdaftar!')
            </script>";
            return false;
        }

        // cek konfirmasi Password
        if ( $password !== $password_confirm ) {
            echo "
            <script>
                alert('konfirmasi password tidak sesuai!')
            </script>";
            return false;
        }

        // enkripsi
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($koneksi);
    }
?>
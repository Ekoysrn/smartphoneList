<?php 
    // koneksi ke database
    $conn = mysqli_connect("localhost","root","","allsmartphone");

    // membuat function agar bisa dilooping di fe
    function query($result){
        global $conn;
        $ds = mysqli_query($conn, $result);
        $as = [];
        
        // looping
        while($rd = mysqli_fetch_array($ds)){
            $as[] = $rd;
        }
        return $as;
    }

    // $np = "INSERT INTO phonename VALUES ('', 'LG'),('','HTC'),('','MOTOROLA'),('','LENOVO'),('','XIAOMI'),('','GOOGLE'),('','HONOR'),('','OPPO'),('','REALME'),('','ONEPLUS'),('','NOTHING'),('','VIVO'),('','MEIZU'),('','ASUS'),('','ALCATEL'),('','ZTE'),('','MICROSOFT'),('','UMIDIGI'),('','ENERGIZER'),('','CAT'),('','SHARP'),('','SHARP'),('','MICROMAX'),('','INFINIX'),('','ULEFONE'),('','TECNO'),('','DOOGEE'),('','BLACKVIEW'),('','CUBOT'),('','ITEL'),('','TCL')";
    // mysqli_query($conn, $np);


    // membuat function untuk menambahkan data dari get
    function addData($data){
        global $conn;

        // menangkap data
        $name = htmlspecialchars($data["name"]);
        $launch = htmlspecialchars($data["launch"]);
        $display = htmlspecialchars($data["display"]);
        $chipset = htmlspecialchars($data["chipset"]);
        $os = htmlspecialchars($data["os"]);
        $ram = htmlspecialchars($data["ram"]);
        $camera = htmlspecialchars($data["camera"]);
        $battery = htmlspecialchars($data["battery"]);
        $price = htmlspecialchars($data["price"]);
        // $image = htmlspecialchars($data["image"]);

        $image = upload();
        if(!$image){
            return false;
        }

        // menambahkan data
        $add = "INSERT INTO allsmartphone VALUES ('','$name','$launch','$display','$chipset','$os','$ram','$camera','$battery','$price','$image')";

        // mysqli connect
        mysqli_query($conn, $add);

    
        // mengembalikan nilai antara 1 (success) or -1 (error)
        return mysqli_affected_rows($conn);
    }

    function upload(){
        $name_file = $_FILES["image"]["name"];
        $type_file = $_FILES["image"]["type"];
        $tmp_file = $_FILES["image"]["tmp_name"];
        $size_file = $_FILES["image"]["size"];
        $error_sts = $_FILES["image"]["error"];
        $directory = 'smartphone/';

        //cek gambar jika tidak diupload
        if($error_sts == 4){
            return 'phone.jpg';
        }

        //validasi extensi image
        $image_extension = ["jpg","jpeg","png"];
        $extension = explode(".",$name_file);
        $extension = strtolower(end($extension));

        if(!in_array($extension, $image_extension)){
            echo "<script>
                alert('silahkan masukan extensi image yang sesuai!');
            </script>";
            return false;
        }

        //cek type image validasi
        if(!$type_file == 'image.jpg' && !$type_file == 'image.png'){
            echo "<script>
                alert('anda memasukan selain gambar!')
            </script>";
            return false;
        }

        // cek size image
        if($size_file > 5000000){
            echo "<script>
                alert('image yang anda masukan terlalu besar!')
            </script>";
            return false;
        }

        $random = uniqid();
        $random .= '.';
        $random .= $extension;


        // return upload image
        move_uploaded_file($tmp_file, $directory.$random);
        return $random;
    }


    // membuat function untuk menghapus data
    function dell($id){
        global $conn;

        // delete image from directory 
        $phone = query("SELECT * FROM allsmartphone WHERE id = $id")[0];

        if($phone["image"] != 'phone.jpg'){
            unlink('smartphone/' . $phone["image"]);
        }

        // menghapus data dari database
        $de = "DELETE FROM allsmartphone WHERE id = $id";


        // query
        mysqli_query($conn, $de);

        // mengembalikan nilai antara 1 (success) & -1 (error)
        return mysqli_affected_rows($conn);
    }

    // membuat function untuk mengedit data dalam database
    function edit($data){
        global $conn;

        // menangkap data
        $id = $data["id"];
        $name = htmlspecialchars($data["name"]);
        $launch = htmlspecialchars($data["launch"]);
        $display = htmlspecialchars($data["display"]);
        $chipset = htmlspecialchars($data["chipset"]);
        $os = htmlspecialchars($data["os"]);
        $ram = htmlspecialchars($data["ram"]);
        $camera = htmlspecialchars($data["camera"]);
        $battery = htmlspecialchars($data["battery"]);
        $price = htmlspecialchars($data["price"]);
        $image_last = htmlspecialchars($data["image_last"]);

        $image = upload();
        if(!$image){
            return false;
        }

        if($image == 'phone.jpg'){
            $image = $image_last;
        }

        // menambahkan data
        $add = "UPDATE allsmartphone SET
                name = '$name',
                launch = '$launch',
                display = '$display',
                chipset = '$chipset',
                os = '$os',
                ram = '$ram',
                camera = '$camera',
                battery = '$battery',
                price = '$price',
                image = '$image'
                WHERE id = '$id'";

        // mysqli connect
        mysqli_query($conn, $add);
    
        // mengembalikan nilai antara 1 (success) or -1 (error)
        return mysqli_affected_rows($conn);
    }

    function search($keyword){
        $d = "SELECT * FROM allsmartphone WHERE name LIKE '%$keyword%' OR price LIKE '%$keyword%'";
        return query($d);

    }


    function register($data){
        global $conn;
        
        $username = stripslashes($data["username"]);
        $password = mysqli_real_escape_string($conn,$data["password"]);
        $password2 = mysqli_real_escape_string($conn,$data["password2"]);


        $samename = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($samename)){
            echo "<script>
                alert('invalid username, please input the username yang ada');
            </script>";
        
            return false;
        }

        if($password !== $password2){
            echo "<script>
                alert('silahkan masukan konfirmasi password yang benar sesuai yang pertama')
            </script>";

            return false;
        }

        if($username == '' && $password == ''){
            echo "<script>
                alert('silahkan masukan data dengan benar')
            </script>";

            return false ;
        }

        $password = password_hash($password,PASSWORD_DEFAULT);

        mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$password')");

        return mysqli_affected_rows($conn);
    }







?>

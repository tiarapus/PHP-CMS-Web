<?php

function select($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
return $rows;
}
function addCategory($post){
    global $conn;
    $category = $post['category'];
    $query = "INSERT INTO categories 
              VALUES (null, '$category')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function insert($post){
    global $conn;
    $userId = $post['userId'];
    $judul = $post['judul'];
    $categoryId = $post['category'];
    $content = $post['content'];
    $foto = upload_file();

    $query = "INSERT INTO articles (judul, userId, categoryId, content, createdAt, foto) 
              VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP(), ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $judul,$userId, $categoryId, $content, $foto);
    $stmt->execute();
    $stmt->close();
    try {
        return $conn->affected_rows;
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
    
}

function saveDraft($post){
    global $conn;

    $judul = $post['judul'];
    $categoryId = $post['category'];
    $content = $post['content'];
    $foto = upload_file();
    $isDraft = $post['isDraft'];

    $query = "INSERT INTO articles (judul, categoryId, content, createdAt, foto, isDraft) 
              VALUES (?, ?, ?, CURRENT_TIMESTAMP(), ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $judul, $categoryId, $content, $foto, $isDraft );
    
    $stmt->execute();
    $stmt->close();

    return $conn->affected_rows;
}

function update($post){
    global $conn;
    $articleId = $post['articleId'];
    $judul = $post['judul'];
    $content = $post['content'];
    $foto = upload_file();

    $query = "UPDATE articles SET judul = ?, content =?, foto = ?, updatedAt = CURRENT_TIMESTAMP() WHERE articleId = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $judul, $content, $foto, $articleId);
    
    $stmt->execute();
    $stmt->close();

    return $conn->affected_rows;
}


function delete($articleId){
    global $conn;

    $query = "DELETE FROM articles WHERE articleId = '$articleId'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function upload_file(){
    $nama_file = $_FILES['sampul']['name'];
    $ukuran_file = $_FILES['sampul']['size'];
    $error = $_FILES['sampul']['error'];
    $tmp_name = $_FILES['sampul']['tmp_name'];

    $extensiValid = ['jpg','jpeg','png'];
    $extensiFile = explode('.', $nama_file);
    $extensiFile = strtolower(end($extensiFile));

    if(!in_array($extensiFile, $extensiValid)){
        echo "<script>
            alert('Format file tidak valid!');
            document.location.href = 'addContent.php';
            </script>";
        die();
    }

    $namaFileBaru = uniqid() . '.' . $extensiFile;
    $uploadDirectory = '../../app/assets/img/' . $namaFileBaru;

    if (move_uploaded_file($tmp_name, $uploadDirectory)) {
        return $namaFileBaru;
    } else {
        echo "<script>
            alert('Upload file gagal. Cek konfigurasi folder dan izin file.');
            document.location.href = 'addContent.php';
            </script>";
        die();
    }
    if($ukuran_file > 10485760){
        echo "<script>
            alert('Ukuran file terlalu besar (Max 2MB)!');
            document.location.href = 'adminDashboard.php';
            </script>";
        die();
    }
}

function register($post){
    global $conn;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $password = strip_tags($post['password']);
    $password = password_hash($password,PASSWORD_DEFAULT);
 

    
    $query = "INSERT INTO users
              VALUES (null, '$username', '$nama', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function isUsernameExists($username) {
    global $conn;
    $query = "SELECT COUNT(*) FROM users WHERE LOWER(username) = LOWER(?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    return $count > 0;
}












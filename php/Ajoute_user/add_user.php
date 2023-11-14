<?php
include_once "../../include/connexion.php";
$login = mysqli_real_escape_string($link, $_POST['login']);
$role = mysqli_real_escape_string($link, $_POST['role']);
$mdp = mysqli_real_escape_string($link,password_hash($_POST['mdp'], PASSWORD_DEFAULT) );

if (!empty($login) && !empty($role) && !empty($mdp)) {
    // let's check user email is valid or not
    if ($login) { // if email is valid
        // let's chek that email already exit in the database
        $sql = mysqli_query($link, "SELECT * FROM user WHERE login = '{$login}'");
        if (mysqli_num_rows($sql) > 0) { //if email already exit
            echo "$login - Cette identifiant existe déjà !";
        } else {
            // let's chek user upload file or not
            if (isset($_FILES['image'])) { //if file is uploaded
                $img_name = $_FILES['image']['name']; // getting user uploaded img name
                // $img_type = $_FILES['image']['type']; // getting user uploaded img type
                $tmp_name = $_FILES['image']['tmp_name']; // this temporary name is used to save/move file in our folder 

                // let's explode image and get the last extension like jpg png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); // here we get the exension of an user uploded img file

                $extensions = ["jpeg", "png", "jpg"]; // these are some valid img ext and we've store them in array
                if (in_array($img_ext, $extensions) === true) { // if user uploaded img is matched width any array exensions
                    $time = time(); // this will return us current time...
                    // we need this time because when you uploding user img to in our folder
                    // we rename user file with current time
                    // so all the image file will have a unique name
                    // let's move the user uploded img to our particular folder
                    $new_img_name = $time . $img_name;

                    if (move_uploaded_file($tmp_name, "../images/" . $new_img_name)) { //if user upload img move to our folder successfully
                        // $status = "En ligne";   //once user signed up then status will be active now
                        $random_id = rand(time(), 10000000); // creating random id for user

                        // let's insert all user data inside table
                        $sql2 = mysqli_query($link, "INSERT INTO user ( login, role, mdp, image) VALUE ( '{$login}', '{$role}', '{$mdp}', '{$new_img_name}')");
                        if ($sql2) { // if these data inserted
                            $sql3 = mysqli_query($link, "SELECT * FROM user WHERE login = '{$login}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                // $_SESSION['id_user'] = $row['id_user']; //using this session we used user unique_id in other php file
                                echo "success";
                            }
                        } else {
                            echo "Quelque chose s'est mal passé";
                        }
                    }
                } else {
                    echo "Veuillez sélectionner un fichier image - jpeg, jpg, png!";
                }
            } else {
                echo "Veuillez sélectionner un fichier image!";
            }
        }
    } else {
        echo "$login - Cette identifiant est deja utilisée!";
    }
} else {
    echo "Tous les champs de saisie sont obligatoires !";
}
?>
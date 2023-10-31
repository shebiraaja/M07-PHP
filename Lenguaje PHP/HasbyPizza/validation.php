<?php
require_once("./layout-structure.php");
require_once("./functions.php");
myHeader();

$info = [];
$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //name
    if (isset($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);

        if (!empty($name)) {
            if (preg_match("/^[a-zA-Z-' ]+$/", $name)) {
                $info['name'] = trim($name);
            } else {
                $errors['name'] = "Porfavor introduce un nombre válido";
            }
        }
    } else {
        $errors['name'] = "El nombre no puede estar vacío";
    }



    //surname
    if (isset($_POST['surname'])) {
        $surname = htmlspecialchars($_POST['surname']);

        if (!empty($surname)) {
            if (preg_match("/^[a-zA-Z-' ]+$/", $surname)) {
                $info['surname'] = trim($surname);
            } else {
                $errors['surname'] = "Porfavor introduce un apellido válido";
            }
        } else {
            $errors['surname'] = "El apellido no puede estar vacío";
        }
    }


    //email
    if (isset($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);

        if (!empty($email)) {
            if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
                $info['email'] = trim($email);
            } else {
                $errors['email'] = "Porfavor introduce un email válido";
            }
        } else {
            $errors['email'] = "El email no puede estar vacío";
        }
    }


    //phoneNumber
    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);

        if (!empty($phoneNumber)) {
            if (preg_match("/^[6789]\d{8}$/", $phoneNumber)) {
                $info['phoneNumber'] = trim($phoneNumber);
            } else {
                $errors['phoneNumber'] = "Porfavor introduce un telefono válido";
            }
        } else {
            $errors['phoneNumber'] = "El phoneNumber no puede estar vacío";
        }
    }





    //city
    if (isset($_POST['city'])) {
        $city = htmlspecialchars($_POST['city']);

        if (!empty($city)) {
            if (preg_match("/^[a-zA-Z-' ]+$/", $city)) {
                $info['city'] = trim($city);
            } else {
                $errors['city'] = "Porfavor introduce una ciudad válida";
            }
        } else {
            $errors['city'] = "La ciudad no puede estar vacía";
        }
    }


    if (isset($_POST['discount'])) {
        //menu1
        if (isset($_POST['menu1'])) {

            if (isset($_POST['quantity1'])) {
                $quantity1 = htmlspecialchars($_POST['quantity1']);

                if (!empty($quantity1)) {

                    if ((filter_var($quantity1, FILTER_VALIDATE_INT))) {

                        if ($quantity1 < 0) {
                            $errors['quantity1'] = "Porfavor introduce una cantidad válida";
                        } else {
                            $info['quantity1'] = trim($quantity1);
                        }
                    } else {
                        $errors['quantity1'] = "Porfavor introduce una cantidad válida";
                    }
                } else {
                    $errors['quantity1'] = "La ciudad no puede estar vacía";
                }
            }
        }


        if (isset($_POST['menu2'])) {
            if (isset($_POST['quantity2'])) {
                $quantity2 = htmlspecialchars($_POST['quantity2']);

                if (!empty($quantity2)) {

                    if ((filter_var($quantity2, FILTER_VALIDATE_INT))) {

                        if ($quantity2 < 0) {
                            $errors['quantity2'] = "Porfavor introduce una cantidad válida";
                        } else {
                            $info['quantity2'] = trim($quantity2);
                        }
                    } else {
                        $errors['quantity2'] = "Porfavor introduce una cantidad válida";
                    }
                } else {
                    $errors['quantity2'] = "La ciudad no puede estar vacía";
                }
            }
        }


        if (isset($_POST['menu3'])) {
            if (isset($_POST['quantity3'])) {
                $quantity3 = htmlspecialchars($_POST['quantity3']);

                if (!empty($quantity3)) {

                    if ((filter_var($quantity3, FILTER_VALIDATE_INT))) {

                        if ($quantity3 < 0) {
                            $errors['quantity3'] = "Porfavor introduce una cantidad válida";
                        } else {
                            $info['quantity3'] = trim($quantity3);
                        }
                    } else {
                        $errors['quantity3'] = "Porfavor introduce una cantidad válida";
                    }
                } else {
                    $errors['quantity3'] = "La ciudad no puede estar vacía";
                }
            }
        }
    }




    if (isset($_POST['custom'])) {


        // if (isset($_POST['sizePizza'])) {
        //     $sizePizza = $_POST['sizePizza'];
        //     $info['sizePizza'] = $sizePizza;
        // }else {
        //     $errors['sizePizza'] = "Porfavor selecciona una pizza";

        // }

        if (isset($_POST['quantityCustom'])) {
            $quantityCustom = htmlspecialchars($_POST['quantityCustom']);

            if (!empty($quantityCustom)) {

                if ((filter_var($quantityCustom, FILTER_VALIDATE_INT))) {

                    if ($quantityCustom < 0) {
                        $errors['quantityCustom'] = "Porfavor introduce una cantidad válida";
                    } else {
                        $info['quantityCustom'] = trim($quantityCustom);
                    }
                } else {
                    $errors['quantityCustom'] = "Porfavor introduce una cantidad válida";
                }
            } else {
                $errors['quantityCustom'] = "La ciudad no puede estar vacía";
            }
        }





        // if (isset($_POST['dough'])) {
        //     $dough = $_POST['dough'];
        //     $info['dough'] = trim($dough);
        // } else {
        //     $errors['dough'] = "Porfavor selecciona una massa";
        // }


        // if (isset($_POST['ingredients'])) {
        //     $ingredientes = $_POST['ingredients'];
        //     $info['ingredientes'] = trim($ingredientes);
        // } else {
        //     $errors['ingredientes'] = "Porfavor selecciona ingredientes";
        // }


        // if (isset($_POST['extras'])) {
        //     $extras = $_POST['extras'];
        //     $info['extras'] = trim($extras);
        // } else {
        //     $errors['extras'] = "Porfavor selecciona extras";
        // }
    }
}


if (!empty($errors)) {
    redirect_with("./pedidoForm.php", [
        'info' => $info,
        'errors' => $errors
    ]);
}
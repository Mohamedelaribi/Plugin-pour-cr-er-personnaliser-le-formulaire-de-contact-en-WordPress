<?php
/**
 * @package Example_plugin
 * @version 1.0.0
 */
/*
 Plugin Name: MLSA contact
 Plugin URI: https://wordpress.com
 Description: Vous Pouvez Créer Votre Formulaire De Contact
 Version: 0.1
 Author: Amine & Mohamed
 Author URI: https://wordpress.com
 */

// Ajouter Pluhin dans le menu

function contact_plugin_page(){


    add_menu_page('contact option','Contact','manage_options','contact_plugin','contact_plugin','dashicons-contact',60);
}

add_action('admin_menu','contact_plugin_page');

function contact_plugin(){
    $first_name_check = "";
    $last_name_check = "";
    $email_check = "";
    $address = "";
    $tel="";
    $message="";
    if(get_option('first_name')){
        $first_name_check = "checked";
    }
    if(get_option('last_name')){
        $last_name_check = "checked";
    }
    if(get_option('email')){
        $email_check = "checked";
    }
    if(get_option('address')){
        $address = "checked";
    }
    if(get_option('tel')){
        $tel = "checked";
    }
    if(get_option('message')){
        $message = "checked";
    }
    echo '
            <h1>choose your form de contact</h1>
            <form method="POST" action="">
                <div style="display:flex; flex-direction: column; align-items: flex-start">
                    <Label class="labelForForm"><input class="inputForForm" type="checkbox" name="first_name" '. $first_name_check .'>First Name</Label>
                    <Label class="labelForForm"><input class="inputForForm" type="checkbox" name="last_name" '. $last_name_check .'>Last Name</Label>
                    <Label class="labelForForm"><input class="inputForForm" type="checkbox" name="email" '. $email_check .'>Email</Label>
                    <Label class="labelForForm"><input class="inputForForm" type="checkbox" name="address" '. $address .'>Address</Label>
                    <Label class="labelForForm"><input class="inputForForm" type="checkbox" name="tel" '. $tel .'>Telephone</Label>
                    <Label class="labelForForm"><input class="inputForForm" type="checkbox" name="message" '. $message.'>Message</Label>
                    <input type="submit" name="submit_btn">
                </div>
        </form>';
}

if(isset($_POST["submit_btn"])){
    $list["first_name"] = 0;
    $list["last_name"] = 0;
    $list["email"] = 0;
    $list["address"] = 0;
    $list["tel"]= 0;
    $message["message"]=0;
    if(isset($_POST["first_name"])){
        $list["first_name"] = 1;

    }
    if(isset($_POST["last_name"])){
        $list["last_name"] = 1;

    }
    if(isset($_POST["email"])){
        $list["email"] = 1;

    }
    if(isset($_POST["address"])){
        $list["address"] = 1;

    }
    if(isset($_POST["tel"])){
        $list["tel"] = 1;

    }
    if(isset($_POST["message"])){
        $list["message"] = 1;

    }

    update_option('first_name', $list["first_name"]);
    update_option('last_name', $list["last_name"]);
    update_option('email', $list["email"]);
    update_option('address', $list["address"]);
    update_option('tel', $list["tel"]);
    update_option('message', $list["message"]);


}


//form

    function add_form(){
    $formAdd=false;
    if (get_option('first_name')){
        echo'<label class="labelForContact">First Name: <input class="inputForContact" type="text"></label>';
        $formAdd=true;
    }
    if (get_option('last_name')){
        echo '<label class="labelForContact">Last Name: <input class="InputForConcat" type="text"></label>';
        $formAdd=true;
    }
        if (get_option('email')){
            echo '<label class="labelForContact">Email: <input class="inputForContact" type="email"></label>';
            $formAdd=true;
        }
        if (get_option('address')){
            echo '<label class="labelForForm">Address: <input class="inputForContact" type="text"></label>';
            $formAdd=true;
        }
        if (get_option('tel')){
            echo '<label class="labelForForm">Telephone: <input class="inputForContact" type="tel"></label>';
            $formAdd=true;
        }
        if (get_option('message')){
            echo '<label class="labelForForm">Date Of Birth: <input class="inputForContact" type="text"></label>';
            $formAdd=true;
        }
        if ($formAdd){
            echo '<input id="button" type="submit" name="submit_btn">';
        }
}
    add_shortcode('contact_form','add_form');
?>


<style>
    .labelForForm{
        font-family: sans-serif;
        font-size: 20px;
        padding: 10px;
    }
    .labelForContact{
        font-family: sans-serif;
        font-size: 20px;
    }
    .inputForContact{
        size: 20px;
        width: 10px;
    }
    #button{
        size: 50px;
        width: 125px;
        border-radius: 30px;
        margin-left: 350px;
    }
</style>


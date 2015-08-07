<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();


    $app->get("/", function() {


        $output = "";

        $all_contacts = Contact::getAll();

        if (!empty($all_contacts)) {
            $output .= "
                <h1>To Do List</h1>
                <p>Here are all your tasks:</p>
                ";

            foreach ($all_contacts as $contact) {
                $output .= "<p>" . $contact->getName() . "</p>";
            }
        }

        $output .= "
        <form action='/contacts' method='post'>
            <label for='name'>Enter Name</label>
            <input id='name' name='name' type='text'>

            <button type='submit'>Enter Name</button>
        </form>
        ";

        $output .= "
        <form action='/delete_tasks' method='post'>
            <button type='submit'>Delete</button>
        </form>
        ";

        return $output;
    });

    $app->post("/contacts", function() {
        $contact = new Contact($_POST['name']);
        $contact->save();
        return "
            <h1>You created a contact!</h1>
            <p>" . $contact->getName() . "</p>
            <p><a href='/'>View your list of Contacts.</a></p>
        ";
    });

    $app->post("/delete_contacts", function() {

        Contact::deleteAll();

        return "
            <h1>List Cleared!</h1>
            <p><a href='/'>Home</a></p>
        ";
    });

    return $app;

?>

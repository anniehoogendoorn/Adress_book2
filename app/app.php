<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $test_contact = new Contact("Learn PHP.");
        $another_test_contact = new Contact("Learn Drupal.");
        $third_contact = new Contact("Visit France.");

        $list_of_contacts = array($test_contact, $another_test_contact, $third_contact);
        $output = "";

        foreach ($list_of_contacts as $contact) {
            $output = $output . "<p>" . $contact->getName() . "</p>";
        }

        return $output;
    });

    return $app;

?>

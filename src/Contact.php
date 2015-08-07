<?php
    class Contact
    {
        private $name;
    }

    function __construct($name)
    {
        $this->name = $name
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->name;
    }

?>

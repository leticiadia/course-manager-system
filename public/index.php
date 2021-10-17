<?php

switch($_SERVER['PATH_INFO']){
    case '/courses-list': {
        require 'courses-list.php';
        break;
    }

    case '/new-course': {
        require 'new-course-form.php';
        break;
    }

    default: {
        echo "Error 404";
    }
}
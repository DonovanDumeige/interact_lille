<?php

define("ROUTES", [
    "admin"=>[
        "controller"=>"AdminController",
        "fonction"=>"read"
    ],
    "admin/login"=>[
        "controller"=>"AdminController",
        "fonction"=>"login"
    ],

    "admin/new"=>[
        "controller"=>"AdminController",
        "fonction"=>"create"
    ],
    
    "admin/update"=>[
        "controller"=>"AdminController",
        "fonction"=>"update"
    ]

    /*
    "admin/delete"=>[
        "controller"=>"AdminController",
        "fonction"=>"delete"
    ], */


]);
?>
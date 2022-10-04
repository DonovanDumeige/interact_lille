<?php

define("ROUTES", [

    # routes game

    "categorie"=>[
        "controller"=>"GameController",
        "fonction"=>"readCategories"
    ],
    # routes admin
    "admin"=>[
        "controller"=>"AdminController",
        "fonction"=>"read"
    ],
    "admin/login"=>[
        "controller"=>"AdminController",
        "fonction"=>"login"
    ],
    "admin/logout"=>[
        "controller"=>"AdminController",
        "fonction"=>"logout"
    ],
    
    "admin/new"=>[
        "controller"=>"AdminController",
        "fonction"=>"create"
    ],
    
    "admin/update"=>[
        "controller"=>"AdminController",
        "fonction"=>"update"
    ],

    
    "admin/delete"=>[
        "controller"=>"AdminController",
        "fonction"=>"delete"
    ]


]);
?>
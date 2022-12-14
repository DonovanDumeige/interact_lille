<?php

define("ROUTES", [

    # routes game

    ""=>[
        "controller"=>"userController",
        "fonction"=>"login"
    ],
    "categories"=>[
        "controller"=>"GameController",
        "fonction"=>"readCategories"
    ],

    "categorie/places"=>[
        "controller"=>"GameController",
        "fonction"=>"readPlaces"
    ],

    "place/question"=>[
        "controller"=>"GameController",
        "fonction"=>"readQuestion"
    ],

    "place/question/answer"=>[
        "controller"=>"GameController",
        "fonction"=>"readAnswer"
    ],
    # routes admin
    "admin"=>[
        "controller"=>"AdminController",
        "fonction"=>"read"
    ],
    "register"=>[
        "controller"=>"AdminController",
        "fonction"=>"register"
    ],
    "login"=>[
        "controller"=>"AdminController",
        "fonction"=>"login"
    ],
    "logout"=>[
        "controller"=>"AdminController",
        "fonction"=>"logout"
    ],
    
    "admin/new"=>[
        "controller"=>"AdminController",
        "fonction"=>"create"
    ],
    
/*  "admin/detail"=>[
        "controller"=>"AdminController",
        "fonction"=>"readDetail"
    ]  */
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
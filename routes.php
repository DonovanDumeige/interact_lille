<?php

define("ROUTES", [

    # routes game

    ""=>[
        "controller"=>"GameController",
        "fonction"=>"start"
    ],
    "categorie"=>[
        "controller"=>"GameController",
        "fonction"=>"readCategories"
    ],

    "lieu"=>[
        "controller"=>"GameController",
        "fonction"=>"readPlaces"
    ],

    "lieu/question"=>[
        "controller"=>"GameController",
        "fonction"=>"readQuestion"
    ],

    "lieu/question/answer"=>[
        "controller"=>"GameController",
        "fonction"=>"readAnswer"
    ],
    # routes admin
    "admin"=>[
        "controller"=>"AdminController",
        "fonction"=>"read"
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
    
/*     "admin/detail"=>[
        "controller"=>"AdminController",
        "fonction"=>"readDetail"
    ] */
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
<?php
function biodata()
{
    $data = [
        "name" => "Rian Khanafi",
        "age" => 18,
        "address" => "Jenggeran kec. Kalikajar kab. Wonosobo",
        "hobbies" => array("Coding", "Advanture", "Bulu Tangkis"),
        "is_marrid" => false,
        "list_school" => array(
            "SDN 5 BUTUH KIDUL" =>
            [
                "year_in" => null,
                "year_out" => null,
                "major" => null
            ],
            "SMPN 3 KALIKAJAR" => [
                "year_in" => "2013",
                "year_out" => "2016",
                "major" => null
            ],
            "SMKS TAKHASSUS AL-QUR'AN WONOSOBO" =>  [
                "year_in" => "2016",
                "year_out" => "2019",
                "major" => "Rekayasa Perangkat Lunak"
            ]
        ),
        "skills" => [
            "Skill Name" => "PHP and Mysqli Program",
            "level" => "Advanced"
        ],
        [
            "Skill Name" => "Framework",
            "level" => "beginner"
        ],
        [
            "Skill Name" => "Design",
            "level" => "beginner"
        ],
        [
            "Skill Name" => "Js",
            "level" => "beginner"
        ],
        [
            "Skill Name" => "English Language",
            "level" => "beginner"
        ],
        "interest_in_coding" => true
    ];
    $json = json_encode($data);
    var_dump($json);
}

echo biodata();

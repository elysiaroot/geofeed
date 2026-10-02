<?php
declare(strict_types=1);

function getFeeds(): array
{
    return [
        '2602-f494-cidr-36.csv' => [

            // United States of America (USA) / アメリカ合衆国
            'USA' => [
                'CODE' => 'US',
                'DATA' => [
                    'New York' => [
                        ['CIDR' => '2602:f494::/48',   'COUNTRY_CODE' => 'US', 'STATE_CODE' => 'US-NY'],
                    ],
                ],
            ],

            // Japan / 日本
            'JAPAN' => [
                'CODE' => 'JP',
                'DATA' => [
                    'Tokyo' => [
                        ['CIDR' => '2602:f494:1::/48', 'COUNTRY_CODE' => 'JP', 'STATE_CODE' => 'JP-13'],
                    ],
                ],
            ],

            // Republic of Korea / 大韓民国
            'Rep of, Korea' => [
                'CODE' => 'KR',
                'DATA' => [
                    'Seoul' => [
                        ['CIDR' => '2602:f494:2::/48', 'COUNTRY_CODE' => 'KR', 'STATE_CODE' => 'KR-11'],
                    ],
                ],
            ],

            // Canada / カナダ
            'CANADA' => [
                'CODE' => 'CA',
                'DATA' => [
                    'Quebec' => [
                        ['CIDR' => '2602:f494:3::/48', 'COUNTRY_CODE' => 'CA', 'STATE_CODE' => 'CA-QC'],
                    ],
                ],
            ],

        ],
        '69-36-44-to-47-cidr-22.csv' => [
            // United States of America (USA) / アメリカ合衆国
            'USA' => [
                'CODE' => 'US',
                'DATA' => [
                    'Kansas' => [
                        ['CIDR' => '69.36.44.0/24',   'COUNTRY_CODE' => 'US', 'STATE_CODE' => 'US-KS'],
                    ],
                ],
            ],

            // Canada / カナダ
            'CANADA' => [
                'CODE' => 'CA',
                'DATA' => [
                    'Quebec' => [
                        ['CIDR' => '69.36.45.0/24', 'COUNTRY_CODE' => 'CA', 'STATE_CODE' => 'CA-QC'],
                    ],
                ],
            ],

            // Japan / 日本
            'JAPAN' => [
                'CODE' => 'JP',
                'DATA' => [
                    'Tokyo' => [
                        ['CIDR' => '69.36.46.0/24', 'COUNTRY_CODE' => 'JP', 'STATE_CODE' => 'JP-13'],
                    ],
                ],
            ],
        ]
    ];
}
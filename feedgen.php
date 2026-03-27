<?php
include(__DIR__ . '/_gen/location.php');
$metadata = [
    [
        'FILENAME' => '2602-f494-cidr-36.csv',
        'GEOLOCATION'=>[
            'USA' => $FEED_2602_F494_USA,
            'JAPAN' => $FEED_2602_F494_JAPAN,
            "Rep of, Korea" => $FEED_2602_F494_KOREA,
            "CANADA" => $FEED_2602_F494_CANADA
        ]
    ]
];

// Template for feed header
$datetime = new DateTime('now', new DateTimeZone('UTC'));

$template = <<<TEMPLATE
# Date updated {$datetime->format('\U\T\C\:Y-m-d H:i')}
TEMPLATE;

// Generate feed content
foreach($metadata as $feed) {
    $template .= "\n# {$feed['FILENAME']}\n";
    foreach($feed['GEOLOCATION'] as $country => $data) {
        $template .= "#######################\n";
        $template .= "# {$country}\n";
        $template .= "# https://www.iso.org/obp/ui/#iso:code:3166:{$data['CODE']}\n";
        $template .= "#######################\n";
        foreach($data['DATA'] as $state => $locations) {
            $template .= "# {$state}, {$country}\n";
            foreach($locations as $location) {
                $template .= "{$location['CIDR']},{$location['COUNTRY_CODE']},{$location['STATE_CODE']},\"{$state}\"\n";
            }
        }
        $template .= "#\n#\n#\n#\n#\n";
    }

    file_put_contents(__DIR__ . '/feed/' . $feed['FILENAME'], $template);
}
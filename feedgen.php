<?php
declare(strict_types=1);

require_once __DIR__ . '/_gen/location.php';

const FEED_DIR = __DIR__ . '/feed';
const ISO_URL  = 'https://www.iso.org/obp/ui/#iso:code:3166:';

function buildFeed(string $filename, array $geolocation): string
{
    $now   = new DateTimeImmutable('now', new DateTimeZone('UTC'));
    $lines = [
        '# Date updated ' . $now->format('\U\T\C\:Y-m-d H:i'),
        "# {$filename}",
    ];

    foreach ($geolocation as $country => $info) {
        array_push($lines,
            '#######################',
            "# {$country}",
            '# ' . ISO_URL . $info['CODE'],
            '#######################',
        );
        foreach ($info['DATA'] as $state => $locations) {
            $lines[] = "# {$state}, {$country}";
            foreach ($locations as $loc) {
                $lines[] = "{$loc['CIDR']},{$loc['COUNTRY_CODE']},{$loc['STATE_CODE']},\"{$state}\"";
            }
        }
        array_push($lines, '#', '#', '#', '#', '#');
    }

    return implode("\n", $lines) . "\n";
}

function writeFeed(string $filename, string $content): void
{
    $path = FEED_DIR . '/' . $filename;
    if (file_put_contents($path, $content) === false) {
        throw new RuntimeException("Failed to write feed: {$path}");
    }
}

// ── Main ────────────────────────────────────────────────────────────────────

foreach (getFeeds() as $filename => $geolocation) {
    writeFeed($filename, buildFeed($filename, $geolocation));
    echo "Generated: {$filename}\n";
}
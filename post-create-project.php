<?php
// @codingStandardsIgnoreFile

// Remove Polus meta
array_map(
    'unlink',
    [
        'LICENSE',
        'README.md',
    ]
);
echo "- Removed Polus meta" . PHP_EOL;

// Cleanup composer.json
$composerJson = json_decode(file_get_contents('composer.json'), true);

unset(
    $composerJson['name'],
    $composerJson['description'],
    $composerJson['license'],
    $composerJson['scripts']
);

file_put_contents(
    'composer.json',
    json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);
echo "- Cleaned composer.json" . PHP_EOL;

// Remove post install command
unlink('post-create-project.php');
echo "- Removed post-create-project.php command\n";

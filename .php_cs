<?php

date_default_timezone_set('Asia/Shanghai');
$timestamp = date('Y-m-d H:i:s O');

$header = <<<EOF
@author   Fung Wing Kit <wengee@gmail.com>
@version  $timestamp
EOF;

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        '@PHP71Migration:risky' => true,
        '@PHP73Migration' => true,

        'header_comment' => [
            'commentType' => 'PHPDoc',
            'header' => $header,
            'separate' => 'bottom'
        ],
        'blank_line_after_opening_tag' => false,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('/vendor/*')
            ->in(__DIR__)
    )
    ->setUsingCache(false);

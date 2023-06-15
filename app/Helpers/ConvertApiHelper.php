<?php

namespace App\Helpers;

use \ConvertApi\ConvertApi;

class ConvertApiHelper
{
    private static $apiSecret = 'GZ20icrFwpLrmTq1'; // Ubah dengan API key kamu

    public static function convertDocxToPdf($inputFilePath, $outputFilePath)
    {
        ConvertApi::setApiSecret(self::$apiSecret);

        $result = ConvertApi::convert('pdf', [
            'File' => $inputFilePath,
            'Timeout' => 120,
        ]);

        $result->getFile()->save($outputFilePath);
    }

    public static function setApiSecret($apiSecret)
    {
        \ConvertApi\ConvertApi::setApiSecret($apiSecret);
    }
}


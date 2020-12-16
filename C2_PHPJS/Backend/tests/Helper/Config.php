<?php

namespace WorldSkills\Trade17\Tests\Helper;

class Config {
    public static $LOGIN_TOKEN = [
        'attendee1' => '6fcf38dfc3b9d4c1816cc536efa7dcca',
        'attendee2' => '2a0b056e56f17fdd885d820342b814b2',
    ];
    public static $USERS = [
        'attendee1' => ['lastname' => 'Yakovich', 'registration_code' => '35DGZX'],
        'attendee2' => ['lastname' => 'Darthe', 'registration_code' => 'UP243M'],
    ];

    /**
     * Parse env file
     */
    public static function parseEnvFile()
    {
        @ini_set('auto_detect_line_endings', true);

        $path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'.env';
        if (file_exists($path)) {
            $fn = fopen($path, 'r');

            while (!feof($fn)) {
                $line = trim(fgets($fn));

                if (substr($line, 0, 1) !== '#' && substr($line, 0, 1) !== ';') {
                    $eqPos = strpos($line, '=');
                    $key = substr($line, 0, $eqPos);
                    $value = trim(substr($line, $eqPos + 1));
                    $existing = getenv($key);

                    if ($eqPos > 0 && ($existing === false || $existing === '')) {
                        putenv($key.'='.$value);
                    }
                }
            }

            fclose($fn);
        }
    }

    /**
     * Get the test configuration.
     * Default values can be overwritten with environment variables.
     */
    public static function get()
    {
        $url = getenv('URL') ?: 'http://localhost';
        if (substr($url, 0, 4) !== 'http') {
            $url = 'http://' . $url;
        }

        return [
            'db_host' => getenv('DB_HOST') ?: '127.0.0.1',
            'db_user' => getenv('DB_USER') ?: 'root',
            'db_pw' => getenv('DB_PW') ?: '',
            'db_name' => getenv('DB_NAME') ?: 'wsc_t17',
            'basic_auth_user' => getenv('BASIC_AUTH_USER') ?: '',
            'basic_auth_pw' => getenv('BASIC_AUTH_PW') ?: '',
            'url' => $url,
        ];
    }
}

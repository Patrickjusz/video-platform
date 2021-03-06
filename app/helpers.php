<?php


if (!function_exists('convertToPolishMonth')) {
    /**
     * @param string $str
     * @return string
     * Convert ENG months name to PL
     */
    function convertToPolishMonth(string $str = ''): string
    {
        $monthsEnglish = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthsPolish = ['Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru'];

        return str_replace($monthsEnglish, $monthsPolish, $str);
    }
}


if (!function_exists('shortNumberFormat')) {
    /**
     * @param int $n
     * @return string
     * Use to convert large positive numbers in to short form like 1K+, 100K+, 199K+, 1M+, 10M+, 1B+ etc
     */
    function shortNumberFormat(int $n): string
    {
        $viewsText = '';
        switch ($n) {
            case 0:
                $viewsText = 'wyświetleń';
                break;
            case 1:
                $viewsText = 'wyświetlenie';
                break;
            case 2:
                $viewsText = 'wyświetlenia';
                break;
            case 3:
                $viewsText = 'wyświetlenia';
                break;
            case 4:
                $viewsText = 'wyświetlenia';
                break;
            default:
                $viewsText = 'wyświetleń';
        }

        if ($n >= 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'tys';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'mln';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'mld';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'bln';
        }

        return (!empty($n_format . $suffix) ? $n_format . $suffix : 0) . ' ' . $viewsText;
    }
}


if (!function_exists('timeElapsedString')) {
    /**
     * Convert datetime "how much time has passed" (Polish format)
     * 
     * @param DateTime $datetime
     * @param bool $full
     * 
     * @return string
     * Convert date to time ago (polish)
     */
    function timeElapsedString($datetime, $full = false): string
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
            'y' => 'lata',
            'm' => 'miesiące',
            'w' => 'tygodnie',
            'd' => 'dni'
        ];

        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);

        $typeTag = key($string); //d/w/m/y
        $ret = explode(' ', implode(', ', $string));
        switch ($typeTag) {
            case 'y':
                if ($ret[0] <= 1) {
                    $ret[1] = 'rok';
                } else if ($ret[0] > 1 && $ret[0] < 5) {
                    $ret[1] = 'lata';
                } else if ($ret[0] > 4) {
                    $ret[1] = 'lat';
                }
                break;
            case 'm':
                if ($ret[0] == 1) {
                    $ret[1] = 'miesiąc';
                } else if ($ret[0] > 1 && $ret[0] < 5) {
                    $ret[1] = 'miesiące';
                } else if ($ret[0] > 4) {
                    $ret[1] = 'miesięcy';
                }
                break;
            case 'w':
                if ($ret[0] <= 1) {
                    $ret[1] = 'tydzień';
                } else {
                    $ret[1] = 'tygodnie';
                }
                break;
            case 'd':
                if ($ret[0] <= 1) {
                    $ret[1] = 'dzień';
                } else {
                    $ret[1] = 'dni';
                }
                break;
            default:
        }

        if ($ret[0] == "") {
            unset($ret[0]);
        }

        return $ret ? implode(' ', $ret) . ' temu' : 'dzisiaj';
    }
}


if (!function_exists('getNavigation')) {
    function getNavigationElements()
    {
        return [
            ['text' => 'Najnowsze', 'icon' => 'fas fa-2x fa-calendar-alt', 'url' => route('video.index'), 'show' => 1],
            ['text' => 'Popularne', 'icon' => 'fas fa-2x fa-fire-alt', 'url' => route('video.popular'), 'show' => 1],
            ['text' => 'YouTube', 'icon' => 'fab fa-2x fa-youtube', 'url' => 'https://www.youtube.com/channel/UCxnQfWxR4Xp4Tv_dLh2Xvtw', 'show' => 1],
            ['text' => 'Na żywo', 'icon' => 'fas fa-2x fa-headset', 'url' => '#', 'show' => 0],
            ['text' => 'Facebook', 'icon' => 'fab fa-2x fa-facebook-square', 'url' => 'https://www.facebook.com/HakerEduPL', 'show' => 1],
            ['text' => 'Discrod', 'icon' => 'fab fa-2x fa-discord', 'url' => 'https://discord.gg/Rr9e6ugjay', 'show' => 1],
            ['text' => 'Twitter', 'icon' => 'fab fa-2x fa-twitter-square', 'url' => 'https://twitter.com/hakeredupl', 'show' => 1],
        ];
    }
}

if (!function_exists('isDev')) {
    /**
     * Check developer mode
     * 
     * @return bool
     */
    function isDev(): bool
    {
        return App::environment() == 'local';
    }
}

if (!function_exists('htmlToString')) {
    function htmlToString($html)
    {
        return substr(trim(str_replace("&nbsp;", ' ', preg_replace("/\r|\n/", "", strip_tags($html ?? '')))), 0, 157) . '...';
    }
}

if (!function_exists('getApiKey')) {
    /**
     * Get API key
     * 
     * @return string
     */
    function getApiKey(): string
    {
        return env("API_KEY");
    }
}

if (!function_exists('slugify')) {
    /**
     * slugify
     *
     * @param  string $text
     * @param  string $divider
     * @return string
     */
    function slugify(string $text, string $divider = '-'): string
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

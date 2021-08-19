<?php


if (!function_exists('convertToPolishMonth')) {
    /**
     * @param $str
     * @return string
     * Convert ENG months name to PL
     */
    function convertToPolishMonth($str = '')
    {
        $m_en = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        $m_pol = array('Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru');

        return str_replace($m_en, $m_pol, $str);
    }
}


if (!function_exists('shortNumberFormat')) {
    /**
     * @param $n
     * @return string
     * Use to convert large positive numbers in to short form like 1K+, 100K+, 199K+, 1M+, 10M+, 1B+ etc
     */
    function shortNumberFormat($n)
    {
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

        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }
}


if (!function_exists('timeElapsedString')) {
    /**
     * @param $datetime
     * @param $full
     * @return string
     * Convert date to time ago (polish)
     */
    function timeElapsedString($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        // $singleForm = [
        //     'y' => 'lat',
        //     'm' => 'miesiąc',
        //     'w' => 'tydzień',
        //     'd' => 'dzień'
        // ];

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
        return $string ? implode(', ', $string) . ' temu' : 'dzisiaj';
    }
}

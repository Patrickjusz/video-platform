<?php


if (!function_exists('convertToPolishMonth')) {
    function convertToPolishMonth($str = '')
    {
        $m_en = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        $m_pol = array('Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru');

        return str_replace($m_en, $m_pol, $str);
    }
}

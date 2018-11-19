<?php

/**
 * Class Kohana_Recaptcha_Helper
 */
class Kohana_Recaptcha_Helper
{
    const ARABIC = 'ar';
    const AFRIKAANS = 'af';
    const AMHARIC = 'am';
    const ARMENIAN = 'hy';
    const AZERBAIJANI = 'az';
    const BASQUE = 'eu';
    const BENGALI = 'bn';
    const BULGARIAN = 'bg';
    const CATALAN = 'ca';
    const CHINESE_HK = 'zh-HK';
    const CHINESE_SIMPLIFIED = 'zh-CN';
    const CHINESE_TRADITIONAL = 'zh-TW';
    const CROATIAN = 'hr';
    const CZECH = 'cs';
    const DANISH = 'da';
    const DUTCH = 'nl';
    const ENGLISH_UK = 'en-GB';
    const ENGLISH_US = 'en';
    const ESTONIAN = 'et';
    const FILIPINO = 'fil';
    const FINNISH = 'fi';
    const FRENCH = 'fr';
    const FRENCH_CANADIAN = 'fr-CA';
    const GALICIAN = 'gl';
    const GEORGIAN = 'ka';
    const GERMAN = 'de';
    const GERMAN_AUSTRIA = 'de-AT';
    const GERMAN_SWITZERLAND = 'de-CH';
    const GREEK = 'el';
    const GUJURATI = 'gu';
    const HEBREW = 'iw';
    const HINDI = 'hi';
    const HUNGARIAN = 'hu';
    const ICELANDIC = 'is';
    const INDONESIAN = 'id';
    const ITALIAN = 'it';
    const JAPANESE = 'ja';
    const KANNADA = 'kn';
    const KOREAN = 'ko';
    const LAOTHIAN = 'lo';
    const LATVIAN = 'lv';
    const LITHUANIAN = 'lt';
    const MALAY = 'ms';
    const MALAYALAM = 'ml';
    const MARATHI = 'mr';
    const MONGOLIAN = 'mn';
    const NORWEGIAN = 'no';
    const PERSIAN = 'fa';
    const POLISH = 'pl';
    const PORTUGESE = 'pt';
    const PORTUGESE_BRAZIL = 'pt-BR';
    const PORTUGESE_PORTUGAL = 'pt-PT';
    const ROMANIAN = 'ro';
    const RUSSIAN = 'ru';
    const SERBIAN = 'sr';
    const SINHALESE = 'si';
    const SLOVAK = 'sk';
    const SLOVENIAN = 'sl';
    const SPANISH = 'es';
    const SPANISH_LATIN_AMERICA = 'es-419';
    const SWAHILI = 'sw';
    const SWEDISH = 'sv';
    const TAMIL = 'ta';
    const TELUGU = 'te';
    const THAI = 'th';
    const TURKISH = 'tr';
    const UKRAINIAN = 'uk';
    const URDU = 'ur';
    const VIETNAMESE = 'vi';
    const ZULU = 'zu';

    /**
     * Get Api URL
     * @param String $lang
     * @param Recaptcha $recaptcha
     * @return String
     */
    public static function getApiUrl(String $lang = self::ENGLISH_US, Recaptcha $recaptcha)
    {
        return 'https://www.google.com/recaptcha/api.js?' . http_build_query([
                'hl' => $lang,
                'render' => $recaptcha::getSiteKey()
            ]);
    }
}
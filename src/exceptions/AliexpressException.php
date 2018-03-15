<?php

namespace exceptions;

/**
 * Class AliexpressException
 * @package exceptions
 */
abstract class AliexpressException extends \Exception
{
    public const SUCCESS               = 20010000;
    public const SYSTEM_ERROR          = 20020000;
    public const UNAUTHORIZED          = 20030000;
    public const REQUIRED_PARAMETERS   = 20030010;
    public const INVALID_PROTOCOL      = 20030020;
    public const API_VERSION_ERROR     = 20030030;
    public const API_NAMESPACE_ERROR   = 20030040;
    public const API_NAME_INPUT_ERROR  = 20030050;
    public const FIELDS_INPUT_ERROR    = 20030060;
    public const KEYWORD_INPUT_ERROR   = 20030070;
    public const CATEGORY_ID_ERROR     = 20030080;
    public const TRACKING_ID_ERROR     = 20030090;
    public const COMMISSION_RATE_ERROR = 20030100;
    public const ORIGINAL_PRICE_ERROR  = 20030110;
    public const DISCOUNT_INPUT_ERROR  = 20030120;
    public const VOLUME_ERROR          = 20030130;
    public const PAGE_NUMBER_ERROR     = 20030140;
    public const PAGE_SIZE_ERROR       = 20030150;
    public const SORT_PARAMETER_ERROR  = 20030160;
    public const CREDIT_SCORE_ERROR    = 20030170;
}
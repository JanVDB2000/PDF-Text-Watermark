<?php

namespace JanVDB2000\PDFTextWatermark\Models;

use JanVDB2000\PDFTextWatermark\Interfaces\PositionInterface;

class Position implements PositionInterface
{
    const TopLeft = 1;
    const TopCenter = 2;
    const TopRight = 3;
    const MiddleLeft = 4;
    const Center = 5;
    const MiddleRight = 6;
    const BottomLeft = 7;
    const BottomCenter = 8;
    const BottomRight = 9;

    public static function TopCenter()
    {
        return self::TopCenter;
    }

    public static function TopLeft()
    {
        return self::TopLeft;
    }

    public static function TopRight()
    {
        return self::TopRight;
    }

    public static function Center()
    {
        return self::Center;
    }

    public static function MiddleLeft()
    {
        return self::MiddleLeft;
    }

    public static function MiddleRight()
    {
        return self::MiddleRight;
    }

    public static function BottomCenter()
    {
        return self::BottomCenter;
    }

    public static function BottomLeft()
    {
        return self::BottomLeft;
    }

    public static function BottomRight()
    {
        return self::BottomRight;
    }

    public static function CustomPosition($y, $x)
    {
        // Implement this method if needed.
    }
}

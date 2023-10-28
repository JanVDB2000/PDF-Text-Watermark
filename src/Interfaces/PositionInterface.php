<?php

namespace JanVDB2000\PDFTextWatermark\Interfaces;

interface PositionInterface
{
    public static function BottomCenter();

    public static function BottomLeft();

    public static function BottomRight();

    public static function TopCenter();

    public static function TopLeft();

    public static function TopRight();

    public static function Center();

    public static function MiddleLeft();

    public static function MiddleRight();

    public static function CustomPosition($y,$x);

}
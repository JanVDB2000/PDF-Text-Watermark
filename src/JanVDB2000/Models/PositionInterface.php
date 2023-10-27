<?php

namespace JanVDB2000\Interface;

interface PositionInterface
{
    public static function BottomCenter();

    public static function BottomLeft();

    public static function BottomRicht();

    public static function TopCenter();

    public static function TopLeft();

    public static function TopRicht();

    public static function Center();

    public static function CenterLeft();

    public static function CenterRicht();

    public static function CustomPosition($y,$x);

}
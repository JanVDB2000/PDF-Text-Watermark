<?php

namespace JanVDB2000\Models;

interface WatermarkTextInterface
{
    public static function Create($inputFile): WatermarkText;
    public function setText($text): static;
    public function setPosition(Position $position): static;
    public function setTextSize(int $size): static;
    public function setFontText(string $font): static;
    public function get();
}
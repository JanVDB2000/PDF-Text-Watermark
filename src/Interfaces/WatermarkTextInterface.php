<?php

namespace JanVDB2000\PDFTextWatermark\Interfaces;

use JanVDB2000\PDFTextWatermark\Models\Position;
use JanVDB2000\PDFTextWatermark\Models\WatermarkText;

interface WatermarkTextInterface
{
    public static function Create($inputFile): WatermarkText;
    public function setText($text): static;
    public function setPosition(Position $position): static;
    public function setTextSize(int $size): static;
    public function setFontText(string $font): static;
    public function get();
}
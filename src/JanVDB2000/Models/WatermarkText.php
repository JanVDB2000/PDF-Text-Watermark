<?php

namespace JanVDB2000\Models;


class WatermarkText implements WatermarkTextInterface
{
    private $inputFile;
    private string $text;
    private $position;
    private int $size;
    private string $font;

    public function __construct($inputFile) {
        $this->inputFile = $inputFile;
        $this->position = Position::Center();
    }

    public static function Create($inputFile): WatermarkText
    {
        return new WatermarkText($inputFile);
    }

    public function setText($text): static
    {
        $this->text = $text;
        return $this;
    }

    public function setPosition(Position $position): static
    {
        $this->position = $position;
        return $this;
    }

    public function setTextSize(int $size): static
    {
        $this->size = $size;
        return $this;
    }

    public function get()
    {
        if ($this->inputFile && $this->text && $this->position && $this->size && $this->font) {
            return "Successfully added the watermark.";
        } else {
            return "Failed to add the watermark. Missing information.";
        }
    }

    public function setFontText(string $font): static
    {
        $this->font = $font;
        return $this;
    }
}


$result = WatermarkText::Create('Path')
    ->setText('Text')
    ->setPosition(Position::BottomCenter())
    ->setTextSize(50)
    ->get();

echo $result;
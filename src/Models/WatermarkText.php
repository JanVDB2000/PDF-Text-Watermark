<?php

namespace JanVDB2000\PDFTextWatermark\Models;


use JanVDB2000\PDFTextWatermark\Interfaces\WatermarkTextInterface;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;

class WatermarkText extends Fpdi implements WatermarkTextInterface
{
    private $inputFile;
    private string $text;
    private $position;
    private int $size;
    private string $font;

    public function __construct($inputFile)
    {
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

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws FilterException
     * @throws PdfTypeException
     */
    public function get()
    {
        if ($this->inputFile && $this->text && $this->position && $this->size && $this->font) {
            $this->setSourceFile($this->inputFile);
            // Iterate over the pages of the PDF
            for ($pageNo = 1; $pageNo <= count($this->importedPages); $pageNo++) {
                $templateId = $this->importPage($pageNo);
                $this->addPage();
                $this->useTemplate($templateId);
                // Set the position and size of the text
                if ($this->position === Position::Center()) {
                    $x = 105; // Adjust the X coordinate as needed
                    $y = 140; // Adjust the Y coordinate as needed
                } elseif ($this->position === Position::BottomCenter()) {
                    $x = 105; // Adjust the X coordinate as needed
                    $y = 260; // Adjust the Y coordinate as needed
                } else {
                    // Handle other positions as needed
                }
                $this->SetFont($this->font, '', $this->size);
                $this->SetTextColor(192, 192, 192); // Gray color
                $this->SetXY($x, $y);
                $this->Cell(0, 10, $this->text, 0, 1, 'C');
            }
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


/*$result = WatermarkText::Create('path/to/your/input.pdf')
    ->setText('Watermark Text')
    ->setPosition(Position::BottomCenter())
    ->setTextSize(50)
    ->setFontText('Arial') // Set the font
    ->get();

echo $result;*/

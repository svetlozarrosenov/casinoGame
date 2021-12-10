<?php
declare(strict_types = 1);

namespace App;

class WinLines {
    private $lines;
    private $coincidenceLines;

    public function __construct( array $lines ) {
        $this->lines = $lines;
    }

    public function getLines() {
        return $this->lines;
    }

    public function getCoincidenceLines( array $showedSymbols ) {
        $this->coincidenceLines = [];

        $showedSymbols = [
            'line_1' => [1, 1, 1, 1, 1],
            'line_2' => [1, 1, 1, 1, 1],
            'line_3' => [1, 1, 1, 1, 1],
        ];

        foreach ( $this->lines as $index => $line ) {
            foreach ( $showedSymbols as $showedLine ) {
                if ( $line === $showedLine ) {
                    array_push( $this->coincidenceLines, $line );
                }
            }
        }

        return $this->coincidenceLines;
    }
}
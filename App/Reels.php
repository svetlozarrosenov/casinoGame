<?php
declare(strict_types = 1);

namespace App;

class Reels {
    private $reels;
    
    public function __construct( array $reels) {
        $this->reels = $reels;
    }

    public function getReels() {
        return $this->reels;
    }

    public function getRandomGeneratedSymbols() {
        
        $randomGeneratedShowedSymbols = [];
        
        for( $i = 0; $i < count( $this->reels[0] ); $i++ ){
            $reelNumber = 'reel_' . $i; 
            $randomGeneratedShowedSymbols[$reelNumber] = $this->spinReel( $this->reels[0][$i] );            
        }
        
        return $randomGeneratedShowedSymbols;
    }
    
    public function getRandomGeneratedSymbolsArrays() {
        $randomLines = [];
        $lines = [
            'line_1' => [],
            'line_2' => [],
            'line_3' => []
        ];
        
        for( $i = 0; $i < count( $this->reels[0] ); $i++ ){
            $reelNumber = 'reel_' . $i; 

            $randomLines[$reelNumber] = $this->spinReel( $this->reels[0][$i] ); 

            array_push( $lines['line_1'], $randomLines[$reelNumber]['showedSymbol_1'] );
            array_push( $lines['line_2'], $randomLines[$reelNumber]['showedSymbol_2'] );
            array_push( $lines['line_3'], $randomLines[$reelNumber]['showedSymbol_3'] );
        }
        
        return $lines;
    }

    private function spinReel( $reel ) {
        $reelIndexesCount = count( $reel ) - 1;
        
        do {
            $reelSelectedIndexes = [
                mt_rand(0, $reelIndexesCount),
                mt_rand(0, $reelIndexesCount),
                mt_rand(0, $reelIndexesCount),
            ];
        } while( count( $reelSelectedIndexes ) !== count( array_unique( $reelSelectedIndexes ) ) );
        
        $randomSelectedReel = [
            'showedSymbol_1' => $reel[ $reelSelectedIndexes[0] ],
            'showedSymbol_2' => $reel[ $reelSelectedIndexes[1] ],
            'showedSymbol_3' => $reel[ $reelSelectedIndexes[2] ],
        ];

        return $randomSelectedReel;
    }
}
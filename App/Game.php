<?php
declare(strict_types = 1);

namespace App;

class Game {
    private $data;

    public function __construct( Data $data ) {
        if ( ! isset( $_SESSION['amount'] ) ) {
            $_SESSION['amount'] = 0.0;
        }

        $this->data = $data->getSource('config.json'); 
    }

    public function spin() {
        $winLines = new WinLines( $this->data['lines'] );
        
        $reels = new Reels( $this->data['reels'] );

        $spinnedSymbols = $reels->getRandomGeneratedSymbolsArrays();

        $coincidenceLines = $winLines->getCoincidenceLines( $spinnedSymbols );

        if ( count( $coincidenceLines ) ) {
            $_SESSION['amount'] += ( 0.5 * count( $coincidenceLines ) );  
            
        }

        print_r($_SESSION['amount']);exit;
    }
}
<?php
declare(strict_types = 1);

namespace App;

class JsonData implements Data {
    private $dataSource;

    public function __construct( String $dataSource ){
        $this->dataSource = $dataSource;
    }

    public function getSource( String $name ){
        $path = $this->dataSource . $name;
        
        $source = file_get_contents( $path );
        
        try {
            $this->isJson( $source );
        } catch( \Exception $e ) {
            echo $e;
        }
        
        $source = json_decode( $source, true );

        return $source;
    }

    private function isJson( String $string ) {
        json_decode( $string );

        if ( ! json_last_error() === JSON_ERROR_NONE ) {
            throw new \Exception('The file is not a json');
        } 

        return true;
    }
}
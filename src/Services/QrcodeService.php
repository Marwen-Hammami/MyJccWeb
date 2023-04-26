<?php

namespace App\Services;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Margin\Margin;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;

class QrcodeService
{
    /**
     * @var BuilderInterface
     */
    private $builder;

    public function __construct(BuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function qrcode($query, $typeReservation)
    {
        $path = dirname(__DIR__, 2).'/public/images/qr-code/';
        

         // set qrcode
         $result = $this->builder
         ->data($query)
         ->encoding(new Encoding('UTF-8'))
         ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
         ->size(100)
         ->margin(10)
         ->labelText($typeReservation)
         ->labelAlignment(new LabelAlignmentCenter())
         ->labelMargin(new Margin(15, 5, 5, 5))
         ->logoPath($path.'myjcc.png')
         ->logoResizeToWidth('100')
         ->logoResizeToHeight('100')
         ->backgroundColor(new Color(221, 158, 3))
         ->build()
            ;

        //generate name
        if($typeReservation=='Reservation hotel')
            $namePng ='R'.uniqid('', '') . '.png';
        else {
            $namePng ='L'.uniqid('', '') . '.png';
        }

        //Save img png
        $result->saveToFile($path.$namePng);
  
        return $path.$namePng;
    }

}


<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 11:34 PM
 */

namespace App\API;


use App\Entity\Hotels;
use Psr\Http\Message\ResponseInterface;
use Tebru\Gson\Gson;

/**
 * Class HotelGetter
 * @package App\API
 */
class HotelGetter
{

    /**
     * @param ResponseInterface $response
     * @return Hotels
     */
    public function get(ResponseInterface $response): Hotels
    {
        return Gson::builder()->build()->fromJson($response->getBody(), Hotels::class);
    }
}
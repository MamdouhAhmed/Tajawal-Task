<?php
/**
 * Created by PhpStorm.
 * User: Mamdouh
 * Date: 4/9/2018
 * Time: 11:30 PM
 */

namespace App\API;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HotelRequestFactory
 * @package App\API
 */
class HotelApiRequestFactory
{
    /**
     * @param Client $client
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function make(Client $client): ResponseInterface
    {
        $remoteEndpoint = 'api.myjson.com/bins/tl0bp';
        return $client->request('GET', $remoteEndpoint);
    }
}
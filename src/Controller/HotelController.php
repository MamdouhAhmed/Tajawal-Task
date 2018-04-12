<?php

namespace App\Controller;

use App\API\HotelApiRequestFactory;
use App\API\HotelGetter;
use App\Exceptions\ValidationException;
use App\Services\Helpers\SearchHelper;
use App\Services\HotelFilteringService;
use App\Services\HotelSortingService;
use App\Services\Validators\SearchParametersValidator;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Tebru\Gson\Gson;

/**
 * Class HotelController
 * @package App\Controller
 */
class HotelController extends AbstractController
{
    /**
     * @Route("/hotels", name="hotel", methods = {"get"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {
        try {
            
            $searchHelper = new SearchHelper($request);

            (new SearchParametersValidator())->validate($searchHelper->getFilters());

            $sortingKey = $request->query->get('sort_by')??'price';
            
            $hotels = (new HotelGetter()) -> get((new HotelApiRequestFactory())->make((new Client())));

            $hotels = (new HotelFilteringService())->filterHotels($hotels, $searchHelper);

            $hotels = (new HotelSortingService()) ->sortHotels($hotels, $sortingKey);

            return new Response(Gson::builder()->build()->toJson($hotels), 200, array('content-type'=>'application/json'));
        }
        catch (ValidationException $e){
            return new Response($e->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (GuzzleException $e) {
            return new Response('Could not retrieve data from remote server.', Response::HTTP_FAILED_DEPENDENCY);
        }

    }


}

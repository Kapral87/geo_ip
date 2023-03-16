<?php

namespace App\Http\Controllers;

use App\Services\IpLocationService;
use App\Http\Resources\IpLocationResource;
use App\Http\Requests\IpLocationRequest;

/**
 * Class IpToGeoController
 */
class IpToGeoController extends Controller
{
    /**
     * @var IpLocationService - Service to work with ip and its location
     */
    private $ipLocationService;

    /**
     * IpToGeoController constructor.
     *
     * @param IpLocationService $ipLocationService
     */
    public function __construct(IpLocationService $ipLocationService)
    {
        $this->ipLocationService = $ipLocationService;
    }

    /**
     * Return location by ip
     *
     * @urlParam ip ipv4 required
     *
     * @param IpLocationRequest $request
     * @return IpLocationResource
     */
    public function get(IpLocationRequest $request)
    {
        $ipLocation = $this->ipLocationService->getLocationByIp($request->get('ip'));

        return new IpLocationResource($ipLocation);
    }
}

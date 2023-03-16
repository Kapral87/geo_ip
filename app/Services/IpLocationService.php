<?php

namespace App\Services;

use App\Constants\IpLocationCacheConstants;
use App\Models\IpLocation;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cache;

/**
 * Class IpLocationService
 */
class IpLocationService
{
    /**
     * Get location by IP
     *
     * @param $ip
     * @return mixed
     */
    public function getLocationByIp($ip)
    {
        $intIp = ip2long($ip);

        $ipLocation = Cache::remember('ipLoctaion' . $intIp, IpLocationCacheConstants::CACHE_TIME_IN_SECONDS, function () use ($intIp) {
            return IpLocation::query()
                ->where('ip_from', '<=', $intIp)
                ->where('ip_to', '>=', $intIp)
                ->first();
        });

        if (!$ipLocation) {
            throw new HttpResponseException(response('', 404));
        }

        return $ipLocation;
    }
}

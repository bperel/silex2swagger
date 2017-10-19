<?php

namespace Radebatz\Silex2Swagger\Tests\Controller;

use DDesrosiers\SilexAnnotations\Annotations as SLX;
use Radebatz\Silex2Swagger\Swagger\Annotations as S2S;
use Swagger\Annotations as SWG;

/**
 * @S2S\Controller(prefix="/shared",
 *   @SWG\Parameter(
 *     name="x-api-version",
 *     in="header",
 *     required=true,
 *     type="string"
 *   ),
 *   @SWG\Response(
 *     response=401,
 *     description="not authorized"
 *   )
 * )
 */
class SharedSWGParameterController
{
    /**
     * @SLX\Route(
     *   @SLX\Request(method="GET", uri="get"),
     *   @SWG\Response(response=200, description="GET")
     * )
     */
    public function testGetRequest()
    {
        return '';
    }

    /**
     * @SLX\Route(
     *   @SLX\Request(method="POST", uri="get"),
     *   @SWG\Response(response=200, description="POST")
     * )
     */
    public function testPostRequest()
    {
        return '';
    }

}

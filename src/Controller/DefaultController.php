<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 13/01/2018
 * Time: 09:51
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use \DTS\eBaySDK\Shopping\Services;
//use \DTS\eBaySDK\Shopping\Types;
//use \DTS\eBaySDK\Trading\Services;
//use \DTS\eBaySDK\Browse\Types;
//use \DTS\eBaySDK\Finding\Services\FindingService;
//use \DTS\eBaySDK\Finding\Types;
//use \DTS\eBaySDK\Finding\Types\FindItemsByKeywordsRequest;
//use \DTS\eBaySDK\Finding\Types\PaginationInput;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index()
    {
        return $this->render('website\index.html.twig');
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 13/01/2018
 * Time: 09:51
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
//use \DTS\eBaySDK\Shopping\Services;
//use \DTS\eBaySDK\Shopping\Types;
//use \DTS\eBaySDK\Trading\Services;
//use \DTS\eBaySDK\Browse\Types;
//use \DTS\eBaySDK\Finding\Services\FindingService;
//use \DTS\eBaySDK\Finding\Types;
//use \DTS\eBaySDK\Finding\Types\FindItemsByKeywordsRequest;
//use \DTS\eBaySDK\Finding\Types\PaginationInput;
use \DTS\eBaySDK\Finding\Services\FindingService;
use \DTS\eBaySDK\Finding\Types;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index()
    {
        return $this->render('website\index.html.twig');
    }

    public function ebayApi(){
//        $service = new Services\TradingService([
//            'credentials' => [
//                'appId'  => 'YuriCris-iitspe-SBX-b5d74fc8f-67c4d6aa',
//                'certId' => 'SBX-5d74fc8f3dcc-81eb-4645-a1f8-20fc',
//                'devId'  => '803d1af1-17b1-4d49-b8b1-3a16529fdb46'
//            ],
//            'siteId'      => 'iits.pe'
//        ]);
//        $service = new Services\TradingService([
//            'authToken'   => $config['production']['authToken'],
//            'credentials' => [
//                'appId'  => $config['production']['credentials']['appId'],
//                'certId' => $config['production']['credentials']['certId'],
//                'devId'  => $config['production']['credentials']['devId']
//            ]
//        ]);
//        $service = new Services\ShoppingService();
//        $request = new Types\GeteBayTimeRequestType();
//        $response = $service->geteBayTime($service);

        $service = new FindingService([
            'credentials' => [
                'appId'  => 'YuriCris-iitspe-PRD-45d7504c4-41a723f1',
                'certId' => 'PRD-5d7504c498e3-2b3e-480c-96fe-5a22',
                'devId'  => '803d1af1-17b1-4d49-b8b1-3a16529fdb46'
            ],
            'siteId'      => 'iits.pe',
            'globalId' => 'EBAY-US',
        ]);

        $request = new Types\FindItemsAdvancedRequest();

        $request->keywords = 'Fire Lite MS 4';
        $request->sortOrder = 'CurrentPriceHighest';
        $request->outputSelector = ['PictureURLSuperSize', 'SellerInfo'];

        $request->paginationInput = new Types\PaginationInput();
        $request->paginationInput->entriesPerPage = 10;
        $request->paginationInput->pageNumber = 1;
        $response = $service->findItemsAdvanced( $request ) ;

//        var_dump($response);die();
//        return new Response($response->searchResult);die();
//        var_dump($response->searchResult);die();
// Iterate over the items returned in the response.
        $items = [];
        foreach ($response->searchResult->item as $item) {
            $items[]=[
                'itemId'=>$item->itemId,
                'title'=>$item->title,
                'galleryURL'=>$item->galleryURL,
                'galleryPlusPictureURL'=>$item->galleryPlusPictureURL,
                'pictureURLLarge'=>$item->pictureURLLarge,
                'pictureURLSuperSize'=>$item->pictureURLSuperSize,
                'galleryInfoContainer'=>$item->galleryInfoContainer,
                'paymentMethod'=>$item->paymentMethod,
                ];
        }

        return new JsonResponse($items);
    }
}
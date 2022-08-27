<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StkpushResultsRepository as StkPushRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StkpushResultsController extends AbstractController
{

    public function __construct(StkPushRepository $stkpushRepository)
    {
        $this->stkpushRepository = $stkpushRepository;
    }

    #add stk result to DB

    #[Route('/stkpush/add', name: 'app_stkpush_results')]
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $merchantrequestid = $data['merchantRequestId'];
        $checkoutrequestid = $data['checkoutRequestId'];
        $responsecode = $data['responseCode'];
        $responsedescription = $data['responseDescription'];
        $customermessage = $data['customerMessage'];


        $this->stkpushRepository->saveStkpushResult(
            $merchantrequestid,
            $checkoutrequestid,
            $responsecode,
            $responsedescription,
            $customermessage
        );


        return new JsonResponse(['status' => 'created stkresult'], Response::HTTP_CREATED);
    }

    #get given instance of stkresult sent to db


    #[Route('/stkpush/result/{merchantrequestid}', name: 'app_stkpush_detail')]
    public function get($merchantrequestid): JsonResponse
    {
        $stkresult = $this->stkpushRepository->findOneBy([
            'MerchantRequestID' => $merchantrequestid
        ]);
        // $resultByCheckoutId = $this->stkpushRepository->findByCheckoutRequestId($merchantrequestid);

        // var_dump($resultByCheckoutId);

        $data = [
            'merchantrequestid' => $stkresult->getMerchantRequestID(),
            'checkoutrequestid' => $stkresult->getCheckoutRequestID(),
            'responsecode' => $stkresult->getResponsecode(),
            'responsedescription' => $stkresult->getResponsedescription(),
            'customermessage' => $stkresult->getCustomerMessage(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }


    #get all instance of stkresults

    #[Route('/stkpush/results/list', name: 'app_stkpush_list')]
    public function getAll(): JsonResponse
    {
        $stkresults = $this->stkpushRepository->findAll();

        $data = [];


        foreach ($stkresults as $res) {
            $data[] = [
                'merchantrequestid' => $res->getMerchantRequestID(),
                'checkoutrequestid' => $res->getCheckoutRequestID(),
                'responsecode' => $res->getResponsecode(),
                'responsedescription' => $res->getResponsedescription(),
                'customermessage' => $res->getCustomerMessage(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
}

<?php

namespace App\Entity;

use App\Repository\StkpushResultsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StkpushResultsRepository::class)]
class StkpushResults
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $MerchantRequestID = null;

    #[ORM\Column(length: 255)]
    private ?string $CheckoutRequestID = null;

    #[ORM\Column(length: 255)]
    private ?string $ResponseDescription = null;

    #[ORM\Column]
    private ?int $ResponseCode = null;

    #[ORM\Column(length: 255)]
    private ?string $CustomerMessage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMerchantRequestID(): ?string
    {
        return $this->MerchantRequestID;
    }

    public function setMerchantRequestID(string $MerchantRequestID): self
    {
        $this->MerchantRequestID = $MerchantRequestID;

        return $this;
    }

    public function getCheckoutRequestID(): ?string
    {
        return $this->CheckoutRequestID;
    }

    public function setCheckoutRequestID(string $CheckoutRequestID): self
    {
        $this->CheckoutRequestID = $CheckoutRequestID;

        return $this;
    }

    public function getResponseDescription(): ?string
    {
        return $this->ResponseDescription;
    }

    public function setResponseDescription(string $ResponseDescription): self
    {
        $this->ResponseDescription = $ResponseDescription;

        return $this;
    }

    public function getResponseCode(): ?int
    {
        return $this->ResponseCode;
    }

    public function setResponseCode(int $ResponseCode): self
    {
        $this->ResponseCode = $ResponseCode;

        return $this;
    }

    public function getCustomerMessage(): ?string
    {
        return $this->CustomerMessage;
    }

    public function setCustomerMessage(string $CustomerMessage): self
    {
        $this->CustomerMessage = $CustomerMessage;

        return $this;
    }

    //convert json to array method
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'merchantRequestId' => $this->getMerchantRequestID(),
            'checkoutRequestId' => $this->getCheckoutRequestID(),
            'responseCode' => $this->getResponseCode(),
            'responseDescription' => $this->getResponseDescription(),
            'customerMessage' => $this->getCustomerMessage()

        );
    }
}

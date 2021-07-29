<?php

namespace App\Entity;

use App\Repository\OrderItemsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderItemsRepository::class)
 */
class OrderItems
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $barcode;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $cost;

    /**
     * @ORM\Column(type="integer")
     */
    private $taxPerc;

    /**
     * @ORM\Column(type="float")
     */
    private $taxAmt;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=19)
     */
    private $trackingNumber;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $canceled;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $shippedStatusSku;

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orders;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getTaxPerc(): ?int
    {
        return $this->taxPerc;
    }

    public function setTaxPerc(int $taxPerc): self
    {
        $this->taxPerc = $taxPerc;

        return $this;
    }

    public function getTaxAmt(): ?float
    {
        return $this->taxAmt;
    }

    public function setTaxAmt(float $taxAmt): self
    {
        $this->taxAmt = $taxAmt;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function getCanceled(): ?string
    {
        return $this->canceled;
    }

    public function setCanceled(string $canceled): self
    {
        $this->canceled = $canceled;

        return $this;
    }

    public function getShippedStatusSku(): ?string
    {
        return $this->shippedStatusSku;
    }

    public function setShippedStatusSku(string $shippedStatusSku): self
    {
        $this->shippedStatusSku = $shippedStatusSku;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

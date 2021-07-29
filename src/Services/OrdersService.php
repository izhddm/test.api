<?php
//declare(strict_types=1);

namespace App\Services;


use App\Repository\OrderItemsRepository;
use App\Repository\OrdersRepository;
use DateTime;

class OrdersService
{
    private OrdersRepository $repository;
    private OrderItemsRepository $itemsRepository;

    public function __construct(
        OrdersRepository $ordersRepository,
        OrderItemsRepository $itemsRepository
    )
    {
        $this->repository = $ordersRepository;
        $this->itemsRepository = $itemsRepository;
    }

    public function ordersSearch(int $count, string $dateFrom, string $dateTo, string $currencyCode)
    {
        $dateFromNew = DateTime::createFromFormat('Ymd H:s', $dateFrom . ' 00:00');
        $dateToNew = DateTime::createFromFormat('Ymd H:s', $dateTo . ' 00:00');

        return $this->repository->findByOrders($count, $dateFromNew, $dateToNew, $currencyCode);
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOrder(string $orderId)
    {
        $order = $this->repository->findByOrderArray($orderId);

        if (empty($order)) {
            return [];
        }
        $order = $order[0];

        $items = $this->itemsRepository->findByItemArray($order['id']);
        $order['orderItems'] = $items;


        return $order;

    }
}
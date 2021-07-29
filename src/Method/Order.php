<?php
//declare(strict_types=1);

namespace App\Method;


use App\Services\OrdersService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Expression;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\RangeValidator;
use Symfony\Component\Validator\Constraints\Required;
use Yoanm\JsonRpcParamsSymfonyValidator\Domain\MethodWithValidatedParamsInterface;
use Yoanm\JsonRpcServer\Domain\Exception\JsonRpcException;
use Yoanm\JsonRpcServer\Domain\JsonRpcMethodInterface;

class Order implements JsonRpcMethodInterface, MethodWithValidatedParamsInterface
{
    private OrdersService $ordersService;

    public function __construct(OrdersService $ordersService)
    {
        $this->ordersService = $ordersService;
    }

    /**
     * @inheritDoc
     */
    public function apply(array $paramList = null)
    {
        return $this->ordersService->getOrder($paramList['order_id']);
    }

    /**
     * @return Constraint
     */
    public function getParamsConstraint(): Constraint
    {
        return new Collection(['fields' => [
            'order_id' => new Required()
        ]]);
    }
}
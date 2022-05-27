<?php

namespace iikoExchangeBundle\Contract\Service;

use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;

interface EntitiesStorage
{
	public function saveEntity(ExchangeInterface $exchange,string $entityType, $externalId,  array $data);

	public function entityExist(ExchangeInterface $exchange, string $entityType,  $externalId);

	public function getEntityData(ExchangeInterface $exchange, string $entityType, $externalId);
}
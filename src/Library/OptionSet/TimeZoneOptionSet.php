<?php

namespace iikoExchangeBundle\Library\OptionSet;


use iikoExchangeBundle\Application\Restaurant;
use iikoExchangeBundle\Contract\Exchange\ExchangeInterface;
use iikoExchangeBundle\Contract\OptionSet\OptionSetConstants;

class TimeZoneOptionSet implements OptionSetConstants
{
	public static function getCode(): string
	{
		return 'TIME_ZONE';
	}

	public function getCollection(ExchangeInterface $exchange, ?Restaurant $restaurant = null): array
	{
		$timeZoneList = [];

		foreach (\DateTimeZone::listIdentifiers() as $timezone)
		{
			$dtz = new \DateTimeZone($timezone);
			$newDate = new \DateTime('now', $dtz);

			$offset = $newDate->format('Z');
			$sign = ($offset < 0) ? '-' : '+';

			$hourOffset = ceil(abs($offset) / 3600);
			$minuteOffset = ceil((abs($offset) % 3600) / 60);
			$stringOffset = $hourOffset . ":" . ($minuteOffset == 0 ? "00" : $minuteOffset);

			$timeZoneList[] = new OptionSetItem('(UTC' . $sign . $stringOffset . ') ' . $timezone, $timezone);

		}

		return $timeZoneList;
	}
}
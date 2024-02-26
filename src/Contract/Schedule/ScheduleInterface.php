<?php

namespace iikoExchangeBundle\Contract\Schedule;

interface ScheduleInterface
{
	const TYPE_MANUAL = 'manual';
	const TYPE_SCHEDULE = 'schedule';
	const TYPE_PREVIEW = 'preview';

	const TYPE_GRAB = 'grab';
}
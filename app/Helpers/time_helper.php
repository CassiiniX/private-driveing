<?php

use Carbon\Carbon;

function time_human($time){
	try{
		return Carbon::parse($time)->diffForHumans();		
	}catch(\Exception $e){
		return $time;
	}
}

function time_make_timeline($course){ 
	$date = $course['date_start'];
	$meet = $course['meet'];

	$timeline = [];

	try{ 
		for($i=0;$i<$meet;$i++){ 
			$time = [];
			
			$time['date'] = Carbon::create($date)->addDays($i)->format("Y-m-d");
			$time['active'] = !Carbon::create($date)->addDays($i)->isPast();
			$time['isToday'] = Carbon::create($date)->addDays($i)->isToday();
			$time['clock_end'] = Carbon::create($date." ".$course['clock_start'])->addHours($course['hour'])->format("H:i:s");

			$timeline[] = $time;
		}

		return $timeline;
	}catch(\Exception $e){ 
		return $timeline;
	}
}
<?php

namespace Drupal\CalculateTiredness;

class CalculateTiredness
{
    public function convertTime ($time) {
        if($time <= 12) {
            return $time;
        }
        else if($time > 12) {
            return 24 - $time;
        }
        else {
            exit("$time is not a valid time! Exiting service.");
        }
    }

    public function calculateSleep($beginSleep, $endSleep)
    {
        if($beginSleep == $endSleep) {
            return 24;
        }
        else if($beginSleep < $endSleep) {
            return $endSleep - $beginSleep;
        }
        else {
            $hoursSlept = $this->convertTime($beginSleep) + $this->convertTime($endSleep);
        }
        return $hoursSlept;
    }

    public function checkTiredness($hoursSlept) {
        if($hoursSlept < 8) {
            exit("Hours slept is $hoursSlept. You are tired. Drink some coffee and get more sleep tonight!");
        }
        else {
            exit("Hours slept is $hoursSlept. You are well rested. You probably have good sleeping habits. Good job!");
        }
    }
}

$slept = 4;
$woke = 12;

$tiredness = new CalculateTiredness();
$numHours = $tiredness->calculateSleep($slept, $woke);
$tiredness->checkTiredness($numHours);
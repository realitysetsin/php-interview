<?php
/**
 * Instructions:
 * Fill out the function plusOneWeek that takes as input a DateTime object and returns a new DateTime object one
 * week after the input date, such that calling
 *
 * $week = new Week;
 * $today = new DateTime;
 * $oneWeekFromNow = $week->plusOneWeek($today);
 */
class Week {
    public function plusOneWeek(DateTime $date)
    {

    }
}

class WeekSolution extends Week {
    public function plusOneWeek(DateTime $date)
    {
        // the clone step is important, as if you just added time,
        // the input date would be modified by reference
        $futureDate = clone $date;
        $futureDate->add(new \DateInterval('P1W'));
        return $futureDate;
    }
}
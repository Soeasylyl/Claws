<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function getDataClientsRecords()
    {
        $sortedRecords = Record::with(['client' => function ($query) {
            $query->select('id', 'name'); // Выбираем только id и name клиента
        }])
            ->where('date', '>', now()) // Фильтрация по будущим событиям
            ->where('hidden', false)
            ->orderBy('date')
            ->orderBy('time') // Добавляем сортировку по времени
            ->get();

        $currentTime = Carbon::now();

        foreach ($sortedRecords as $record) {
            $recordDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $record->date . ' ' . $record->time);
            $timeDiff = $currentTime->diff($recordDateTime);

            $days = $timeDiff->days;
            $hours = $timeDiff->h;
            $minutes = $timeDiff->i;

            $timeRemaining = '';

            if ($days > 0) {
                if ($days == 1 || $days % 10 == 1 && ($days < 11 || $days > 20)) {
                    $timeRemaining .= "{$days} день ";
                } elseif (($days >= 2 && $days <= 4) || ($days % 10 >= 2 && $days % 10 <= 4 && ($days < 12 || $days > 14))) {
                    $timeRemaining .= "{$days} дня ";
                } else {
                    $timeRemaining .= "{$days} дней ";
                }
            }

            if ($hours > 0) {
                if ($hours == 1 || $hours % 10 == 1 && ($hours < 11 || $hours > 20)) {
                    $timeRemaining .= "{$hours} час ";
                } elseif (($hours >= 2 && $hours <= 4) || ($hours % 10 >= 2 && $hours % 10 <= 4 && ($hours < 12 || $hours > 14))) {
                    $timeRemaining .= "{$hours} часа ";
                } else {
                    $timeRemaining .= "{$hours} часов ";
                }
            }

            if ($minutes > 0) {
                if ($minutes == 1 || $minutes % 10 == 1 && ($minutes < 11 || $minutes > 20)) {
                    $timeRemaining .= "{$minutes} минута";
                } elseif (($minutes >= 2 && $minutes <= 4) || ($minutes % 10 >= 2 && $minutes % 10 <= 4 && ($minutes < 12 || $minutes > 14))) {
                    $timeRemaining .= "{$minutes} минуты";
                } else {
                    $timeRemaining .= "{$minutes} минут";
                }
            }

            $record->timeRemaining = trim($timeRemaining);
        }

        return view('pages.home', ['sortedRecords' => $sortedRecords]);
    }
}

<?php

namespace App\Helpers;

class TransformOrder
{

    public static function orders($orders)
    {
        try {
            if ($orders) {
                $order = $orders->map(function ($item) {
                    return [
                        'uid' => $item->uid,
                        'nameuser' => $item->users['fullname'],
                        'avatar' => $item->users['profile_photo_path'],
                        'book_uid' => $item->book_uid,
                        'order' => $item->order,
                        'time' => $item->created_at,
                        'total_review' => $item->total_review,
                    ];
                });
                return $order;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

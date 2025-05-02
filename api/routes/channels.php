<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('users.{uuid}', function ($user, $uuid) {
    return $user->uuid === $uuid;
});

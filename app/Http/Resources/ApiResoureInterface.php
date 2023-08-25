<?php
namespace App\Http\Resources;

interface ApiResourceInterface
{
    public function toArray($status, $message, $resource);
}

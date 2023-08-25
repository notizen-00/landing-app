<?php

namespace App\Http\Resources;
use App\Http\Resources\ApiResourceInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource implements ApiResourceInterface
{
    //define properti
    public $status;
    public $message;
    public $resource;
    
    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct(ApiResourceInterface $data)
    {
        parent::__construct($data->getResource());
        $this->status = $data->getStatus();
        $this->message = $data->getMessage();
    }


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->resource
        ];
    }
}
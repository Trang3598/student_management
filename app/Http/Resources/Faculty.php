<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Faculty extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    //bạn có thể cần transform dữ liệu từ controller trước khi trả về cho người dùng ứng dụng của bạn,
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}

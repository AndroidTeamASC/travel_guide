<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\City;
use App\State;
class EmergencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'station' => $this->station,
            'phone'   => $this->phone,
            'location'=> $this->location,
            'city'    => new CityResource(City::find($this->city_id)),
            'state'   => new StateResource(State::find($this->state_id))      
        ];
    }
}

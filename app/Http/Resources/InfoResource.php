<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ListingResource;
use App\Category;
use App\City;
use App\State;
class InfoResource extends JsonResource
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
           'place_name'  => $this->place_name,
           'image'       => $this->image,
           'location'    => $this->location,
           'wonderful'   => $this->wonderful,
           'best_month'  => $this->best_month,
           'map'         => $this->map,
           'recommend'   => $this->recommend,
            'lat'        => $this->lat,
            'long'       => $this->long,
           'descripton' => $this->description,
           'city'       => new CityResource(City::find($this->city_id)),
           'state'      => new StateResource(State::find($this->state_id)),
           'category'   => new CategoryResource(Category::find($this->category_id))
           
       ];
    }
}

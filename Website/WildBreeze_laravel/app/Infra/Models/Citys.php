<?php


namespace App\Infra\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Citys
 * @package App\Infra\Models
 */
class Citys extends Model
{
    public function getCity(): Collection
    {
        return $this->groupBy('ci01')->get('ci01');
    }

    public function getArae($city)
    {
        return $this->where('ci01', $city)->get(['ci02', 'ci03']);
    }
}

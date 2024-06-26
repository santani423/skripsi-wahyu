<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Support\Str;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

use function PHPUnit\Framework\isEmpty;

//use Your Model

/**
 * Class ServiceRepository.
 */
class ServiceRepository extends BaseRepository
{
  /**
     * @return string
     *  Return the model
     */
    public function model()
    {
       return Service::class;
    }

    public function create($data)
    {

        $services = Service::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'description' => $data['description'],
            'price' => $data['price'],
            'image_url' => $data['imageName']
        ]);

        return $services;
    }

    public function update($service,array $data)
    {
        $service->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'description' => $data['description'],
            'price' => $data['price'],
            'image_url' => $data['imageName'] ?? $service->image_url
        ]);

    }

    public function destroy($service)
    {

        $service->delete();
    }
}

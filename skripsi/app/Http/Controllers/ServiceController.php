<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Order;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get();
        return inertia('User/Homepage', [
            'services' => $services
        ]);
    }

    public function detailService($slug)
    {
        $service = Service::where('slug', '=',$slug)->first();
        if(auth()->user()){
            $orders = Order::where("user_id",'=' , auth()->user()->id)->get();
        }
        return inertia('User/Detail', [
            'service' => $service,
            'orders' => $orders ?? null
        ]);
    }

    public function create()
    {
        return inertia('Admin/Services/Create');
    }
    public function store(ServiceRequest $request, ServiceRepository $serviceRepository)
    {

        $data = $request->validated();
        if ($request->hasFile('imageUrl')) {
            $image = $request->file('imageUrl');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images/services'), $imageName);
        }
        $data['imageName'] = $imageName;

        $serviceRepository->create($data);

        return to_route('admin-service');
    }

    public function indexAdmin()
    {
        $services = Service::get();
        return inertia('Admin/Services/Index', [
            'services' => $services
        ]);
    }

    public function edit($slug)
    {
        $service = Service::where('slug', $slug)->first();

        return inertia('Admin/Services/Edit', [
            'service' => $service
        ]);
    }

    public function update(Service $service, ServiceRequest $request,  ServiceRepository $serviceRepository)
    {
        $data = $request->validated();
        $oldPicture = public_path('/storage/images/services/' . $service->image_url);

        if ($request->hasFile('imageUrl')) {
            $image = $request->file('imageUrl');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images/services'), $imageName);
            if (File::exists($oldPicture)) {
                unlink($oldPicture);
            }

            $data['imageName'] = $imageName;
        }
        $serviceRepository->update($service, $data);
        return to_route('admin-service');
    }

    public function destroy(Service $service, ServiceRepository $serviceRepository)
    {
        $oldImage = public_path('/storage/images/services/' . $service->image_url);

        if (File::exists($oldImage)) {
            unlink($oldImage);
        }
        $serviceRepository->destroy($service);

        return back();
    }
}

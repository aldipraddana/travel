<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelDestinationRequest;
use App\Repositories\TravelDestinationRepository;
use Inertia\Inertia;

class TravelDestinationController extends Controller
{
    protected $travelDestinationRepository;

    public function __construct()
    {
        $this->travelDestinationRepository = new TravelDestinationRepository();
    }

    public function index()
    {
        $travelDestinations = $this->travelDestinationRepository->all();
        return Inertia::render('SettingTravel', ['travelDestinations' => $travelDestinations]);
    }

    public function show($id)
    {
        $travelDestination = $this->travelDestinationRepository->find($id);
        return Inertia::render('EditTravel', ['travelDestinations' => $travelDestination]);
    }

    public function store(TravelDestinationRequest $request)
    {
        try {
            $travelDestination = $this->travelDestinationRepository->create($request->validated());
            return redirect()->route('setting.travel');
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(TravelDestinationRequest $request, $id)
    {
        try {
            $travelDestination = $this->travelDestinationRepository->update($id, $request->validated());
            return redirect()->route('setting.travel');
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

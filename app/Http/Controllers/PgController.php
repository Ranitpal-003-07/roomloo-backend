<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pg;

class PgController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'googleMapLink' => 'nullable|string',
            'address' => 'nullable|string',
            'location' => 'nullable|string',
            'roomType' => 'nullable|string',
            'sharingType' => 'nullable|string',
            'amenities' => 'nullable|array',
            'nearbyMetro' => 'nullable|string',
            'nearbyBusStand' => 'nullable|string',
            'nearbyLandmark' => 'nullable|string',
            'nearbyCollege' => 'nullable|string',
            'price' => 'nullable|string',
            'ownerPhone' => 'nullable|string',
            'ownerEmail' => 'nullable|string',
            'description' => 'nullable|string',
            'rules' => 'nullable|string',
            'images' => 'nullable|array',
            'ownerId' => 'required|string',
        ]);

        // Save PG post
        $pg = Pg::create([
            'title' => $validated['title'],
            'googleMapLink' => $validated['googleMapLink'] ?? null,
            'address' => $validated['address'] ?? null,
            'location' => $validated['location'] ?? null,
            'roomType' => $validated['roomType'] ?? null,
            'sharingType' => $validated['sharingType'] ?? null,
            'amenities' => $validated['amenities'] ?? [],
            'nearbyMetro' => $validated['nearbyMetro'] ?? null,
            'nearbyBusStand' => $validated['nearbyBusStand'] ?? null,
            'nearbyLandmark' => $validated['nearbyLandmark'] ?? null,
            'nearbyCollege' => $validated['nearbyCollege'] ?? null,
            'price' => $validated['price'] ?? null,
            'ownerPhone' => $validated['ownerPhone'] ?? null,
            'ownerEmail' => $validated['ownerEmail'] ?? null,
            'description' => $validated['description'] ?? null,
            'rules' => $validated['rules'] ?? null,
            'images' => $validated['images'] ?? [],
            'ownerId' => $validated['ownerId'],
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        return response()->json([
            'message' => 'PG listing created successfully!',
            'post' => $pg,
        ], 201);
    }

     // Fetch a PG listing by ID
     public function fetch($id)
     {
         $pg = Pg::find($id);
 
         if (!$pg) {
             return response()->json(['message' => 'PG not found.'], 404);
         }
 
         return response()->json(['post' => $pg], 200);
     }
 
     // Update a PG listing by ID
     public function update(Request $request, $id)
     {
         $pg = Pg::find($id);
 
         if (!$pg) {
             return response()->json(['message' => 'PG not found.'], 404);
         }
 
         $validated = $request->validate([
             'title' => 'nullable|string|max:255',
             'googleMapLink' => 'nullable|string',
             'address' => 'nullable|string',
             'location' => 'nullable|string',
             'roomType' => 'nullable|string',
             'sharingType' => 'nullable|string',
             'amenities' => 'nullable|array',
             'nearbyMetro' => 'nullable|string',
             'nearbyBusStand' => 'nullable|string',
             'nearbyLandmark' => 'nullable|string',
             'nearbyCollege' => 'nullable|string',
             'price' => 'nullable|string',
             'ownerPhone' => 'nullable|string',
             'ownerEmail' => 'nullable|string',
             'description' => 'nullable|string',
             'rules' => 'nullable|string',
             'images' => 'nullable|array',
         ]);
 
         foreach ($validated as $key => $value) {
             $pg->$key = $value;
         }
 
         $pg->updatedAt = now();
         $pg->save();
 
         return response()->json([
             'message' => 'PG listing updated successfully!',
             'post' => $pg,
         ], 200);
     }
}

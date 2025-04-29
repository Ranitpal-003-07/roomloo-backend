<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OnboardingController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'hometown' => 'nullable|string',
            'currentAddress' => 'nullable|string',
            'collegeName' => 'nullable|string',
            'profileImageUrl' => 'nullable|string',
            'socialLinks' => 'nullable|array',
            'foodPreference' => 'nullable|string',
            'smokingHabit' => 'nullable|string',
            'alcoholConsumption' => 'nullable|string',
            'religion' => 'nullable|string',
            'fieldOfStudy' => 'nullable|string',
            'roomPreference' => 'nullable|string',
            'about' => 'nullable|string',
            'hobbies' => 'nullable|array',
            'interests' => 'nullable|array',
            'heartWays' => 'nullable|array',
            'favoriteFoods' => 'nullable|array',
            'currentHostel' => 'nullable|string',
        ]);

        // Store onboarding data directly in the database
        $user = new User();
        $user->fullName = $validated['fullName'];
        $user->age = $validated['age'];
        $user->gender = $validated['gender'];
        $user->hometown = $validated['hometown'];
        $user->currentAddress = $validated['currentAddress'];
        $user->collegeName = $validated['collegeName'];
        $user->profileImageUrl = $validated['profileImageUrl'];
        $user->socialLinks = json_encode($validated['socialLinks'] ?? []);
        $user->foodPreference = $validated['foodPreference'];
        $user->smokingHabit = $validated['smokingHabit'];
        $user->alcoholConsumption = $validated['alcoholConsumption'];
        $user->religion = $validated['religion'];
        $user->fieldOfStudy = $validated['fieldOfStudy'];
        $user->roomPreference = $validated['roomPreference'];
        $user->about = $validated['about'];
        $user->hobbies = json_encode($validated['hobbies'] ?? []);
        $user->interests = json_encode($validated['interests'] ?? []);
        $user->heartWays = json_encode($validated['heartWays'] ?? []);
        $user->favoriteFoods = json_encode($validated['favoriteFoods'] ?? []);
        $user->currentHostel = $validated['currentHostel'];
        $user->onboardingComplete = true;

        // Save the user data to the database
        $user->save();

        return response()->json(['message' => 'Onboarding data saved successfully!'], 200);
    }
    public function fetch($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Decode JSON fields
        $user->socialLinks = json_decode($user->socialLinks, true);
        $user->hobbies = json_decode($user->hobbies, true);
        $user->interests = json_decode($user->interests, true);
        $user->heartWays = json_decode($user->heartWays, true);
        $user->favoriteFoods = json_decode($user->favoriteFoods, true);

        return response()->json(['user' => $user], 200);
    }

    // Update onboarding data for a specific user
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $validated = $request->validate([
            'fullName' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'hometown' => 'nullable|string',
            'currentAddress' => 'nullable|string',
            'collegeName' => 'nullable|string',
            'profileImageUrl' => 'nullable|string',
            'socialLinks' => 'nullable|array',
            'foodPreference' => 'nullable|string',
            'smokingHabit' => 'nullable|string',
            'alcoholConsumption' => 'nullable|string',
            'religion' => 'nullable|string',
            'fieldOfStudy' => 'nullable|string',
            'roomPreference' => 'nullable|string',
            'about' => 'nullable|string',
            'hobbies' => 'nullable|array',
            'interests' => 'nullable|array',
            'heartWays' => 'nullable|array',
            'favoriteFoods' => 'nullable|array',
            'currentHostel' => 'nullable|string',
        ]);

        // Update fields if they are provided
        foreach ($validated as $key => $value) {
            if (in_array($key, ['socialLinks', 'hobbies', 'interests', 'heartWays', 'favoriteFoods'])) {
                $user->$key = json_encode($value ?? []);
            } else {
                $user->$key = $value;
            }
        }

        $user->save();

        return response()->json(['message' => 'Onboarding data updated successfully!', 'user' => $user], 200);
    }
}

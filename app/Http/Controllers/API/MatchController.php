<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    public function startMatching(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'age' => 'required|integer|min:18',
            'interest' => 'required|array|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422); // Unprocessable Entity
        }

        // Retrieve interest IDs based on provided names
        $interestIds = [];
        foreach ($request->interest as $interestName) {
            $interest = Interest::where('name', $interestName)->first();
            if ($interest) {
                $interestIds[] = $interest->id;
            }
        }

        if (empty($interestIds)) {
            return response()->json(['message' => 'No valid interests found'], 400); 
        }

        $matchingUsers = User::whereHas('interests', function ($query) use ($interestIds) {
            $query->whereIn('interests.id', $interestIds);
        })
            ->where('users.age', $request->age) 
            ->with('interests')
            ->get();

        
        $responseData = null;

        
        if ($matchingUsers->isNotEmpty()) {
            $randomIndex = random_int(0, $matchingUsers->count() - 1);
            $matchingUser = $matchingUsers->get($randomIndex);
        
            // Calculate shared interests before filtering
            $userInterests = $matchingUser->interests->pluck('name')->toArray();
            $matchingUserInterests = $matchingUser->interests->pluck('name')->toArray(); 
            $sharedInterests = array_intersect($userInterests, $matchingUserInterests);
        
            // Filter matched user interests based on shared interests
            $filteredInterests = $matchingUser->interests->whereIn('name', $sharedInterests)->toArray();
            
        
            $responseData = [
                'message' => 'Matching user found',
                'data' => [
                    'matched_user' => [
                        'id' => $matchingUser->id,
                        'name' => $matchingUser->name,
                        'age' => $matchingUser->age,
                        'interests' => $filteredInterests,
                        'shared_interests' => $sharedInterests,
                    ],
                ],
                
            ];
        } else {
            $responseData = [
                'message' => 'No matching user found',
                'data' => [],
            ];
        }

        return response()->json($responseData);
    }
}
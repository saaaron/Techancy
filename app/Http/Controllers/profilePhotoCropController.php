<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class profilePhotoCropController extends Controller
{
    public function profile() {
        return view('profile');
    }

    public function profilePhotoUpload(Request $request) {
        // Validate the image
        $request->validate([
            'image' => ['required', 'regex:/^data:image\/(jpeg|png|jpg);base64,/', 'string']
        ]);

        $imageData = preg_replace('#^data:image/\w+;base64,#i', '', $request->image);
        $fileSize = (strlen(base64_decode($imageData)) / 1024); // Size in KB

        if ($fileSize < 10 || $fileSize > 2048) {
            return response()->json([
                'status' => 0,
                'message' => 'File size must be between 10KB and 2MB.',
            ], 422);
        }

        try {
            // Decode base64 string
            $image = base64_decode($imageData);

            // Generate a unique file name (username_time()+userId+date)
            $userName = str_replace(' ', '', auth()->user()->name);
            $userId = auth()->user()->id;

            $image_name = 'profile_photos/' .$userName.'_'. time().$userId.now()->format('dmY').'.png';
    
            // Save to storage/app/public/profile_photos
            Storage::disk('public')->put($image_name, $image);
    
            // Save file path to the database
            User::where('id', $userId)->update([
                'profile_photo' => $image_name
            ]);
    
            // Generate public URL
            $url = Storage::url($image_name);
    
            return response()->json([
                'status' => 1,
                'message' => 'Profile photo uploaded successfully!',
                'image' => $url,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'An error occurred while uploading. Please try again.',
            ], 500);
        }
    }
}

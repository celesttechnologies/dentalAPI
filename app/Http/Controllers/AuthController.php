<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\UnauthorizedException;

class AuthController extends Controller
{
    /**
     * @group Auth
     *
     * @method GET
     *
     * Login auth
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            // Fetch user
            $user = User::where('UserName', $request->UserName)->first();
            if (!$user) {
                throw new ModelNotFoundException("User not found");
            }

            // Check if user exists and verify password
            if (!Hash::check($request->Password, $user->Password)) {
                throw new UnauthorizedException("Invalid password");
            }

            // Generate token
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 404);
        } catch (UnauthorizedException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @group Auth
     *
     * @method GET
     *
     * Logout auth
     *
     * @get /
     *
     * @response 500 {"message": "Internal server error"}
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request): JsonResponse
    {
        // Revoke token
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout successful']);
    }
}

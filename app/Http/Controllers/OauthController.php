<?php

namespace App\Http\Controllers;

use App\Enums\OauthAction;
use App\Enums\OauthProvider;
use App\Mail\Welcome;
use App\Models\User;
use App\Services\OauthService;
use App\Services\UsernameService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected OauthService $oauthService,
        protected UsernameService $usernameService,
    )
    {
    }

    public function redirectToProvider($provider, $action)
    {
        $this->checkProvider($provider);

        $this->checkAction($action);

        $this->oauthService->setAction(OauthAction::from($action));

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            switch ($this->oauthService->getAction()) {
                case OauthAction::Login:
                    return $this->handleLoggingIn($provider);
                case OauthAction::Register:
                    return $this->handleRegistering($provider);
                case OauthAction::Associate:
                    return $this->handleAssociating($provider);
                default:
                    return redirect()->route('home');
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('home');
        }
    }

    private function checkProvider($provider)
    {
        $availableProviders = OauthProvider::values();

        if (!in_array($provider, $availableProviders)) {
            session()->flash('error', "Invalid oauth provider");
            return redirect()->route('home');
        }
    }

    private function checkAction($action)
    {
        $availableActions = OauthAction::values();

        if (!in_array($action, $availableActions)) {
            session()->flash('error', "Invalid oauth action");
            return redirect()->route('home');
        }
    }

    private function handleRegistering($provider)
    {
        $this->checkProvider($provider);

        $socialiteUserInfo = Socialite::driver($provider)->user();

        $userExists = User::where($provider . '_oauth_id', $socialiteUserInfo->id)->first();

        if (!$userExists) {
            $user = User::create([
                'username' => $this->usernameService->formatNameToNickname($socialiteUserInfo->name),
                'email' => $socialiteUserInfo->email,
                'password' => Hash::make(Str::random()),
                'email_verified_at' => now(),
                $provider . '_oauth_id' => $socialiteUserInfo->id,
            ]);

            $user->uploadAvatar($socialiteUserInfo->avatar);

            Mail::to($user->email)->queue(new Welcome($user));

            Auth::login($user, true);
            return redirect()->route('welcome');
        } else {
            Auth::login($userExists);
            return redirect()->route('dashboard');
        }
    }

    private function handleAssociating($provider)
    {
        if (auth()->check()) {
            $user = auth()->user();

            $this->checkProvider($provider);

            $socialiteUser = Socialite::driver($provider)->user();
            $user->update([$provider . '_oauth_id' => $socialiteUser->id]);

            $providerLabel = OauthProvider::from($provider)->label();
            session()->flash('success', "Your $providerLabel account has been associated with your Mapology account");

            return redirect()->route('settings');
        }

        return redirect()->route('login');
    }

    private function handleLoggingIn($provider)
    {
        $socialiteUserInfo = Socialite::driver($provider)->user();
        $this->checkProvider($provider);
        $userExists = User::where($provider . '_oauth_id', $socialiteUserInfo->id)->first();
        if ($userExists) {
            Auth::login($userExists);

            return redirect()->route('dashboard');
        } else {
            $providerLabel = OauthProvider::from($provider)->label();
            session()->flash('error', "The provided $providerLabel account is not associated with any Mapology account");
            return redirect()->route('login');
        }
    }
}

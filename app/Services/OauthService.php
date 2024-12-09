<?php

namespace App\Services;

use App\Enums\OauthAction;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class OauthService
{

    /**
     * Forgets the current socialite data in the user's session
     */
    public function forget()
    {
        session()->forget('oauth_action');
    }

    /**
     * Returns the action the user was performing i.e. registering, logging in
     * or linking his existing account to socialite.
     *
     * @return \Closure|mixed|object|null what action the user was performing whilst connecting to socialite
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getAction()
    {
        return session()->get('oauth_action');
    }

    public function setAction(OauthAction $action)
    {
        session()->put('oauth_action', $action);
    }
}

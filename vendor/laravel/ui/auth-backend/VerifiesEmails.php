<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

trait VerifiesEmails
{
    use RedirectsUsers;

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
        ? redirect($this->redirectPath())
        : view('auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
            ? new Response('', 204)
            : redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return $request->wantsJson()
        ? new Response('', 204)
        : redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * The user has been verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function verified(Request $request)
    {
        //
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        $usertime=  Carbon::parse(auth()->user()->lasted_email_sent,'America/Caracas');
        $now =  Carbon::now('America/Caracas');
        $diferencia =$usertime->diffInHours($now);

        if (($usertime->diffInHours($now) < 2) and auth()->user()->lasted_email_sent != null ) {
            # code...

            return $response = [
                'success'       =>  false,
                'message'       =>  'recently sent',
                'de la variable'    =>  auth()->user()->lasted_email_sent,
                'diferencia'    =>  $diferencia,
                'usertime'      =>  $usertime->toDateTimeString(),
                'Carbontime'    =>  $now->toDateTimeString(),
                'USER'          => Auth::user()->email
            ];
        }

        if (auth()->user()->laste_email_sent == Carbon::now()) {

            return   $response  = [
                'success'   => false,

            ];
        }

        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
            ? new Response('', 204)
            : redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();
        auth()->user()->lasted_email_sent = $now;
        auth()->user()->save();

        return $request->wantsJson()
        ? new Response($diferencia, 202)
        : back()->with('resent', true);
    }
}

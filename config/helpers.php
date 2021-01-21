<?php


use App\Models\Nominee;
use App\Models\Vote;

function successResponse($message){

    session()->flash('success', $message);
}

function errorResponse($message = 'Something went wrong! Please try again'){

    session()->flash('error', $message);
}

function isAdmin(): bool
{
    return Auth::user()->role->name === 'admin'  ;
}

function hasVoted( $nominee_id): bool
{

  return Vote::query()->whereRaw('user_id = ? and nominee_id = ?', [user()->id, $nominee_id])->exists();

}



function user(): ?\Illuminate\Contracts\Auth\Authenticatable
{
    return Auth::user();
}



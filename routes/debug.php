<?php
use Illuminate\Support\Facades\Route;
use App\Models\TeamMember;

Route::get('/debug-team', function () {
    return TeamMember::all();
});

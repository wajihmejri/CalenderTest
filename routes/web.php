<?php

use Illuminate\Support\Facades\Route;
use Spatie\GoogleCalendar\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//   $event = new Event;
  
// $event->name = 'A new event';
// $event->description = 'Event description';
// $event->startDateTime = Carbon\Carbon::now();
// $event->endDateTime = Carbon\Carbon::now()->addHour();
// $event->addAttendee(['email' => 'wmejri@affitech.fr']);
// $event->addMeetLink(); // optionally add a google meet link to the event

// $event->save();

// // get all future events on a calendar
// $events = Event::get();

// // update existing event
// $firstEvent = $events->first();
// $firstEvent->name = 'updated name';
// $firstEvent->save();

// $firstEvent->update(['name' => 'updated again']);

// // create a new event
$eve = Event::create([
   'name' => 'A new event',
   'startDateTime' => Carbon\Carbon::now(),
   'endDateTime' => Carbon\Carbon::now()->addHour(),
    'attendees' => [
        ['email' => 'john@example.com'],
        ['email' => 'jane@example.com'],
    ],
    'hasMeetLink' => true,
]);

dd($eve);

// // delete an event
// $event->delete();
//return view('welcome');

});


Route::resource('booking',BookingController::class);
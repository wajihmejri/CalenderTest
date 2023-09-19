<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class GoogleCalendarController extends Controller
{
    public function createMeet()
    {
    // Initialize the Google Client with the service account credentials
    $client = new Google_Client();
    $client->setApplicationName('Test');

    // Create a new instance of Google Calendar
    $calendar = new Google_Service_Calendar($client);

    // Create a Google Calendar event with a Google Meet link
    $event = new Google_Service_Calendar_Event([
        'summary' => 'Meeting with John Doe',
        'description' => 'Discuss project status',
        'start' => [
            'dateTime' =>  Carbon::now()->format('Y-m-d\TH:i:sP'), // Adjust the format, // Set your start date and time
        ],
        'end' => [
            'dateTime' =>  Carbon::now()->addHour()->format('Y-m-d\TH:i:sP'), // Adjust the format, // Set your end date and time
        ],
        'conferenceData' => [
            'createRequest' => [
                'requestId' => 'random-unique-id', // Generate a unique ID
            ],
        ],
    ]);

    // Save the event to Google Calendar
    $calendarId = 'primary'; // Use 'primary' for the user's primary calendar
    $event = $calendar->events->insert($calendarId, $event);

    // Optionally, you can get the Google Meet link
    $meetLink = $event->getHangoutLink();

    return "Meeting event created successfully!";
}

}

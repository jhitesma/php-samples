<?php
/**
 * Copyright 2022 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// [START classroom_update_course]
use Google\Service\Classroom;

function updateCourse($service, $courseId){
    $course = $service->courses->get($courseId);
    $course->section = 'Period 3';
    $course->room = '302';
    $course = $service->courses->update($courseId, $course);
    printf("Course '%s' updated.\n", $course->name);
    return $course;
}

/* Load pre-authorized user credentials from the environment.
 TODO(developer) - See https://developers.google.com/identity for
  guides on implementing OAuth2 for your application. */
require 'vendor/autoload.php';
$client = new Google\Client();
$client->useApplicationDefaultCredentials();
$client->addScope("https://www.googleapis.com/auth/classroom.courses");
$service = new Google_Service_Classroom($client);
// [END classroom_update_course]
updateCourse($service,'531365794650');
?>
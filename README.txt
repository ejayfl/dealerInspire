# Dealer Inspire PHP Code Challenge
Hey - welcome to the Dealer Inspire PHP Code challenge. We're glad you're here.

## Introduction
This repository contains a simple Laravel application. In its current state, the app has functionality built to geocode a given address, but not much else.

## Prerequisites
- Global installation of composer and PHP.

## Running the application
1. Ensure your machine meets the above prerequisites
1. Clone the repository
1. Navigate into the repository directory
1. `composer install`
1. `cp .env.example .env`
1. `php artisan key:generate`
1. `php artisan serve`

## Your Mission

Your task is to design a new feature that builds off of the current functionality in this repository. This new feature will take the form of a single new API route. (The frontend that consumes this route will be built by another team.) The idea behind this new feature is to accept an arbitrary address, look up the weather conditions at that location using the OpenWeatherMap API, and return an indication of whether or not it's a good idea to go outside and work in your garden.

You don't have to actually write any code for this. Just spend some time designing and planning out the feature and how you would implement it in Laravel. This API will be privately consumed by a widely utilized webapp (If the Marketing department does their job!), so consider edge cases, security, and planning for the future. Also consider improvements that you would make to the existing code base.

As a deliverable for this project, you will meet with a member of the Dealer Inspire team and walk through the following:

1. Improvements that you would make to the existing code.
2. Your design and plan for implementing the new feature as described above.

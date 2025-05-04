<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        return view('jobs.index',
        [
            'featuredJobs' => $jobs[1],
            'jobs' => $jobs[0],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('JobController.store: starting');

        try {
            Log::info('JobController.store: validating request');
            $attributes = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'salary' => ['required'],
                'location' => ['required'],
                'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
                'url' => ['required', 'url'],
                'tags' => ['nullable'],
            ]);

            Log::info('JobController.store: attributes validated', $attributes);

            Log::info('JobController.store: setting featured attribute');
            $attributes['featured'] = $request->has('featured');

            Log::info('JobController.store: creating job');
            $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));
            Log::info('JobController.store: job created', ['job_id' => $job->id]);

            if ($attributes['tags'] ?? false) {
                Log::info('JobController.store: processing tags', ['tags' => $attributes['tags']]);
                foreach(explode(',', $attributes['tags']) as $tag){
                    Log::info('JobController.store: tagging job', ['tag' => $tag]);
                    $job->tag($tag);
                }
                Log::info('JobController.store: tags processed');
            }

            Log::info('JobController.store: redirecting');
            return redirect('/');

        } catch (\Exception $e) {
            Log::error('JobController.store: An exception occurred', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e; // Re-throw the exception to see it in the browser/tests
        } finally {
            Log::info('JobController.store: finishing');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}

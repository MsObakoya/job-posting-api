<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show', 'search', 'filter']);
    }

    public function index()
    {
        $jobs = Job::all();

        return JobResource::collection($jobs);
    }

    public function store(StoreJobRequest $request)
    {
        $job = Auth::user()->jobs()->create($request->validated());

        return new JobResource($job);
    }

    public function show(Job $job)
    {
        return new JobResource($job);
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->validated());

        return new JobResource($job);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return response()->noContent();
    }

    public function search(Request $request)
    {
        $jobs = Job::query()
            ->where('job_title', 'LIKE', '%' . $request->input('search') . '%')
            ->orWhere('company_name', 'LIKE', '%' . $request->input('search') . '%')
            ->orWhere('location', 'LIKE', '%' . $request->input('search') . '%')
            ->get();

        return JobResource::collection($jobs);
    }

    public function filter(Request $request)
    {
        $jobs = Job::query();

        if ($request->filled('type')) {
            $jobs->where('type', '=', $request->input('type'));
        }

        if ($request->filled('category')) {
            $jobs->where('category', '=', $request->input('category'));
        }

        if ($request->filled('salary_range')) {
            $jobs->whereBetween('salary', explode(',', $request->input('salary_range')));
        }

        $jobs = $jobs->get();

        return JobResource::collection($jobs);
    }
}












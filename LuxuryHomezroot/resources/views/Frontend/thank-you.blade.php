@extends('layouts.master')
@section('title','Thanks : Luxury Homez')
@section('description','Luxury Homez')
@section('content')

@push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/blogs.css">
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />
<style>
    .banner-content {
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endpush



<!-- blogs content -->
<section>
    <div class="banner blog-detail-banner">
        <div class="bg">
            <img
                src="https://luxuryhomez.sgpsspn.com/storage/app/public/blogs/2025/06/1750225370-blog.jpg"
                alt="Is Real Estate Really Shaping the Indian Skyline?"
                title="Is Real Estate Really Shaping the Indian Skyline?"
            />
        </div>
        <div class="banner-content">
            <div class="content">
                <h1>Thank You!</h1>
                <p>Thank you your query has been submitted! We will get back to you soon with an update.</p>
                <a href="/" class="btn btn-btn kmr-animate" style="">Back to home</a>
            </div>
        </div>
    </div>
</section>
<!-- blogs content -->


@push('scripts')

@endpush

@stop
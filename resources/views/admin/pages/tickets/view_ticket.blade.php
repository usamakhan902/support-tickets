@extends('layouts.admin')
@section('custom_styles')
    <link href="{{ asset('admin/src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/src/assets/css/light/apps/blog-post.css') }}">

    <link href="{{ asset('admin/src/assets/css/dark/elements/custom-pagination.css" rel="stylesheet" type="text/css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/src/assets/css/dark/apps/blog-post.css') }}">
@endsection

@section('page_title')
    Ticket Details
@endsection

@section('custom_scripts')
    <script>
        function statusUpdate() {
            var status = document.getElementById('status');
            status.submit();
        }
    </script>
    {{-- <script src="{{ asset('admin/src/assets/js/apps/invoice-preview.js') }}"></script> --}}
@endsection


@section('main_content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            @include('admin.include.bread_crumbs')

            <div class="row layout-top-spacing">

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">


                    <div class="single-post-content">
                        <div class="row">
                            <div class="post-content col-8">
                                <h4 class="m-4">{{ $details->title }}</h4>
                                <h4 class="m-4">Description</h4>
                                <p class="m-4">{{ $details->description }}</p>
                            </div>
                            <div class="col-4 mt-4">
                                <form action="{{ route('updateStatus') }}" method="post" id="status">
                                    @csrf
                                    <label for="status">Status</label>
                                    <input type="hidden" name="id" value="{{ $details->id }}">
                                    <select class="form-select" onchange="statusUpdate()" name="status" id="status">
                                        @foreach (config('status') as $key => $status)
                                            <option value="{{ $key }}"
                                                {{ $key == $details->status ? 'selected' : '' }}>{{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="post-info">
                            <hr>
                            <h2 class="mb-5">Comments <span
                                    class="comment-count">({{ count($details->comments) }})</span>
                            </h2>
                            <div class="post-comments">
                                <div class="media mb-5 pb-5 primary-comment">
                                    @foreach ($details->comments as $comment)
                                        <div class="media-body">
                                            <h5 class="media-heading mb-1">{{ $comment->commentuser->name }}</h5>
                                            <div class="meta-info mb-0">{{ date('d F', strtotime($comment->created_at)) }}
                                            </div>
                                            <p class="media-text mt-2 mb-0">{{ $comment->body }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="post-form mt-5">
                                <div class="section add-comment">
                                    <form action="{{ route('create_comment') }}" method="post">
                                        @csrf
                                        <div class="info">
                                            <h6 class="">Add Comment</h6>
                                            <p>Add your <span class="text-success">comment</span> to this ticket.</p>
                                            <div class="row mt-4">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Write Comment</label>
                                                        <input type="hidden" name="ticket_id" value="{{ $details->id }}">
                                                        <input type="hidden" name="created_by"
                                                            value="{{ Auth::user()->id }}">
                                                        @error('created_by')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        @error('ticket_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <textarea class="form-control" name="body" cols="30" rows="10"></textarea>
                                                        @error('body')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-end mt-4">
                                                <button class="btn btn-success">Add Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>
@endsection

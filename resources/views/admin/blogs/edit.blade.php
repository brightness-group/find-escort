@extends('admin.layouts.admin')

@section('content')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div class="d-flex align-items-center me-3">
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Blogs</h1>
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.blogs.index') }}" class="text-muted text-hover-primary">Blogs</a>
                    </li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-muted">Edit Blog</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            Edit Blog
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <form class="form" method="POST" action="{{route('admin.blogs.update', $blog->id)}}" id="kt_modal_add_customer_form" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="scroll-y me-n7 pe-7">
                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Title</label>
                                <input type="text" class="form-control form-control-solid" value="{{ old('title', $blog->title) }}" name="title" />

                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">
                                    <span>Slug</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Slug must be unique."></i>
                                </label>
                                <input type="text" class="form-control form-control-solid" value="{{ old('slug', $blog->slug) }}" name="slug" />

                                @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Content</label>
                                <textarea class="form-control form-control-solid" name="content" id="editor" rows="10" cols="80">{!! $blog->content !!}</textarea>

                                @error('content')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Categories</label>
                                <select name="categories_id[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select categories" data-allow-clear="true" multiple="multiple">
                                    @php
                                        $ids = $blog->categories->pluck('id')->toArray();
                                    @endphp

                                    <option></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if (in_array($category->id, $ids)) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('categories_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-bold mb-2">
                                    <span>Thumbnail</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg., .svg, .gif, .jfif"></i>
                                </label>

                                <div class="mt-1">
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">

                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset($blog->thumbnailPath()) }})"></div>

                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg, .svg, .gif, .jfif" />
                                        </label>
                                    </div>
                                </div>

                                @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace( 'editor', {
                allowedContent: true
            });
        });
    </script>
@endsection

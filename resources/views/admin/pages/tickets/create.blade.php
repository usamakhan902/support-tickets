@extends('layouts.admin')
@section('custom_styles')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/samples/js/sample.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/src/plugins/src/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">

    <link href="{{ asset('admin/src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="{{ asset('admin/src/assets/css/light/apps/ecommerce-create.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/src/assets/css/dark/apps/ecommerce-create.css') }}">
    <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('page_title')
    Add Employee
@endsection

@section('custom_scripts')
    <script src="{{ asset('admin/src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('admin/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('admin/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('admin/src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('admin/src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('admin/src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('admin/src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('admin/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>




    <script src="{{ asset('admin/js/create_project.js') }}"></script>
@endsection


@section('main_content')
    <div class="layout-px-spacing">
        <div class="middle-content p-0">

            @include('admin.include.bread_crumbs')
            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add Employee</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{ route('project.save') }}" method="post" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">First Name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" required name="first_name" value="   {{ old('first_name') }}"
                                        class="form-control" id="inputEmail4">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" required name="last_name" value="   {{ old('last_name') }}"
                                        class="form-control" id="inputPassword4">
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Psotion <span
                                            class="text-danger">*</span></label>
                                    <input type="text" required name="position" value=" {{ old('position') }}"
                                        class="form-control" id="inputPassword4">
                                    @error('position')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label ">Featured Image </label>
                                    <input type="file" name="image" class="form-control" id="inputEmail4">
                                </div>
                                {{-- image area --}}
                                <div class="col-md-6">
                                    <label for="product-images">Upload Images</label>
                                    <div class="multiple-file-upload">
                                        <input type="file" class="filepond file-upload-multiple" name="filepond[]"
                                            id="product-images" multiple data-allow-reorder="true" data-max-file-size="3MB"
                                            data-max-files="5">
                                    </div>
                                </div>
                                {{-- end of image area --}}
                                <div class="col-md-6 mb-4">
                                    <label for="gender">Status</label>
                                    <select class="form-select" id="gender">
                                        <option value="1" selected>Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="example-search-input" class="form-label">Short Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" type="text" rows="6" name="short_description" value="Where is google office">{{ old('short_description]') }}</textarea>
                                    @error('short_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="example-search-input" class="form-label">Detailed Description <span
                                            class="text-danger">*</span></label>
                                    <textarea rows="15" class="form-control" type="text" name="detailed_description" value="Where is google office"
                                        id="description">{{ old('detailed_description]') }}</textarea>
                                    @error('detailed_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div>
@endsection

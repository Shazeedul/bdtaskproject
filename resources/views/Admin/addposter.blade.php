@extends('layouts.admin')
@section('title', 'Add Poster')
@section('content')
<div class="container-fluid">
    <div class="row card m-4 shadow p-3">
        <div class="col-md-12 col-lg-12">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fs-17 font-weight-600 mb-0">Edit Poster</h3>
                    </div>
                    <div class="text-right">
                        <div class="actions">
                            <a href="" class="action-item"><i class="ti-reload"></i></a>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="border_preview">
                        <form method="POST" enctype="multipart/form-data" action="{{route('poster')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="1st_poster" class="col-sm-2 col-form-label">1st Poster <i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="file" name="poster_image1"  accept="image/png, image/gif, image/jpeg" placeholder="Image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <img src="#" widh="70" height="70">
                                    {{-- <input type="hidden" name="old_image" > --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="2nd_poster" class="col-sm-2 col-form-label">2nd Poster <i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="file" name="poster_image2"  accept="image/png, image/gif, image/jpeg" placeholder="Image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <img src="#" widh="70" height="70">
                                    {{-- <input type="hidden" name="old_image" > --}}
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-sm-12 col-sm-offset-3" align="center">
                                    <a href="" class="btn btn-primary  w-md m-b-5">Cancel</a>
                                    <button type="submit" class="btn btn-success  w-md m-b-5">Add</button>
                                </div>
                            </div>
                        </form>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
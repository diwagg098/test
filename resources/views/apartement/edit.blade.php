@extends('layout._app')
@section('title', 'Book Apartement')

@section('content')
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <h2>Form Book Apartement</h2>
                        <form action="{{ url('/apartement/update/' . $content->uniq_id)}}" method="POST">
                            @csrf
                            <div class="mb-3 form-col">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $content->name }}" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="mb-3 form-col">
                                <label for="" class="form-label">Apartement Name</label>
                                <select name="apartement_name" class="form-control">
                                    <option value="{{ $content->apartement_name}}">{{ $content->apartement_name}}</option>
                                    <option value="Royal King Regency">Royal King Regency</option>
                                    <option value="Sultan Regency">Sultan Regency</option>
                                </select>
                            </div>
                            <div class="mb-4 form-col">
                                <label class="form-label">Date From</label>
                                <input type="date" class="form-control" name="dateFrom" value="{{ date('Y-m-d', strtotime($content->dateFrom))}}" min="{{date('Y-m-d')}}">
                            </div>
                            <div class="mb-4 form-col">
                                <label class="form-label">Date To</label>
                                <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime($content->dateTo)) }}" name="dateTo" min="{{date('Y-m-d')}}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-5" style="margin-top: 20px;" onclick="return confirm('Simpan perubahan ?')">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
            </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                    {{ __('Create Contacts') }}
                    </div>
                  </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('store') }}">
                      @csrf
                        <div class="form-group">
                          <label for="exampleInputPassword1">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mobile number</label>
                          <input type="text" class="form-control" name="mobile_number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Telephone Number</label>
                          <input type="text" class="form-control" name="telnumber">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection

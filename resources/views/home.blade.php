@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                    {{ __('List of Contact') }}
                    </div>
                    
                    <div class="col-md-6 text-right">
                    <a href="{{ route('create') }}" class="btn btn-primary">Create</a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <table class="table table-hover">
                         <thead>
                           <tr>
                             <th scope="col">Id</th>
                             <th scope="col">Name</th>
                             <th scope="col">Email</th>
                             <th scope="col">Mobile Number</th>
                             <th scope="col">Telephone Number</th>
                             <th scope="col">Actions</th>
                           </tr>
                         </thead>
                         <tbody>
                         @foreach($contacts as $contact)
                             <tr>
                              <td>{{ $contact->id}}</td>
                              <td>{{ $contact->name }}</td>
                              <td>{{ $contact->email }}</td>
                              <td>{{ $contact->mobile_number }}</td>
                              <td>{{ $contact->telnumber }}</td>
                              <td>
                              <a data-target="#addToFavoriteModal{{ $contact->id }}" data-toggle="modal" class="btn btn-sm btn-primary">Add to Favorite</a>
                              <a data-target="#deleteModal{{ $contact->id }}" data-toggle="modal" class="btn btn-sm btn-danger">Delete</a>
                              </td>
                              <div class="modal fade" id="addToFavoriteModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="">Add to Favorites</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Are you sure you want to add this to your favorites?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <a type="button" class="btn btn-primary" href="{{ route('addToFavorite', ['contact_id' => $contact->id]) }}">Yes</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="modal fade" id="deleteModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalCenterTitle">Delete Contact</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Are you sure you want to delete this contact?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <a type="button" class="btn btn-primary" href="{{ route('delete', ['contact_id' => $contact->id]) }}">Yes</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                             <tr>
                         @endforeach
                         </tbody>
                    </table>
                    <div class="d-flex justify-content-left">
                       {!! $contacts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

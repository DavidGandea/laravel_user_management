@extends('layouts.app')
@section('content')

<h3>
<center>List of users</center>
<div class="col-sm-4">
        <a class="btn btn-primary" href="{{ route('utilizators.create') }}">Add new user</a>

</h3>
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                      <tbody>
                      @foreach ($users as $user)
                          <tr role="row" class="odd">
                            
                            <td class="hidden-xs">{{ $user->firstname }}</td>
                            <td class="hidden-xs">{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="hidden-xs">{{ $user->gender }}</td>

                            <td>
                              <form class="row" method="POST" action="{{ route('utilizators.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <a href="{{ route('utilizators.edit', ['id' => $user->id]) }}" class="btn btn-warning">
                                  Update
                                  </a>
                                  &nbsp;
                                   <button type="submit" class="btn btn-danger">
                                    Delete
                                  </button>
                              </form>
                            </td>
                        </tr>
                      @endforeach
                      </tbody>
                      <thead>
                        <tr>
                          
                          <th class="hidden-xs" width="20%" rowspan="1" colspan="1">First Name</th>
                          <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Last Name</th>
                          <th width="20%" rowspan="1" colspan="1">Email</th>
                          <th class="hidden-xs" width="20%" rowspan="1" colspan="1">Gender</th>
                          <th rowspan="1" colspan="2">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
@endsection
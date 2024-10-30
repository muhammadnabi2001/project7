@extends('main')

@section('title', 'Ingredients')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @if (session('create'))
                    <div class="alert alert-success" role="alert">
                        {{ session('create') }}
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('delete') }}
                    </div>
                @endif
                @if (session('update'))
                    <div class="alert alert-info" role="alert">
                        {{ session('update') }}
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ingredients</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6 mt-2">
                        <a href="/create-ing" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10">
                        <form action="" method="get">
                            @csrf
                            <input type="text" class="form-control" id="searchinput" name="search">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="search" class="btn btn-outline-success" name="ok">
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Facultetlar</th>
                                    <th>Yunalishlar</th>
                                    <th>Gruxlar</th>
                                    <th>Talabalar</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach ($universitets as $model)
                                    <tr>
                                        <th>{{ $model->id }}</th>
                                        <td>{{ $model->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#facultetModal{{ $model->id }}">
                                                {{ $model->facultets()->count() }}
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#yunalishModal{{ $model->id }}">
                                                {{ $model->facultets->flatMap(function($facultet) {
                                                    return $facultet->yunalishs;
                                                })->count() }}
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#gruxModal{{ $model->id }}">
                                                {{ $model->facultets->sum(function($facultet) {
                                                    return $facultet->yunalishs->sum(function($yunalish) {
                                                        return $yunalish->gruxs->count(); // Yunalishdagi guruhlar sonini hisoblash
                                                    });
                                                }) }}
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-info">
                                                {{ $model->facultets->sum(function($facultet) {
                                                    return $facultet->yunalishs->sum(function($yunalish) {
                                                        return $yunalish->gruxs->sum(function($grux) {
                                                            return $grux->talabas->count(); // Guruhdagi talabalar sonini hisoblash
                                                        });
                                                    });
                                                }) }}
                                            </button>
                                        </td>
                                        
                                        <td>
                                            <a href="" class="btn btn-success">Update</a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    <!-- Modal to show faculties -->
                                    <div class="modal fade" id="facultetModal{{ $model->id }}" tabindex="-1" aria-labelledby="facultetModalLabel{{ $model->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="facultetModalLabel{{ $model->id }}">{{ $model->name }} Fakultetlari</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        @foreach ($model->facultets as $facultet)
                                                            <li>{{ $facultet->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal to show yunalishlar -->
                                    <div class="modal fade" id="yunalishModal{{ $model->id }}" tabindex="-1" aria-labelledby="yunalishModalLabel{{ $model->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="yunalishModalLabel{{ $model->id }}">{{ $model->name }} Yunalishlari</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        @foreach ($model->facultets as $facultet)
                                                            @foreach ($facultet->yunalishs as $yunalish)
                                                                <li>{{ $yunalish->name }}</li>
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal to show gruxlar -->
                                    <div class="modal fade" id="gruxModal{{ $model->id }}" tabindex="-1" aria-labelledby="gruxModalLabel{{ $model->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="gruxModalLabel{{ $model->id }}">{{ $model->name }} Guruhlari</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        @foreach ($model->facultets as $facultet)
                                                            @foreach ($facultet->yunalishs as $yunalish)
                                                                @foreach ($yunalish->gruxs as $grux)
                                                                    <li>{{ $grux->name }}-Gurux</li>
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
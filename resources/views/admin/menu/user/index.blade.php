@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            @include('components.alert')
            <div class="d-flex justify-content-between mb-4">
                <h5 class="card-title text-primary">
                    List {{ $title }}
                </h5>
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah {{ $title }}</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No. </th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @php
                                    $color = '';
                                    if ($item->role == 'admin') {
                                        $color = 'bg-danger';
                                    } elseif ($item->role == 'pelapor') {
                                        $color = 'bg-warning';
                                    } elseif ($item->role == 'hse') {
                                        $color = 'bg-success';
                                    }
                                @endphp
                                <span class="badge rounded-pill {{ $color }} text-uppercase">
                                    {{ $item->role }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <form id="deleteForm" action="{{ route('admin.user.destroy', $item->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" data-confirm-delete="true" id="delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3 text-white" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak Ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layout.main')

@section('content')
    <div class="col-md-12">
        <div class="content-wrapper">
            <h1 class="mb-4 text-center text-primary">My URLs</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Daftar URL Draft -->
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white text-center">
                    <h3 class="mb-0">
                        <i class="fas fa-file-alt"></i> Draft
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Short URL</th>
                                    <th scope="col">Original URL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Visits</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($draftUrls as $url)
                                    <tr>
                                        <td>
                                            <a href="{{ $url->short_url }}" target="_blank" class="text-primary">
                                                {{ $url->short_url }}
                                            </a>
                                        </td>
                                        <td>{{ $url->long_url }}</td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{ ucfirst($url->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $url->visits }}</td>
                                        <td>{{ $url->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <form action="{{ route('myurl.destroy', $url->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Draft URLs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination for Draft URLs -->
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Pagination">
                            <ul class="pagination pagination-sm">
                                {{ $draftUrls->links('pagination::bootstrap-5') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Daftar URL Online -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white text-center">
                    <h3 class="mb-0">
                        <i class="fas fa-globe"></i> Online
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Short URL</th>
                                    <th scope="col">Original URL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Visits</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($onlineUrls as $url)
                                    <tr>
                                        <td>
                                            <a href="{{ $url->short_url }}" target="_blank" class="text-primary">
                                                {{ $url->short_url }}
                                            </a>
                                        </td>
                                        <td>{{ $url->long_url }}</td>
                                        <td>
                                            <span class="badge bg-success">
                                                {{ ucfirst($url->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $url->visits }}</td>
                                        <td>{{ $url->created_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <form action="{{ route('myurl.destroy', $url->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Online URLs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination for Online URLs -->
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Pagination">
                            <ul class="pagination pagination-sm">
                                {{ $onlineUrls->links('pagination::bootstrap-5') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

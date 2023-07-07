@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Все события</h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{ route('admin.event.create') }}" class="btn btn-block btn-primary mb 3">Добавить </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="list">
                                <table class="table table-hover text-nowrap data-table">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Название события</th>
                                            <th>Дата события</th>
                                            <th colspan="3">Действие</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $event->id }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td>{{ $event->eventDate }}</td>
                                                
                                                @if ((int) auth()->user()->id == $event->creator_id)
                                                <td class="text-center"><a
                                                    href="{{ route('admin.event.show', $event->id) }}"><i
                                                        class="far fa-eye"></i></a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('admin.event.edit', $event->id) }}"
                                                            class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                                    <td class="text-center">
                                                        <form action="{{ route('admin.event.delete', $event->id) }} "
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="border-0 bg-white">
                                                                <i class="fas fa-trash text-danger" role="button"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    @else
                                                    <td class="text-center" colspan="3"><a
                                                        href="{{ route('admin.event.show', $event->id) }}"><i
                                                            class="far fa-eye"></i></a>
                                                        </td>  
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>

@endsection

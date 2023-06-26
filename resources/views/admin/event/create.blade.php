@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h3>Добавление события</h3>
                        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-50">
                                <label>Название события</label>
                                <input type="text" class="form-control" name="title" placeholder="Название события"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Описание события</label>
                                <input type="text" class="form-control" name="content" placeholder="Название события"
                                    value="{{ old('content') }}">
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Дата события</label>
                                <input type="date" class="form-control" name="eventDate" placeholder="Название события"
                                    value="{{ old('eventDate') }}">
                                @error('eventDate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="creator_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2023.</strong>
        All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
@endsection

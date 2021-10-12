@extends('layouts.default')
@section('title',"Dashboard")
@section('content')


<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">


                @if (auth()->user()->role == "ADMIN")
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            Not Approved - Post
                        </h3>

                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class=" table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="">
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Desccription</th>
                                        <th scope="col">Status</th>
                                        @if (auth()->user()->role == "ADMIN")
                                        <th scope="col" style="width: 100px;">Confirmation</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $index=>$data)
                                    <tr>
                                        <th scope="row">{{ ($index + 1) }}</th>

                                        <td>{{ $data->createdate }}</td>
                                        <td>{{ $data->bloggername }}</td>
                                        <td>{{ $data->useremail }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->description }}</td>

                                        @if($data->poststatus=="T")
                                        <td style='background-color:brown;color:#fff'>{{ config('comvals.ad_status',[])[$data->poststatus] }}</td>
                                        @elseif($data->poststatus=="P")
                                        <td style='background-color:#28a745;color:#fff'>{{ config('comvals.ad_status',[])[$data->poststatus] }}</td>
                                        @else
                                        <td style='background-color:#e83e8c;color:#fff'>{{ config('comvals.ad_status',[])[$data->poststatus] }}</td>
                                        @endif
                                        @if (auth()->user()->role == "ADMIN")
                                        <td>
                                            <a class="btn btn-success btn-xs" href="{{ route("post.edit",["id"=>$data->postid]) }}">Edit</a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                @endif
                <!-- /.card -->



            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">



                <!-- Calendar -->
                <div class="card bg-gradient-success">
                    <div class="card-header border-0">

                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Calendar
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a href="#" class="dropdown-item">Add new event</a>
                                    <a href="#" class="dropdown-item">Clear events</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">View calendar</a>
                                </div>
                            </div>
                            {{-- <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button> --}}
                            {{-- <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button> --}}
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>




@endsection
@push('scripts')
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#calendar').datetimepicker({
            format: 'L',
            inline: true
        })


        $('.todo-list').sortable({
            placeholder: 'sort-highlight',
            handle: '.handle',
            forcePlaceholderSize: true,
            zIndex: 999999
        })



    });
</script>
@endpush
@extends('layouts.app')

@section('content')
    @if (Auth::user()->role == "SUPERVISOR")
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">RPP Report</h4>
                                    <div class="table-responsive">
                                        <table class="table table-centered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Id no.</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Mapel</th>
                                                    <th scope="col">Materi</th>
                                                    <th scope="col"> </th>
                                                    <th scope="col"> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($materials as $item)
                                                    <form action="{{url('approving/'.$item->id)}}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <tr>
                                                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                                            <td>#MTRL{{$item->id}}</td>
                                                            <td>{{$item->user()->first()->name}}</td>
                                                            <td>{{$item->lesson}}</td>
                                                            <td>{{ substr($item->materials, 0, -5) }}</td>
                                                            <td><a target="_blank" href="{{$item->user()->first()->name.'/file/'.$item->materials}}" class="btn btn-primary btn-sm">Download</a></td>
                                                            <td><button class="w3-btn w3-white w3-border w3-border-indigo w3-round-small w3-padding-small" type="submit">APPROVE</button></td>
                                                            {{-- <td><a href="{{'approving/'.$item->id}}" class="w3-btn w3-white w3-border w3-border-indigo w3-round-small w3-padding-small">APPROVE</a></td> --}}
                                                        </tr>                                                    
                                                    </form>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-3">
                                        <ul class="pagination pagination-rounded justify-content-center mb-0">
                                            <li class="page-item">
                                                <a class="page-link" href="#">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Schedule</h4>

                                <ul class="inbox-wid list-unstyled">
                                    <li class="inbox-list-item">
                                        <a href="#">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                    <i class="bx bxs-school"></i>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Rekap Dokumen</h5>
                                                    <p class="text-truncate mb-0">telah di kumpulkan 2 hari sebelumnya</p>
                                                </div>
                                                <div class="font-size-12 ml-2">
                                                    20 - 23 Aug
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="inbox-list-item">
                                        <a href="#">
                                            <div class="media">
                                                <div class="mr-3 align-self-center">
                                                    <i class="bx bxs-school"></i>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-16 mb-1">Pengumpulan dokumen</h5>
                                                    <p class="text-truncate mb-0">dokumen yang telah di rekap</p>
                                                </div>
                                                <div class="font-size-12 ml-2">
                                                    23 Aug
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm">Load more</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- end row -->
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> Danial Abror.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
    @elseif (Auth::user()->role == "TEACHER")
        <div class="main-content">

            <div class="page-content">
        
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>
        
                        </div>
                    </div>
                </div>
                <!-- end page title -->
        
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-sm font-size-20 mr-3">
                                        <span class="avatar-title bg-soft-primary text-primary rounded">
                                            <i class="mdi mdi-tag-plus-outline"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-size-16 mt-2">RPP</div>
                                    </div>
                                </div>
                                @foreach ($countRPP as $item)
                                <div class="row">
                                    <div class="col-xl-8">
                                        <h6 class="mt-4">{{$item->materials}}</h6>
                                    </div>
                                    <div class="col-xl-4">
                                        @if ($item->status == "NOTAPPROVE")
                                            <button class="w3-btn w3-white w3-border w3-border-indigo w3-round" aria-disabled="">NOT APPROVE</button>
                                        @else
                                            <button class="w3-btn w3-indigo w3-border w3-round" aria-disabled>&nbsp;&nbsp;&nbsp;APPROVED&nbsp;&nbsp;</button>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-7">
                                        <p class="mb-0"><button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary btn-sm">Upload</button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('modal._upload_material')
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Schedule</h4>
        
                                <ul class="inbox-wid list-unstyled">
                                    @foreach ($schedules as $item)
                                        <li class="inbox-list-item">
                                            <a href="#">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bx-columns"></i>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">{{$item->place}} - {{$item->activity}}</h5>
                                                        <p class="text-truncate mb-0">{{$item->detail}}</p>
                                                    </div>
                                                    <div class="font-size-15 ml-2">
                                                        {{$item->time}}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
        
                                <div class="text-center">
                                    <a href="" class="btn btn-primary btn-sm">Load more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- End Page-content -->
        
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> Danial Abror.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
        
        </div>
    @elseif (Auth::user()->role == "CURRICULUM")
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Schedule</h4>

                                <ul class="inbox-wid list-unstyled">
                                    @foreach ($schedulesForCurriculum as $item)
                                        <li class="inbox-list-item">
                                            <a onclick="document.getElementById('id03').style.display='block'">
                                                <div class="media">
                                                    <div class="mr-3 align-self-center">
                                                        <i class="bx bxs-school"></i>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">{{$item->user()->first()->name}}</h5>
                                                        <p class="text-truncate mb-0">{{$item->activity}} - {{$item->place}}</p>
                                                    </div>
                                                    <div class="font-size-12 ml-2">
                                                        {{$item->time}} ({{$item->detail}})
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="text-center">
                                    <a onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-indigo w3-round">add Schedule</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @include('modal._update_schedule') --}}
                @include('modal._add_schedule')
                <!-- end row -->
                <!-- end row -->
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> Danial Abror.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
    @endif  
@endsection

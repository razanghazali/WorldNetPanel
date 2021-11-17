<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                         {{ __('welcome ') }} ...     {{ Auth::user()->name}}
        </h2>

    </x-slot>

    <br><br>
    <div class="row" style="padding: 50px">

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color:#FFBF00" > how to use the system! </h6>
                    <div class="dropdown no-arrow">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('weeks.index')}}" style="color:#00008B">week list</a>
                    </h5>
                    <b>  if you need to add a mission</b>
                    <br> <br>
                    1.first click on week list link
                    <br> <br>
                    2. add a week
                    <br> <br>
                    3.click show to select the mission day
                    <br> <br>
                    4.choose the day
                    <br> <br>
                    5.add a mission by fill the input then click add
                    <br>
                    <br>
                    <br>

                    thank you!
                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="myAreaChart" style="display: block; width: 491px; height: 320px;" width="491" height="320" class="chartjs-render-monitor"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold " style="color:#FFBF00"> notes</h6>
                    <div class="dropdown no-arrow">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2">



                            @foreach($notes=\App\Models\Note::all() as$no)
                                <b>--</b> {{$no->body}}

                            @endforeach

                        </div>
                    </div>
                    <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="myPieChart" width="491" height="245" style="display: block; width: 491px; height: 245px;" class="chartjs-render-monitor"></canvas>

                    </div>



                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i>
                                        </span>
                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i>
                                        </span>
                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i>
                                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

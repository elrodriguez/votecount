<div>
    <div class="row">
        <div class="col-lg-12">
            <div id="panel-1" class="panel panel-locked" data-panel-lock="false" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
                <div class="panel-hdr">
                    <h2>Gráfico resultados provinciales</h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                        <div class="row no-gutters">
                            <div class="col-lg-12 col-xl-12">
                                <div class="position-relative">
                                    {{-- <div id="updating-chart" style="height:242px"></div> --}}
                                    <div id="flot-bar" style="width:100%; height:300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content p-0">
                        <div class="row row-grid no-gutters">
                            @foreach($this->ppar as $pp)
                                @if($this->total->total_pro)
                                    @php
                                        $ppt = (($pp['total_pro']/$total->total_pro)*100);
                                    @endphp
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="px-3 py-2 d-flex align-items-center">
                                            <div class="js-easy-pie-chart color-primary-300 position-relative d-inline-flex align-items-center justify-content-center" data-percent="{{ number_format($ppt, 2, ',', '') }}" data-piesize="50" data-linewidth="5" data-linecap="butt" data-scalelength="0">
                                                <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                    <span class="js-percent d-block text-dark"></span>
                                                </div>
                                            </div>
                                            <span class="d-inline-block ml-2 text-muted">
                                                <img src="{{ $pp['logo'] }}" style="width: 25px" />
                                                {{ $pp['name'] }}
                                                <i class="fal fa-caret-up color-danger-500 ml-1"></i>
                                            </span>
                                               
                                            <div class="ml-auto d-inline-flex align-items-center">
                                                <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="70" sparklinecolor="#886ab5" sparkfillcolor="false" sparklinewidth="1" values="5,6,5,3,8,6,9,7,4,2"></div>
                                                <div class="d-inline-flex flex-column ml-2">
                                                    <h1 class="d-inline-block badge badge-warning text-center p-1 width-6 ">{{ number_format($pp['total_pro'], 2, ',', '') }}</h1>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        document.addEventListener('livewire:load', function () {
            var ticks = @js($par);
            var flotBar = $.plot("#flot-bar", [
                {
                    data: @js($val)
                }],
                {
                    series:
                    {
                        bars:
                        {
                            show: true,
                            lineWidth: 0,
                            fillColor: "#93B904",
                            align: "center",
                            barWidth: 0.5
                        }
                    },
                    grid:
                    {
                        borderWidth: 1,
                        borderColor: '#eee'
                    },
                    yaxis:
                    {
                        tickColor: '#eee',
                        font:
                        {
                            color: '#999',
                            size: 10
                        }
                    },
                    xaxis:
                    {
                        ticks: ticks,
                        tickColor: '#eee',
                        font:
                        {
                            color: '#999',
                            size: 10
                        }
                    }
                });
        })
    </script>
</div>
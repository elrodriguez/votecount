<div>
    
    
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th colspan="2">Partido o Movimiento Político</th>
                    <th class="text-center">Regional</th>
                    <th class="text-center">Provincial</th>
                    <th class="text-center">Distrital</th>
                </tr>
                @php
                    $ttp = 0;
                @endphp
                @foreach($parties_totales as $parties_total)
                    @php
                        $ttp = $ttp + ($parties_total['total_reg'] + $parties_total['total_pro'] + $parties_total['total_dis']);
                    @endphp
                    <tr>
                        <td class="text-center align-middle">
                            <img style="width: 60px" src="{{ $parties_total['img'] }}" />
                        </td>
                        <td class="align-middle">
                            <h4>{{ $parties_total['name'] }}</h4>
                        </td>
                        <td class="text-right align-middle">
                            @if($this->totales->total_reg)
                                {{ $parties_total['total_reg'] }} / {{ $totales->total_reg}}
                                @php
                                    $pc = (($parties_total['total_reg']/$totales->total_reg)*100);
                                @endphp
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $pc }}%" aria-valuenow="{{ $pc }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                        </td>
                        <td class="text-right align-middle">
                            @if($this->totales->total_pro)
                                {{ $parties_total['total_pro'] }} / {{ $totales->total_pro}}
                                @php
                                    $pp = (($parties_total['total_pro']/$totales->total_pro)*100);
                                @endphp
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $pp }}%" aria-valuenow="{{ $pp }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                        </td>
                        <td class="text-right align-middle">
                            @if($this->totales->total_dis)
                                {{ $parties_total['total_dis'] }} / {{ $totales->total_dis}}
                                @php
                                    $pd = (($parties_total['total_dis']/$totales->total_dis)*100);
                                @endphp
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $pd }}%" aria-valuenow="{{ $pd }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    
</div>
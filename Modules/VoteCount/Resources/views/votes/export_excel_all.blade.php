<div class="p-5 rounded">
    <h1>Exportacion</h1>
    <p class="lead">Resultados de todas las mesas.</p>
</div>
<div class="container">
    <table class="table table-bordered">
        <caption>Reporte {{ \Carbon\Carbon::now()->format('d/m/Y')}}</caption>
        
    @foreach($gas as $ga)
        <tr >
            <th style="background-color: #AEB6BF ;">PERSONERO</th>
            <th style="background-color: #AEB6BF  ;">PROVINCIA</th>
            <th style="background-color: #AEB6BF  ;">DISTRITO</th>
            <th style="background-color: #AEB6BF  ;">NOMBRE DEL LOCAL</th>
            <th style="background-color: #AEB6BF  ;">AULA</th>
            <th style="background-color: #AEB6BF  ;">MESA</th>
            <th style="background-color: #AEB6BF  ;">TOTAL VOTOS</th>
        </tr>
        <tr>
            <td style="background-color: #AEB6BF ;">{{ $ga->person_number }} - {{ $ga->person_name }}</td>
            <td style="background-color: #AEB6BF ;">{{ $ga->province_name }}</td>
            <td style="background-color: #AEB6BF ;">{{ $ga->district_name }}</td>
            <td style="background-color: #AEB6BF ;">{{ $ga->school_name }}</td>
            <td style="background-color: #AEB6BF ;">{{ $ga->classroom_name }}</td>
            <td style="background-color: #AEB6BF ;">{{ $ga->number_table }}</td>
            <td >{{ $ga->votes_total }}</td>
        </tr>
        @php
            $par = \Modules\VoteCount\Entities\VoteVotesTablesPoPa::join('vote_political_parties','political_party_id','vote_political_parties.id')
                ->where('votes_table_id',$ga->id)
                ->select(
                    'vote_political_parties.name',
                    'vote_reg',
                    'vote_pro',
                    'vote_dis'
                )
                ->get();
            
        @endphp
        <tr>
            <th colspan="4">Partido o Movimiento Político</th>
            <th>V. Regional</th>
            <th>V. Provincial</th>
            <th>V. Distrital</th>
        </tr>
        @foreach($par as $pa)
        <tr>
            <td colspan="4">{{ $pa->name }}</td>
            <td>{{ $pa->vote_reg }}</td>
            <td>{{ $pa->vote_pro }}</td>
            <td>{{ $pa->vote_dis }}</td>
        </tr>
        @endforeach
    @endforeach
</table>
</div>
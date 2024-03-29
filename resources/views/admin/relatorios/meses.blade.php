<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('admin.layout.includes.main')
@section('title','Painel Admin | Relatório de venda')

@yield('APJ | Páginal')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <form action="{{ url('admin/relatorio/dashboard')}}">
                    @csrf
                <div class="row mb-2">

                        <div class="col-sm-12">
                            <h1>Relatório vendas</h1>
                        </div>

                        <div class="col-sm-4">

                            <div class="form-group">
                                <label for="">Mês</label>
                                <select class="custom-select" name="Mes" id="" value="{{ $Mes }}">
                                    @if(request('Mes'))
                                        @if($Mes == 1)
                                            <option selected> Janeiro</option>
                                            @elseif($Mes == 2)
                                                <option selected> Fevereiro</option>
                                            @elseif($Mes == 3)
                                                <option selected> Março</option>
                                            @elseif($Mes == 4)
                                                <option selected> Abril</option>
                                            @elseif($Mes == 5)
                                                <option selected> Maio</option>
                                            @elseif($Mes == 6)
                                                <option selected> Junho</option>
                                            @elseif($Mes == 7)
                                                <option selected> Julho</option>
                                            @elseif($Mes == 8)
                                                <option selected> Agosto</option>
                                            @elseif($Mes == 9)
                                                <option selected> Setembro</option>
                                            @elseif($Mes == 10)
                                                <option selected> Outubro</option>
                                            @elseif($Mes == 11)
                                                <option selected> Novembro</option>
                                            @elseif($Mes == 12)
                                                <option selected> Dezembro</option>
                                        @endif
                                    @else
                                        <option selected value="{{ date('m') }}"> {{ strftime('%B', strtotime('today')) }}</option>
                                    @endif
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="">Ano</label>
                            <select class="custom-select" name="Ano" id="" value="{{ date('Y') }}">
                                @if(request('Ano'))
                                    <option selected value="{{  $Ano }}">{{  $Ano }}</option>
                                @endif
                                @for($i=date('Y'); $i>=1900; $i--)
                                    <option value='{{ $i }}'> {{ $i }} </option>
                                @endfor
                            </select>
                            </div>
                        </div>


                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Buscar</button>


                    </div>



                </div>
            </form>
            </div><!-- /.container-fluid -->
            </section>

        <!-- Main content -->
        @if(request('Mes'))
            <section class="content">
                <div class="container-fluid">
                @if($pedidos->isNotEmpty())
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count($pedidos) }}</h3>

                                    <p>Número de Pedidos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-bag    "></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>R$ {{ $pedidos->sum('total')}} </h3>

                                    <p>Total Arrecadado</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dollar-sign    "></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><strong>{{ $produtomaisvendido[0]->nome }}</strong></h3>

                                    <p>Produto Mais Vendido</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-seedling    "></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $pedidos->sum('entregue') }}</h3>

                                    <p>Pedidos Entregues</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-truck    "></i>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary mb-3">
                            <div class="inner">
                                <h3>{{ $Diamaisvendido}}</h3>

                                <p>Dia com mais venda</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-trophy    "></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary mb-3">
                            <div class="inner">
                                <h3>{{ $Vendasdomelhordia }}</h3>

                                <p>N° de Vendas no melhor dia</p>
                            </div>
                            <div class="icon">
                               <i class="fas fa-chart-line    "></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-light mb-3">
                            <div class="inner">
                                <h3>{{ count($pedidos->groupby('user_id')) }}</h3>

                                <p>N° de Clientes que compraram</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                      <div class="card">

                        <div class="card-body">

                          <!-- /.d-flex -->

                          <div class="position-relative mb-4">
                            <div id="chart_div"></div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">

                          <div class="card-body">

                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                              <div id="categoria"></div>
                            </div>

                          </div>
                        </div>
                      </div>
                </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <strong>Sem pedidos</strong>
                    </div>
                @endif

            </div>

        </section>
        @endif
        <!-- /.content -->
    </div>

@endsection


<script>
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawBasic);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Dia');
        data.addColumn('number', 'Valor');

        data.addRows([
            @php

            foreach($VendaPorDia as $Dia){

                echo '[new Date("'.$Dia->Data.'"), '.$Dia->Total.'],';

                }
            @endphp
        ]);
        var formatter = new google.visualization.NumberFormat(
        {prefix: 'R$', negativeColor: 'red', negativeParens: true});
    formatter.format(data, 1);

        var options = {
          title: 'Valor de venda no mês',

          hAxis: {
            format: 'd/M',
            gridlines: {count: 15}
          },
          vAxis: {
            gridlines: {color: 'none'},
            minValue: 0
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);



      }



function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Categoria');
      data.addColumn('number', 'Valor total vendido');



      data.addRows([
            @php

            foreach($vendaporcategoria as $Categoria){

                echo '["'.$Categoria->Nome.'", '.$Categoria->Valor.'],';

                }
            @endphp
        ]);
        var formatter = new google.visualization.NumberFormat(
        {prefix: 'R$', negativeColor: 'red', negativeParens: true});
    formatter.format(data, 1); // Apply formatter to second column
      var options = {
        title: 'Venda por categoria',
        hAxis: {
          title: 'Categorias'

        },
        vAxis: {
          title: 'Valor da venda'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('categoria'));

      chart.draw(data, options);
    }





 </script>

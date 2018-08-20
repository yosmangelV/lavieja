@extends('layouts.principal')

	@section('content')
		<div class="row">
			<div class="col-md-12">
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h2 class="center-text">La vieja</h2>
			</div>
		</div>

		<div class="row margin-top-2">
			<table class="table table-bordered datatable tableVieja" border="0">


				<tr>
					<td style="border-style:solid;" class="table01" id="td01" name="td01">
						@if(empty($game->c1) )
					    	<img class="imgCenter" id="img01" name="img01" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('1')" />
					    @else
					    	<img class="imgCenter" id="img01" name="img01" src="{{$game->c1=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('1')" />
					    @endif
				    </td>  
				    <td style="border-style:solid;" class="table02" id="td02" name="td02">
				    	@if(empty($game->c2) )
					    	<img class="imgCenter" id="img02" name="img02" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('2')" />
					    @else
					    	<img class="imgCenter" id="img02" name="img02" src="{{$game->c2=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('2')" />
					    @endif
				    </td>  
				    <td style="border-style:solid;" class="table03" id="td03" name="td03">
				    	@if(empty($game->c3) )
					    	<img class="imgCenter" id="img03" name="img03" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('3')" />
					    @else
					    	<img class="imgCenter" id="img03" name="img03" src="{{$game->c3=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('3')" />
					    @endif
				    </td>  
				</tr>

				<tr>
				    <td style="border-style:solid;" class="table04" id="td04" name="td04">
				    	@if(empty($game->c4) )
					    	<img class="imgCenter" id="img04" name="img04" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('4')" />
					    @else
					    	<img class="imgCenter" id="img04" name="img04" src="{{$game->c4=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('4')" />
					    @endif
				    </td>  
				    <td style="border-style:solid;" class="table05" id="td05" name="td05">
				    	@if(empty($game->c5) )
					    	<img class="imgCenter" id="img05" name="img05" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('5')" />
					    @else
					    	<img class="imgCenter" id="img05" name="img05" src="{{$game->c5=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('5')" />
					    @endif
				    </td>  
				    <td style="border-style:solid;" class="table06" id="td06" name="td06">
				    	@if(empty($game->c6) )
					    	<img class="imgCenter" id="img06" name="img06" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('6')" />
					    @else
					    	<img class="imgCenter" id="img06" name="img06" src="{{$game->c6=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('6')" />
					    @endif
				    </td>  
				</tr>

				<tr>
				    <td style="border-style:solid;" class="table07" id="td07" name="td07">
				    	@if(empty($game->c7) )
					    	<img class="imgCenter" id="img07" name="img07" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('7')" />
					    @else
					    	<img class="imgCenter" id="img07" name="img07" src="{{$game->c7=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('7')" />
					    @endif
				    </td>  
				    <td style="border-style:solid;" class="table08" id="td08" name="td08">
				    	@if(empty($game->c8) )
					    	<img class="imgCenter" id="img08" name="img08" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('8')" />
					    @else
					    	<img class="imgCenter" id="img08" name="img08" src="{{$game->c8=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('8')" />
					    @endif
				    </td>  
				    <td style="border-style:solid;" id="td09" name="td09">
				    	@if(empty($game->c9) )
					    	<img class="imgCenter" id="img09" name="img09" src="/images/blanco-clanco.png" width="96" Height="128" onclick="box('9')" />
					    @else
					    	<img class="imgCenter" id="img09" name="img09" src="{{$game->c9=='X'?"/images/X.png":"/images/O.png"}}" width="96" Height="128" onclick="box('9')" />
					    @endif
				    </td>  
				</tr>

			</table>

			<table class="table  datatable tableVieja" border="0">
				 <tr>
				    <th class="center-text">Jugador 1</th>  
				    <td></td>  
				    <th class="center-text">Jugador 2</th>  
				 </tr>

				 <tr>
				    <td><img class="imgCenter" src="/images/X.png" width="80" Height="100"/></td>  
				    <td></td>  
					<td><img class="imgCenter" src="/images/O.png" width="80" Height="100"/></td>  
				</tr>
				 <tr>
				    <td>
				    	<input class="radioMargin" type="radio" name="turn" id="radioX" {{$game->turn=='X'?'checked="true"':'checked="false"'}} disabled>
				    </td>  
				    <td class="center-text"><b>Turno</b></td>  
					<td>
						<input class="radioMargin" type="radio" name="turn" id="radioO" {{$game->turn=='O'?'checked="true"':'checked="false"'}} disabled>
					</td>  
				</tr>
				<tr>
					<td></td>  
					<td><input type="button" class="btn btn-blue col-center" value="Reiniciar Partida" id="reset" onclick="reload()" /></td>  
					<td></td>  
				</tr>
			</table>
		<div class="row center" >
			
		</div>
			

		<br />
	@endsection

	@section('modales')
		@include('modal.vieja.message')
		@include('modal.vieja.reload')
	@endsection

	@section('extrajsfooter')
		<script src="/js/vieja/basicFunction.js"></script>
	@endsection
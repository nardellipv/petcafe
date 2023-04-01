<div class="col">
	<div class="modal fade" id="exampleVerticallycenteredModal-{{$client->id}}" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Cliente {{ $client->name }}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<h6>Dirección</h6>{{ $client->address }}
									</li>
									<li class="list-group-item">
										<h6>Teléfono Principal</h6>{{ $client->phone }}
									</li>									
									<li class="list-group-item">
										<h6>Email</h6>{{ $client->email }}
									</li>
									<li class="list-group-item">
										<h6>Comentario</h6>{{ $client->city->name }}
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<a href="{{ route('edit.client', $client) }}" type="button" class="btn btn-primary">Editar Cliente</a>
				</div>
			</div>
		</div>
	</div>
</div>
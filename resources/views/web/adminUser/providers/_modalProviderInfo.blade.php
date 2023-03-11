<div class="col">
	<div class="modal fade" id="exampleVerticallycenteredModal-{{$provider->id}}" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Proveedor {{ $provider->name }}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<h6>Dirección</h6>{{ $provider->address }}
									</li>
									<li class="list-group-item">
										<h6>Teléfono Principal</h6>{{ $provider->phone }}
									</li>
									<li class="list-group-item">
										<h6>Teléfono Secundario</h6>{{ $provider->phone2 }}
									</li>
									<li class="list-group-item">
										<h6>Email</h6>{{ $provider->email }}
									</li>
									<li class="list-group-item">
										<h6>Comentario</h6>{{ $provider->comment }}
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<a href="{{ route('edit.provider', $provider) }}" type="button" class="btn btn-primary">Editar Proveedor</a>
				</div>
			</div>
		</div>
	</div>
</div>
<x-app-layout>
	<x-slot name="head">
		<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	</x-slot>

	<x-slot name="title">Kontak - {{ $contact->subject }}</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	@if(session()->has('failed'))
	<x-alert type="danger" message="{{ session()->get('failed') }}" />
	@endif

	<div class="row">
		<div class="col-md-7 mb-3">
			<div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Baca pesan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="mailbox-read-info">
            <h5 class="font-weight-bold mb-3">{{ $contact->subject }}</h5>
            <h6>Email: {{ $contact->email }}
              <span class="mailbox-read-time float-right">{{ $contact->created_at->format('d M, Y -- h:m:s A') }}</span></h6>
            <h6>No. HP: {{ $contact->phone }}</h6>
          </div>

          <div class="mailbox-read-message">
          	{!! nl2br($contact->message) !!}
          </div>
          <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
          <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="post">
          	@csrf
          	<button type="submit" class="btn btn-default delete">
          		<i class="far fa-trash-alt mr-1"></i> Hapus
          	</button>
          </form>
        </div>
        <!-- /.card-footer -->
      </div>
		</div>
		<div class="col-md-5">
			<x-card>
					<x-slot name="title">Balas</x-slot>
					<x-slot name="option">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
					</x-slot>

					<div class="py-2">
						@foreach($contact->replies as $reply)
							<div class="card">
								<div class="card-body">
									<div class="mb-2">
										<span class="badge badge-secondary">{{ $reply->created_at->diffForHumans() }}</span>
									</div>
									{{ $reply->message }}
								</div>
							</div>
						@endforeach
					</div>

					<form action="{{ route('admin.contact.reply', $contact->id) }}" method="post">
						@csrf
						<div class="form-group">
							<label for="message">Pesan</label>
							<textarea name="message" rows="8" class="form-control"></textarea>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary"><i class="far fa-envelope mr-1"></i> Kirim</button>
						</div>
					</form>
				</x-card>
		</div>
	</div>

	<x-slot name="script">
		<script>
			$('.delete').click(function(e){
				e.preventDefault()
				const ok = confirm('Ingin menghapus pesan kontak?')

				if(ok) {
					$(this).parent().submit()
				}
			});
		</script>
	</x-slot>
</x-app-layout>
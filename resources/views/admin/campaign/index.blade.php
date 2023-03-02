<x-app-layout>
	<x-slot name="head">
		<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	</x-slot>

	<x-slot name="title">Penggalangan</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<div class="row">
		<div class="col-md-12 mb-3">
			<x-card>
				<x-slot name="title">
					<a href="{{ route('admin.campaign.create') }}" class="btn btn-primary">
						<i class="fas fa-plus mr-1"></i> Tambahkan
					</a>
				</x-slot>
				<table class="table table-hover border">
					<thead>
						<th>Judul</th>
						<th>Terkumpul</th>
						<th>Target</th>
						<th>Donatur</th>
						<th>Waktu tersisa</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						@forelse($campaigns as $campaign)
						<tr>
							<td>{{ Str::limit($campaign->title, 40) }}</td>
							<td>Rp. {{ number_format($campaign->raised, 0, '.',',') }}</td>
							<td>Rp. {{ number_format($campaign->goals, 0, '.',',') }}</td>
							<td>{{ 
								$campaign->donations()
									->where('campaign_id', $campaign->id)
									->where('status', 'PAID')
									->count('id')
							}}</td>
							<td>{{ $campaign->deadline }}</td>
							<td>
								<a href="{{ route('campaign.show', $campaign->slug) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
								<a href="{{ route('admin.campaign.edit', $campaign->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a> 
								<form action="{{ route('admin.campaign.destroy', $campaign->id) }}" style="display: inline-block;" method="POST">
									@csrf
									<button type="button" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="5" class="text-center">No Data</td>
						</tr>
						@endforelse
					</tbody>
				</table>

				<div class="mt-3">
					{{ $campaigns->links() }}
				</div>
			</x-card>
		</div>
	</div>

	<x-slot name="script">
		<script>

			$('.delete').click(function(e){
				e.preventDefault()
				const ok = confirm('Ingin menghapus penggalangan?')

				if(ok) {
					$(this).parent().submit()
				}
			})
		</script>
	</x-slot>
</x-app-layout>
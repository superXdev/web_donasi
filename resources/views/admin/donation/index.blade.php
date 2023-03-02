<x-app-layout>
	<x-slot name="head">
		<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	</x-slot>

	<x-slot name="title">Daftar donasi</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<div class="row">
		<div class="col-md-12 mb-3">
			<x-card>
				<table class="table table-hover border">
					<thead>
						<th>Nama donatur</th>
						<th>Nominal</th>
						<th>Pembayaran</th>
						<th>Penggalangan</th>
						<th>Tanggal</th>
					</thead>
					<tbody>
						@forelse($donations as $donation)
						<tr>
							<td>{{ $donation->name }}</td>
							<td>Rp. {{ number_format($donation->amount, 0, '.',',') }}</td>
							<td><span class="text-primary">{{ $donation->payment_method }}</span></td>
							<td>{{ Str::limit($donation->campaign->title, 45) }}</td>
							<td>{{ $donation->created_at->format('d-M-Y') }}</td>
						</tr>
						@empty
						<tr>
							<td colspan="5" class="text-center">No Data</td>
						</tr>
						@endforelse
					</tbody>
				</table>

				<div class="mt-3">
					{{ $donations->links() }}
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
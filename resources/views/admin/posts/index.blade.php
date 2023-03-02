<x-app-layout>
	<x-slot name="head">
		<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	</x-slot>

	<x-slot name="title">Artikel Berita</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif
	<div class="row">
		<div class="col-md-12 mb-3">
			<x-card>
				<x-slot name="title">
					<a href="{{ route('admin.article.create') }}" class="btn btn-primary">
						<i class="fas fa-plus mr-1"></i> Buat artikel
					</a>
				</x-slot>
				
				<div class="table-responsive">
					<table class="table table-hover border">
					<thead>
						<th>Judul</th>
						<th>Kategori</th>
						<th>Penulis</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						@forelse($posts as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td>{{ $post->category->name }}</td>
							<td>{{ $post->author }}</td>
							<td>{{ $post->created_at->format('d M, Y') }}</td>
							<td>
								<a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
								<a href="{{ route('admin.article.edit', $post->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a> 
								<form action="{{ route('admin.article.destroy', $post->id) }}" style="display: inline-block;" method="POST">
									@csrf
									<button type="button" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></button>
								</form>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="4" class="text-center">No Article</td>
						</tr>
						@endforelse
					</tbody>
				</table>
				</div>

				<div class="mt-3">
					{{ $posts->links() }}
				</div>
			</x-card>
		</div>
	</div>

	<x-slot name="script">
		<script>

			$('.delete').click(function(e){
				e.preventDefault()
				const ok = confirm('Ingin menghapus artikel?')

				if(ok) {
					$(this).parent().submit()
				}
			})
		</script>
	</x-slot>
</x-app-layout>
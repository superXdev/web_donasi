<x-app-layout>
	<x-slot name="head">
		<!-- include summernote css/js -->
		<link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
		<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
	</x-slot>

	<x-slot name="title">Buat artikel berita</x-slot>
	
	{{-- show alert if there is errors --}}
	<x-alert-error/>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<form action="{{ route('admin.article.store') }}" method="post" enctype="multipart/form-data">
		@csrf

		<div class="row">
			<div class="col-md-8">
				<input type="text" class="form-control mb-3" name="title" placeholder="Masukkan judul">

				<textarea id="editor" name="body"></textarea>
			</div>
			<div class="col-md-4" id="category_section">
				<x-card>
					<x-slot name="title">Kategori</x-slot>
					<x-slot name="option">
		                <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                  <i class="fas fa-minus"></i>
		                </button>
					</x-slot>

					@forelse(\App\Models\Category::all() as $key => $category)
					<div class="custom-control custom-radio">
						<input type="radio" name="category_id" value="{{ $category->id }}" class="custom-control-input" id="cat-{{ $category->id }}" {{ ($key == 0) ? 'checked': '' }}> 
						<label for="cat-{{ $category->id }}" class="custom-control-label">{{ $category->name }}</label>
					</div>
					@empty
					<h5 class="text-secondary text-center">Kosong</h5>
					@endforelse

					<div id="opt-cat"></div>
					

					<div class="mt-3">
						<a href="#" class="new-cat"><i class="fas fa-plus mr-1"></i> Buat kategori</a>
					</div>
				</x-card>
				<x-card>
					<x-slot name="title">Publikasi</x-slot>
					<x-slot name="option">
		                <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                  <i class="fas fa-minus"></i>
		                </button>
					</x-slot>

					<div class="form-group">
                    <label for="exampleInputFile">Thumbnail</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="thumbnail">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                    </div>
                  </div>

					<label for="">Penulis</label>
					<input type="text" class="form-control" name="author" value="{{ auth()->user()->name }}">

					<a href="#" class="text-danger float-left mt-3 reset">Reset artikel</a>
					<button class="btn btn-primary btn-sm float-right mt-3">Publikasi</button>
				</x-card>
			</div>
		</div>
		
	</form>

	<x-modal>
		<x-slot name="id">categoryModal</x-slot>
		<x-slot name="title">Buat kategori</x-slot>

		<div class="row mb-2">
			<div class="col-md-9">
				<input type="text" class="form-control" id="kategori" placeholder="Nama kategori">
			</div>
			<div class="col-md-2">
				<button class="btn btn-primary" id="save-cat">Simpan</button>
			</div>
		</div>
	</x-modal>

	<x-slot name="script">
		<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
		<script>
			$(document).ready(function() {
			  $('#editor').summernote({
			  	height: 500
			  });
			  bsCustomFileInput.init();
			});

			$('.new-cat').click(function() {
				$('#categoryModal').modal('show')
			})

			$('#save-cat').click(function() {
				const name = $('#kategori').val()

				$.post('{{ route('admin.category.store') }}', {
					name: name,
					_token: '{{ csrf_token() }}'
				}, function(response) {
					if(response.status == "failed") {
						alert("Terjadi kesalahan")
					} else {
						const el = `
						<div class="custom-control custom-radio">
							<input type="radio" name="category_id" value="${response.id}" class="custom-control-input" id="cat-${response.id}"> 
							<label for="cat-${response.id}" class="custom-control-label">${name}</label>
						</div>
						`

						$('#opt-cat').append(el)
					}

					$('#categoryModal').modal('hide')
				})
			})

			$('.reset').click(function() {
				$('[name="title"]').val('')
				$('#editor').summernote('code', '')
				$('[name="thumbnail"]').val('')
				$('[name="author"]').val('{{ auth()->user()->name }}')
			})
		</script>
	</x-slot>
</x-app-layout>